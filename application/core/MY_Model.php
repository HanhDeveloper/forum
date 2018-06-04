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

    protected $skip_validation = FALSE;

    protected $return_type = 'object';

    /* --------------------------------------------------------------
     * GENERIC METHODS
     * ------------------------------------------------------------ */

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->db = $this->CI->db;
    }

    /* --------------------------------------------------------------
     * CRUD INTERFACE
     * ------------------------------------------------------------ */

    /**
     * Fetch a single record based on the primary key. Returns an object.
     */
    public function get($primary_value)
    {
        return $this->get_by($this->primary_key, $primary_value);
    }

    /**
     * Fetch a single record based on an arbitrary WHERE call. Can be
     * any valid value to $this->db->where().
     */
    public function get_by()
    {
        $where = func_get_args();
        $this->_set_where($where);
        $row = $this->db
            ->get($this->table)
            ->{$this->return_type()}();
        return $row;
    }

    /**
     * Fetch an array of records based on an array of primary values.
     */
    public function get_many($values)
    {
        $this->db->where_in($this->primary_key, $values);
        return $this->get_all();
    }

    /**
     * Fetch an array of records based on an arbitrary WHERE call.
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
     */
    public function get_all()
    {
        $result = $this->db
            ->get($this->table)
            ->{$this->return_type(1)}();
        return $result;
    }

    /**
     * Insert a new row into the table. $data should be an associative array
     * of data to be inserted. Returns newly created ID.
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
     * Insert multiple rows into the table. Returns an array of multiple IDs.
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
     */
    public function update($primary_value, $data, $skip_validation = FALSE)
    {
        if ($skip_validation === FALSE) {
            $data = $this->validate($data);
        }
        if ($data !== FALSE) {
            $result = $this->db->where($this->primary_key, $primary_value)
                ->set($data)
                ->update($this->table);
            return $result;
        } else {
            return FALSE;
        }
    }

    /**
     * Update many records, based on an array of primary values.
     */
    public function update_many($primary_values, $data, $skip_validation = FALSE)
    {
        if ($skip_validation === FALSE) {
            $data = $this->validate($data);
        }
        if ($data !== FALSE) {
            $result = $this->db->where_in($this->primary_key, $primary_values)
                ->set($data)
                ->update($this->table);
            return $result;
        } else {
            return FALSE;
        }
    }

    /**
     * Updated a record based on an arbitrary WHERE clause.
     */
    public function update_by()
    {
        $args = func_get_args();
        $data = array_pop($args);
        if ($this->validate($data) !== FALSE) {
            $this->_set_where($args);
            $result = $this->db->set($data)
                ->update($this->table);
            return $result;
        } else {
            return FALSE;
        }
    }

    /**
     * Update all records
     */
    public function update_all($data)
    {
        $result = $this->db->set($data)
            ->update($this->table);
        return $result;
    }

    /**
     * Delete a row from the table by the primary value
     */
    public function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $result = $this->db->delete($this->table);
        return $result;
    }

    /**
     * Delete a row from the database table by an arbitrary WHERE clause
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
        if (!in_array('relate', $this->after_get)) {
            $this->after_get[] = 'relate';
        }
        return $this;
    }

    public function relate($row)
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
                $this->load->model($options['model'], $relationship . '_model');
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
                $options = array('primary_key' => singular($this->_table) . '_id', 'model' => singular($value) . '_model');
            } else {
                $relationship = $key;
                $options = $value;
            }
            if (in_array($relationship, $this->_with)) {
                $this->load->model($options['model'], $relationship . '_model');
                if (is_object($row)) {
                    $row->{$relationship} = $this->{$relationship . '_model'}->get_many_by($options['primary_key'], $row->{$this->primary_key});
                } else {
                    $row[$relationship] = $this->{$relationship . '_model'}->get_many_by($options['primary_key'], $row[$this->primary_key]);
                }
            }
        }
        return $row;
    }

    /**
     * Run validation on the passed data
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
            $this->load->library('form_validation');
            if (is_array($this->validate)) {
                $this->form_validation->set_rules($this->validate);
                if ($this->form_validation->run() === TRUE) {
                    return $data;
                } else {
                    return FALSE;
                }
            } else {
                if ($this->form_validation->run($this->validate) === TRUE) {
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
     * Set SELECT parameters, cleverly
     */
    protected function _set_select($select = '*', $escape = NULL)
    {
        $this->db->select($select, $escape);
    }

    /**
     * Set WHERE parameters, cleverly
     */
    protected function _set_where($params)
    {
        if (count($params) == 1 && is_array($params[0])) {
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
        } else if (count($params) == 1) {
            $this->db->where($params[0]);
        } else if (count($params) == 2) {
            if (is_array($params[1])) {
                $this->db->where_in($params[0], $params[1]);
            } else {
                $this->db->where($params[0], $params[1]);
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
     */
    protected function return_type($multi = FALSE)
    {
        $method = ($multi) ? 'result' : 'row';
        return $this->return_type == 'array' ? $method . '_array' : $method;
    }
}