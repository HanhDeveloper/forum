<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">Dữ liệu thông tin tài khoản của bạn</div>
    <div class="panel-body">
        <p>
            ID của bạn: <b><?php echo $id; ?></b><br/>
            Tên tài khoản: <b><?php echo $username; ?></b><br/>
            Mật khẩu của bạn: <b><?php echo $password; ?></b>
        </p>
        <p>
            <?php if ($need_activate): ?><span class="red">
                Để kích hoạt tài khoản, soạn: ON GT <b><?php echo $username; ?></b> gửi 8085 (1000 VNĐ/SMS)
                </span><?php else: ?><a href="<?php echo site_url(); ?>">Xác nhận</a><?php endif ?>
        </p>
    </div>
</div>