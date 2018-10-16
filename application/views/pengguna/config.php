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
        <script src="<?php echo base_url(); ?>templates/js/dev/config.js" type="text/javascript"></script>   
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/buttons.flash.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/jszip.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/pdfmake.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/vfs_fonts.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/buttons.html5.min.js" type="text/javascript"></script>  
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/datatables/buttons.print.min.js" type="text/javascript"></script>  

        <!-- Logo -->
        <a href="<?php echo base_url(); ?>index.php/coor-dashboard" class="logo">
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
                      <a href="<?php echo base_url(); ?>index.php/coor-user" class="btn btn-default btn-flat">Profile</a>
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
        <!--   <form action="#" method="get" class="sidebar-form">
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
              <a href="<?php echo base_url(); ?>index.php/coor-dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>index.php/coor-erating-list">
                <i class="fa fa-th"></i>
                <span>Tetapan E-Rating</span>                
              </a>
            </li>    
            <li class="active">
              <a href="#">
                <i class="fa fa-cog"></i>
                <span>Tetapan Sistem</span>
                <!-- https://editor.datatables.net/examples/simple/simple -->
                <!-- https://editor.datatables.net/examples/inline-editing/simple.html -->
                <!-- https://editor.datatables.net/examples/bubble-editing/inTableControls.html# -->                
              </a>
            </li>                      
            <li>
              <a href="<?php echo base_url(); ?>index.php/coor-report">
                <i class="fa fa-bar-chart"></i>
                <span>Laporan</span>                
              </a>
            </li> 
            <li>
              <a href="<?php echo base_url(); ?>index.php/coor-user">
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
        <center><p><?php echo $this->session->userdata('email'); ?></p></center>
        </h1>
          <h1>
            Tetapan Sistem
            <small></small>
          </h1>          
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/coor-dashboard"><i class="fa fa-dashboard"></i> Utama</a></li>
            <li class="active">Tetapan Sistem</li>
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
                      <li class="active"><a href="#tabSmiley" id="erating-tabSmiley" data-toggle="tab">Smiley</a></li>
                      <li><a href="#tabQuestion" id="erating-tabQuestion" data-toggle="tab">Soalan Maklumbalas</a></li>
                     <!--  <li><a href="#tabMonthly" id="erating-tabMonthly" data-toggle="tab">Kementerian</a></li>                                                          
                      <li><a href="#tabUserLog" id="erating-tabUserLog" data-toggle="tab">Jabatan</a></li>                                                          
                      <li><a href="#tabUserLog" id="erating-tabUserLog" data-toggle="tab">Cawangan</a></li> -->                                                          
                    </ul>
                  </div>
                  <div class="panel-body">
                    <div class="tab-content">

                      <div class="tab-pane fade in active" id="tabSmiley">                  
                        <div class="form-group">
                        <table id="tblListSmiley" class="table table-bordered table-striped" width="%">
                          <thead>
                            <tr>  
                              <th width="20%">Id Smiley</br> </th>  
                              <th width="20%">Bahasa</br> </th>  
                              <th width="20%">English</br> </th>  
                              <th width="10%">Turutan </br> </th>                     
                              <th width="10%">Pengaktifan </br> </th>
                              <th width="10%">Tindakan: </br> </th>
                            </tr>                      
                          </thead>
                          <tbody>
                  
                          </tbody>
                        </table> 
                          <div class="modal-footer">
                            <!-- <button type="reset" id="btnResetListAll" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button> -->
                            <!-- <button type="button" id="btnUpdateTblListAll" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                     -->
                          </div>                           
                        </div>                 
                      </div>  

                      <div class="tab-pane fade" id="tabQuestion">                  
                        <div class="form-group">
                        <table id="tblListQuestion" class="table table-bordered table-striped" width="100%">
                          <thead>
                            <tr>  
                              <th width="10%">Id Soalan</br> </th>  
                              <th width="25%">Bahasa</br> </th>  
                              <th width="25%">English</br> </th>
                              <th width="10%">Turutan </br> </th>                     
                              <th width="10%">Pengaktifan </br> </th>
                              <th width="10%">Tindakan: </br> </th>
                            </tr>                      
                          </thead>
                          <tbody>
<!--                               <?php 
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
                            </tr>   -->                    
                          </tbody>
                        </table> 
                          <!-- <div class="modal-footer"> -->
                            <!-- <button type="reset" id="btnResetListAll" class="btn btn-default btn-sm"> <i class='fa fa-mail-reply'></i> &nbsp; Set Semula</button> -->
                            <!-- <button type="button" id="btnUpdateTblListAll" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> Kemaskini</button>                     -->
                          <!-- </div>                            -->
                        </div>                 
                      </div>  

                      <div class="tab-pane fade" id="tabMonthly">
                        <h1>tabMonthly</h1>                                           
                      </div> 

                    </div>  
                  </div>                              
              
                </div><!-- /.box-body -->                             
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

 <!-- kemaskini smiley -->
    <div class="modal fade" id="editSmiley" tabindex="-1" role="dialog" aria-labelledby="editSmiley">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="actionEditLabel">Kemaskini Smiley</h4>
          </div>
          <div class="modal-body" id="confirm-remove">
            <div class="panel-body">
              <div class="tab-content">            
          <form id="frmUserInfo" action="" method="post" enctype="multipart/form-data">  
          <div class="modal-body">                                                       
                  <div class="form-group">
                    <table width="100%">
                      <tr>                        
                        <td valign="top" width="40%">
                        <div class="form-group" align="center">                          
                          <h5>Imej Smiley</h5>
                          <!-- <label for="erating-logo" class="control-label">Muat Naik Logo Agensi</label> -->
                          <div id="image_preview" style="padding:20px;">
                              <img id="preview-smiley" src="<?php echo base_url(); ?>templates/images/noimage.png" alt="User Image" />
                          </div>

                          <input type="file" name="file-photo" id="file-photo">
                          <div  style="padding:10px;"><h7>(Pastikan imej dalam format png/gif/jpg berukuran 100x100)</h7></div>
                          <input type="text" id="smileyId"> 
                          <div id="message-photo"></div>                    
                          <!-- <div id="base64-logo"></div> -->
                          <!-- <textarea class="form-control" id="base64-logo"></textarea> -->                              
                        </div>                                                
                        </td>
                        <td width="5%">&nbsp;</td>
                        <td width="55%">                          
                          <label for="user-name" class="control-label">Bahasa:</label>
                          <input type="text" class="form-control" id="smiley-ms"> 
                          <label for="user-ic" class="control-label">English:</label>                        
                          <input type="text" class="form-control" id="smiley-en"> 

                          <label for="dropdown-smiley-order" class="control-label">Turutan:</label>              
                          <select class="form-control" id="dropdown-smiley-order">                                                      
                            <option value="1">1</option>                                         
                            <option value="2">2</option>                                         
                            <option value="3">3</option>                                         
                            <option value="4">4</option>                                         
                            <option value="5">5</option>                                         
                          </select>   
                          
                          <label for="dropdown-smiley-status" class="control-label">Status:</label>              
                          <select class="form-control" id="dropdown-smiley-status">                          
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
                    <button type="button" id="btnSaveSmiley" class="btn btn-primary btn-sm"> <i class='fa fa-check'></i> <span class="ui-button-text"> &nbsp; Simpan</span></button>                                    
                  </div>                                                                                                                                                                  
            </div>
           </form>  
                </div>
              </div>       
        </div>
        </div>                                                                                                                                                          
      </div>
    </div> 
 <!-- kemaskini soalan -->
    <div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="editQuestion">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="actionEditLabel">Kemaskini Soalan</h4>
          </div>
          <div class="modal-body" id="confirm-remove">
            <div class="panel-body">
              <div class="tab-content">            
          <form id="frmUserInfo" action="" method="post" enctype="multipart/form-data">  
          <div class="modal-body">                                                       
                  <div class="form-group">
                    <table width="100%">
                      <tr>                        
                      
                        <td width="5%">&nbsp;</td>
                        <td width="55%">    
                          <input type="hidden" id="questionId">                       
                          <label for="user-name" class="control-label">Bahasa:</label>
                          <input type="text" class="form-control" id="question-ms"> 
                          <label for="user-ic" class="control-label">English:</label>                        
                          <input type="text" class="form-control" id="question-en"> 

                          <label for="dropdown-question-order" class="control-label">Turutan:</label>              
                          <select class="form-control" id="dropdown-question-order">                                                      
                            <option value="1">1</option>                                         
                            <option value="2">2</option>                                         
                            <option value="3">3</option>                                         
                            <option value="4">4</option>                                         
                            <option value="5">5</option>                                         
                          </select>   
                          
                          <label for="dropdown-question-status" class="control-label">Status:</label>              
                          <select class="form-control" id="dropdown-question-status">                          
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
                    <button type="button" id="btnSaveQuestion" class="btn btn-primary btn-sm"> <i class='fa fa-check'></i> <span class="ui-button-text"> &nbsp; Simpan</span></button>                                    
                  </div>                                                                                                                                                                  
            </div>
           </form>  
                </div>
              </div>       
        </div>
        </div>                                                                                                                                                          
      </div>
    </div> 




      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <input type="hidden" id="domain" name="domain" value="<?php echo mydomain; ?>">
          <input type="hidden" id="base_url" name="base_url" value="<?php echo mydomain; ?>">          
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2016 <a href="<?php echo base_url(); ?>index.php/coor-dashboard">E-Rating Development Team</a>.</strong> All rights reserved.
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
  </body>
</html>
