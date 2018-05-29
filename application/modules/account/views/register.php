<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php echo form_open('account/register', array('class' => 'form-horizontal')); ?>
        <div class="form-group<?php echo form_error('username') ? ' has-error' : ''; ?>">
            <label for="username" class="col-sm-3 control-label">Đăng nhập</label>
            <div class="col-sm-9">
                <input type="text" name="username" maxlength="30" value="<?php echo set_value('username'); ?>"
                       class="form-control" id="username">
                <span class="help-block">Từ 3 đến 32 ký tự.<br>Được sử dụng chữ cái Latin, số và dấu chấm ( . )</span>
            </div>
        </div>
        <div class="form-group<?php echo form_error('password') ? ' has-error' : ''; ?>">
            <label for="password" class="col-sm-3 control-label">Mật khẩu</label>
            <div class="col-sm-9">
                <input type="password" name="password" maxlength="32" value="<?php echo set_value('password'); ?>"
                       class="form-control" id="password">
                <span class="help-block">Từ 6 đến 32 ký tự</span>
            </div>
        </div>
        <div class="form-group<?php echo form_error('cf_password') ? ' has-error' : ''; ?>">
            <label for="cf_password" class="col-sm-3 control-label">Nhập lại mật khẩu</label>
            <div class="col-sm-9">
                <input type="password" name="cf_password" maxlength="32" value="<?php echo set_value('cf_password'); ?>"
                       class="form-control" id="cf_password">
            </div>
        </div>
        <hr>
        <div class="form-group<?php echo form_error('fullname') ? ' has-error' : ''; ?>">
            <label for="fullname" class="col-sm-3 control-label">Họ và tên</label>
            <div class="col-sm-9">
                <input type="text" name="fullname" maxlength="32" value="<?php echo set_value('fullname'); ?>"
                       class="form-control" id="fullname">
                <span class="help-block">Tối đa 32 ký tự</span>
            </div>
        </div>
        <div class="form-group<?php echo form_error('sex') ? ' has-error' : ''; ?>">
            <label for="sex" class="col-sm-3 control-label">Giới tính</label>
            <div class="col-sm-9">
                <select name="sex" class="form-control" id="sex">
                    <option value="?">-?-</option>
                    <option value="m"<?php echo set_select('sex', 'm'); ?>>Nam</option>
                    <option value="f"<?php echo set_select('sex', 'f'); ?>>Nữ</option>
                </select>
            </div>
        </div>
        <div class="form-group<?php echo form_error('about') ? ' has-error' : ''; ?>">
            <label for="about" class="col-sm-3 control-label">Giới thiệu</label>
            <div class="col-sm-9">
                <textarea rows="3" name="about" class="form-control"
                          id="about"><?php echo set_value('about'); ?></textarea>
                <span class="help-block">Tối đa 500 ký tự</span>
            </div>
        </div>
        <hr>
        <div class="form-group<?php echo form_error('captcha') ? ' has-error' : ''; ?>">
            <label for="captcha" class="col-sm-3 control-label">Mã xác minh</label>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="captcha" maxlength="5" class="form-control" id="captcha">
                    </div>
                    <div class="col-sm-6 xs-margin-top captcha-image"></div>
                </div>
                <span class="help-block">Nếu không nhìn thấy mã hình ảnh, hãy làm mới trang này hoặc kiểm tra cài đặt trình duyệt</span>
            </div>
        </div>
        <hr>
        <div class="alert alert-info">Click <b>đăng ký</b> là bạn đã đồng ý với <a
                    href="<?php echo site_url('forum/rules'); ?>">Quy
                định</a> của chúng tôi.<br>Vui lòng không đăng ký nhiều nick
        </div>
        <input type="submit" name="submit" value="Đăng ký" class="btn btn-primary btn-block">
        <?php echo form_close(); ?>
    </div>
</div>