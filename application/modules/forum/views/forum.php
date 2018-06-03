<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="clearfix margin-bottom">
    <div class="pull-right"><a href="<?php echo site_url('forum/search'); ?>" class="btn btn-primary btn-sm">Tìm
            kiếm</a><a
                href="<?php echo site_url('forum/unread'); ?>" class="btn btn-danger btn-sm margin-left">Chưa
            đọc <span class="badge"><b>2283</b></span></a></div>
</div>
<div class="panel-group">
    <div class="panel panel-primary">
        <?php foreach ($forums as $row): if ($row->type === 'f'): ?>
        <div class="panel-heading" id="<?php echo $row->id; ?>">
            <h3 class="panel-title"><a href="#<?php echo $row->id; ?>"><?php echo $row->name; ?></a></h3>
            <?php if ($row->description): ?>
                <div class="sub"><?php echo $row->description; ?></div><?php endif; ?>
            </div><?php endif; ?>
            <?php foreach ($row->categories as $cat): if ($cat->type === 'm'): ?>
                <div class="list-group-item">
                    <h4 class="list-group-item-heading"><a
                                href="<?php echo site_url('thread/' . $cat->id); ?>"><?php echo $cat->name; ?></a>
                    </h4>
                </div>
            <?php endif; endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>