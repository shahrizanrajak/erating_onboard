    

      $(document).ready(function()
      {   
        var domain = $('#domain').val();
        var base_url = $('#base_url').val();        

        // Generate table
        // Reference: https://www.datatables.net/examples/api/select_single_row.html        
        var tblListSmiley = $('#tblListSmiley').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": false,
          "sAjaxDataProp":"",
          "serverSide": false,          
          "ajax": domain+'index.php/api/list-smiley',
          "autoWidth": true,
          "columns": [              
              { "data": "Id_Smiley" },
              { "data": "Caption_Ms" },
              { "data": "Caption_En" },
              { "data": "Order" },
              { "data": "Status" },              
              {
                  data: null,
                  className: "center",
                  defaultContent: '<a href="" class="smiley_preview">Papar/Kemaskini</a>'
              }        
            ],
          "columnDefs": [
                { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
          ],

        });

        var tblListQuestion = $('#tblListQuestion').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": false,
          "sAjaxDataProp":"",
          "serverSide": false,          
          "ajax": domain+'index.php/api/list-question',
          "autoWidth": true,
          "columns": [              
              { "data": "Id_Soalan" },
              { "data": "Soalan_Ms" },
              { "data": "Soalan_En" },
              { "data": "Turutan" },
              { "data": "Status" },              
              {
                  data: null,
                  className: "center",
                  defaultContent: '<a href="" class="question_preview">Papar/Kemaskini</a>'
              }        
            ],
          "columnDefs": [
                { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
          ],

        });    

        // Preview Rating
        $('#tblListSmiley tbody').on( 'click', 'a.smiley_preview', function (e) {
            e.preventDefault();

            var data = tblListSmiley.row( $(this).parents('tr') ).data();            

            $("#smileyId").val(data.Id_Smiley);
            
            $('#editSmiley').modal('show');
        });   

        // Preview Question
        $('#tblListQuestion tbody').on( 'click', 'a.question_preview', function (e) {
            e.preventDefault();

            var data = tblListQuestion.row( $(this).parents('tr') ).data();            

            $("#questionId").val(data.Id_Soalan);
            
            $('#editQuestion').modal('show');
            // console.log("Question Id#: "+questionId);
              // console.log('load questions model');
        });  

            // untuk question
         $('#editQuestion').on('show.bs.modal', function (event) {
          var questionId = $('#questionId').val();          
          var modal = $(this);     
          // var noimage = domain+'/templates/images/noimage.png';        

          if ((questionId == null) || (questionId == "")) {           
            var questionId = null;            
            $("#btnSaveQuestion span").text("Simpan"); 
            // $('#preview-photo').attr('src', noimage);     
          } else {
            $("#btnSaveQuestion span").text("Kemaskini");
          }

          console.log("Question Id#: "+questionId);

          // get Question details User record from server       
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/get-question/"+questionId,
              // data: {data: jsonData},                                                                 
              success: function(data) {
                  console.log('User Details: ' + data); 
                  JsonQuestionData = jQuery.parseJSON(data); //JSON.stringify(data);  

                  if (JsonQuestionData) {                  
                    $('#question-ms').val(JsonQuestionData.Soalan_Ms);                                                                      
                    $('#question-en').val(JsonQuestionData.Soalan_En);                                                                      
                    $('#dropdown-question-order').val(JsonQuestionData.Turutan); 
                    $('#dropdown-question-status').val(JsonQuestionData.Status); 
                               
                  }
              },
              error: function () {                    
                  alert('Unable to process this request ed...');
              }
          });

         // Save Question
        $('#btnSaveQuestion').click(function() {
          var setQuestionId = $('#questionId').val();          
          var setCaptionMs = $('#question-ms').val();          
          var setCaptionEn = $('#question-en').val();          
          var setOrder= $('#dropdown-question-order :selected').val();
          var setStatus= $('#dropdown-question-status :selected').val();

          var jsonData = '{"Id_Soalan":"'+ setQuestionId +'","Soalan_Ms":"'+ setCaptionMs +'","Soalan_En":"'+ setCaptionEn +'","Turutan":"'+ setOrder +'","Status":"'+ setStatus +'"}';

          console.log(jsonData);

          $.ajax({
              type: "POST",                
              url: domain+"index.php/erating-update-question",                                               
              data: {data: jsonData},              
              success: function(data) {
                  // $(".modal-header #label-rekod").text('#' + setIdSection);                   
                  // $('.modal-body #recordId').val(setIdSection);
                  // $('.modal-body #erating-tabDisplay').show();
                  // $('.modal-body #erating-tabConfig').show();
                  // $('.modal-body #erating-tabQuestion').show();
                  // $('.modal-body #erating-tabUser').show();   

                  // if ($("#file-photo").val() != "") { setImage('smiley', setSmileyId);  } // Upload smiley photo               

                  tblListQuestion.ajax.reload();
                  alert('Successfully saved...');
              },
              error: function () {                     
                  alert('Unable to process this request..');
                  // window.location = 'page_Asemakan.html';                                         
              }
          });
        });       




    // Save Smiley
        $('#btnSaveSmiley').click(function() {
          var setSmileyId = $('#smileyId').val();          
          var setCaptionMs = $('#smiley-ms').val();          
          var setCaptionEn = $('#smiley-en').val();          
          var setOrder= $('#dropdown-smiley-order :selected').val();
          var setStatus= $('#dropdown-smiley-status :selected').val();

          var jsonData = '{"Id_Smiley":"'+ setSmileyId +'","Caption_Ms":"'+ setCaptionMs +'","Caption_En":"'+ setCaptionEn +'","Order":"'+ setOrder +'","Status":"'+ setStatus +'"}';

          console.log(jsonData);

          $.ajax({
              type: "POST",                
              url: domain+"index.php/erating-update-smiley",                                               
              data: {data: jsonData},              
              success: function(data) {
                  // $(".modal-header #label-rekod").text('#' + setIdSection);                   
                  // $('.modal-body #recordId').val(setIdSection);
                  // $('.modal-body #erating-tabDisplay').show();
                  // $('.modal-body #erating-tabConfig').show();
                  // $('.modal-body #erating-tabQuestion').show();
                  // $('.modal-body #erating-tabUser').show();   

                  if ($("#file-photo").val() != "") { setImage('smiley', setSmileyId);  } // Upload smiley photo               

                  tblListSmiley.ajax.reload();
                  alert('Successfully saved edit...');
              },
              error: function () {                     
                  alert('Unable to process this request..');
                  // window.location = 'page_Asemakan.html';                                         
              }
          });
        }); 


          // untuk smiley
        $('#editSmiley').on('show.bs.modal', function (event) {
          var smileyId = $('#smileyId').val();          
          var modal = $(this);     
          var noimage = domain+'/templates/images/noimage.png';        

          if ((smileyId == null) || (smileyId == "")) {           
            var smileyId = null;            
            $("#btnSaveSmiley span").text("Simpan"); 
            $('#preview-photo').attr('src', noimage);     
          } else {
            $("#btnSaveSmiley span").text("Kemaskini");
          }

          console.log("Smiley Id#: "+smileyId);
          // Empty file input for photo upload       
          // $("#file-photo").replaceWith($("#file-photo").clone());


          // get Smiley details User record from server       
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/get-smiley/"+smileyId,
              // data: {data: jsonData},                                                                 
              success: function(data) {
                  console.log('User Details: ' + data); 
                  JsonSmileyData = jQuery.parseJSON(data); //JSON.stringify(data);  

                  if (JsonSmileyData) {                  
                    $('#smiley-ms').val(JsonSmileyData.Caption_Ms);                                                                      
                    $('#smiley-en').val(JsonSmileyData.Caption_En);                                                                      
                    $('#dropdown-smiley-order').val(JsonSmileyData.Order); 
                    $('#dropdown-smiley-status').val(JsonSmileyData.Status); 

                    // Load profile picture
                    // getImage('photo', JsonEratingData.uic);
                    $('#preview-photo').attr('width', '100px');
                    $('#preview-photo').attr('height', '100px'); 

                    if (JsonSmileyData.photo) {
                      $('#preview-photo').attr('src', JsonSmileyData.photo);
                    } else {
                      $('#preview-photo').attr('src', noimage);
                  }                    
                  }
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          });

          getImage('smiley',smileyId);   // Get Logo  
        });

       

        function setImage(type, parentid) {
          // References:
          // https://www.formget.com/ajax-image-upload-php/
          // http://stackoverflow.com/questions/17710147/image-convert-to-base64

          var noimage = domain+'/templates/images/noimage.png';          
          var fp; var preview; var message;

          fp = $("#file-photo");          
          
          var items = fp[0].files;      
          var item = items[0];    // file info use: item.length @ item.size @ item.name
          var imageType = item.type;     

          console.log("Image "+ items[0]);
          console.log("Image type"+ imageType);

          var match= ["image/png","image/gif","image/jpeg","image/jpg"];

          if(!((imageType==match[0]) || (imageType==match[1]) || (imageType==match[2]) || (imageType==match[3])))
          {
            $('#preview-'+ type +'').attr('src', noimage);
            $('#message-'+ type +'').html("<p id='error'>Sila pilih logo mengikut format yang betul.</p>"+"<h4>Nota</h4>"+"<span id='error_message'>Hanya format png, gif atau jpg/jpeg sahaja dibenarkan.</span>");
            return false;
          }
          else
          {
            $('#message-'+ type +'').html("");

            // Use File API to convert image to Base64 format
            var reader = new FileReader();
            // reader.onload = imageIsLoaded;

            reader.onload = function(e) {
                // Update uploaded photo in the preview panel
                $('#preview-'+ type +'').attr('width', '100px');
                $('#preview-'+ type +'').attr('height', '100px');              
                $('#preview-'+ type +'').attr('src', e.target.result);

                // Ajax Post here                                
                var jsonData = '{"type":"'+ type +'","parentid":"'+ parentid +'","photo":"'+ e.target.result +'"}';

                console.log(jsonData);

                $.ajax({    
                    type: "POST",                
                    url: domain+"index.php/image-set",                                               
                    data: {data: jsonData},              
                    // data: {'csrf_erating_token':token, data: jsonData},              
                    success: function(data) {        

                        // Empty file input after uploaded
                        $("#file-"+ type +"").replaceWith($("#file-"+ type +"").clone());

                        alert('Successfully saved...');
                    },
                    error: function () {                     
                        alert('Unable to process this request..');                                                     
                    }
                });
            };              

            reader.readAsDataURL(item);
          }
        };

        function getImage(type, parentid) {        
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/image-get/"+type+"/"+parentid,   
              // data: {name},                                                                        
              success: function(data) {                  
                  JsonEratingData = jQuery.parseJSON(data); //JSON.stringify(data);   
                  
                  // Update uploaded photo in the preview panel
                  $('#preview-'+ type +'').attr('width', '100px');
                  $('#preview-'+ type +'').attr('height', '100px');

                  if (JsonEratingData) {
                    $('#preview-'+ type +'').attr('src', JsonEratingData.photo); 
                  } else {
                    $('#preview-'+ type +'').attr('src', domain+'/templates/images/noimage.png'); 
                  }                                                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          }); 
        };     
          });         
      });  