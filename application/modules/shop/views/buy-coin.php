<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="alert alert-info">Tối thiểu 100 vàng<br>Tỉ lệ chuyển đổi: 100 vàng =&gt; 1000 xu</div>
        <form action="buy-coin" method="post" class="form-inline">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Vàng</div>
                    <input type="number" class="form-control" min="1" step="1" name="gold" value="0"
                           required="required">
                    <span class="input-group-addon">00</span>
                </div>
            </div>
            <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary">
        </form>
    </div>
</div>