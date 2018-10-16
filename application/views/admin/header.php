<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>E-Rating</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>templates/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>templates/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>templates/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>templates/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>templates/adminlte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>templates/adminlte/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <!-- <link href="<?php echo base_url(); ?>templates/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /> -->
    <!-- Date Picker -->
    <link href="<?php echo base_url(); ?>templates/adminlte/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url(); ?>templates/adminlte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />   
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?php echo base_url(); ?>templates/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>templates/adminlte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />  
    <!-- add pace (loading progress on top of page) ref: http://github.hubspot.com/pace/ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/adminlte/plugins/pace/pace.min.css"> 
    <!--<link rel="stylesheet" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/pace/pace.min.css">    -->
    <!-- PreetyPhoto enlarge image library -->
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>templates/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />    -->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!--<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>-->
    <!-- jQuery UI 1.11.4 -->
    <!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url(); ?>templates/js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- add pace (loading progress on top of page) -->    
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/pace/pace.min.js" type="text/javascript"></script>        
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>templates/adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!--<script src="https://almsaeedstudio.com/themes/AdminLTE/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">$.widget.bridge('uibutton', $.ui.button);</script>
    <!-- date-range-picker -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datepicker/moment.min.js" type="text/javascript"></script>     
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>     
    <!-- DataTables Scripts -->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>    
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/dataTables.buttons.min.js" type="text/javascript"></script>
    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>    -->
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>templates/adminlte/dist/js/app.min.js" type="text/javascript"></script>     
    <!-- Slimscroll -->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>     
     <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/chartjs/Chart.min.js" type="text/javascript"></script>      
     
    <!-- PreetyPhoto script enlarge image library -->
    <!--<script src="<?php echo base_url(); ?>templates/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>      -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo base_url(); ?>templates/adminlte/dist/js/demo.js" type="text/javascript"></script>  --> 
    <!-- Maps Marker -->
    <!-- <script src="<?php echo base_url(); ?>templates/js/maps-marker.js" type="text/javascript"></script> -->
  </head>