<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <form action="<?php echo site_url('users/search'); ?>" method="get">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-9 col-xs-6">
                        <input type="text" name="q" class="form-control" id="keyword">
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <input type="submit" value="Tìm kiếm" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="list-group">
        <div class="list-group-item"><a href="<?php echo site_url('users/member'); ?>">Thành viên</a> (955 / <span
                    style="color:red">+1</span>)
        </div>
        <div class="list-group-item"><a href="<?php echo site_url('users/staff'); ?>">Hành chính</a> (4)</div>
        <div class="list-group-item"><a href="<?php echo site_url('users/top'); ?>">Xếp hạng</a></div>
    </div>
</div>