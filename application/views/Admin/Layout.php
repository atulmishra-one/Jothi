<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Jothi Impex.com__</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=config_item('BootStrap')?>" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
	  #loader{
		  position:absolute;
		  width:160px;
		  height:30px;
		  margin-left:500px;
		  margin-top:220px;
		  border: 2px dotted #FC9;
		  background:#FFC;
		  padding:4px;
		  display:none;
	  }
	  sup{
		  font-weight:bold;
		  color:#F00;
	  }
    </style>
    <link href="<?=site_url()?>Public/bootstrap/docs/css/bootstrap-responsive.css" rel="stylesheet">
     <script src="<?=base_url()?>Public/fancybox/lib/jquery-1.8.0.min.js"></script>
<script src="<?=base_url()?>Public/fancybox/source/jquery.fancybox.js"></script>
<link rel="stylesheet" href="<?=base_url()?>Public/fancybox/source/jquery.fancybox.css" />
<script src="<?=site_url('Public/Js/delete.js')?>"></script>
<script src="<?=site_url('Public/Js/jquery.form.js')?>"></script>
<script>
	$(document).ready(function(e) {
        $('.fancybox').fancybox();
    });
</script>


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  </head>

  <body>
		<div id="loader"> <img src="<?=base_url()?>Public/Images/ajax-loader.gif" />&nbsp;&nbsp;Please wait....</div>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?=anchor('', 'Jothi Impex.com', array('class'=>'brand', 'target'=> '_blank'))?>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?=$this->session->userdata('Username')?></a>
            </p>
            <ul class="nav">
              <li class="active"><?=anchor('admin/dashboard', 'Home')?></li>
              <li><?=anchor('admin/categories', 'Categories')?></li>
              <li><?=anchor('admin/products', 'Products')?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
      <?php if(!isset ( $p ) and empty($p) ):?>
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Menus</li>
              <li class="active"><?=anchor('admin/categories', 'Categories')?></li>
              <li class="divider"></li>
              <li><?=anchor('admin/categories/add_categories', 'Add Categories')?></li>
              <li class="divider"></li>
              <li><?=anchor('admin/products', 'Products')?></li>
              <li class="divider"></li>
              <li><?=anchor('admin/products/add_products', 'Add Products')?></li>
              <li class="divider"></li>
              <li><?=anchor('admin/brands', 'Brands')?></li>
              <li class="divider"></li>
              <li><?=anchor('admin/brands/add_brands', 'Add Brands')?></li>
               <li class="divider"></li>
              <li><?=anchor('admin/shipping/', 'Shipping')?></li>
          
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <?php endif;?>
        <div class="span<?=(!isset($p) )? '9': ''?>">
        		
                <?=$content?>
        
        </div>
        <!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="../assets/js/jquery.js"></script>-->
    <script src="<?=base_url()?>Public/bootstrap/js/bootstrap-transition.js"></script>
   <!-- <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>-->
    <script src="<?=base_url()?>Public/bootstrap/js/bootstrap-tab.js"></script>
   <!-- <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
   
    <script src="../assets/js/bootstrap-collapse.js"></script>-->
  

  </body>
</html>
