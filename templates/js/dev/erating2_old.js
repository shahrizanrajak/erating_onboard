      $(document).ready(function()
      {   
        var domain = $('#domain').val();
        var base_url = $('#base_url').val();
        var json_data = $('#json_data').val();            
        var jsonData = domain+'index.php/'+json_data;
        var setLoginId = $('#loginId').val();
        var setAgencyId = $('#recordId').val();  

        // console.log('json data: '+jsonData);
        // Get data from JSON API and list
        // Reference: https://www.datatables.net/examples/api/select_single_row.html
        var tblList = $('#tblListERating').DataTable({          
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,
          // "ajaxSource": "json-data",
          "ajax": jsonData,
          "autoWidth": true,
          "columns": [              
              { "data": "code_branch" },
              { "data": "ministry" },
              { "data": "department" },
              // { "data" : "status"},
              // Add actions button > https://editor.datatables.net/examples/styling/envelopeInTable.html
              { "data": "branch" },
              { "data": "section" },
              // { "data": "status" },
              {
                  data: null,
                  className: "center",
                  // defaultContent: '<a href="" class="rating_edit">Edit</a> / <a href="" class="rating_preview">View</a>'
                  defaultContent: '<a href="" class="rating_preview">Papar/Kemaskini</a>'
              }        
            ],
            "columnDefs": [
                { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
            ],

            // Add Button
            // https://datatables.net/extensions/buttons/examples/initialisation/plugins
            // "dom": 'lBfrtip',  // lBrtip // ref > https://datatables.net/examples/basic_init/dom.html
            // "buttons": [
            //     {
            //         text: '+',
            //         action: function ( e, dt, node, config ) {
            //             alert( 'Button activated' );
            //         }
            //     }
            // ],            

            // Add Combobox filter: https://www.datatables.net/examples/api/multi_filter_select.html    
            initComplete: function () {
            this.api().columns([1, 2, 3]).every( function () {
                var column = this;
                var select = $('<select style="max-width:150px;"><option value=""></option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {                  
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
          }
          
        });

        var tblListUser = $('#tblListUser').DataTable({          
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": false,
          "sAjaxDataProp":"",
          "serverSide": false,          
          // "ajax": jsonData,
          "autoWidth": true,
          "columnDefs": [
                { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
          ],

            // Add Button
            // https://datatables.net/extensions/buttons/examples/initialisation/plugins
          "dom": 'lBfrtip',  // lBrtip // ref > https://datatables.net/examples/basic_init/dom.html
          "buttons": [
                {
                    text: 'Tambah',                    
                    action: function ( e, dt, node, config ) {
                        // alert( 'Button activated' ); 
                        $('#frmUserInfo')[0].reset(); 
                        // $('#frmUserInfo').trigger("reset");
            //             document.getElementById("frmUserInfo").reset();    

                        // $('#user-name').val();
                        // $('#user-ic').val();                                        
                        // $('#user-pwd').val();
                        // $('#user-post').val();                    
                        // $('#user-email').val();
                        // $('#user-phone').val();                  
                        // $('#dropdown-user-access').val();                    
                        // $('#dropdown-user-status').val();  

                        $('#addUserModal').modal('show');  
                        $("#user-ic").removeAttr('disabled'); 
                        // $('#frmUserInfo')[0].reset();                                             
                    }
                }
          ]
        });      

        // this function will reload data tabla automatically every 30 sec
        // reference: https://datatables.net/reference/api/ajax.reload()
        setInterval( function () {
            tblList.ajax.reload();
        }, 30000 );  

        // Open dilog modal for New record
        $("#erating-new").click(function(e) { 
            e.preventDefault();
            // $('#form_agency')[0].reset();
            $(':input:not(input[name=loginId])').val('');

            // $('a[href="#tabAgency"]').tab('show'); 
            // $('#erating-tabAgency').tab('show');

            $('.nav-tabs a[href="#erating-tabAgency"]').tab('show');
            $('.nav-tabs a[href="#erating-tabAgency"]').addClass('active');
            $('#erating-tabAgency').fadeIn();

            $('#viewModal').modal('show');

            // $('#tabAgency').show();
            // modal.find('.modal-body #erating-tabDisplay').hide();
            // $('#tabAgency').tab('show');
            //  
            
        });

        // Edit Rating
        $('#tblListERating tbody').on( 'click', 'a.rating_edit', function (e) {
            e.preventDefault();

            var data = tblList.row( $(this).parents('tr') ).data();   

            $(".modal-body #recordId").val(data.code_branch);
            $('#editModal').modal('show');  
        } );

        // Preview Rating
        $('#tblListERating tbody').on( 'click', 'a.rating_preview', function (e) {
            e.preventDefault();

            var data = tblList.row( $(this).parents('tr') ).data();            

            $("#recordId").val(data.code_branch);
            
            $('#viewModal').modal('show');
        } );                     

        $('#dropdownMinistryAssign').change(function() {
          // var UserMinistry = $('#dropdownMinistryAssign :selected').val();           
          var UserMinistryValue = $(this).val();

          console.log(UserMinistryValue);

          // List User(s) if Ministry was selected
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/department-by-ministry/"+UserMinistryValue,
              //data: {name},                                                                
              success: function(data) {
                  $('#dropdownDepartmentAssign').empty();
                  $('#dropdownBranchAssign').empty();
                  $('#dropdownDepartmentAssign').append('<option value="000000"> Sila Pilih </option>');
                  $('#dropdownBranchAssign').append('<option value="000000000"> Sila Pilih </option>');

                  for (var i=0;i<data.length;i++) {
                    var newOption = $('<option value="'+ data[i].Kod_Jab +'">'+ data[i].Kod_Jab + ' ' + data[i].Jabatan +'</option>');
                    $('#dropdownDepartmentAssign').append(newOption);                    
                    //console.log(data[i].fullname);  
                  }   
                  $('#dropdownDepartmentAssign').trigger("chosen:updated");               
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          });            
        });  

        $('#dropdownDepartmentAssign').change(function() {
          // var UserDepartment = $('#dropdownDepartmentAssign :selected').val();           
          var UserDepartmentValue = $(this).val();

          console.log(UserDepartmentValue);



          



          

          // List User(s) if Department was selected
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/branch-by-department/"+UserDepartmentValue,
              //data: {name},                                                                
              success: function(data) {
                  $('#dropdownBranchAssign').empty();
                  $('#dropdownBranchAssign').append('<option value="000000000"> Sila Pilih </option>');

                  for (var i=0;i<data.length;i++) {
                    var newOption = $('<option value="'+ data[i].Kod_Caw +'">'+ data[i].Kod_Caw + ' ' + data[i].cawangan +'</option>');
                    $('#dropdownBranchAssign').append(newOption);                    
                    //console.log(data[i].fullname);  
                  }   
                  $('#dropdownBranchAssign').trigger("chosen:updated");               
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          });            
        });      

        $('#dropdownBranchAssign').change(function() {                  
          var UserBranchValue = $(this).val();

          console.log(UserBranchValue);          
        });            

        $('#dropdownUsers').change(function() {
            var SelectedUser = $('#dropdownUsers :selected').text();
            var SelectedUserValue = $(this).val();
            console.log('User Id:' +SelectedUserValue);          
        });         

        $('#viewModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal   
          var setAgencyId = $('#recordId').val();   
          var $tabs = $('#erating-tabs li');         

          var modal = $(this);          

          console.log('viewModal Agency Id:' +setAgencyId);

          // Initialiazing form > NEW erating record
          if ((setAgencyId == null) || (setAgencyId == "")) {
            var setAgencyId = null;            

            modal.find('.modal-body #erating-tabDisplay').hide();
            modal.find('.modal-body #erating-tabConfig').hide();
            modal.find('.modal-body #erating-tabQuestion').hide();
            modal.find('.modal-body #erating-tabUser').hide();
            modal.find('.modal-body #btnSaveAgency').show();
            modal.find('.modal-body #btnUpdateAgency').hide();            

            // $tabs.find('a[data-toggle="tab"]').each(function () {
            //     $(this).attr("data-toggle", "").parent('li').addClass("disabled");        
            // })           
          } else {
            modal.find('.modal-body #erating-tabDisplay').show();
            modal.find('.modal-body #erating-tabConfig').show();
            modal.find('.modal-body #erating-tabQuestion').show();
            modal.find('.modal-body #erating-tabUser').show();
            modal.find('.modal-body #btnSaveAgency').hide();
            modal.find('.modal-body #btnUpdateAgency').show();
            // $tabs.find('a[data-toggle="tab"]').each(function () {
            //     $(this).attr("data-toggle", "").parent('li').removeClass("disabled");    
            //     // $tabs.find('a[data-toggle="tab"]').removeClass("disabled");    
            // })                            
          }

          // $('#btnSave').attr('disabled', false) // enable Submit button
          // modal.find('.modal-title').text('Rekod ID ' + rId); 
          $(".modal-header #label-rekod").text('#' + setAgencyId);          

          // get details asnaf record from server        
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/erating-details/"+setAgencyId,
              // data: {data: jsonData},                                                                 
              success: function(data) {
                  console.log('Erating Details: ' + data); 
                  JsonEratingData = jQuery.parseJSON(data); //JSON.stringify(data);   

                  if (JsonEratingData) {
                    modal.find('.modal-body #asnaf-id').val(setAgencyId);
                    modal.find('.modal-body #erating-section').val(JsonEratingData.section);
                    modal.find('.modal-body #dropdownMinistryAssign').val(JsonEratingData.code_ministry);                    

                    modal.find('.modal-body #dropdownDepartmentAssign').empty();  
                    modal.find('.modal-body select#dropdownDepartmentAssign').append('<option value="'+ 
                      JsonEratingData.code_department +'">'+ 
                      JsonEratingData.department +'</option>');  

                    modal.find('.modal-body #dropdownBranchAssign').empty();  
                    modal.find('.modal-body select#dropdownBranchAssign').append('<option value="'+ 
                      JsonEratingData.code_branch +'">'+ 
                      JsonEratingData.branch +'</option>');          


                    modal.find('.modal-body #erating-status').val(''+ JsonEratingData.status +'');   
                  }                                                                                                             
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          });      

          /* Load from data */
          getUsers(setAgencyId);   // Get Registered User          
          getImage('logo',setAgencyId);   // Get Logo          
          getConfig(setAgencyId); // Get Config
           
        });

        // Save Agency Setting        
        $('#btnSaveAgency').click(function() {
          var setAgencyId = $('#recordId').val();          
          var setMinistry = $('#dropdownMinistryAssign :selected').val();
          var setDepartment = $('#dropdownDepartmentAssign :selected').val();
          var setBranch = $('#dropdownBranchAssign :selected').val();                    
          var setSection = $('#erating-section').val();          
          var setStatus = $('#erating-status :selected').val();
          var genIdSection = Math.floor(Math.random() * 999) + 100;
          var setIdSection = "";

          // Full ID format xxxxxxxxx (9 chars)
          if ((setAgencyId == null) || (setAgencyId == "")) {            
            setIdSection = setMinistry.substring(0,3)+setDepartment.substring(3,6)+setBranch.substring(6,9)+genIdSection;
          } else {
            setIdSection = setAgencyId;
          }
         
          var jsonData = '{"Kod_Bah":"'+ setIdSection +'","Bahagian":"'+ setSection +'","Status":"'+ setStatus +'","Tindakan":"'+ setLoginId +'"}';

          console.log(jsonData);

          $.ajax({
              type: "POST",                
              url: domain+"index.php/erating-save-agency",                                               
              data: {data: jsonData},              
              success: function(data) {
                  $(".modal-header #label-rekod").text('#' + setIdSection);                   
                  $('.modal-body #recordId').val(setIdSection);
                  $('.modal-body #erating-tabDisplay').show();
                  $('.modal-body #erating-tabConfig').show();
                  $('.modal-body #erating-tabQuestion').show();
                  $('.modal-body #erating-tabUser').show();                  

                  tblList.ajax.reload();
                  alert('Successfully saved...');
              },
              error: function () {                     
                  alert('Unable to process this request..');
                  // window.location = 'page_Asemakan.html';                                         
              }
          });
        });  

        // Update Agency Setting        
        $('#btnUpdateAgency').click(function() {
          var setAgencyId = $('#recordId').val();
          var setUserId = $('#loginId').val();                 
          var setSection = $('#erating-section').val();          
          var setStatus = $('#erating-status :selected').val();
         
          var jsonData = '{"Kod_Bah":"'+ setAgencyId +'","Bahagian":"'+ setSection +'","Status":"'+ setStatus +'","Tindakan":"'+ setLoginId +'"}';

          console.log(jsonData);

          $.ajax({
              type: "POST",                
              url: domain+"index.php/erating-update-agency",                                               
              data: {data: jsonData},              
              success: function(data) {
                  tblList.ajax.reload();
                  alert('Successfully saved...');
              },
              error: function () {                     
                  alert('Unable to process this request..');                                                      
              }
          });
        });        

        // Save Config Setting      
        $('#btnSaveConfig').click(function() {
          var setAgencyId = $('#recordId').val();
          var setSoalan = $('#erating-soalan').val();  
          var setQuestion = $('#erating-question').val();  
          var setSmiley= $('#erating-smiley :selected').val();                    

          var jsonData = '{"Kod_Bah":"'+ setAgencyId +'","Soalan_Ms":"'+ setSoalan +'","Soalan_En":"'+ setQuestion +'","Smiley":"'+ setSmiley +'"}';

          console.log(jsonData);

          $.ajax({
              type: "POST",                
              url: domain+"index.php/erating-save-config",                                               
              data: {data: jsonData},              
              success: function(data) {                                  
                  $('.modal-body #recordId').val(setAgencyId);
                  $('.modal-body #erating-tabDisplay').show();
                  $('.modal-body #erating-tabConfig').show();
                  $('.modal-body #erating-tabQuestion').show();
                  $('.modal-body #erating-tabUser').show();                  

                  tblList.ajax.reload();
                  alert('Successfully saved...');
              },
              error: function () {                     
                  alert('Unable to process this request..');                                                      
              }
          });
        }); 

        // Save User
        $('#btnSaveUser').click(function() {   
          // var token = $('#csrf_erating_token').val();
          var uId = $('#userId').val();   
          var setAgencyId = $('#recordId').val();
          var setName = $('#user-name').val();
          var setIc = $('#user-ic').val();
          // var setLogin = $('#user-login').val();
          var setPwd = $('#user-pwd').val();
          var setPost = $('#user-post').val();          
          var setEmail = $('#user-email').val();
          var setPhone = $('#user-phone').val();
          var setAccess = $('#dropdown-user-access :selected').val();
          var setStatus = $('#dropdown-user-status :selected').val();
          var jsonData = "";
          var jsonCall = "";
          var actions = "";

          if ((uId == null) || (uId == "")) {
            jsonData = '{"kad_pengenalan":"'+ setIc +'","kata_laluan":"'+ setPwd +'","nama":"'+ setName +'","jawatan":"'+ setPost +'","emel":"'+ setEmail +'","no_telefon":"'+ setPhone +'","tahap":"'+ setAccess +'","status":"'+ setStatus +'","agensi_id":"'+ setAgencyId +'"}';
            jsonCall = domain+"index.php/user-save";
            actions = 'Initialiazing actions...';
          } else {
            jsonData = '{"id_pengguna":"'+ uId +'","kad_pengenalan":"'+ setIc +'","kata_laluan":"'+ setPwd +'","nama":"'+ setName +'","jawatan":"'+ setPost +'","emel":"'+ setEmail +'","no_telefon":"'+ setPhone +'","tahap":"'+ setAccess +'","status":"'+ setStatus +'","agensi_id":"'+ setAgencyId +'"}';
            jsonCall = domain+"index.php/user-update";
            actions = '<a href="#" class="user_preview" id="'+ uId+'">Lihat</a> / <a href="" class="user_remove" id="'+ uId+'">Padam</a>';
          }

          $.ajax({    
              type: "POST",                
              url: jsonCall,
              data: {data: jsonData},              
              // data: {'csrf_erating_token':token, data: jsonData},              
              success: function(data) {        
                  getUsers(setAgencyId); // Reload user list              
                  if ($("#file-photo").val() != "") { setImage('photo', uId);  } // Upload profile photo

                  alert('Successfully saved...');
                  // $('#addUserModal').modal('hide');  
              },
              error: function () {                     
                  alert('Unable to process this request..');                                                     
              }
          });
        });        

        // Save User
        $('#btnRemoveUser').click(function() {        
          var uId = $('#confirm-remove span').text(); 
          var setAgencyId = $('#recordId').val();

          jsonData = '{"uid":"'+ uId +'"}';
                 
          console.log(jsonData);
          console.log(setAgencyId);

          $.ajax({    
              type: "POST",                
              url: domain+"index.php/user-remove",
              data: {data: jsonData},              
              // data: {'csrf_erating_token':token, data: jsonData},              
              success: function(data) {        
                  getUsers(setAgencyId);              // Reload user list                  

                  // alert('Successfully removed...');
                  $('#removeUserModal').modal('hide');  
              },
              error: function () {                     
                  alert('Unable to process this request..');                                                     
              }
          });
        });                 

        $('#btnSaveDisplay').click(function() {          
          var setAgencyId = $('#recordId').val();

          if ($("#file-logo").val() != "") { setImage('logo', setAgencyId);  }  // Upload logo          
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          var target = $(e.target).attr("href") // activated tab          
          console.log(target);          

          if (target == '#tabUser') {  
 
          }
        });

        // Preview User Record
        $('#tblListUser tbody').on( 'click', 'a.user_preview', function (e) {
            e.preventDefault();
            var data = $(this).attr('id');                     

            $(".modal-body #userId").val(data);
            $('#addUserModal').modal('show');
        });       

        // Preview User Record
        $('#tblListUser tbody').on( 'click', 'a.user_remove', function (e) {
            e.preventDefault();            
            var data = $(this).attr('id');                   

            // $(".modal-body #user-id-remove").val(data);
            $("#confirm-remove span").text(data);  
            $('#removeUserModal').modal('show');          
        });  

        $('#addUserModal').on('show.bs.modal', function (event) {
          var uId = $('#userId').val();          
          var modal = $(this);     
          var noimage = domain+'/templates/images/noimage.png';        

          if ((uId == null) || (uId == "")) {
            console.log("Id: "+uId);

            var uId = null;            
            $("#btnSaveUser span").text("Simpan"); 
            $('#preview-photo').attr('src', noimage);     
          } else {
            $("#btnSaveUser span").text("Kemaskini");
          }

          // Empty file input for photo upload       
          // $("#file-photo").replaceWith($("#file-photo").clone());

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
                    modal.find('.modal-body #user-name').val(JsonEratingData.nama);                    
                    modal.find('.modal-body #user-ic').val(JsonEratingData.kad_pengenalan).attr('disabled','disabled');  
                    modal.find('.modal-body #user-login').val(JsonEratingData.nama_pengguna);                                      
                    modal.find('.modal-body #user-pwd').val(JsonEratingData.kata_laluan);
                    modal.find('.modal-body #user-post').val(JsonEratingData.jawatan);                    
                    modal.find('.modal-body #user-email').val(JsonEratingData.emel);
                    modal.find('.modal-body #user-phone').val(JsonEratingData.no_telefon);                  
                    modal.find('.modal-body #dropdown-user-access').val(JsonEratingData.tahap);                    
                    modal.find('.modal-body #dropdown-user-status').val(JsonEratingData.status); 
                    // modal.find('.modal-body #user-login').val(JsonEratingData.ulogin);
                    // modal.find('.modal-body #user-dept').val(JsonEratingData.udept);

                    // Load profile picture
                    // getImage('photo', JsonEratingData.uic);
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
                  alert('Unable to process this request...');
              }
          });
        });

        // $('#removeUserModal').on('show.bs.modal', function (event) {
        //   var uId = $('#userId').val();          
        //   var modal = $(this);  
        // });

        function getUsers(agencyId) {
            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/user-list-by-agency/"+agencyId,   
              //data: {name},                                                                        
              success: function(data) {
                    tblListUser.clear().draw();

                    var jsonObject = JSON.parse(data);
                    var result = jsonObject.map(function (item) {
                        var result = [];
                        result.push(item.id_pengguna);
                        result.push(item.nama);
                        result.push(item.jawatan);
                        // result.push(item.upost);
                        result.push(item.tahap);                        
                        result.push('<a href="#" class="user_preview" id="'+ item.id_pengguna +'">Lihat</a> / <a href="#" class="user_remove" id="'+ item.id_pengguna +'">Padam</a>');
                        return result;
                    });
                    tblListUser.rows.add(result);
                    tblListUser.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        };

        function setImage(type, parentid) {
          // References:
          // https://www.formget.com/ajax-image-upload-php/
          // http://stackoverflow.com/questions/17710147/image-convert-to-base64

          var noimage = domain+'/templates/images/noimage.png';          
          var fp; var preview; var message;

          if (type == 'logo') {
            fp = $("#file-logo");
            // preview = '#preview-logo';
            // message = '#message-logo';
          } else if (type == 'photo') {
            fp = $("#file-photo");
            // preview = '#preview-photo';
            // message = '#message-photo';            
          }
          
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

        function getConfig(agencyId) {
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/config-agency/"+agencyId,   
              // data: {name},                                                                        
              success: function(data) {                  
                  JsonEratingData = jQuery.parseJSON(data); //JSON.stringify(data);   
                  
                  // Update uploaded photo in the preview panel
                  if (JsonEratingData) {
                    $('#erating-soalan').val(JsonEratingData.Soalan_Ms);
                    $('#erating-question').val(JsonEratingData.Soalan_En);
                    $('#erating-smiley').val(JsonEratingData.Smiley); 
                  }                                                   
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          });  
        };
      });     