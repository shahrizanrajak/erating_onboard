 <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-red sidebar-mini">
    <div class="wrapper">
      <header class="main-header">     
        <!-- ERating operations -->
        <script src="<?php echo base_url(); ?>templates/js/dev/erating.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/js/dev/report.js" type="text/javascript"></script>                  
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>index.php/dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">+</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>e</b>RATING</span>
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
                        <?php echo $this->session->userdata('login_key'); ?>
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
            <div class="pull-left info">              
              <p><?php echo $this->session->userdata('logged_user'); ?> </p>   
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
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
            <li class="header">MAIN NAVIGATIONed</li>
            <li>
              <a href="<?php echo base_url(); ?>index.php/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Tetapan E-Ratinged</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href="#" id="erating-new"><i class="fa fa-university"></i> Daftar Agensi</a></li> -->
                <li><a href="<?php echo base_url(); ?>index.php/erating-list"><i class="fa fa-user-plus"></i> Kemaskini Pengguna</a></li>
               
              </ul>
            </li>    
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/configuration">
                <i class="fa fa-cog"></i>
                <span>Tetapan Sistem</span>
              </a>
            </li>                      
            <li>
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
            Tetapan Antaramuka
            <small>Mengikut agensi berdaftar</small>
          </h1>          
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li class="active">Tetapan</li>
          </ol>
        </section> 



        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $status_type; ?></h3> 
                </div>
                <!-- /.box-header -->
<!--                <div id="map_wrapper">
                    <div id="map_canvas" class="mapping"></div>
                </div>  -->                
                <div class="box-body">
                  <table id="tblListERating" class="table table-bordered table-striped" width="100%">
                    <thead>
                      <tr>  
                        <th width="5%">Kod eRating </br> </th>  
                        <th width="20%">Kementerian: </br> </th>                     
                        <th width="15%">Jabatan: </br> </th>
                        <!-- <th>Status</th> -->
                        <th width="20%">Cawangan: </br> </th>
                        <th width="20%">Bahagian: </br> </th>
                        <!-- <th width="10%">Status</br> </th> -->
                        <th width="10%">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>                      
                    </tbody>
                    <tfoot>
                      <tr>                              
                        <th>Kod eRating</th> 
                        <th>Kementerian</th>                     
                        <th>Jabatan</th>
                        <!-- <th>Status</th> -->
                        <th>Cawangan</th>
                        <th>Bahagian</th>      
                        <!-- <th>Status</th>       -->
                        <th>Tindakan</th>                                  
                      </tr>
                    </tfoot>
                  </table>                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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
    </div><!-- ./wrapper -->

    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="viewModalLabel">Konfigurasi eRating: 
              <label id="label-rekod" style="font-weight:0 !important" class="control-label"></label></h4>
          </div>
          <div class="modal-body">            
            <div class="panel-heading">
              <ul class="nav nav-tabs" id="erating-tabs">
                <li class="active"><a href="#tabAgency" id="erating-tabAgency" data-toggle="tab">Agensi</a></li>
                <li><a href="#tabUser" id="erating-tabUser" data-toggle="tab">Pengguna</a></li>
                <li><a href="#tabDisplay" id="erating-tabDisplay" data-toggle="tab">Paparan</a></li>
                <li><a href="#tabConfig" id="erating-tabConfig" data-toggle="tab">Penetapan</a></li>
                <!-- <li><a href="#tabQuestion" id="erating-tabQuestion" data-toggle="tab">Soalan</a></li>                                                             -->
              </ul>
            </div>
            <div class="panel-body">
              <div class="tab-content">
                
                <div class="tab-pane fade in active" id="tabAgency">
                  <form id="form_agency" class="form_agency" action=""> 
                    <input type="hidden" name="recordId" id="recordId" value=""/>   
                    <input type="hidden" id="loginId" name="loginId" value="<?php echo $this->session->userdata('logged_id'); ?>">                        
<!--                     <div id="validate_status" class="validate-status" style="padding-bottom:10px;"></div>
                    <div id="validate_details" class="validate_details"> </div>       -->              
                    <div class="form-group">
                      <label for="dropdownMinistryAssign" class="control-label">Kementerian:</label>           
                      <select class="form-control" id="dropdownMinistryAssign">
                        <option value=null> Sila Pilih </option>
                        <?php 
                        foreach ($ministry_data as $ministry) {
                          echo "<option value=". $ministry['Kod_Kem'] .">". $ministry['Kod_Kem']." ". $ministry['Kementerian'] ."</option>";
                        }
                        ?>                          
                      </select>
                    </div> 
                    <!-- will change according to the above selection -->
                    <div class="form-group">
                      <label for="dropdownDepartmentAssign" class="control-label">Jabatan:</label>              
                        <select class="form-control" id="dropdownDepartmentAssign">
                        </select>
                    </div>  
                    <!-- will change according to the above selection -->
                    <div class="form-group">
                      <label for="dropdownBranchAssign" class="control-label">Cawangan:</label>              
                        <select class="form-control" id="dropdownBranchAssign">
                        </select>
                    </div>                                      
                    <div class="form-group">
                      <label for="erating-section" class="control-label">Bahagian:</label>
                      <input type="text" class="form-control" id="erating-section">
                    </div>                     
                    <div class="form-group">
                      <label for="erating-status" class="control-label">Status:</label>              
                        <select class="form-control" id="erating-status">                          
                          <option value="A">Aktif</option>
                          <option value="T">Tidak Aktif</option>                                              
                        </select>
                    </div> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class='fa fa-ban'></i> Tutup</button>                      
                      <button type="button" id="btnSaveAgency" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Simpan</button>                    
                      <button type="button" id="btnUpdateAgency" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                    
                    </div>                                                                                                    
                  </form>                    
                </div>  

                <div class="tab-pane fade" id="tabDisplay">                                                 
                  <div class="form-group" align="center">
                    <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <h4>Muat Naik Logo Agensi</h4>
                    <!-- <label for="erating-logo" class="control-label">Muat Naik Logo Agensi</label> -->
                    <div id="image_preview" style="padding:20px;">
                        <img id="preview-logo" src="<?php echo base_url(); ?>templates/images/noimage.png" alt="User Image" />
                    </div>

                    <input type="file" name="file-logo" id="file-logo">
                    <div  style="padding:10px;"><h7>(Pastikan logo dalam format png atau gif berukuran 100x100)</h7></div>
                    <div id="message-logo"></div>                    
                    <!-- <div id="base64-logo"></div> -->
                    <!-- <textarea class="form-control" id="base64-logo"></textarea> -->
                    </div> 

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class='fa fa-ban'></i> Tutup</button>                      
                      <button type="button" id="btnSaveDisplay" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Simpan</button>                    
                    </div>                                  
                    </form>             
                </div>

                <div class="tab-pane fade" id="tabConfig">   
                  <form id="form_agency" class="form_agency" action="">                
                  <div class="form-group">
                    <label for="erating-soalan" class="control-label">Soalan (Bahasa):</label>
                    <textarea class="form-control" id="erating-soalan"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="erating-question" class="control-label">Question (English):</label>
                    <textarea class="form-control" id="erating-question"></textarea>
                  </div>                  
                  <div class="form-group">
                    <label for="erating-smiley" class="control-label">Pilihan Smiley:</label>              
                      <select class="form-control" id="erating-smiley">                          
                        <option value="5">5 Bintang</option>
                        <option value="3">3 Bintang</option>                                              
                      </select>
                  </div>  
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class='fa fa-ban'></i> Tutup</button>                      
                      <button type="button" id="btnSaveConfig" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Simpan</button>                    
                    </div>                        
                  </form>                
                </div>

                <div class="tab-pane fade" id="tabQuestion">                  
                  <div class="form-group">
                  <table id="tblListQuestion" class="table table-bordered table-striped" width="100%">
                    <thead>
                      <tr>  
                        <th width="60%">Soalan</br> </th>  
                        <th width="10%">Turutan </br> </th>                     
                        <th width="30%">Pengaktifan: </br> </th>
                      </tr>                      
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($question_data as $question) {
                          echo '<tr>';
                          echo '<td>'. $question['Soalan_Ms'] .'<br><i>'. $question['Soalan_En'] .'</i></br></td>';
                          echo '<td>'. $question['Turutan'] .'</td>';
                          echo '<td>
                            <select class="form-control" id="question-status">                          
                              <option value="A">Aktif</option>
                              <option value="T">Tidak Aktif</option>                                              
                            </select>
                            </td>
                          ';
                          echo '</tr>';
                        }
                        ?> 
                      <tr>
                      </tr>                      
                    </tbody>
                  </table>   
                  </div>                 
                </div>                

                <div class="tab-pane fade" id="tabUser">                  
                  <div class="form-group" id="listUser">
                  <table id="tblListUser" class="table table-bordered table-striped" width="100%">
                    <thead>
                      <tr>  
                        <th width="5%">ID</br> </th>  
                        <th width="35%">Nama Penuh</br> </th>
                        <th width="30%">No K/P </br> </th>
                        <!-- <th width="30%">Jawatan </br> </th> -->
                        <th width="20%">Akses</br> </th>                                              
                        <th width="10%">Tindakan</br> </th>
                      </tr>                      
                    </thead>
                    <tbody>                          
                    </tbody>
                  </table>                     
                  </div>
                </div>                                             
              </div>
            </div>            
          </div>
          <!-- button here -->
        </div>
      </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="addUserModalLabel">Maklumat Pengguna</h4>
          </div>
          <form id="frmUserInfo" action="" method="post" enctype="multipart/form-data">  
          <div class="modal-body">         
                                                
                  <div class="form-group">
                    <table width="100%">
                      <tr>                        
                        <td valign="top" width="40%">
                        <div class="form-group" align="center">                          
                          <h5>Gambar Profil</h5>
                          <!-- <label for="erating-logo" class="control-label">Muat Naik Logo Agensi</label> -->
                          <div id="image_preview" style="padding:20px;">
                              <img id="preview-photo" src="<?php echo base_url(); ?>templates/images/noimage.png" alt="User Image" />
                          </div>

                          <input type="file" name="file-photo" id="file-photo">
                          <div  style="padding:10px;"><h7>(Pastikan logo dalam format png atau gif berukuran 100x100)</h7></div>
                          <input type="text" id="userId" class="form-control" placeholder="ID Pengguna" disabled> 
                          <div id="message-photo"></div>                    
                          <!-- <div id="base64-logo"></div> -->
                          <!-- <textarea class="form-control" id="base64-logo"></textarea> -->                              
                        </div>                                                
                        </td>
                        <td width="5%">&nbsp;</td>
                        <td width="55%">                          
                          <label for="user-name" class="control-label">Nama Penuh:</label>
                          <input type="text" class="form-control" id="user-name" placeholder="Nama Penuh"> 
                          <label for="user-ic" class="control-label">No Kad Pengenalan:</label>                        
                          <input type="text" class="form-control" id="user-ic" placeholder="No Kad Pengenalan"> 
                         <!--  <label for="user-login" class="control-label">Nama Login:</label>        
                          <input type="text" class="form-control" id="user-login" placeholder="Nama Login">  -->
                          <label for="user-pwd" class="control-label">Kata Laluan:</label> 
                          <input type="text" class="form-control" id="user-pwd" placeholder="Kata Laluan">       
                          <label for="user-post" class="control-label">Jawatan:</label>
                          <input type="text" class="form-control" id="user-post" placeholder="Jawatan">      
                          <label for="user-email" class="control-label">Emel:</label>
                          <input type="text" class="form-control" id="user-email" placeholder="Emel Rasmi">  
                          <label for="user-phone" class="control-label">No. Tel:</label>
                          <input type="text" class="form-control" id="user-phone" placeholder="No. Tel Pejabat">     


                          <label for="udropdown-user-access" class="control-label">Capaian:</label>              
                          <select class="form-control" id="dropdown-user-access">                          
                          <?php 
                          foreach ($roles as $role) {
                            echo "<option value=". $role .">". $role ."</option>";
                          }
                          ?>                                  
                          </select>                          

                          <label for="dropdown-user-status" class="control-label">Status:</label>              
                          <select class="form-control" id="dropdown-user-status">                          
                            <option value="A">Aktif</option>
                            <option value="T">Tidak Aktif</option>                                              
                          </select>                                                                                                                                           
                        </td>
                      </tr>
                    </table> 
                  </div>                                    
                  <div class="modal-header" align="right">
                    <button type="button" id="btnListUser" class="btn btn-default btn-sm" data-dismiss="modal"> <i class='fa fa-ban'></i> &nbsp; Tutup</button>
                    <button type="reset" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>                
                    <button type="button" id="btnSaveUser" class="btn btn-primary btn-sm"> <i class='fa fa-check'></i> <span class="ui-button-text"> &nbsp; Simpan</span></button>                                    
                  </div>                                                                                                                                                                  
            </div>
           </form>
        </div>
      </div>
    </div>  

    <div class="modal fade" id="removeUserModal" tabindex="-1" role="dialog" aria-labelledby="removeUserModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="actionEditLabel">Hapus Rekod</h4>
          </div>
          <div class="modal-body" id="confirm-remove" align="center">
            <div class="form-group" id="confirm-remove">              
              <h2>Rekod ID: <span>#</span>
              <h4>Anda pasti untuk menghapuskan rekod pengguna ini?</h4>
            </div>
            <div class="modal-footer">
              <div class="form-group" align="center">
              <button type="button" id="btnRemoveUser" class="btn btn-danger btn-sm"> <i class='fa fa-trash-o'></i> &nbsp; Ya, Hapuskan</button>
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"> <i class='fa fa-ban'></i> &nbsp; Tidak</button>
              </div>
            </div>              
        </div>
        </div>                                                                                                                                                          
      </div>
    </div>     
    <input type="hidden" id="domain" name="domain" value="<?php echo mydomain; ?>">
    <input type="hidden" id="base_url" name="base_url" value="<?php echo mydomain; ?>">
    <input type="hidden" id="json_data" name="json_data" value="<?php echo $json_data; ?>">
    <!-- <input type="hidden" id="json_user" name="json_user" value="<?php echo $json_user; ?>"> -->

    <!-- page script -->
    <script type="text/javascript">
      // To make Pace works on Ajax calls
      $(document).ajaxStart(function() { Pace.restart(); });
        $('.ajax').click(function(){
            $.ajax({url: '#', success: function(result){
                console.log('Ajax Request Completed !');
            }});
        });
    </script> 
  </body>
</html>
