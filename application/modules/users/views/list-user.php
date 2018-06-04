<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="list-group">
        <?php foreach ($list_user as $row): ?>
            <div class="list-group-item">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                    <tr valign="top">
                        <td width="38"><img src="https://phonho.net/assets/images/noavatar.png" width="32" height="32"
                                            alt=""></td>
                        <td>
                            <div><a href="https://phonho.net/profile/Lilly.1895/"
                                    class="user_0"><b><?php echo $row->username; ?></b></a> <img
                                        src="https://phonho.net/assets/images/off.gif" alt="*"></div>
                        </td>
                        <td align="right">
                            <div>Thành viên</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="clearfix margin-top">
    <div class="pull-right paging">
        <ul class="pagination pagination-sm">
            <li class="disabled"><span>««</span></li>
            <li class="disabled"><span>«</span></li>
            <li class="active"><span class="current"><b>1</b></span></li>
            <li><a class="pagenav" href="userlist?page=2">2</a></li>
            <li><a class="pagenav" href="userlist?page=3">3</a></li>
            <li><a class="pagenav" href="userlist?page=4">4</a></li>
            <li><a class="pagenav" href="userlist?page=5">5</a></li>
            <li><a class="pagenav" href="userlist?page=2">»</a></li>
            <li><a class="pagenav" href="userlist?page=68">»»</a></li>
        </ul>
    </div>
</div>