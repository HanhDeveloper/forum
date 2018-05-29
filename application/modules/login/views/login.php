<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php echo form_open('login', array('class' => 'form-horizontal')); ?>
        <div class="form-group">
            <label for="username" class="control-label col-sm-3">Tên người dùng</label>
            <div class="col-sm-9">
                <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control"
                       id="username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="control-label col-sm-3">Mật khẩu</label>
            <div class="col-sm-9">
                <input type="password" name="password" value="<?php echo set_value('account'); ?>" class="form-control"
                       id="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <div class="checkbox">
                    <label><input type="checkbox" name="mem" value="1" checked="checked">Ghi nhớ</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary">
                <a href="<?php echo site_url('login/facebook'); ?>"
                   class="btn btn-social btn-facebook margin-left no-ajax"><span class="fa fa-facebook"></span> Login
                    with Facebook</a>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <a href="<?php echo site_url('account/recover'); ?>" title="Quên mật khẩu">Quên mật khẩu</a>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>