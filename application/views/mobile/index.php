<html>

<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include jQuery Mobile stylesheets -->
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Include the jQuery library -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Mobile style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>templates/css/mobile.css">

    <script src="<?php echo base_url(); ?>templates/js/dev/mobile.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>templates/js/dev/emotion-ratings.js"></script>
</head>

<body>
    <center>
        <img src='<?php echo base_url(); ?>templates/images/login-header.jpg' border='0' width='320' height='76' />
    </center>

    <!--  Thank you page -->
    <div class="page-result"><br />
        <div>
            <center><img src='<?php echo base_url(); ?>templates/images/thumbs.png' border='0' /></center>
        </div>
        <hr class='style-one' />
        <h2>
            <center>TERIMA KASIH</center>
        </h2>
        <hr class='style-one' />
    </div>

    <!--  Rating -->
    <div class="page-rating">
        <br />
        <div class="form-group">
            <div align="center">
                <img id="counter_image" class="avatar" src="">
                <input type="hidden" id="user_id" value="<?php echo $id; ?>">
                <input type="hidden" class="form-control" id="agency_id" value="<?php echo $agency_id; ?>">
                <input type="hidden" class="form-control" id="counter_id" value="<?php echo $counter_id; ?>">

                <h2 style='max-width: 90%'>
                    <div id="counter_name">
                        <div>
                </h2>
                <hr class='style-one' />
                <div align="center">

                    <!-- <div id="myRating"></div> -->
                    <!-- <div id="ratingname"></div> -->

                    <div class='smiley-container'>
                        <?php for ($i=5; $i>0; $i--) { ?>
                        <div style='order: <?php echo $i; ?>' class='smiley-item'>
                            <label>
                                <input type="radio" name="new-rating" value="<?php echo $i; ?>"
                                    onClick='semak_new(this.value)'>
                                <div>
                                    <img src='<?php echo $smiley_image[$smiley_data[$i-1]['Id_Smiley']]; ?>'
                                        width='20' />
                                    <font size="4"><?php echo $smiley_data[$i-1]['Caption_Ms']; ?></font><br />
                                    <!-- <font size="3.5" color="red"><i><?php echo $smiley_data[$i-1]['Caption_En']; ?></i></font> -->
                                </div>
                            </label>
                        </div>
                        <?php 
                          if ($config_data['Smiley'] == 3) { 
                            $i=$i+1;                         
                          }
                        }
                        ?>
                        <br />
                    </div>

                    <!-- counter display smiley -->
                    <!-- <div class='smiley-container'>
                  <?php 
                  /*
                  for ($i=5; $i>0; $i--) { ?>
                    <div style='order: <?php echo $i; ?>' class='smiley-item'>
                    <label>
                    <input type="radio" name="new-rating" value="<?php echo $i; ?>" onClick='semak_new(this.value)'>
                    <div>  
                    <img 
                    class="set-smiley " data-smiley="<?php echo $i?>" style="max-height: 100; max-width: 100" 
                    id="preview-smiley" src="<?php echo $smiley_image[$smiley_data[$i-1]['Id_Smiley']]; ?>" alt="User Image" />  
                    
                    <br /><font size="4"><?php echo $smiley_data[$i-1]['Caption_Ms']; ?></font>
                    <br /><font size="3.5" color="red"><i><?php echo $smiley_data[$i-1]['Caption_En']; ?></i></font>
                    <?php if ($config_data['Smiley'] == 3) { 
                      $i=$i+1;                         
                    } ?>
                    </div>
                    </div><br />
                    <?php } 
                    */
                    ?>
                    </div> -->

                    <select class="form-control btn_erating" id="soalan" style="display:none">
                        <option value=''>Sila Pilih Sebab</option>
                        <?php 
                        foreach ($soalan as $reason) {
                          echo "<option value=". $reason['Id_Soalan'] .">". $reason['Soalan_Ms']."</option>";
                        }
                        ?>
                    </select>
                    <br /><button id="btnRate" class="btn_erating btn-block btn-primary">Hantar</button>
                </div>
            </div>
        </div>
        <br>
    </div>
    <!-- end Rating -->


    <script type="text/javascript">
    var emotionsArray = ['angry', 'disappointed', 'meh', 'happy', 'inLove'];

    $("#myRating").emotionsRating({
        emotions: emotionsArray,
        inputName: "rating"
    });

    $(document).ready(function() {
        var root = '<?php echo base_url(); ?>';
        var uId = $('#user_id').val();

        $.ajax({
            url: root + '/index.php/mobile/get_rating/' + uId,
            method: 'GET'
        }).then(function(result) {
            console.log(result);

            $("#counter_image").attr("src", result.photo);
            $("#agency_id").val(result.agencyid);
            $("#counter_id").val(result.counterid);
            $("#counter_name").text(result.countername);
        });
    });
    </script>
</body>

</html>