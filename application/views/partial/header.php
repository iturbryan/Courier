<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MEX Courier</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/bootstrap-3.2.0/dist/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/bootstrap-3.2.0/dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/bootstrapValidator.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/bootstrap-datetimepicker.min.css">
	<link href='http://fonts.googleapis.com/css?family=Fredoka One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url(); ?>media/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>media/bootstrap-3.2.0/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>media/js/bootstrap-datetimepicker.min.js" ></script>
	      
      <script type="text/javascript" src="<?php echo base_url();?>media/js/notifIt.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>media/js/bootbox.min.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/css/notifIt.css">


	<style type="text/css">
	body {
	  width: 1000px;
	  margin: 0 auto;
	  font-family: 'Arial';
	  background: #f1f1f1;
	}
	.row {
	  margin: 0 auto;
	}
	#header {
	  width:1000px;
	  margin: 0 auto;
	  font-family: 'Fredoka One';
	  border-bottom: 3px solid #111;
	}
	
	#header h1 {
	  color: #a30007;
	  font-size:45px;
	}
	.form-group {
	  margin-bottom: 4px;
	}
	.login_container {
	  position:fixed;
	  top: 50%;
	  left: 50%;
	  width:500px;
	  margin-top:-15em; /*set to a negative number 1/2 of your height*/
	  margin-left: -250px; /*set to a negative number 1/2 of your width*/
	  padding:20px;
	  text-align: center;
	}
	.main_container {
	  
	}
	.header {
	  font-weight:bold;
	  background: #c0c0c0;
	  color:#111;
	  padding:8px;
	  font-size:13px;
	}
	.separator {
	  line-height: 1px;
	}
	.fieldset {
	  padding:10px;
	  border-radius: 10px;
	}
	.row_item {
	  padding: 3px;
	  border-bottom: 1px solid #f1f1f1;
	  font-size:11px;
	}
	.centered {
	  text-align:center;
	}
	.readonly {
	  font-weight:normal;
	  margin-left:8px;
	}
	.left {
	  text-align: left;
	}
	.form-button {
	  text-align: right;
	  margin-right: 1px;
	  margin-top:5px;
	}
	h3 {
	  color: #910606;
	  text-align: center;
	}
	.right {
	  text-align: right;
	}
	.fieldset input, textarea {
	  background: #;
	  border-radius:0px;
	}
	form {
	  padding-bottom: 30px;
	}
	.edit select.input-sm {
	    width: 200px;
	}
	.edit textarea.input-sm {
	    width: 200px;
	}
	.user {
	    text-align: right;
	}
	.menu {
	  padding:4px;
	  text-transform:uppercase;
	  font-family:'Roboto';
	}
	.menu a {	  
	  color: #a30007;
	}
	.menu a:hover {
	  text-decoration: none;
	  color: #a30007;
	}
	.dropdown {
	  border: none;
	  margin-top: -10px;
	}
	.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
	  padding:0px;
	}
	.call_to_action {
	  padding-top:5px;
	  padding-bottom: 4px;
	  font-weight: bold;
	  font-family:'Fredoka One';
	}
	.copyright {
	  text-align: center;
	  margin-bottom: 0px;
	}
	.must {
	  color: #910606;
	}
	.danger {
	  color: #910606;
	  }
	  .larger {
	  
	  font-size: larger;
	  }
	  a:hover {
	    text-decoration:none;
	  }
	  .hidden {
	    padding:0px;
	  }
	  #container {
	    width:1000px;
	    height:100%;
	    background: #fff;
	    padding:5px;
	  }
	  h5 {
	    color: #910606;
	    text-align:center;
	  }
	  form {
	    padding:2px;
	    }
	    .call_to_action form {
	      float:right;
	    }
	    .input-group-addon {
	      cursor:pointer;
	    }
	</style>
	<script type="text/javascript">
	  function fail(message){
	   notif({
		  type: "error",
		  msg: message,
		  position: "right",
		  width: 500,
		  height: 60,
		  fade: true,
		  autohide: true,
		  multiline: true
		});
	  }
	  function success(message){
	    notif({
		  type: "info",
		  msg: message,
		  position: "right",
		  width: 500,
		  fade: true,
		  autohide: true,
		  multiline: true
		});
	  }
	  function print_document(){
	  	window.print();
	  	window.location.href = '/parcels';
	  }
	  $(document).ready(function(){
	    if($('#error').val() != '')
	      fail($('#error').val());
	    else if($('#success').val() != '')
	      success($('#success').val());
	  });
	</script>
</head>
<body <?php if(@$print != null){?> onload="print_documendt();" <?php } ?>>
<?php if(!empty($this->session->userdata('logged_in'))){
?>
<div id="container">
<?php if(@$print == null) {?>
<div id="header">
  <div class="row">
	<div class="col-xs-6 col-md-3">
	  <img src="<?php echo base_url(); ?>media/images/logo.png" />
	</div>
	<div class="col-xs-12 col-md-9 right">
	  <h1>COURIER INFORMATION SYSTEM</h1>
	  <div class="row">
	    <div class="col-md-7">
	      <p class="user">Welcome, <?php echo $this->session->userdata('logged_in')['username']; ?></p>
	    </div>
	    <div class="col-md-1">
	      &nbsp;
	    </div>
	    <div class="col-md-4">
	      <div class="dropdown">
		<button class="btn btn-default dropdown-toggle btn-lng btn-block right" type="button" id="dropdownMenu1" data-toggle="dropdown">
		  <img src="<?php echo base_url(); ?>media/images/icons/help.png" />&nbsp;&nbsp;Please Select A Menu Here
		  <span class="caret"></span>
		</button>
		<ul class="dropdown-menu .dropdown-menu-right btn-lng btn-block right" role="menu" aria-labelledby="dropdownMenu1">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>destinations">Offices&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/building.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>cargotypes">Parcel Types&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/parcel_types.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>parcels">Parcels&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/parcel.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>paymenttypes">Payment Types&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/payment_types.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>transporttypes">Shipping Modes&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/shipping_modes.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>users">Users&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/users.png" /></a></li>
<!-- 		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>pricelists">Pricelist</a></li> -->
		  <li role="presentation" class="divider"></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>messages">Message Settings&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/comments.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>settings">Configuration Settings&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/settings.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>users/change">Change Password&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/change.png" /></a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>users/logout">Logout&nbsp;&nbsp;<img src="<?php echo base_url(); ?>media/images/icons/logout.png" /></a></li>
		</ul>
	      </div>
	    </div>
	  </div>
	</div>
  </div>
</div>
<?php } ?>
<?php } ?>
<div class="page_container">