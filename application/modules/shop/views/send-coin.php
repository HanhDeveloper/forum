<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="alert alert-info">Chuyển tối thiểu 100 xu và là bội số của 10.<br>Phí chuyển đổi: 10%.<br>VD: Gửi
            100xu -&gt; mất 110 xu, người nhận được 100 xu
        </div>
        <form action="send-coin" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Tên người nhận</label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="" required="required" class="form-control" id="name">
                </div>
            </div>
            <div class="form-group">
                <label for="coin" class="col-sm-3 control-label">Số xu chuyển</label>
                <div class="col-sm-9">
                    <input type="number" min="100" step="10" name="coin" value="0" required="required"
                           class="form-control" id="coin">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>