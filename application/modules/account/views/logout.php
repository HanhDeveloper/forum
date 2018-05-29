<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php echo form_open('account/logout', array('class' => 'form-horizontal')); ?>
        <h4>Bạn có chắc không?</h4>
        <hr>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" name="submit" value="Đồng ý" class="btn btn-primary">
                <a href="<?php echo site_url('account'); ?>" class="btn btn-danger">Không đồng ý</a>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>