<body class="skin-red sidebar-mini">
    <div class="wrapper">
      <header class="main-header">              
        <!-- http://stackoverflow.com/questions/30129930/how-to-get-months-to-show-correctly-in-a-morris-js-chart -->
        <!-- Morris chart -->        
        <link href="<?php echo base_url(); ?>templates/adminlte/plugins/morris/morris.css" rel="stylesheet" type="text/css" />   
        <script src="<?php echo base_url(); ?>templates/js/dev/dashboard.js" type="text/javascript"></script>          
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/morris/morris.js" type="text/javascript"></script>              
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>index.php/dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">+</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>e-</b>Rating-Peng</span>
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
                    <img src="<?php echo $avatar; ?>" class="img-circle" alt="User Image" />
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
                      <a href="<?php echo base_url(); ?>index.php/user" class="btn btn-default btn-flat">Profile</a>
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
         <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- <li class="treeview active">
              <a href="<?php echo base_url(); ?>index.php/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/coor-erating-list">
                <i class="fa fa-th"></i>
                <span>Tetapan E-Rating</span>                
              </a>
            </li>             
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/configuration">
                <i class="fa fa-cog"></i>
                <span>Tetapan Sistem</span>
              </a>
            </li>    -->                   
            <li>
              <a href="<?php echo base_url(); ?>index.php/coor-report">
                <i class="fa fa-bar-chart"></i>
                <span>Laporan</span>                
              </a>
            </li> 
            <li>
              <a href="<?php echo base_url(); ?>index.php/user">
                <i class="fa fa-user"></i> <span>Maklumat Diri</span>
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
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-university"></i></span>
                <div class="info-box-content"
                  onMouseOver="this.style.cursor='pointer'"
                  onclick="javascript:location.href='<?php echo base_url(); ?>index.php/peng-erating-list'">                
                  <span class="info-box-text">Agensi e-Rating</span>
                  <span id="txtTotalAgencyActive" class="info-box-number"><?php echo $stats_agency_active; ?></span>
                  <!-- <span id="txtTotalAgencyActive" class="info-box-number"><?php echo $stats_user_active; ?></span> -->
                </div><!-- /.info-box-content -->
<!--                 <div class="small-box" style="margin:9px 0 0 90px;">
                 <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>   -->               
              </div><!-- /.info-box -->              
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                <div class="info-box-content" 
                  onMouseOver="this.style.cursor='pointer'"
                  onclick="javascript:location.href='<?php echo base_url(); ?>index.php/peng-erating-list'">
                  <span class="info-box-text">Pengguna Aktif</span>
                  <span id="txtTotalActive" class="info-box-number"><?php echo $stats_user_active; ?></span>
                </div><!-- /.info-box-content -->             
              </div><!-- /.info-box -->            
            </div><!-- /.col -->                
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-check-square-o"></i></span>
                <div class="info-box-content"
                  onMouseOver="this.style.cursor='pointer'"
                  onclick="javascript:location.href='<?php echo base_url(); ?>index.php/report'">                
                  <span class="info-box-text">Rating Hari Ini</span>
                  <span id="txtTotalRating" class="info-box-number"><?php echo $stats_total_rating; ?></span>
                </div><!-- /.info-box-content -->               
              </div><!-- /.info-box -->            
            </div><!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>        
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-comments"></i></span>
                <div class="info-box-content"
                  onMouseOver="this.style.cursor='pointer'"
                  onclick="javascript:location.href='<?php echo base_url(); ?>index.php/report'">                
                  <span class="info-box-text">Jumlah Aduan</span>
                  <span id="txtTotalComment" class="info-box-number"><?php echo $stats_total_comment; ?></span>
                </div><!-- /.info-box-content -->                
              </div><!-- /.info-box -->             
            </div><!-- /.col -->            
          </div><!-- /.row -->
          <!-- End Stats box -->

          <!-- Start Middle row -->
<!--           <div id="map_wrapper">
              <div id="map_canvas" class="mapping"></div>
          </div>    -->       
          <!--Middle row -->

          <!-- Start Main row -->
          <div class="row">
            <section class="col-lg-5 connectedSortable">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Statistik Rating Hari Ini <?php echo date("d/m/Y"); ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-7">
                        <table id="tblActivate" class="table table-bordered table-striped" width="%">
                          <thead>
                            <tr>  
                              <th bgcolor="#0b62a4" width="20%">Cemerlang</br> </th>  
                              <th bgcolor="#00a65a" width="20%">Memuaskan</br> </th>  
                              <th bgcolor="#d2d6de" width="20%">Sederhana Memuaskan</br> </th>  
                              <th bgcolor="#f39c12" width="20%">Kurang Memuaskan</br> </th>                     
                              <th bgcolor="#dd4b39" width="20%">Tidak Memuaskan </br> </th>                              
                            </tr>                      
                          </thead>
                          <tbody>
                            <tr>
                              <td><center><label id="data_rate_5"></label></center></td>                              
                              <td><center><label id="data_rate_4"></label></center></td>                              
                              <td><center><label id="data_rate_3"></label></center></td>                              
                              <td><center><label id="data_rate_2"></label></center></td>                              
                              <td><center><label id="data_rate_1"></label></center></td>                              
                            </tr>
                          </tbody>
                        </table> 
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->   

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
                        <canvas id="pieChart" height="165"></canvas>
                      </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-5">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-blue"></i> Cemerlang</li>
                        <li><i class="fa fa-circle-o text-green"></i> Memuaskan</li>
                        <li><i class="fa fa-circle-o text-gray"></i> Sederhana Memuaskan</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Kurang Memuaskan</li>                      
                        <li><i class="fa fa-circle-o text-red"></i> Tidak Memuaskan</li>
                      </ul>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->

<!--   mula bar graf rating hari ini -->

             <!--   <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Rating Hari Ini Bar</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>

              
                <div class="box-body">
                  <div class="row"> -->
                    <!-- <div class="col-md-7"> -->

                    <!-- <div class="chart" id="stats-rate" style=" height: 165px;"></div> -->
                    
                    <!-- </div> -->
                    <!-- /.col -->
                    <!-- <div class="col-md-5">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-aqua"></i> Cemerlang</li>
                        <li><i class="fa fa-circle-o text-green"></i> Memuaskan</li>
                        <li><i class="fa fa-circle-o text-gray"></i> Sederhana Memuaskan</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Kurang Memuaskan</li>                      
                        <li><i class="fa fa-circle-o text-red"></i> Tidak Memuaskan</li>
                      </ul>
                    </div><!-- /.col --> 
                  <!-- </div>/.row -->
                <!-- </div>/.box-body -->
              <!-- </div>/.box -->

<!--   akhir bar graf rating hari ini -->

              <!-- <div class="box box-default"> -->
                <!-- <div class="box-header with-border"> -->
                  <!-- <h3 class="box-title">3 Rating Tertinggi Hari Ini</h3> -->
                  <!-- <div class="box-tools pull-right"> -->
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                    <!-- <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i> </button> -->
                  <!-- </div> -->
                <!-- </div>/.box-header -->
                <!-- <div class="box-footer no-padding"> -->
                  <!-- <ul class="nav nav-pills nav-stacked">                    
                      <?php 
                        // foreach ($stats_agency_top_three as $agency) {
                          // echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                          // echo '<li><a href="#">'. $agency["branch"] .'<span class="pull-right text-green">'. $agency["total"]  .'</span></a></li>';
                        // }
                      ?>                                        
                  </ul> -->
                <!-- </div>/.footer -->
              <!-- </div><!-- /.box -->                                        
                <!-- /.box -->
            </section><!-- /.Left col -->       


            <!-- Right col    Rating Bulanan   -->
            <section class="col-lg-7 connectedSortable">
              <div class="box box-solid">
              <div class="nav-tabs-custom">                
                <ul class="nav nav-tabs pull-right">                                                
                  <li class="pull-left header"><i class="fa fa-bar-chart"></i> Jumlah Rating Bulanan</li>
                </ul>
                <div class="tab-content no-padding">                  
                  <div class="chart" id="stats-monthly" style="position: relative; height: 362px;"></div>  </div>
              </div>  
              </div>    
            </section><!-- /.Right col -->   

              <!-- Right col    Rating mingguan   -->
            <section class="col-lg-7 connectedSortable">
              <div class="box box-solid">
              <div class="nav-tabs-custom">                
                <ul class="nav nav-tabs pull-right">                  
                  
                            
                  <li class="pull-left header"><i class="fa fa-bar-chart"></i> Tahap Rating Bulanan</li>
                </ul>
                 
                  
                  <div class="chart" id="stats-weekly" style=" height: 362px;"></div>                                                            
            
              </div>  
              </div>    
            </section><!-- /.Right col -->  


             <!-- Right col    Rating Bulanan Coding asal   tutup disini
            <section class="col-lg-7 connectedSortable">
              <div class="box box-solid">
              <div class="nav-tabs-custom">                
                <ul class="nav nav-tabs pull-right">                  
                  <li id="click-stats-monthly" class="active"><a href="#stats-monthly" data-toggle="tab">Keseluruhan</a></li>  
                  <li id="click-stats-weekly"><a href="#stats-weekly" data-toggle="tab">Pilihan Smiley</a></li>                
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Rating Bulanan</li>
                </ul>
                <div class="tab-content no-padding">                  
                  <div class="chart tab-pane" id="stats-monthly" style="position: relative; height: 362px;"></div>   
                  <div class="chart tab-pane active" id="stats-monthly" style="position: relative; height: 362px;"></div>  
                  <div class="chart" id="stats-weekly" style=" height: 362px;"></div>                                                            
                </div>
              </div>  
              </div>    
            </section> /.   tutup disini Right col -->   







          </div><!-- /.row (main row) -->
        </section><!-- /.content -->            
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2016 <a href="<?php echo base_url(); ?>index.php/dashboard">E-Rating Development Team</a>.</strong> All rights reserved.
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
  
    <script type='text/javascript'> 

    </script>  
  </body>