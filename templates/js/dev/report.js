      $(document).ready(function()
      {   
        var domain = $('#domain').val();
        var base_url = $('#base_url').val();
        var json_data = $('#json_data').val();            
        var jsonData = domain+'index.php/'+json_data;

        // initiate table
        getRatings('all');

        // initiate date picker
        // $('#dateRange').daterangepicker();

        $('#dateRange').daterangepicker(
        {
            locale: {
              format: 'YYYY-MM-DD'
            }
        }, 
        function(start, end, label) {
            //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $('#dateRange_start_1').val(start.format('YYYY-MM-DD'));
            $('#dateRange_end_1').val(end.format('YYYY-MM-DD'));
        });        

        $('#dateRange_2').daterangepicker(
        {
            locale: {
              format: 'YYYY-MM-DD'
            }
        }, 
        function(start, end, label) {
            //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $('#dateRange_start_2').val(start.format('YYYY-MM-DD'));
            $('#dateRange_end_2').val(end.format('YYYY-MM-DD'));
        }); 

        $('#dateRange_4').daterangepicker(
        {
            locale: {
              format: 'YYYY-MM-DD'
            }
        }, 
        function(start, end, label) {
            //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $('#dateRange_start_4').val(start.format('YYYY-MM-DD'));
            $('#dateRange_end_4').val(end.format('YYYY-MM-DD'));
        }); 

        $('#dateRange_5').daterangepicker(
        {
            locale: {
              format: 'YYYY-MM-DD'
            }
        }, 
        function(start, end, label) {
            //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $('#dateRange_start_5').val(start.format('YYYY-MM-DD'));
            $('#dateRange_end_5').val(end.format('YYYY-MM-DD'));
        }); 


          $('#dateRange_6').daterangepicker(
        {
            locale: {
              format: 'YYYY-MM-DD'
            }
        }, 
        function(start, end, label) {
            //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $('#dateRange_start_6').val(start.format('YYYY-MM-DD'));
            $('#dateRange_end_6').val(end.format('YYYY-MM-DD'));
        });       

                

        // Generate table
        // Reference: https://www.datatables.net/examples/api/select_single_row.html        
        var tblListAll = $('#tblListAll').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,          
          // "ajax": jsonData,
          "autoWidth": true,
          "columnDefs": [
                // { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
            ],

          // Add Button
          // https://datatables.net/extensions/buttons/examples/initialisation/plugins
          // lBfrtip  |   lBrtip // ref > https://datatables.net/examples/basic_init/dom.html  
          "dom": 'fBlrtip',                  
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                }
            ],            
        });

        var tblListByRated = $('#tblListByRated').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,
          "autoWidth": true,
          "columnDefs": [
                // { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
            ],
          "dom": 'Blrtip',                 
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                }
            ],            
        });          

        var tblListByRatedMonthly = $('#tblListByRatedMonthly').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,
          "autoWidth": true,
          "dom": 'Blrtip',                  
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                }
            ],                    
        }); 

        var tblListByFeedback = $('#tblListByFeedback').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,
          "autoWidth": true,
          "columnDefs": [
                // { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
            ],
          "dom": 'Blrtip',                 
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                }
            ],            
        }); 

        // Laporan keseluruhan
        
        var tblListLaporanKeseluruhan = $('#tblListLaporanKeseluruhan').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,
          "autoWidth": true,
          "columnDefs": [
                // { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
            ],
          "dom": 'Blrtip',                 
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                }
            ],            
        }); 
        // end laporan kurang memuaskan

        // Laporan Purata

        var tblListPurata = $('#tblListPurata').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,
          "autoWidth": true,
          "columnDefs": [
                // { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
            ],
          "dom": 'Blrtip',                 
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                }
            ],            
        }); 
        // end laporan kurang memuaskan

        var tblListUserLog = $('#tblListUserLog').DataTable({        
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,          
          "processing": true,
          "sAjaxDataProp":"",
          "serverSide": false,
          "autoWidth": true,
          "columnDefs": [
                // { "type": "date_update", "targets": -1 },
                { "targets": [0], "visible": false, "searchable": false }
            ],
          "dom": 'fBlrtip',                 
            buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-files-o"></i>',
                    titleAttr: 'Copy'
                },
                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>',
                    titleAttr: 'Excel'
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>',
                    titleAttr: 'CSV'
                },
                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>',
                    titleAttr: 'PDF'
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    titleAttr: 'Print'
                }
            ], 
            // Add Combobox filter: https://www.datatables.net/examples/api/multi_filter_select.html    
            initComplete: function () {
            this.api().columns([1, 2, 3]).every( function () {
                var column = this;
                var select = $('<select"><option value=""></option></select>')
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

        // this function will reload data tabla automatically every 30 sec
        // reference: https://datatables.net/reference/api/ajax.reload()
        // setInterval( function () {
        //     tblListAll.ajax.reload();
        // }, 30000 );  

        
        // Initialize combobox selection in the Tab Laporan Terpeinci
        $('#dropdownMinistryAssign_1').change(function() {                
          var UserMinistryValue = $(this).val();
          dropdownMinistryChange(UserMinistryValue, 1);
          dropdownPetugasChange(UserMinistryValue, 1);           
        });  

        $('#dropdownDepartmentAssign_1').change(function() {              
          var UserDepartmentValue = $(this).val();
          dropdownDepartmentChange(UserDepartmentValue, 1); 
          dropdownPetugasChange(UserDepartmentValue, 1);          
        });  

        $('#dropdownBranchAssign_1').change(function() {                  
          var UserBranchValue = $(this).val();
          console.log(UserBranchValue);  
          dropdownPetugasChange(UserBranchValue, 1);        
        });  

        // Initialize combobox selection in the Tab Mengikut Agensi
        $('#dropdownMinistryAssign_2').change(function() {                
          var UserMinistryValue = $(this).val();
          dropdownMinistryChange(UserMinistryValue, 2);           
        });  

        $('#dropdownDepartmentAssign_2').change(function() {              
          var UserDepartmentValue = $(this).val();
          dropdownDepartmentChange(UserDepartmentValue, 2);           
        });  

        $('#dropdownBranchAssign_2').change(function() {                  
          var UserBranchValue = $(this).val();
          console.log(UserBranchValue);          
        });                  

        // Initialize combobox selection in the Tab Mengikut Bulan
        $('#dropdownMinistryAssign_3').change(function() {                
          var UserMinistryValue = $(this).val();
          dropdownMinistryChange(UserMinistryValue, 3);           
        });  

        $('#dropdownDepartmentAssign_3').change(function() {              
          var UserDepartmentValue = $(this).val();
          dropdownDepartmentChange(UserDepartmentValue, 3);           
        });  

        $('#dropdownBranchAssign_3').change(function() {                  
          var UserBranchValue = $(this).val();
          console.log(UserBranchValue);          
        }); 

        // Initialize combobox selection in the Tab Log pengguna
        $('#dropdownMinistryAssign_4').change(function() {                
          var UserMinistryValue = $(this).val();
          dropdownMinistryChange(UserMinistryValue, 4);           
        });  

        $('#dropdownDepartmentAssign_4').change(function() {              
          var UserDepartmentValue = $(this).val();
          dropdownDepartmentChange(UserDepartmentValue, 4);           
        });  

        $('#dropdownBranchAssign_4').change(function() {                  
          var UserBranchValue = $(this).val();
          console.log(UserBranchValue);          
        });   

        // Initialize combobox selection in the Tab Maklumbalas Aduan
        $('#dropdownMinistryAssign_5').change(function() {                
          var UserMinistryValue = $(this).val();
          dropdownMinistryChange(UserMinistryValue, 5);           
        });  

        $('#dropdownDepartmentAssign_5').change(function() {              
          var UserDepartmentValue = $(this).val();
          dropdownDepartmentChange(UserDepartmentValue, 5);           
        });  

        $('#dropdownBranchAssign_5').change(function() {                  
          var UserBranchValue = $(this).val();
          console.log(UserBranchValue);          
        });     

        // Initialize combobox selection in the Tab Laporan Keseluruhan
        $('#dropdownMinistryAssign_6').change(function() {              
          var UserMinistryValue = $(this).val();
          dropdownMinistryChange(UserMinistryValue, 6);
          dropdownPetugasChange(UserMinistryValue, 6);

        });  

        $('#dropdownDepartmentAssign_6').change(function() {              
          var UserDepartmentValue = $(this).val();
          dropdownDepartmentChange(UserDepartmentValue, 6);           
          dropdownPetugasChange(UserDepartmentValue, 6);           
        });  

        $('#dropdownBranchAssign_6').change(function() {                  
          var UserBranchValue = $(this).val();
          console.log(UserBranchValue); 
           dropdownPetugasChange(UserBranchValue, 6);         
        });     

         

        /* Operations */
        function dropdownMinistryChange (UserMinistryValue, id) {
          console.log('ID: '+id+' UserMinistryValue: '+UserMinistryValue);

          // List User(s) if Ministry was selected          
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/department-by-ministry/"+UserMinistryValue,
              //data: {name},                                                                
              success: function(data) {
                  $('#dropdownDepartmentAssign_'+ id +'').empty();
                  $('#dropdownBranchAssign_'+ id +'').empty();
                  // $('#dropdownDepartmentAssign_'+ id +'').append('<option value="000000"> Pilih Jabatan </option>');
                  // $('#dropdownBranchAssign_'+ id +'').append('<option value="000000000"> Pilih Cawangan </option>');
                  $('#dropdownDepartmentAssign_'+ id +'').append('<option value=null> Pilih Jabatan </option>');
                  $('#dropdownBranchAssign_'+ id +'').append('<option value=null> Pilih Cawangan </option>');

                  for (var i=0;i<data.length;i++) {
                    var newOption = $('<option value="'+ data[i].Kod_Jab +'">'+ data[i].Kod_Jab + ' ' + data[i].Jabatan +'</option>');
                    $('#dropdownDepartmentAssign_'+ id +'').append(newOption);                    
                    //console.log(data[i].fullname);  
                  }   
                  $('#dropdownDepartmentAssign_'+ id +'').trigger("chosen:updated");               
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          }); 
        };         

        function dropdownDepartmentChange (UserDepartmentValue, id) {        
          console.log('UserDepartmentValue: '+UserDepartmentValue);

          // List User(s) if Department was selected
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/branch-by-department/"+UserDepartmentValue,
              //data: {name},                                                                
              success: function(data) {
                  $('#dropdownBranchAssign_'+ id +'').empty();
                  // $('#dropdownBranchAssign_'+ id +'').append('<option value="000000000"> Pilih Cawangan </option>');
                  $('#dropdownBranchAssign_'+ id +'').append('<option value=null> Pilih Cawangan </option>');

                  for (var i=0;i<data.length;i++) {
                    var newOption = $('<option value="'+ data[i].Kod_Caw +'">'+ data[i].Kod_Caw + ' ' + data[i].cawangan +'</option>');
                    $('#dropdownBranchAssign_'+ id +'').append(newOption);                    
                    //console.log(data[i].fullname);  
                  }   
                  $('#dropdownBranchAssign_'+ id +'').trigger("chosen:updated");               
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          });            
        };     


        // petugas

         function dropdownPetugasChange (UserPetugasValue, id) {        
          console.log('UserPetugasValue: '+UserPetugasValue);
          console.log('id: '+id);

          // List User(s) if Department was selected
          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/petugas-by-selection/"+UserPetugasValue,
              //data: {name},                                                                
              success: function(data) {
                  $('#dropdownPetugasAssign_'+ id +'').empty();
                  // $('#dropdownBranchAssign_'+ id +'').append('<option value="000000000"> Pilih Cawangan </option>');
                  $('#dropdownPetugasAssign_'+ id +'').append("<option value='all'>SEMUA</option>");

                  for (var i=0;i<data.length;i++) {
                    var newOption = $('<option value="'+ data[i].id_pengguna +'">'+ data[i].nama  +'</option>');
                    $('#dropdownPetugasAssign_'+ id +'').append(newOption);                    
                  }   
                  $('#dropdownPetugasAssign_'+ id +'').trigger("chosen:updated");               
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          });            
        };                     

        $('#btnUpdateTblListAll').click(function() { 
          var type = $('#reportType_1').val();
          var ministry = $('#dropdownMinistryAssign_'+ type +'').val();
          var department = $('#dropdownDepartmentAssign_'+ type +'').val();
          var branch = $('#dropdownBranchAssign_'+ type +'').val();
          var dateRangeStart = $('#dateRange_start_'+ type +'').val();
          var dateRangeEnd = $('#dateRange_end_'+ type +'').val();
          var petugas = $('#dropdownPetugasAssign_1').val();
          // generate token
          var token = generateToken(ministry, department, branch, dateRangeStart, dateRangeEnd, petugas);
                console.log('token:' +token);
          getRatings(token);


            
               
        });   



        $('#btnUpdateTblListRated').click(function() { 
          var type = $('#reportType_2').val();
          var ministry = $('#dropdownMinistryAssign_'+ type +'').val();
          var department = $('#dropdownDepartmentAssign_'+ type +'').val();
          var branch = $('#dropdownBranchAssign_'+ type +'').val();
          var dateRangeStart = $('#dateRange_start_'+ type +'').val();
          var dateRangeEnd = $('#dateRange_end_'+ type +'').val();          
          // generate token
          var token = generateToken(ministry, department, branch, dateRangeStart, dateRangeEnd);

          getRatingsByRated(token);
        });          

        $('#btnUpdateTblListMonthly').click(function() { 
          var type = $('#reportType_3').val();
          var ministry = $('#dropdownMinistryAssign_'+ type +'').val();
          var department = $('#dropdownDepartmentAssign_'+ type +'').val();
          var branch = $('#dropdownBranchAssign_'+ type +'').val();        
          // generate token
          var token = generateToken(ministry, department, branch, null, null);

          getRatingsByRatedMonthly(token);
        });  

        $('#btnUpdateTblListUserLog').click(function() { 
          var type = $('#reportType_4').val();
          var ministry = $('#dropdownMinistryAssign_'+ type +'').val();
          var department = $('#dropdownDepartmentAssign_'+ type +'').val();
          var branch = $('#dropdownBranchAssign_'+ type +'').val();   
          var dateRangeStart = $('#dateRange_start_'+ type +'').val();
          var dateRangeEnd = $('#dateRange_end_'+ type +'').val();                 
          // generate token
          var token = generateToken(ministry, department, branch, dateRangeStart, dateRangeEnd);
          // console.log('token:' +token);

          getUserLog(token);
        });         

        $('#btnUpdateTblListFeedback').click(function() { 
          var type = $('#reportType_5').val();
          var ministry = $('#dropdownMinistryAssign_'+ type +'').val();
          var department = $('#dropdownDepartmentAssign_'+ type +'').val();
          var branch = $('#dropdownBranchAssign_'+ type +'').val();   
          var dateRangeStart = $('#dateRange_start_'+ type +'').val();
          var dateRangeEnd = $('#dateRange_end_'+ type +'').val();                 
          // generate token
          var token = generateToken(ministry, department, branch, dateRangeStart, dateRangeEnd);          

          getFeedback(token);
        });  


        // button kemaskini laporan keseluruhan

         $('#btnUpdateLaporanKeseluruhan').click(function() { 

          var type = $('#reportType_6').val();
          var ministry = $('#dropdownMinistryAssign_6').val();
          var department = $('#dropdownDepartmentAssign_6').val();
          var branch = $('#dropdownBranchAssign_6').val();   
          var dateRangeStart = $('#dateRange_start_6').val();
          var dateRangeEnd = $('#dateRange_end_6').val();
          var petugas = $('#dropdownPetugasAssign_6').val();
          var pilihanlaporan = $('#dropdownPilihLaporan_6').val();

          if (pilihanlaporan == 'null') alert('Sila Pilih Jenis Laporan');
          else {
   // alert ( petugas);
                 // generate token
              var token = generateToken(ministry, department, branch, dateRangeStart, dateRangeEnd, petugas, pilihanlaporan );
               console.log('token:' +token);

               getLaporanKeseluruhan(token);
              // getRatings(token);

          }

         
        });         

        // end       
                

        $('#btnResetListAll').click(function() { 
          $('#dateRange_start_1').val('');
          $('#dateRange_end_1').val('');          
          getRatings('all');
        });         

        $('#btnResetListRated').click(function() { 
          $('#dateRange_start_2').val('');
          $('#dateRange_end_2').val('');          
          getRatingsByRated('all');
        });         

        $('#btnResetListMonthly').click(function() { 
          getRatingsByRatedMonthly('all');
        });         

        $('#btnResetListFeedback').click(function() { 
          $('#dateRange_start_5').val('');
          $('#dateRange_end_5').val('');
          getFeedback('all');
        });        

        $('#btnResetListUserLog').click(function() {   
          $('#dateRange_start_4').val('');
          $('#dateRange_end_4').val('');                
          getUserLog('all');
        });          

        function generateToken(ministry, department, branch, start, end, petugas = '', pilihanlaporan = '') {          
            if ((ministry == "null") && (department == "null") && (branch == "null")) {
              agencyId = 'all';
            } else if ((ministry != "null") && (department == "null") && (branch == "null"))  {
              // agencyId = ministry+'000000';
              agencyId = ministry;
            } else if ((ministry != "null") && (department != "null") && (branch == "null")) {
              // agencyId = department+'000';
              agencyId = department;
            } else  if ((ministry != "null") && (department != "null") && (branch != "null")) {
              agencyId = branch;
            }
            //var agencyId = ministry.substring(0,3)+department.substring(3,6)+branch.substring(6,9);            
            var setToken = agencyId+'_'+start+'_'+end; // Token format: <AgencyId>_<DateStart>_<DateEnd>
            if (petugas != '') setToken = setToken+'_'+petugas;
            if (pilihanlaporan != '') setToken = setToken+'_'+pilihanlaporan;
            console.log('Token: '+ setToken);

          return setToken;
        };

        function getRatings(token) {
            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/report-all/"+token,   
              //data: {name},                                                                        
              success: function(data) {
                    tblListAll.clear().draw();
                    var jsonObject = JSON.parse(data);
                    
                    var result = jsonObject.map(function (item) {
                        var result = [];                      

                        result.push(item.rate_id);
                        result.push(item.date_update);
                        // result.push(item.agency_id);
                        result.push(item.ministry);
                        result.push(item.department);
                        result.push(item.branch);
                        result.push(item.user_id);
                        result.push(item.name);
                        result.push(item.picked);  
                        // result.push(item.perkara);  

                        return result;
                    });
                    tblListAll.rows.add(result);
                    tblListAll.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        };    

        function getRatingsByRated(token) {          
            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/report-by-rated/"+token,   
              // data: {name},                                                                        
              success: function(data) {
                    tblListByRated.clear().draw();
                    var jsonObject = JSON.parse(data);
                    
                    var result = jsonObject.map(function (item) {
                        var result = [];                      

                        result.push(item.agency_id);
                        result.push(item.ministry);
                        result.push(item.department);
                        result.push(item.branch);
                        result.push(item.section);                       
                        result.push(item.rate_1);                       
                        result.push(item.rate_2);                       
                        result.push(item.rate_3);                       
                        result.push(item.rate_4);                       
                        result.push(item.rate_5);                       
                        result.push(item.total);                       
                        return result;
                    });
                    tblListByRated.rows.add(result);
                    tblListByRated.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        };  

        function getRatingsByRatedMonthly(agencyId) {    
            console.log('fethcing data...'+ agencyId);
            console.log('uri: '+ domain+"index.php/api/report-rated-monthly-agency-pivot/"+agencyId);

            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/report-rated-monthly-agency-pivot/"+agencyId,   
              // data: {name},                                                                        
              success: function(data) {
                    tblListByRatedMonthly.clear().draw();
                    var jsonObject = JSON.parse(data);
                    
                    var result = jsonObject.map(function (item) {
                        var result = [];
                        var agency_name = "";

                        if ((item.branch == null) && (item.department == null))
                        { 
                          agency_name=item.ministry;                           
                        } else if (item.branch == null) { 
                          agency_name=item.department; 
                        } else {
                          agency_name=item.branch; 
                        }

                        result.push(item.agency_id);                        
                        result.push(agency_name);
                        result.push(item.Jan);
                        result.push(item.Feb);
                        result.push(item.Mar);
                        result.push(item.Apr);                       
                        result.push(item.May);                       
                        result.push(item.Jun);                       
                        result.push(item.Jul);                       
                        result.push(item.Aug);                       
                        result.push(item.Sep);                       
                        result.push(item.Oct);                       
                        result.push(item.Nov);                       
                        result.push(item.Dis);                       
                        return result;
                    });
                    tblListByRatedMonthly.rows.add(result);
                    tblListByRatedMonthly.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        };    

        function getFeedback(agencyId) {          
            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/report-feedback/"+agencyId,   
              // data: {name},                                                                        
              success: function(data) {
                    tblListByFeedback.clear().draw();
                    var jsonObject = JSON.parse(data);
                    
                    var result = jsonObject.map(function (item) {
                        var result = [];                      

                        result.push(item.agency_id);
                        result.push(item.ministry);
                        result.push(item.department);
                        result.push(item.branch);
                        result.push(item.section);                       
                        result.push(item.feedback_1);                       
                        result.push(item.feedback_2);                       
                        result.push(item.feedback_3);                       
                        result.push(item.feedback_4);                       
                        result.push(item.feedback_5);                       
                        result.push(item.total);                       
                        return result;
                    });
                    tblListByFeedback.rows.add(result);
                    tblListByFeedback.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        }; 

        // Laporan Purata Tahap Kepuasan 

        function getLaporanPurata(token) {          
            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/report-laporan-purata/"+token,   
              // data: {name},                                                                        
              success: function(data) {
                    tblListPurata.clear().draw();
                    var jsonObject = JSON.parse(data);
                    
                    var result = jsonObject.map(function (item) {
                        var result = [];                      

                        result.push(item.rate_id);
                        result.push(item.petugas);
                        result.push(item.tarikh);
                        result.push(item.masa);
                        result.push(item.perkara);
                        result.push(item.tahap);                       
                        return result;
                    });
                    tblListPurata.rows.add(result);
                    tblListPurata.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        }; 

        // End Laporan Purata Tahap Kepuasan

        // Laporan keseluruhan 

                function getLaporanKeseluruhan(token) {          
            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/report-laporan-keseluruhan/"+token,   
              // data: {name},                                                                        
              success: function(data) {
                    tblListLaporanKeseluruhan.clear().draw();
                    var jsonObject = JSON.parse(data);
                    
                    var result = jsonObject.map(function (item) {
                        var result = [];                      

                        result.push(item.rate_id);
                        result.push(item.petugas);
                        result.push(item.tarikh);
                        // result.push(item.masa);
                        result.push(item.perkara);
                        result.push(item.tahap);              
                        return result;
                    });
                    tblListLaporanKeseluruhan.rows.add(result);
                    tblListLaporanKeseluruhan.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        };

       
        function getUserLog(agency)
        {
        console.log('uri:' +domain+"index.php/api/user-log/"+agency);
            $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/user-log/"+agency,   
              // data: {name},                                                                        
              success: function(data) {
                    tblListUserLog.clear().draw();
                    var jsonObject = JSON.parse(data);
                    
                    var result = jsonObject.map(function (item) {
                        var result = [];                      

                        result.push(item.user_id);
                        result.push(item.agensi_id);
                        result.push(item.nama);
                        result.push(item.jawatan);
                        result.push(item.session_id);                       
                        result.push(item.date_login);                       
                        result.push(item.date_logout);                       
                        result.push(item.status);                                            
                        return result;
                    });
                    tblListUserLog.rows.add(result);
                    tblListUserLog.draw();                    
              },
              error: function () {                    
                  alert('Unable to process this request...');
              }
          })
        };                                         
      });     