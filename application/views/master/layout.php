<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('master/head'); ?>
<body basesrc="<?php echo site_url(); ?>" id="mainpage">
<div id="container">
    <?php $this->load->view('master/nav'); ?>
    <div id="body" class="maintxt container">
        <div class="row">
            <div id="main" class="col-xs-12 col-lg-9">
                <?php echo isset($the_view_content) ? $the_view_content : ''; ?>
            </div>
            <div id="sidebar" class="col-xs-12 col-lg-3 hidden-xs hidden-sm hidden-md">
                <?php $this->load->view('master/menu'); ?>
            </div>
        </div>
        <?php $this->load->view('master/footer'); ?>
    </div><!--/ #body -->
</div><!--/ #container -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
</body>
</html>