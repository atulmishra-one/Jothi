<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Jothi Impex.com__&middot;Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=config_item('BootStrap')?>" rel="stylesheet">
    <script src="<?=site_url('Public/Js/jquery-1.6.2.min.js')?>"></script>
    <script src="<?=site_url('Public/Js/jquery.form.js')?>"></script>
    <script>
	$(document).ready(function(e) {
        
		$('#frm').submit(function(e) {
            
			$('#loader').html('<img src="<?=config_item('AjaxLoader')?>" />');
			
        });
		
		$('#frm').ajaxForm(function(data){
			
			$('#loader').empty();
			
			if(data == "u"){
				$('.error-username').html('<span class="text-error">Invalid username</span>');
			}
			else
			{
				$('.error-username').empty();
			}
			if(data == 'p')
			{
				$('.error-password').html('<span class="text-error">Password not valid</span>');
			}
			else
			{
				$('.error-password').empty();
			}
			
			if(data == 's')
			{
				$('#frm').resetForm();
				$('#loader').html('<span class="text-success">Login Successfull....</div>');
				 window.location = '<?=site_url('admin/dashboard')?>';
			}
			
		});
		
    });
		
	</script>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
 
  </head>

  <body>

    <div class="container">

      
      <?=form_open('', array('id'=>'frmm', 'class'=>'form-signin'))?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <span class="error-username"></span>
        <input type="text" name="username" class="input-block-level" placeholder="Email address">
        <span class="error-password"></span>
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        
        <input type="submit" name="btn" class="btn btn-large btn-primary" value="Sign in" />
        	<div id="loader" class="pull-right"></div>
      
      <?=form_close()?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   

  </body>
</html>
