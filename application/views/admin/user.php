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
            <li class="header">MAIN NAVIGATION</li>
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
              <a href="#">
                <i class="fa fa-cog"></i>
                <span>Tetapan Sistem</span>
                <!-- https://editor.datatables.net/examples/simple/simple -->
                <!-- https://editor.datatables.net/examples/inline-editing/simple.html -->
                <!-- https://editor.datatables.net/examples/bubble-editing/inTableControls.html# -->
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </a>
             <!--  <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>index.php/config-ministry"><i class="fa fa-circle-o"></i> Kementerian</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/config-department"><i class="fa fa-circle-o"></i> Jabatan</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/config-erating"><i class="fa fa-circle-o"></i> Pilihan Rating</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/config-question"><i class="fa fa-circle-o"></i> Soalan Penilaian</a></li>
              </ul> -->
            </li>                      
            <li>
              <a href="<?php echo base_url(); ?>index.php/report">
                <i class="fa fa-bar-chart"></i>
                <span>Laporan</span>                
              </a>
            </li> 
            <li class="active">
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
            Maklumat Pengguna
            <!-- <small>Mengikut agensi berdaftar</small> -->
          </h1>          
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li class="active">Maklumat Diri</li>
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
                <!-- /.box-header -->
<!--                 <div id="map_wrapper">
                    <div id="map_canvas" class="mapping"></div>
                </div>  -->                
                <div class="box-body">
                <form id="frmUserInfo" action="" method="post" enctype="multipart/form-data">  
                <!--<input type="hidden" id="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">-->
                <div class="modal-body">                                                       
                  <div class="form-group">
                    <table width="60%">
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
                          <input type="text" id="userId" class="form-control" placeholder="ID Pengguna" disabled value=<?php echo $this->session->userdata('logged_id'); ?>> 
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
                          <!-- <label for="user-login" class="control-label">Nama Login:</label>        
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
                            echo "<option>". $role ."</option>";
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
                      <tr>
                        <td colspan="5">
                          <div class="modal-header" align="right">
                          <input type="hidden" id="domain" name="domain" value="<?php echo mydomain; ?>">
                          <input type="hidden" id="base_url" name="base_url" value="<?php echo mydomain; ?>">
                          <input type="hidden" id="json_data" name="json_data" value="<?php echo $json_data; ?>">                         
                          <button type="reset" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button>                    
                          <button type="button" id="btnSaveUser" class="btn btn-primary btn-sm"> <i class='fa fa-check'></i> <span class="ui-button-text"> &nbsp; Kemaskini</span></button>
                          </div>
                        </td>
                      </tr>                      
                    </table> 
                  </div>                                    
                </form>               
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
      <aside class="control-sidebar control-sidebar-dark"></aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    

    <!-- <input type="hidden" id="json_user" name="json_user" value="<?php echo $json_user; ?>"> -->

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
    <script type="text/javascript">
          var domain = $('#domain').val();
          var uId = $('#userId').val();          
          var modal = $(this);     
          var noimage = domain+'/templates/images/noimage.png';         

          // get details User record from server       
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/user-details/"+uId,
              // data: {data: jsonData},                                                                 
              success: function(data) {
                  console.log('User Details: ' + data); 
                  JsonEratingData = jQuery.parseJSON(data); //JSON.stringify(data);  

                  if (JsonEratingData) {                  
                    $('#user-name').val(JsonEratingData.nama);
                    $('#user-ic').val(JsonEratingData.kad_pengenalan).attr('disabled','disabled');   
                    $('#user-login').val(JsonEratingData.nama_pengguna);                                       
                    $('#user-pwd').val(JsonEratingData.kata_laluan);
                    $('#user-post').val(JsonEratingData.jawatan);                    
                    $('#user-email').val(JsonEratingData.emel);
                    $('#user-phone').val(JsonEratingData.no_telefon);                  
                    $('#dropdown-user-access').val(JsonEratingData.tahap);                    
                    $('#dropdown-user-status').val(JsonEratingData.status); 

                    // Load profile picture
                    $('#preview-photo').attr('width', '100px');
                    $('#preview-photo').attr('height', '100px'); 

                    if (JsonEratingData.photo) {
                      $('#preview-photo').attr('src', JsonEratingData.photo);
                    } else {
                      $('#preview-photo').attr('src', noimage);
                  }                    
                  }
              },
              error: function () {                    
                  alert('Unable to connect to the server...');
              }
          });
    </script> 
  </body>
</html>
