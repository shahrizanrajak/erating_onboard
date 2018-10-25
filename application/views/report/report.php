  <body class="skin-red sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- ERating operations -->         
        <script src="<?php echo base_url(); ?>templates/js/dev/report.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/buttons.flash.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/jszip.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/pdfmake.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/vfs_fonts.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/buttons.html5.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/buttons.print.min.js" type="text/javascript"></script>  
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>index.php/dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">+</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>e-</b>RATING</span>
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
            <input type="hidden" id="UserId" value=<?php echo $this->session->userdata('logged_id'); ?>>
            <div class="pull-left info">              
              <p><?php echo $this->session->userdata('logged_user'); ?> </p>   
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
            <li class="header">MENU UTAMA</li>
            <li>
              <a href="<?php echo base_url(); ?>index.php/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/erating-list">
                <i class="fa fa-th"></i>
                <span>Tetapan E-Rating</span>                
              </a>
            </li>    
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/configuration">
                <i class="fa fa-cog"></i>
                <span>Tetapan Sistem</span>                
              </a>
            </li>                      
            <li class="active">
              <a href="<?php echo base_url(); ?>index.php/report">
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
            Laporan
            <small>Data eRating</small>
          </h1>          
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li class="active">Laporan</li>
          </ol>
        </section> 
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title"><?php echo $status_type; ?></h3>  -->             
                </div>             
                <div class="box-body">  
                 <div class="panel-heading">
                    <ul class="nav nav-tabs" id="erating-tabs">
                     
                      <li class="active"><a href="#tabStats" id="erating-tabStats" data-toggle="tab">Laporan Terperinci</a></li>
                      <li><a href="#tabAgency" id="erating-tabAgency" data-toggle="tab">Mengikut Agensi</a></li>
                      <li><a href="#tabMonthly" id="erating-tabMonthly" data-toggle="tab">Mengikut Bulan</a></li>    
                      <li><a href="#tabFeedback" id="erating-tabMonthly" data-toggle="tab">Maklumbalas Aduan</a></li>
                      <li><a href="#tabUserLog" id="erating-tabUserLog" data-toggle="tab">Log Pengguna</a></li>
                      <li ><a href="#tabKeseluruhan" id="erating-tabKeseluruhan" data-toggle="tab">Laporan Kurang & Tidak Memuaskan</a></li>
                                                                       
                    </ul>
                  </div>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="tabStats">
                        <form id="form_agency" class="form_agency" action=""> 
                          <input type="hidden" name="reportType_1" id="reportType_1" value="1"/>                   
                          <div class="form-group">                                  
                            <select class="form-control" id="dropdownMinistryAssign_1">
                              <option value=null>Pilih Kementerian</option>
                              <?php 
                              foreach ($ministry_data as $ministry) {
                                echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                              }
                              ?>                          
                            </select>
                          </div> 
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownDepartmentAssign_1">
                                <option value=null>Pilih Jabatan</option>
                              </select>
                          </div>  
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownBranchAssign_1">
                                <option value=null>Pilih Cawangan</option>
                              </select>
                          </div> 

                          <div class="form-group">                            
                              <select class="form-control" id="dropdownPetugasAssign_1">
                                <option value=null>Pilih Petugas</option>
                              </select>
                          </div>
                          <!-- will change according to the above selection -->
<!--                           <div class="form-group">                            
                              <select class="form-control" id="dropdownUserAssign_1">
                                <option value=null>Pilih Pengguna</option>
                              </select>
                          </div>  -->                          
                          <!-- Date range -->
                          <div class="form-group">
                            <!-- <label>Date range:</label> -->
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="dateRange" placeholder="Tarikh Laporan"/>
                              <input type="hidden" id="dateRange_start_1" value="<?php echo date('Y-m-d'); ?>">
                              <input type="hidden" id="dateRange_end_1"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="reset" id="btnResetListAll" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>
                            <button type="button" id="btnUpdateTblListAll" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                    
                          </div>                                                                                                    
                        </form>                         
                        <table id="tblListAll" class="table table-bordered table-striped" width="100%">
                          <thead>
                            <tr>                                
                              <th width="5%">ID eRating</br> </th> 
                              <th width="10%">Tarikh</br> </th> 
                              <th width="20%">Kementerian</br> </th>                     
                              <th width="20%">Jabatan</br> </th>                     
                              <th width="20%">Agensi</br> </th>                     
                              <th width="10%">ID Kaunter</br> </th>                        
                              <th width="20%">Nama Pegawai</br> </th>                        
                              <th width="5%">Pilihan Rating</br> </th>                                                                                  
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>                                            
                      </div>

                      <div class="tab-pane fade" id="tabAgency">
                        <form id="form_agency" class="form_agency" action=""> 
                          <input type="hidden" name="reportType_2" id="reportType_2" value="2"/>                 
                          <div class="form-group">                                  
                            <select class="form-control" id="dropdownMinistryAssign_2">
                              <option value=null>Pilih Kementerian</option>
                              <?php 
                              foreach ($ministry_data as $ministry) {
                                echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                              }
                              ?>                          
                            </select>
                          </div> 
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownDepartmentAssign_2">
                                <option value=null>Pilih Jabatan</option>
                              </select>
                          </div>  
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownBranchAssign_2">
                                <option value=null>Pilih Cawangan</option>
                              </select>
                          </div>  
                         <!-- Date range -->
                          <div class="form-group">
                            <!-- <label>Date range:</label> -->
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="dateRange_2" placeholder="Tarikh Laporan"/>
                              <input type="hidden" id="dateRange_start_2"  value="<?php echo date('Y-m-d'); ?>">
                              <input type="hidden" id="dateRange_end_2"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                          </div>                                                                                 
                          <div class="modal-footer">
                            <button type="reset" id="btnResetListRated" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>
                            <button type="button" id="btnUpdateTblListRated" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                    
                          </div>                                                                                                    
                        </form>                        
                        <table id="tblListByRated" class="table table-bordered table-striped" width="100%">
                          <thead>
                            <tr>  
                              <th width="5%">ID Agensi</br></th> 
                              <th width="20%">Kementerian</br></th>  
                              <th width="15%">Jabatan</br></th>                     
                              <th width="15%">Cawangan</br></th>                        
                              <th width="15%">Bahagian</br></th>
                              <th width="5%">Tidak Memuaskan</br></th>                                                      
                              <th width="5%">Kurang Memuaskan</br></th>                                                      
                              <th width="5%">Sederhana Memuaskan</br></th>                                                      
                              <th width="5%">Memuaskan</br></th>                                                      
                              <th width="5%">Cemerlang</br></th>                                                      
                              <th width="10%">Jumlah</br></th>                                                      
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>                                             
                      </div>   

                      <div class="tab-pane fade" id="tabMonthly">
                        <form id="form_agency" class="form_agency" action=""> 
                          <input type="hidden" name="reportType_3" id="reportType_3" value="3"/>                 
                          <div class="form-group">                                  
                            <select class="form-control" id="dropdownMinistryAssign_3">
                              <option value=null>Pilih Kementerian</option>
                              <?php 
                              foreach ($ministry_data as $ministry) {
                                echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                              }
                              ?>                          
                            </select>
                          </div> 
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownDepartmentAssign_3">
                                <option value=null>Pilih Jabatan</option>
                              </select>
                          </div>  
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownBranchAssign_3">
                                <option value=null>Pilih Cawangan</option>
                              </select>
                          </div>                                                                                  
                          <div class="modal-footer">
                            <button type="reset" id="btnResetListMonthly" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>
                            <button type="button" id="btnUpdateTblListMonthly" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                    
                          </div>                                                                                                    
                        </form>                        
                        <table id="tblListByRatedMonthly" class="table table-bordered table-striped">
                          <thead>
                            <tr>  
                              <th width="10%">Kod Agensi</br></th> 
                              <th width="10%">Nama Agensi</br></th> 
                              <th width="5%">Jan</br></th>                                                      
                              <th width="5%">Feb</br></th>                                                      
                              <th width="5%">Mac</br></th>                                                      
                              <th width="5%">Apr</br></th>                                                      
                              <th width="5%">Mei</br></th>                                                      
                              <th width="5%">Jum</br></th>                                                      
                              <th width="5%">Jul</br></th>                                                      
                              <th width="5%">Ogo</br></th>                                                      
                              <th width="5%">Sep</br></th>                                                      
                              <th width="5%">Okt</br></th>                                                      
                              <th width="5%">Nov</br></th>                                                      
                              <th width="5%">Dis</br></th>                                                                                                                                      
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>                                                             
                      </div> 

                      <div class="tab-pane fade" id="tabFeedback">
                        <form id="form_agency" class="form_agency" action=""> 
                          <input type="hidden" name="reportType_5" id="reportType_5" value="5"/>                 
                          <div class="form-group">                                  
                            <select class="form-control" id="dropdownMinistryAssign_5">
                              <option value=null>Pilih Kementerian</option>
                              <?php 
                              foreach ($ministry_data as $ministry) {
                                echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                              }
                              ?>                          
                            </select>
                          </div> 
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownDepartmentAssign_5">
                                <option value=null>Pilih Jabatan</option>
                              </select>
                          </div>  
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownBranchAssign_5">
                                <option value=null>Pilih Cawangan</option>
                              </select>
                          </div>  
                         <!-- Date range -->
                          <div class="form-group">
                            <!-- <label>Date range:</label> -->
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="dateRange_5" placeholder="Tarikh Laporan"/>
                              <input type="hidden" id="dateRange_start_5"  value="<?php echo date('Y-m-d'); ?>">
                              <input type="hidden" id="dateRange_end_5"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                          </div>                                                                                 
                          <div class="modal-footer">
                            <button type="reset" id="btnResetListFeedback" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>
                            <button type="button" id="btnUpdateTblListFeedback" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                    
                          </div>                                                                                                    
                        </form>                        
                        <table id="tblListByFeedback" class="table table-bordered table-striped" width="100%">
                          <thead>
                            <tr>  
                              <th width="5%">ID Agensi</br></th> 
                              <th width="20%">Kementerian</br></th>  
                              <th width="15%">Jabatan</br></th>                     
                              <th width="15%">Cawangan</br></th>                        
                              <th width="15%">Bahagian</br></th>
                              <th width="5%">Tidak senyum</br></th>                                                      
                              <th width="5%">Cakap kasar</br></th>                                                      
                              <th width="5%">Maklumat tidak lengkap</br></th>                                                      
                              <th width="5%">Sambil lewa</br></th>                                                      
                              <th width="5%">Kurang Informasi</br></th>                                                      
                              <th width="10%">Jumlah</br></th>                                                      
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>                                             
                      </div>  


                      <!-- report keseluruhan -->

                      <div class="tab-pane fade" id="tabKeseluruhan">
                        <form id="form_agency" class="form_agency" action=""> 
                          <input type="hidden" name="reportType_6" id="reportType_6" value="6"/>                 
                          <div class="form-group">                                  
                            <select class="form-control" id="dropdownMinistryAssign_6">
                              <option value=null>Pilih Kementerian</option>
                              <?php 
                              foreach ($ministry_data as $ministry) {
                                echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                              }
                              ?>                          
                            </select>
                          </div> 
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownDepartmentAssign_6">
                                <option value=null>Pilih Jabatan</option>
                              </select>
                          </div>  
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownBranchAssign_6">
                                <option value=null>Pilih Cawangan</option>
                              </select>
                          </div>  
                         <!-- Date range -->
                          <div class="form-group">
                            <!-- <label>Date range:</label> -->
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="dateRange_6" placeholder="Tarikh Laporan"/>
                              <input type="hidden" id="dateRange_start_6"  value="<?php echo date('Y-m-d'); ?>">
                              <input type="hidden" id="dateRange_end_6"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                          </div>   

                           <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownPetugasAssign_6">
                                <option value=null>Pilih Petugas</option>
                              </select>
                          </div> 

                              <!-- Pilihan jenis laporan  -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownPilihLaporan_6">
                                <option value=null >Pilih Laporan</option>
                                <!-- <option value="1">Laporan Purata tahap kepuasan pelanggan berdasarkan tarikh dan petugas kaunter</option>
                                <option value="2" >Laporan terperinci tahap kepuasan pelanggan berdasarkan tarikh dan  -->petugas kaunter</option>
                                <option value="3" >Laporan Kurang Memuaskan</option>
                                <option value="4" >Laporan Tidak Memuaskan</option>
                              </select>
                          </div> 

                          <div class="modal-footer">
                            <button type="reset" id="btnResetListUserLog" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>
                            <button type="button" id="btnUpdateLaporanKeseluruhan" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                    
                          </div>

                          </form>                        
                            <table id="tblListLaporanKeseluruhan" class="table table-bordered table-striped" width="100%">
                              <thead>
                              <tr>  
                              <th width="5%">Rate ID</br></th> 
                              <th width="20%">Petugas</br></th>  
                              <th width="15%">Tarikh</br></th>                     
                              <!-- <th width="15%">Masa</br></th>                         -->
                              <th width="15%">Perkara</br></th>  
                              <th width="15%">Tahap</br></th>                      
                              </thead>
                              <tbody></tbody>
                            </table>
                                                                      
                          </div>     


 
                      <div class="tab-pane fade" id="tabUserLog">
                        <form id="form_agency" class="form_agency" action=""> 
                          <input type="hidden" name="reportType_4" id="reportType_4" value="4"/>                 
                          <div class="form-group">                                  
                            <select class="form-control" id="dropdownMinistryAssign_4">
                              <option value=null>Pilih Kementerian</option>
                              <?php 
                              foreach ($ministry_data as $ministry) {
                                echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                              }
                              ?>                          
                            </select>
                          </div> 
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownDepartmentAssign_4">
                                <option value=null>Pilih Jabatan</option>
                              </select>
                          </div>  
                          <!-- will change according to the above selection -->
                          <div class="form-group">                            
                              <select class="form-control" id="dropdownBranchAssign_4">
                                <option value=null>Pilih Cawangan</option>
                              </select>
                          </div>  
                         <!-- Date range -->
                          <div class="form-group">
                            <!-- <label>Date range:</label> -->
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="dateRange_4" placeholder="Tarikh Laporan"/>
                              <input type="hidden" id="dateRange_start_4" value="<?php echo date('Y-m-d'); ?>">
                              <input type="hidden" id="dateRange_end_4" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                          </div>                                                                                 
                          <div class="modal-footer">
                            <button type="reset" id="btnResetListUserLog" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>
                            <button type="button" id="btnUpdateTblListUserLog" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                    
                          </div>                                                                                                    
                        </form>                        
                        <table id="tblListUserLog" class="table table-bordered table-striped" width="100%">
                          <thead>
                            <tr>  
                              <th width="5%">ID Pengguna</br></th> 
                              <th width="20%">Agensi</br></th>  
                              <th width="15%">Nama Pengguna</br></th>                     
                              <th width="15%">Level Akses</br></th>                     
                              <th width="15%">Session Id</br></th>                        
                              <th width="15%">Tarikh Login</br></th>                        
                              <th width="15%">Tarikh Logout</br></th>
                              <th width="5%">Status</br></th>                                                                                                          
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>                                             
                      </div>  
                    </div>  
                  </div>                              
              
                </div><!-- /.box-body -->                             
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <input type="hidden" id="domain" name="domain" value="<?php echo mydomain; ?>">
          <input type="hidden" id="base_url" name="base_url" value="<?php echo mydomain; ?>">          
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2016 <a href="<?php echo base_url(); ?>index.php/dashboard">E-Rating Development Team</a>.</strong> All rights reserved.
      </footer>
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark"></aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- page script -->
    <script type="text/javascript">
      // To make Pace works on Ajax calls
      $(document).ajaxStart(function() { 
        Pace.restart();        
      });      

      $('.ajax').click(function(){
        $.ajax({url: '#', success: function(result){
          console.log('Ajax Request Completed !');
        }});
      });
    </script>
  </body>
</html>
