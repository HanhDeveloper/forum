<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if (is_logged_in()): $user = get_userdata(); ?>
    <div class="panel panel-default">
        <div class="mini-profile">
            <div class="img-cover"></div>
            <div class="img-avatar"></div>
            <div class="info">
                <div class="account">
                    <a href="<?php echo site_url('account/profile/' . $user->username . '.' . $user->id); ?>"><b><?php echo $user->username; ?></b></a>
                </div>
                <div class="imname"><?php echo $user->fullname; ?></div>
            </div>
        </div>
        <div class="balance row text-center">
            <div class="col col-xs-6">
                <img src="<?php echo base_url('assets/img/coin.png'); ?>"><br><span><?php echo $user->coin; ?></span>
            </div>
            <div class="col col-xs-6">
                <img src="<?php echo base_url('assets/img/gold.png'); ?>"><br><span><?php echo $user->gold; ?></span>
            </div>
        </div>
        <div class="list-group">
            <a class="list-group-item" href="<?php echo site_url('account'); ?>">Tài khoản</a>
            <a class="list-group-item" href="<?php echo site_url('account/logout'); ?>">Đăng xuất</a>
        </div>
    </div>
<?php else: ?>
    <div class="panel panel-primary">
        <div class="panel-body">
            <?php echo form_open('login'); ?>
            <div class="form-group">
                <label for="_username" class="control-label">Tên người dùng</label>
                <input type="text" name="username" class="form-control" id="_username">
            </div>
            <div class="form-group">
                <label for="_password" class="control-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="_password">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary btn-block">
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <div class="checkbox" style="margin-top: 0;margin-bottom: 0">
                        <label><input type="checkbox" name="mem" value="1" checked="checked">Ghi nhớ</label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <a href="<?php echo site_url('account/recover'); ?>" title="Quên mật khẩu">Quên mật khẩu</a>
                </div>
            </div>
            <div class="form-group">
                <a href="<?php echo site_url('login/facebook'); ?>" class="btn btn-block"><span
                            class="fa fa-facebook"></span> Login with Facebook</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
<?php endif ?>
<div class="panel panel-primary">
    <div class="panel-heading">MENU</div>
    <div class="list-group">
        <a class="list-group-item" href="<?php echo site_url('forum'); ?>">Diễn đàn</a>
        <a class="list-group-item" href="<?php echo site_url('chat'); ?>">Chatbox</a>
        <a class="list-group-item" href="<?php echo site_url('tools'); ?>">Công cụ</a>
        <a class="list-group-item" href="<?php echo site_url('users'); ?>">Thành viên</a>
    </div>
</div>