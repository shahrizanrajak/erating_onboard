$(document).ready(function()
{   
  var domain = $('#domain').val();
  var agency = $('#set-agency').val();
  var user  = $('#set-user').val();
  var smiley = "";
  
  var qselect = "";

  // $('#set-smiley').click(function() {
  $('.set-smiley').bind('click', function(e) {
      e.preventDefault();      

      smiley = $(this).data('smiley');            

      if ((smiley == 1) || (smiley == 2)) {
        // $('#mdSelectReason').modal('show');
        $('#get-smiley').val(smiley);
        $('#mdSelectReason').modal('show');
      } else {
        setRating(smiley, null);
      }               
    });  

  $('.set-qselect').bind('click', function(e) {
      e.preventDefault();

      smiley = $('#get-smiley').val();
      qselect = $(this).data('qselect'); 
      
        setTimeout(function(){ 
          //setRating(smiley, qselect);
          console.log('No response for 3 sec.. timeout');
          $('#mdSelectReason').modal('hide');
        }, 5000);       

      setRating(smiley, qselect);
    });  

  // $("#btnDashboard").click(function() {          
  // alert('lll');         
  //     window.location.href = domain+"index.php/user-dashboard";
  // });  

  // $("#image-photo").dblclick(function() {        
  $("#image-photo").click(function() {          
      window.location.href = domain+"index.php/user-dashboard";
  });      

  function setRating (smiley, qselect) {
      var jsonData = '{"agency_id":"'+ agency +'","user_id":"'+ user +'","picked":"'+ smiley +'","reason":"'+ qselect +'"}';

      console.log('Data Sent:' +jsonData);

      $.ajax({
          type: "POST",                
          url: domain+"index.php/rateit",                                               
          data: {data: jsonData},              
            success: function(data) {          
              $('#mdSelectReason').modal('hide');     
              $('#mdShowThanks').modal('show');
              
              setTimeout(function(){ $('#mdShowThanks').modal('hide') }, 5000);    
            },
            error: function () {                     
                alert('Unable to connect to the server..');
                    // window.location = 'page_Asemakan.html';                                         
            }
      });
  };
});     