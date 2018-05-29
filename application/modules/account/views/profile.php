<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-default margin-bottom">
    <div class="profile">
        <div class="profile-cover"
             style="background-image:url(<?php echo base_url('assets/img/nocover.jpg'); ?>)">
            <div class="btn-cover"><a href="<?php echo site_url('account/cover'); ?>"><i class="fa fa-camera fa-lg"></i><span
                            class="changeText">Đổi ảnh bìa</span></a></div>
        </div>
        <div class="profileInfo">
            <div class="profileName"><?php echo $user->username; ?></div>
            <div class="profileStatus nowap"><?php echo $user->status; ?></div>
        </div>
        <a href="<?php echo site_url('account/avatar'); ?>">
            <div class="profileAvatar"
                 style="background-image: url(<?php echo base_url('assets/img/noavatar.png'); ?>)"></div>
        </a>
        <div class="profileMenu menu">
            <ul class="nav nav-pills nav-response">
                <li><a href="<?php echo site_url('account/profile/' . $user->username . '.' . $user->id); ?>">Trang cá
                        nhân</a></li>
                <li class="pill"><a
                            href="<?php echo site_url('account/profile/' . $user->username . '.' . $user->id . '/information'); ?>">Thông
                        tin</a></li>
                <li class="pill"><a
                            href="<?php echo site_url('account/profile/' . $user->username . '.' . $user->id . '/activity'); ?>">Hoạt
                        động</a></li>
            </ul>
        </div>
    </div>
</div>