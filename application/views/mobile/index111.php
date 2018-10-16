<!--<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>-->
  <?php 
function root_url()
{
  return $_SERVER['HTTP_HOST'] . '/';
}
?>

<head>

<!-- Include meta tag to ensure proper rendering and touch zooming -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Include jQuery Mobile stylesheets -->
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- <link href="http://www.erating.com/templates/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->

<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<!-- Ionicons 2.0.0 -->
<link href="http://localhost/templates/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

<!-- W3 cardlist by w3schools -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- Mobile style -->
<link rel="stylesheet" href="http://localhost/templates/css/mobile.css">

<!-- Include the jQuery library -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


<!-- Include the jQuery Mobile library -->
<!-- <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->

<script src="http://localhost/templates/js/dev/starrr.min.js"></script>

<script src="http://localhost/templates/js/dev/mobile.js" type="text/javascript"></script>  
<script src="http://localhost/templates/js/dev/emotion-ratings.js"></script>

</head>

<!--  Check Agency -->
<div class="page-check" align="center">  
  <div class="imglogo" style="padding-top:50px;" align="center">
   <img src="http://appgen.gamma.malaysia.gov.my/uploads/5707/media/170608/42629565.png"  width="200">
  </div>  
   <div class="form-group" align="center">
    Masukkan Kod Agensi:<br>
    <input type="text" style="text-align:center;" class="form-control txt_erating" id="code" value="104101">
  </div> 
  <button id="btnValidate" class="btn btn-block btn-primary btn_erating"><span class="glyphicon glyphicon-send"></span> Hantar</button>   
  <button id="btnValidate" class="btn btn-block btn-success btn_erating"><span class="glyphicon glyphicon-barcode"></span> Scan Barcode</button>   
  <!-- <a href="#popup-thanks" data-rel="popup" data-position-to="window" data-transition="pop" id="btnPopupThanks" class="ui-btn ui-corner-all" >Thanks</a>    -->
</div>
<!-- end Check Agency -->

<!--  Result Agency -->
<div class="page-result">
   <!-- <div class="header">
    <inupt type="button" id="btnBackToCheck" class="ion-android-arrow-back header-back"></input> &nbsp; Maklumat Agensi
    <span id="btnBackToCheck" class="glyphicon glyphicon-chevron-left"></span>  &nbsp; Maklumat Agensi
  </div> -->
  <div class="imglogo" style="padding-top:50px;" align="center">
   <img src="http://appgen.gamma.malaysia.gov.my/uploads/5707/media/170608/42629565.png"  width="200">
  </div> 
  <h2><center>TERIMA KASIH</center></h2>
  <!-- <div class="form-group" align="center">    
    <input type="hidden" class="form-control" id="code_agency">
    <br>
    <img id="logo_agency" class="avatar" src="">
    <div align="center" class="txt_appgen">
      <br>      
      <stong><span id="ministry" align="center" style="font: 14px Roboto !important;"></span></strong><br>
      <span id="department" align="center" style="font: 14px Roboto !important;"></span><br>
      <span id="branch" align="center" style="font: 14px Roboto !important;"></span><br>
      <button id="btnCounters" class="btn btn-block btn-primary btn_erating"><span class="glyphicon glyphicon-send"></span> Teruskan</button>  
    </div>
  </div>  -->
</div>
<!-- end Result Agency -->

<!--  List Counter -->
<div class="page-counter">
  <div class="header">
    <!-- <inupt type="button" id="btnBackToAgency" class="ion-android-arrow-back header-back"></input> &nbsp; Pilihan Kaunter -->
    <span id="btnBackToAgency" class="glyphicon glyphicon-chevron-left"></span>  &nbsp; Pilihan Kaunter
  </div>
  <div class="form-group">   
    <div>   
      <!-- <ul id="counter" class="counter_list" data-role="listview" data-inset="true"></ul>      -->
      <ul id="counter" class="counterd counter_list" data-role="listview" data-inset="true"></ul>         
      <!-- <ul id="counter" class="counterd"></ul>          -->
    </div>
  </div>
  <br>  
</div>
<!-- end Counter -->

<!--  Rating -->
<div class="page-rating">
  <div class="header">
    <!-- <inupt type="button" id="btnBackToCounter" class="ion-android-arrow-back header-back"></input> &nbsp; Rating Anda -->
      <!-- <span id="btnBackToCounter" class="glyphicon glyphicon-chevron-left"></span>  &nbsp; Rating Anda -->
  </div>
  <br>
  <div class="form-group">    
    <div align="center">
      <img id="counter_image" class="avatar" src="">
      <input type="hidden" id="user_id" value="<?php echo $id; ?>">  
      <input type="hidden" class="form-control" id="agency_id">       
      <input type="hidden" class="form-control" id="counter_id">       
      <h2><div id="counter_name"><div></h2>

      <div align="center">
      <!--     
        <div class='starrr'></div>
        <div>&nbsp;
          <span class='your-choice-was' style='display: none;'>
            Your rating was <span class='choice'></span>.
          </span>
        </div> -->
        <!-- <div class='starrr' data-numstars='8' data-connected-input='rating'></div> -->
        

        <div id="myRating"></div><br /><br>
        

        <!-- <input type='text' id='myRatings' name='myRatings' value='' style="text-align:center; font-size:40px" placeholder="Pilihan anda.."/>   -->
        <button id="btnRate" class="btn btn-block btn-primary">Hantar</button>   
      </div>       
    </div>
  </div>
  <br>  
</div>
<!-- end Rating -->

<!--  Login -->
<div class="page-login">
   <div class="form-group">
    <label for="usr">Email:</label>
    <input type="text" class="form-control" id="email">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div> 

  <br>

   <button  id="btnLogin" class="btn btn-block btn-primary" >Login</button>
   <button  id="btnPageRegister" class="btn btn-block btn-link" >No Account? Register here</button>
</div>
<!-- end login -->


<!-- Sign Up form -->
<div class="page-register">

  <h4 class="center"> Register </h4>

   <div class="form-group">
    <label for="regname">Name:</label>
    <input type="text" name="regname" class="form-control" id="regname">
  </div>

   <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" name="regemail" class="form-control" id="regemail">
  </div>

  <div class="form-group">
    <label for="regpwd1">Password:</label>
    <input type="password" name="regpwd1" class="form-control" id="regpwd1">
  </div> 

  <div class="form-group">
    <label for="regpwd2">Retype Password:</label>
    <input type="password" name="regpwd2" class="form-control" id="regpwd2">
  </div> 
  <br>

   <button  id="btnRegister" class="btn btn-block btn-primary" >Register</button>
   <button  id="btnPageLogin" class="btn btn-block btn-link" >Back to Login</button>

</div>
</div> 


<script type="text/javascript">

var emotionsArray = ['angry','disappointed','meh', 'happy', 'inLove'];

$("#myRating").emotionsRating({
  emotions: emotionsArray,
  inputName: "rating"
});



$(document).ready(function()
{  

    // var root = '<?php echo root_url(); ?>';
    var uId = $('#user_id').val();

    $.ajax({
      url: '/index.php/mobile/get_rating/'+uId,
      method: 'GET'
      // type: 'GET',
      // dataType: 'jsonp'      
    }).then(function(result) {        
      console.log(result);
        
      $("#counter_image").attr("src",result.photo);
      $("#agency_id").val(result.agencyid);
      $("#counter_id").val(result.counterid);               
      // $("#counter_name").val(result.countername);         
      $("#counter_name").text(result.countername);         
    }); 
});
</script>

