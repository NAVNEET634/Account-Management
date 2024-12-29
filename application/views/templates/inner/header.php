<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Accounts | Eriden System</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.4 -->
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
<link href="<?php echo base_url(); ?>assets/externalJS/ionicons.min.css" rel="stylesheet" type="text/css" />  
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins 
    folder instead of downloading all of them to reduce the load. -->
<link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url(); ?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

<!-- jQuery 2.1.4 -->
<script src= "<?php echo base_url(); ?>assets/externalJS/angular.min.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src='<?php echo base_url(); ?>assets/dist/js/jquery.min.js'></script>
<script src='<?php echo base_url(); ?>assets/dist/js/dirPagination.js'></script>
</head>
<body class="skin-blue sidebar-mini">
<?php 
$loginUserData = $this->session->userdata("loginUserData");
?>
<div class='black_overlay'><img src="<?php echo base_url();?>assets/img/loading.gif"/></div>
<div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>eriden/CSRList" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>E</b>S</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $loginUserData['FirstName'];?> <?php echo $loginUserData['LastName'];?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          
          <div class='page-title-controller' id="top-menu-left">
          	<span class="fa fa-arrow-circle-o-left"></span>
          </div>
          
          <div class='page-title-controller' id="top-menu-right">
          	<span class="fa fa-arrow-circle-o-right"></span>
          </div>
          
          <div class='page-title-controller' id="PageHeadingTitle"><?php echo $PageHeadingTitle;?></div>
          
          <div class="navbar-custom-menu"> 
            <ul class="nav navbar-nav">
              <li class="dropdown tasks-menu">
                <a href="javaScript:void(0)" style='font-size:18px;'>Welcome <?php echo $loginUserData['FirstName'];?>!
                </a>
                
              </li>
              
              
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      
      
      
	  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Welcome <?php echo $loginUserData['FirstName'];?>!</p>

              <a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-circle text-success"></i> Logout</a> 
            </div>
          </div>
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
		  
           
           	<!--<li class="treeview active">
              <a href="javaScript:void(0)">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu menu-open" style='display:block'>
                <li><a href="<?php echo base_url(); ?>program/Dashboard"><i class="fa fa-circle-o"></i> Dashboard</a></li>
              </ul>
            </li>
            -->
            
            
            <li class="treeview active">
              <a href="javaScript:void(0)">
                <i class="fa fa-users"></i>
                <span>Manage Accounts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu menu-open" style='display:block'>
                <li><a href="<?php echo base_url(); ?>eriden/CSRList"><i class="fa fa-circle-o"></i> CSR Transaction</a></li>
                
                <li><a href="<?php echo base_url(); ?>eriden/FDList"><i class="fa fa-circle-o"></i> Manage Savings</a></li>
                <li><a href="<?php echo base_url(); ?>eriden/CompletedFDList"><i class="fa fa-circle-o"></i> Completed Savings</a></li>
				
                <li><a href="<?php echo base_url(); ?>eriden/InsuranceList"><i class="fa fa-circle-o"></i> Manage Insurance</a></li>
                <li><a href="<?php echo base_url(); ?>eriden/AssetsList"><i class="fa fa-circle-o"></i> Manage Assets</a></li>
                <li><a href="<?php echo base_url(); ?>eriden/PersonList"><i class="fa fa-circle-o"></i> Manage Persons</a></li>
                
              </ul>
            </li>
            
            
            
            
          
          
        </ul>
       	    
        </section>
        <!-- /.sidebar -->
      </aside>
	  