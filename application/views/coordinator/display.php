<html>  
  <body>
    <!-- <div class="wrapper "> -->
    <div class="jumbotron">
      <header class="main-header">      
        <style type="text/css">

          .set-qselect {
            cursor: pointer;
            padding:10px 80px 10px 80px;
            background-color: #EFEFEF;
          }          

          .set-qselect:hover {
            background-color: #EFEFEF;
          }
        </style>          
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url(); ?>templates/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->    
        <link href="<?php echo base_url(); ?>templates/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="<?php echo base_url(); ?>templates/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>templates/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />    
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>    
        <!-- jQuery UI 1.11.4 -->    
        <script src="<?php echo base_url(); ?>templates/js/jquery-ui.min.js" type="text/javascript"></script>
        <!-- add pace (loading progress on top of page) -->    
        <script src="<?php echo base_url(); ?>templates/adminlte/plugins/pace/pace.min.js" type="text/javascript"></script>        
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url(); ?>templates/adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>   

        <script src="<?php echo base_url(); ?>templates/js/dev/display.js" type="text/javascript"></script>         
        <script src="<?php echo base_url(); ?>templates/js/time-display.js.php" type="text/javascript"></script> 
        <!-- pace -->
        <script type="text/javascript">
          // To make Pace works on Ajax calls
          $(document).ajaxStart(function() { Pace.restart(); });
            $('.ajax').click(function(){
                $.ajax({url: '#', success: function(result){
                    $('.ajax-content').html('<hr>Ajax Request Completed !');
                }});              
          });                  
        </script>                        
      </header>
        <table  width="70%" cellspacing="0" cellpadding="10" border="0" align="center">          
          <input type="hidden" id="set-agency" value="<?php echo $this->session->userdata('agency'); ?>" />
          <input type="hidden" id="set-user" value="<?php echo $this->session->userdata('logged_id'); ?>" />
          <input type="hidden" id="domain" name="domain" value="<?php echo mydomain; ?>">
           <tr>
            <td align="center">
              <div style="padding:20px;">
              <?php
                if (!(isset($photo_data['photo'])) || ($photo_data['photo'] == null) || ($photo_data['photo'] == "")) {
              ?>
                  <img id="image-photo" src="<?php echo base_url(); ?>templates/images/noimage.png" alt="User Image" />
              <?php } else { ?>
                  <img id="image-photo" src="<?php echo $photo_data['photo']; ?>" width="100px" height="100px" />
              <?php } ?>
              </div>
            </td>
            <td align="center">
              <h4><span id="servertime"></span></h4> </ br>
              <h3><?php echo $this->session->userdata('logged_user'); ?></h53
            </td>
            <td align="center">
              <div id="image_preview" style="padding:20px;">
              <img src="<?php echo $avatar; ?>" class="user-image" alt="User Image" />
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="3" align="center">
              <?php
                if (($config_data['Soalan_Ms'] != "") && ($config_data['Soalan_En'] != "")) {
              ?>
              <font size="5.5"><?php echo $config_data['Soalan_Ms']; ?></font> <br/>
              <i><font size="4"><?php echo $config_data['Soalan_En']; ?></font></i> <br/>
              <?php } else if ($config_data['Soalan_En'] != "") {?>
              <font size="5.5"><?php echo $config_data['Soalan_En']; ?></font> <br/>
              <?php } else { ?>
              <font size="5.5"><?php echo $config_data['Soalan_Ms']; ?></font> <br/>
              <?php } ?>
            </td>
          </tr>
          <tr>
            <td colspan="3" align="center">              
              <table cellpadding="10" cellspacing="5" align="center" border="0">
                <tr>
                  <?php 
                    for ($i=1; $i<=5; $i++) { ?>
                    <td align="center" style="padding:8px;">
                      <img class="set-smiley" data-smiley="<?php echo $i?>" style="max-height: 100; max-width: 100" src="<?php echo base_url(); ?>templates/images/smileys/rate_<?php echo $i?>.png" />
                      <?php if ($config_data['Smiley'] == 3) { 
                        $i=$i+1;                         
                      } ?>
                    </td>
                  <?php } ?>
                </tr>
              </table>          
            </td>
          </tr>          
          <tr>
            <td colspan="3" align="center">
              <h6><?php echo $agency_data['department']; ?></h6>
              <button id="btnDashboard" type="button" class="btn btn-primary">Dashboard</button>
            </td>
          </tr>
        </table> 

        <div class="modal fade" id="mdSelectReason" tabindex="-1" role="dialog" aria-labelledby="mdSelectReason">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="actionEditLabel">Maklumbalas</h4>
              </div>
              <input type="hidden" id="get-smiley" />
              <div class="modal-body" id="confirm-remove" align="center">
                <div class="form-group" id="confirm-remove" align="left">              
                  <!-- <h2>Nyatakan sebab anda: <span></span> -->
                  <?php foreach ($question_data as $question) { 
                    echo '
                    <div class="set-qselect" data-qselect="'.$question['Id_Soalan'].'">
                    <span style="font-size:20px;">'.$question['Soalan_Ms'].'</span></br>
                    <span style="font-size:14px;"><i>'.$question['Soalan_En'].'</span></i>
                    </div>';
                   } ?>                  
                </div>
                <div class="modal-footer">
                  <div class="form-group" align="center">
<!--                   <button type="button" id="btnRemoveUser" class="btn btn-danger btn-sm"> <i class='fa fa-trash-o'></i> &nbsp; Ya, Hapuskan</button>
                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"> <i class='fa fa-ban'></i> &nbsp; Tidak</button> -->
                  </div>
                </div>              
              </div>
            </div>
                                                                                                                                                               
          </div>
        </div>     

        <div class="modal fade" id="mdShowThanks" tabindex="-1" role="dialog" aria-labelledby="mdShowThanks">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="actionEditLabel">Penghargaan</h4>
              </div>
              <div class="modal-body" id="confirm-remove" align="center">
                <div class="form-group" id="confirm-remove">              
                  <h2>Terima Kasih <span></span>
                  <h4>Maklumbalas anda telah direkodkan.</h4>
                </div>
                <div class="modal-footer">
                  <div class="form-group" align="center">

                  </div>
                </div>              
              </div>
            </div>
                                                                                                                                                               
          </div>
        </div>   
    </div>
    <input type="hidden" id="domain" name="domain" value="<?php echo mydomain; ?>">                   
  </body>
</html>
