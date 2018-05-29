<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="list-group">
        <a class="list-group-item" href="<?php echo site_url('password'); ?>">Thay đổi mật khẩu</a>
    </div>
    <div class="panel-body">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php echo form_open('account', array('class' => 'form-horizontal')); ?>
        <div class="form-group<?php echo form_error('status') ? ' has-error' : ''; ?>">
            <label for="status" class="col-sm-3 control-label">Tâm trạng</label>
            <div class="col-sm-9">
                <input type="text" name="status" value="<?php echo set_value('status', $user->status); ?>"
                       class="form-control" id="status">
            </div>
        </div>
        <hr class="separator">
        <div class="form-group">
            <label class="col-sm-3 control-label">Avatar</label>
            <div class="col-sm-9">
                <img src="<?php echo base_url('assets/img/noavatar.png'); ?>" width="64" height="64"
                     alt="<?php echo $user->username; ?>">
                <span class="help-block"><a href="avatar">Tải lên</a></span>
            </div>
        </div>
        <div class="form-group<?php echo form_error('fullname') ? ' has-error' : ''; ?>">
            <label for="fullname" class="col-sm-3 control-label">Họ tên</label>
            <div class="col-sm-9">
                <input type="text" name="fullname" maxlength="32"
                       value="<?php echo set_value('fullname', $user->fullname); ?>" class="form-control" id="fullname">
            </div>
        </div>
        <div class="form-group<?php echo form_error('sex') ? ' has-error' : ''; ?>">
            <label for="name" class="col-sm-3 control-label">Giới tính</label>
            <div class="col-sm-9">
                <select name="sex" class="form-control" id="sex">
                    <option value="?">-?-</option>
                    <option value="m"<?php echo set_select('sex', 'm'); ?>>Nam</option>
                    <option value="f"<?php echo set_select('sex', 'f'); ?>>Nữ</option>
                </select>
            </div>
        </div>
        <div class="form-group date-input">
            <label for="birthday" class="col-sm-3 control-label">Ngày sinh</label>
            <div class="col-sm-9">
                <input type="text" value="" class="form-control hasDatepicker" id="birthday">
            </div>
            <input type="hidden" name="dayb" value="<?php echo set_value('dayb', $user->dayb); ?>" maxlength="2"
                   id="dayb">
            <input type="hidden" name="monthb" value="<?php echo set_value('monthb', $user->monthb); ?>" maxlength="2"
                   id="monthb">
            <input type="hidden" name="yearb" value="<?php echo set_value('yearb', $user->yearb); ?>" maxlength="4"
                   id="yearb">
        </div>
        <div class="form-group<?php echo form_error('address') ? ' has-error' : ''; ?>">
            <label for="address" class="col-sm-3 control-label">Địa chỉ</label>
            <div class="col-sm-9">
                <input type="text" name="address" value="<?php echo set_value('address', $user->address); ?>"
                       class="form-control" id="address">
            </div>
        </div>
        <div class="form-group<?php echo form_error('about') ? ' has-error' : ''; ?>">
            <label for="about" class="col-sm-3 control-label">Giới thiệu</label>
            <div class="col-sm-9">
                <textarea name="about" rows="3" class="form-control"
                          id="about"><?php echo set_value('about', $user->about); ?></textarea>
            </div>
        </div>
        <hr class="separator">
        <div class="form-group">
            <label class="col-sm-3 control-label">Số điện thoại</label>
            <div class="col-sm-9">
                <input type="text" value="<?php echo $user->mobile; ?>" disabled="disabled" class="form-control">
                <span class="help-block"><small>Sử dụng số điện thoại của bạn, soạn <b
                                class="red">ON GT <?php echo $user->username; ?></b> gửi 8085 để cập nhật</small><br></span>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">E-mail</label>
            <div class="col-sm-9">
                <input type="text" name="email" value="<?php echo set_value('email', $user->email); ?>"
                       class="form-control" id="email">
                <span class="help-block">Chú ý! Vui lòng điền chính xác<br> Địa chỉ email này được dùng để lấy lại mật khẩu.</span>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Mật khẩu hiện tại</label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" id="password">
                <span class="help-block">Cần nhập nếu bạn muốn thay đổi email!</span>
            </div>
        </div>
        <hr class="separator">
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input type="submit" value="Lưu lại" name="submit" class="btn btn-primary">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>