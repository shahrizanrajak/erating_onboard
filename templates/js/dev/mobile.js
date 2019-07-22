$(document).ready(function()
{  
  var API_KEY ="a12c771507e39e691db49eb9e9f6da7f9da92fb7";
  var API_LOGIN = 6410;
  var API_REGISTER = 6419;
  var API_LIST = 6557;
  var root = '/erating_onboard';

  // http://www.jqueryscript.net/other/Easy-Five-Star-Rating-Plugin-with-jQuery-Font-Awesome-starrr.html
  $('.starrr:eq(0)').on('starrr:change', function(e, value){
    if (value) {
      $('.your-choice-was').show();
      $('.choice').text(value);
    } else {
      $('.your-choice-was').hide();
    }
  });

  $("#btnBackToCheck").click(function(){
    $(".page-result").hide();
    $(".page-check").show();
  });  

  $("#btnBackToAgency").click(function(){
    $(".page-counter").hide();
    $(".page-result").show();
  });

  $("#btnBackToCounter").click(function(){
    $(".page-rating").hide();
    $(".page-counter").show();
  });  

  $("#btnValidate").click(function(){  
    var codeagency = $("#code").val().toString();   
    $.ajax({
      url: root + '/index.php/mobile/find_agency/'+codeagency,
      method: 'GET'
      // type: 'GET',
      // dataType: 'jsonp'
    }).then(function(result) {        
      if(result.response == "Valid"){ 
        console.log(result);

        $(".page-check").hide();
        $(".page-result").show();   
        $("#logo_agency").attr("src",result.logo);       
        // $('#result').html(""+ result.ministry + " <br>"+ result.department + " <br>"+ result.branch);
        if (result.ministry) { $('#ministry').text(result.ministry); }
        if (result.department) { $('#department').text(result.department); }
        if (result.branch) { $('#branch').text(result.branch); }
        
        $("#code_agency").val(codeagency);
      } else{
        alert('Kod tidak sah. Cuba sekali lagi.');
        $("#code").val("");
      } 
    });           
  });

  $("#btnCounters").click(function(){
    var codeagency = $("#code_agency").val().toString();        

    $.ajax({
      url: root + '/index.php/mobile/list_counter/'+codeagency,
      method: 'GET'
      // type: 'GET',
      // dataType: 'jsonp'      
    }).then(function(result) {        

      console.log(result);
      
      $(".page-result").hide(); 
      $(".page-counter").show(); 
      $("#counter").html("");

      var htmlStr = '';
      $.each(result, function(k, v){
          // htmlStr += '<a href="link">'+v.id_pengguna + '</a> ' + v.nama + '<br />';
          // htmlStr += '<li class="ui-li-has-thumb">'+
          //   '<a id="'+v.id_pengguna + '" href="" class="ui-btn ui-btn-icon-right ui-icon-carat-r">'+
          //   '<img src="'+v.photo + '" class="image-circle">'+
          //   '<p><span style="font: 20px Roboto !important;">ID Kaunter: ' +v.id_pengguna + '</span></p>'+
          //   '<p><span style="font: 16px Roboto !important;">' + v.nama + '</span></p></a>'+
          //   '</li>'; 

          htmlStr += '<li id="'+ v.id_pengguna +'" class="w3-bar">'+
          '<span onclick="this.parentElement.style.display=none" class="w3-bar-item w3-button w3-white w3-xlarge w3-right">'+
          '<span class="glyphicon glyphicons-chevron-right"></span>&nbsp;</span>'+
            // '<img src="'+v.photo + '" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">'+
            '<img src="'+v.photo + '" class="w3-bar-item w3-circle " style="width:100px">'+
            '<div class="w3-bar-item">'+
            '  <span class="w3-large">No Kaunter:' +v.id_pengguna + '</span><br>'+
            '  <span style="font-size:14px;">' + v.nama.substr(0,20) + '</span>'+
            '</div>'+
            '</li> ';  

          // htmlStr += '<li id="'+ v.id_pengguna +'" class="w3-bar">"'+ v.nama +'"</li> ';             
        });

      console.log("list format:"+ htmlStr);
      // $("#counter").append(htmlStr);
      $("#counter").html(htmlStr);
    });           
  });  

  $('.btnSetRate').click(function(){
    console.log('Counter id:'+ $(this).attr('id'));
  });

  // $('ul.counters li').live("click", function() {
  //       alert($(this).attr('id') +':'+ $(this).text());
  // });
  // $('ul.counterd li').click(function(e) 
  $("ul.counterd").on("click","li", function()
  {     
    console.log('Counter id:'+ $(this).attr('id'));

     var text = $(this).text(); //this.innerHTML;
     var agency = $('#code_agency').val();
     // var id =  $(this).prop('id');    
     var id =  $(this).attr('id')   

     console.log('Id Agensi:'+ agency +' Id Kaunter:'+ id);

     $.ajax({
      url: root + '/index.php/mobile/get_rating/'+id,
      method: 'GET'
      // type: 'GET',
      // dataType: 'jsonp'      
    }).then(function(result) {        
      console.log(result);
      
      $(".page-counter").hide();  
      $(".page-rating").show(); 
      $("#counter_image").attr("src",result.photo);
      $("#agency_id").val(result.agencyid);
      $("#counter_id").val(result.counterid);               
      // $("#counter_name").val(result.countername);         
      $("#counter_name").text(result.countername);         
    });      
  });

  // $('#counter').on('click', 'a', function (){     
  //   console.log('show rating 2');
  //   //  var text = $(this).text(); //this.innerHTML;
  //   //  var agency = $('#code_agency').val();
  //   //  var id =  $(this).prop('id');    

  //   //  console.log('Id Agensi:'+ agency +' Id Kaunter:'+ id);

  //   // $.ajax({
  //   //   url: root + '/index.php/mobile/get_rating/'+id,
  //   //   method: 'GET'
  //   //   // type: 'GET',
  //   //   // dataType: 'jsonp'      
  //   // }).then(function(result) {        
  //   //   console.log(result);
  
  //   //   $(".page-counter").hide();  
  //   //   $(".page-rating").show(); 
  //   //   $("#counter_image").attr("src",result.photo);
  //   //   $("#agency_id").val(result.agencyid);
  //   //   $("#counter_id").val(result.counterid);               
  //   //   // $("#counter_name").val(result.countername);         
  //   //   $("#counter_name").text(result.countername);         
  //   // });      
  // });

  $("#btnRate").click(function(){
    var agency = $('#agency_id').val();
    var counter = $('#counter_id').val();
    var smiley = $('input[name=rating]').val();
    var smiley = $('[name=new-rating]:checked').val()
    var qselect =  $('#soalan').val();
      // if (smiley < 3)
      // {
      //   if (qselect == '')
      //   {
      //     alert ("Sila Pilih sebab"); 
      //     return false;
      //   }
      // }


      if (smiley =="undefined")
      {
        alert ("Sila Pilih Smiley"); 
        return false;
      }
       // qselect =  $('#soalan').val();
       if (smiley < 3 )
       {
        if (qselect == '')
        {
          alert ("Sila Pilih sebab"); 
          return false;
        }
      }
      else var qselect = 0

        var jsonData = '{"agency_id":"'+ agency +'","user_id":"'+ counter +'","picked":"'+ smiley +'","reason":"'+ qselect +'"}';

      console.log('Data Sent:' +jsonData);

      $.ajax({
          // type: "POST", 
          type: "GET", 
          // dataType: "jsonp",
          url: root + "/index.php/mobile/rateit/"+agency+"/"+counter+"/"+smiley+"/"+qselect,                                               
          // data: {data: jsonData},              
          success: function(data) {                          
              // $("#popup-thanks").popup("open"); 
              // setTimeout(function(){  $("#popup-thanks").popup("close"); }, 3000);
              $(".page-rating").hide(); 
              $(".page-result").show();  
              // setTimeout(function(){  $("#page-result").hide(); }, 3000);

              //$(".page-thanks").show();    
            },
            error: function () {                     
              alert("/index.php/mobile/rateit/"+agency+"/"+counter+"/"+smiley);
                // alert("lalala");
                    // window.location = 'page_Asemakan.html';                                         
                  }
                });
    });  
}); 

// $('input[name=rating]').click(function() {
//   alert("test");
// });

$('input[name=rating]').click(function(){
  console.log('Counter id:'+ $(this).attr('id'));
});

function semak(count){
  var namasmiley = ["", "Tidak Memuaskan", "Kurang Memuaskan", "Sederhana Memuaskan", "Memuaskan", "Cemerlang"];
  $('#ratingname').text(namasmiley[count]);
  // alert(count);
  if(count < 3){
    $('#soalan').show();
  } else $('#soalan').hide();

}


function semak_new(count){
  if(count < 3){
    $('#soalan').show();
  } else $('#soalan').hide();

}