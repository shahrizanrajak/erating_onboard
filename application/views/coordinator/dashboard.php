  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- http://stackoverflow.com/questions/30129930/how-to-get-months-to-show-correctly-in-a-morris-js-chart -->
        <!-- Morris chart -->        
        <link href="<?php echo base_url(); ?>templates/adminlte/plugins/morris/morris.css" rel="stylesheet" type="text/css" />   
        <script src="<?php echo base_url(); ?>templates/js/dashboard.js"></script>     
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/morris/morris.min.js" type="text/javascript"></script>          
        <!-- Logo -->
        <a href="i<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">+</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>e-</b>Rating</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">                  
                  <img src="<?php echo $avatar; ?>" class="user-image" alt="User Image" />                  
                  <span class="hidden-xs"><?php echo $this->session->userdata('logged_user'); ?></span>
                </a>
                <ul class="dropdown-menu">                  
                  <li class="user-header">
                    <img src="<?php echo $avatar ?>" class="img-circle" alt="User Image" />
                    <p> 
                      <?php echo $this->session->userdata('logged_user'); ?>
                      <br />
                      <small>
                        <?php echo $this->session->userdata('role'); ?>
                        <?php echo $this->session->userdata('agency'); ?>
                      </small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>index.php/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
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
              <img src="<?php echo $avatar; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('logged_user'); ?></p>   
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <li class="treeview active">
              <a href="<?php echo base_url(); ?>index.php/coor-dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li> 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Tetapan E-Rating</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>index.php/coor-erating-list"><i class="fa fa-circle-o"></i> Senarai</a></li>
                <li><a href="#" id="erating-new"><i class="fa fa-circle-o"></i> Daftar</a></li>
              </ul>
            </li>             
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/user-report">
                <i class="fa fa-bar-chart"></i>
                <span>Laporan</span>                
              </a>
            </li> 
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/coor-user">
                <i class="fa fa-user"></i>
                <span>Maklumat Diri</span>                
              </a>
            </li>         
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/display/<?php echo $this->session->userdata('agency');?>">
                <i class="fa fa-smile-o"></i> <span>Paparan</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Statistik <?php //echo mydomain; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>   
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- start stats box -->
          <div class="row">         
       
          </div><!-- /.row -->
          <!-- End Stats box -->

          <!-- Start Middle row --><!--Middle row -->

          <!-- Start Main row -->
          <div class="row">
            <section class="col-lg-5 connectedSortable">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Rating Hari Ini</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="chart-responsive">
                        <canvas id="pieChart" height="335"></canvas>
                      </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-5">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-red"></i> Cemerlang</li>
                        <li><i class="fa fa-circle-o text-green"></i> Memuaskan</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Sederhana Memuaskan</li>
                        <li><i class="fa fa-circle-o text-aqua"></i> Kurang Memuaskan</li>                        
                        <li><i class="fa fa-circle-o text-gray"></i> Tidak Memuaskan</li>
                      </ul>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->                           
                <!-- /.box -->
            </section><!-- /.Left col -->                        
            <!-- Right col -->
            <section class="col-lg-7 connectedSortable">
              <div class="box box-solid">
              <div class="nav-tabs-custom">                
                <ul class="nav nav-tabs pull-right">                  
                  <li id="click-stats-monthly" class="active"><a href="#stats-monthly" data-toggle="tab">Keseluruhan</a></li>  
                  <li id="click-stats-weekly"><a href="#stats-weekly" data-toggle="tab">Pilihan Smiley</a></li>                
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Rating Bulanan</li>
                </ul>
                <div class="tab-content no-padding">                  
                  <!-- <div class="chart tab-pane" id="stats-monthly" style="position: relative; height: 362px;"></div>    -->
                  <div class="chart tab-pane active" id="stats-monthly" style="position: relative; height: 362px;"></div>  
                  <div class="chart" id="stats-weekly" style=" height: 362px;"></div>                                                            
                </div>
              </div>  
              </div>    
            </section><!-- /.Right col -->                      
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="<?php echo mydomain; ?>">E-Rating Development Team</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
 
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <input type="hidden" id="domain" name="domain" value="<?php echo mydomain; ?>">
    <!-- ./wrapper -->

    <!-- page script -->
    <script>
    </script>  
  </body>
