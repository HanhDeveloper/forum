<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    private $CI;

    protected $table;

    protected $db;

    protected $primary_key = 'id';

    /**
     * The various callbacks available to the model. Each are
     * simple lists of method names (methods will be run on $this).
     */
    protected $before_create = array();
    protected $after_create = array();
    protected $before_update = array();
    protected $after_update = array();
    protected $before_get = array();
    protected $after_get = array();
    protected $before_delete = array();
    protected $after_delete = array();

    protected $callback_parameters = array();

    /**
     * Relationship arrays. Use flat strings for defaults or string
     * => array to customise the class name and primary key
     */
    protected $belongs_to = array();
    protected $has_many = array();
    protected $_with = array();

    /**
     * An array of validation rules. This needs to be the same format
     * as validation rules passed to the Form_validation library.
     */
    protected $validate = array();
    /**
     * Optionally skip the validation. Used in conjunction with
     * skip_validation() to skip data validation for any future calls.
     */
    protected $skip_validation = FALSE;

    protected $return_type = 'object';

    /* --------------------------------------------------------------
     * GENERIC METHODS
     * ------------------------------------------------------------ */

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('inflector');
        $this->CI->load->database();
        $this->db = $this->CI->db;
    }

    /* --------------------------------------------------------------
     * CRUD INTERFACE
     * ------------------------------------------------------------ */

    /**
     * Fetch a single record based on the primary key.
     * @param   mixed $primary_value
     * @return  object
     */
    public function get($primary_value)
    {
        return $this->get_by($this->primary_key, $primary_value);
    }

    /**
     * Fetch a single record based on an arbitrary WHERE call. Can be
     * any valid value to $this->db->where().
     * @return  object
     */
    public function get_by()
    {
        $where = func_get_args();

        $this->_set_where($where);

        $this->trigger('before_get');

        $row = $this->db->get($this->table)->{$this->_return_type()}();

        $row = $this->trigger('after_get', $row);

        return $row;
    }

    /**
     * Fetch an array of records based on an array of primary values.
     * @param   array $primary_values
     * @return  object
     */
    public function get_many($primary_values)
    {
        $this->db->where_in($this->primary_key, $primary_values);
        return $this->get_all();
    }

    /**
     * Fetch an array of records based on an arbitrary WHERE call.
     * @return  object
     */
    public function get_many_by()
    {
        $where = func_get_args();
        $this->_set_where($where);
        return $this->get_all();
    }

    /**
     * Fetch all the records in the table. Can be used as a generic call
     * to $this->db->get() with scoped methods.
     * @return  object
     */
    public function get_all()
    {
        $this->trigger('before_get');

        $rows = $this->db->get($this->table)->{$this->_return_type(TRUE)}();

        foreach ($rows as $key => &$row) {
            $row = $this->trigger('after_get', $row, ($key == count($rows) - 1));
        }

        return $rows;
    }

    /**
     * Insert a new row into the table. $data should be an associative array
     * of data to be inserted.
     * @param   array $data
     * @param   bool $skip_validation
     * @return  int|bool    Returns newly created ID, FALSE on failure
     */
    public function insert($data, $skip_validation = FALSE)
    {
        if ($skip_validation === FALSE) {
            $data = $this->validate($data);
        }
        if ($data !== FALSE) {
            $this->db->insert($this->table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return FALSE;
        }
    }

    /**
     * Insert multiple rows into the table.
     * @param   array $data
     * @param   bool $skip_validation
     * @return  array   Returns an array of multiple IDs
     */
    public function insert_many($data, $skip_validation = FALSE)
    {
        $ids = array();
        foreach ($data as $key => $row) {
            $ids[] = $this->insert($row, $skip_validation);
        }
        return $ids;
    }

    /**
     * Updated a record based on the primary value.
     * @param   mixed $primary_value
     * @param   array $data
     * @param   bool $skip_validation
     * @return  bool    TRUE on success, FALSE on failure
     */
    public function update($primary_value, $data, $skip_validation = FALSE)
    {
        if ($skip_validation === FALSE) {
            $data = $this->validate($data);
        }
        if ($data !== FALSE) {
            $this->db->where($this->primary_key, $primary_value);
            $result = $this->db->set($data)->update($this->table);
            return $result;
        } else {
            return FALSE;
        }
    }

    /**
     * Update many records, based on an array of primary values.
     * @param   array $primary_values
     * @param   array $data
     * @param   bool $skip_validation
     * @return  bool    TRUE on success, FALSE on failure
     */
    public function update_many($primary_values, $data, $skip_validation = FALSE)
    {
        if ($skip_validation === FALSE) {
            $data = $this->validate($data);
        }
        if ($data !== FALSE) {
            $this->db->where_in($this->primary_key, $primary_values);
            $result = $this->db->set($data)->update($this->table);
            return $result;
        } else {
            return FALSE;
        }
    }

    /**
     * Updated a record based on an arbitrary WHERE clause.
     * @return  bool    TRUE on success, FALSE on failure
     */
    public function update_by()
    {
        $args = func_get_args();
        $data = array_pop($args);
        if ($this->validate($data) !== FALSE) {
            $this->_set_where($args);
            $result = $this->db->set($data)->update($this->table);
            return $result;
        } else {
            return FALSE;
        }
    }

    /**
     * Update all records
     * @param   array $data
     * @return  bool    TRUE on success, FALSE on failure
     */
    public function update_all($data)
    {
        $result = $this->db->set($data)->update($this->table);
        return $result;
    }

    /**
     * Delete a row from the table by the primary value
     * @param   mixed $primary_value
     * @return  bool    TRUE on success, FALSE on failure
     */
    public function delete($primary_value)
    {
        $this->db->where($this->primary_key, $primary_value);
        $result = $this->db->delete($this->table);
        return $result;
    }

    /**
     * Delete a row from the database table by an arbitrary WHERE clause
     * @return  bool    TRUE on success, FALSE on failure
     */
    public function delete_by()
    {
        $where = func_get_args();
        $this->_set_where($where);
        $result = $this->db->delete($this->table);
        return $result;
    }

    /**
     * Delete many rows from the database table by multiple primary values
     * @param   array $primary_values
     * @return  bool    TRUE on success, FALSE on failure
     */
    public function delete_many($primary_values)
    {
        $this->db->where_in($this->primary_key, $primary_values);
        $result = $this->db->delete($this->table);
        return $result;
    }

    /* --------------------------------------------------------------
     * RELATIONSHIPS
     * ------------------------------------------------------------ */
    public function with($relationship)
    {
        $this->_with[] = $relationship;
        if (!in_array('relationships', $this->after_get)) {
            $this->after_get[] = 'relationships';
        }
        return $this;
    }

    public function relationships($row)
    {
        if (empty($row)) {
            return $row;
        }
        foreach ($this->belongs_to as $key => $value) {
            if (is_string($value)) {
                $relationship = $value;
                $options = array('primary_key' => $value . '_id', 'model' => $value . '_model');
            } else {
                $relationship = $key;
                $options = $value;
            }
            if (in_array($relationship, $this->_with)) {
                $this->CI->load->model($options['model'], $relationship . '_model');
                if (is_object($row)) {
                    $row->{$relationship} = $this->{$relationship . '_model'}->get($row->{$options['primary_key']});
                } else {
                    $row[$relationship] = $this->{$relationship . '_model'}->get($row[$options['primary_key']]);
                }
            }
        }
        foreach ($this->has_many as $key => $value) {
            if (is_string($value)) {
                $relationship = $value;
                $options = array('primary_key' => singular($this->table) . '_id', 'model' => singular($value) . '_model');
            } else {
                $relationship = $key;
                $options = $value;
            }
            var_dump($this->with())
            if (in_array($relationship, $this->_with)) {
                $this->CI->load->model($options['model'], $relationship . '_model');
                if (is_object($row)) {
                    $row->{$relationship} = $this->{$relationship . '_model'}->get_many_by($options['primary_key'], $row->{$this->primary_key});
                } else {
                    $row[$relationship] = $this->{$relationship . '_model'}->get_many_by($options['primary_key'], $row[$this->primary_key]);
                }
            }
        }
        return $row;
    }

    /* --------------------------------------------------------------
     * INTERNAL METHODS
     * ------------------------------------------------------------ */

    /**
     * Trigger an event and call its observers. Pass through the event name
     * (which looks for an instance variable $this->event_name), an array of
     * parameters to pass through and an optional 'last in interation' boolean
     * @param   mixed $event
     * @param   mixed $data
     * @param   mixed $last
     * @return  array|object
     */
    public function trigger($event, $data = FALSE, $last = TRUE)
    {
        if (isset($this->$event) && is_array($this->$event)) {
            foreach ($this->$event as $method) {
                if (strpos($method, '(')) {
                    preg_match('/([a-zA-Z0-9\_\-]+)(\(([a-zA-Z0-9\_\-\., ]+)\))?/', $method, $matches);
                    $method = $matches[1];
                    $this->callback_parameters = explode(',', $matches[3]);
                }
                $data = call_user_func_array(array($this, $method), array($data, $last));
            }
        }
        return $data;
    }

    /**
     * Run validation on the passed data
     * @param   mixed $data
     * @return  bool
     */
    public function validate($data)
    {
        if ($this->skip_validation) {
            return $data;
        }
        if (!empty($this->validate)) {
            foreach ($data as $key => $val) {
                $_POST[$key] = $val;
            }
            $this->CI->load->library('form_validation');
            if (is_array($this->validate)) {
                $this->CI->form_validation->set_rules($this->validate);
                if ($this->CI->form_validation->run() === TRUE) {
                    return $data;
                } else {
                    return FALSE;
                }
            } else {
                if ($this->CI->form_validation->run($this->validate) === TRUE) {
                    return $data;
                } else {
                    return FALSE;
                }
            }
        } else {
            return $data;
        }
    }

    /**
     * Generates the SELECT portion of the query
     * @param    string $select
     * @param    mixed $escape
     */
    protected function _set_select($select = '*', $escape = NULL)
    {
        $this->db->select($select, $escape);
    }

    /**
     * Set WHERE parameters, cleverly
     * @param   mixed $params
     */
    protected function _set_where($params)
    {
        if (count($params) == 1) {
            if (is_array($params[0])) {
                foreach ($params[0] as $field => $filter) {
                    if (is_array($filter)) {
                        $this->db->where_in($field, $filter);
                    } else {
                        if (is_int($field)) {
                            $this->db->where($filter);
                        } else {
                            $this->db->where($field, $filter);
                        }
                    }
                }
            } else {
                $this->db->where($params[0]);
            }
        } else if (count($params) == 3) {
            $this->db->where($params[0], $params[1], $params[2]);
        } else {
            if (is_array($params[1])) {
                $this->db->where_in($params[0], $params[1]);
            } else {
                $this->db->where($params[0], $params[1]);
            }
        }
    }

    /**
     * Return the method name for the current return type
     * @param   bool $multi
     * @return  string
     */
    protected function _return_type($multi = FALSE)
    {
        $method = ($multi) ? 'result' : 'row';
        return $this->return_type == 'array' ? $method . '_array' : $method;
    }
}