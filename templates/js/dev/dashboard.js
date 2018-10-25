$(document).ready(function()
{           
    var base_url = $('#base_url').val();
    var domain = $('#domain').val();

    setInterval( function () {

          //  $.ajax({
          //     type: "GET",
          //     datatype: "jsonp",                            
          //     url: domain+"index.php/api/dashboard_total_active",                                                                            
          //     success: function(data) {                       
          //       $('#txtTotalAgencyActive').text(data);
          //      // console.log('getData: '+ data);
          //     }
          // });      


          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/dashboard_total_active",                                                                            
              success: function(data) {                       
                $('#txtTotalActive').text(data);
               // console.log('getData: '+ data);
              }
          });      


          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/dashboard_total_rating",                                                                            
              success: function(data) {                       
                $('#txtTotalRating').text(data);
               // console.log('getData: '+ data);
              }
          });      

          $.ajax({
              type: "GET",
              datatype: "jsonp",                            
              url: domain+"index.php/api/dashboard_total_comment",                                                                            
              success: function(data) {                       
                $('#txtTotalComment').text(data);
              }
          });         

// Statistik Rating Hari Ini  bentuk table

        // $.ajax({
        //       type: "GET",
        //       datatype: "jsonp",                            
        //       url: domain+"index.php/api/report-by-rated-category",                                                                            
        //       success: function(data) {                       
        //         $('#data_rate_1').text(data);
        //       }
        //   }); 



    }, 10000 ); 

    // $('#stats-weekly').hide();    

    $('#click-stats-monthly').click(function() {
      $('#stats-monthly').show();        
      $('#stats-weekly').hide();        
    });      

    $('#click-stats-weekly').click(function() {
      $('#stats-weekly').show();        
      $('#stats-monthly').hide();        
    });       

    /* Pie Chart */
    $.ajax({
       url: domain+'index.php/api/report-by-rated-category',
       success: function (response) {//response is value returned from php
            // alert(response); //showing response is working
          var datachart = JSON.parse(response);

            var result = datachart.map(function (item) {

            var DataPie = 
            [
              {
                value: item.rate_5,
                color: "#0b62a4", //blue
                highlight: "#0b62a4",
                label: "Cemerlang"
              },                        
              {
                value: item.rate_4,
                color: "#00a65a", // green
                highlight: "#00a65a",
                label: "Memuaskan"                
              },
              {
                value: item.rate_3,
                color: "#d2d6de", //gray
                highlight: "#d2d6de",
                label: "Sederhana Memuaskan"
              },         
              {
                value: item.rate_2,
                color: "#f39c12", //yellow
                highlight: "#f39c12",
                label: "Kurang Memuaskan"
              },                   
              {
                value: item.rate_1,
                color: "#dd4b39", //red
                highlight: "#dd4b39",
                label: "Tidak Memuaskan"
              }
            ];                

            $('#data_rate_1').text(item.rate_1);
            $('#data_rate_2').text(item.rate_2);
            $('#data_rate_3').text(item.rate_3);
            $('#data_rate_4').text(item.rate_4);
            $('#data_rate_5').text(item.rate_5);


            var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            var pieChart = new Chart(pieChartCanvas);
            var PieData = DataPie;
            var pieOptions = {
              //Boolean - Whether we should show a stroke on each segment
              segmentShowStroke: true,
              //String - The colour of each segment stroke
              segmentStrokeColor: "#fff",
              //Number - The width of each segment stroke
              segmentStrokeWidth: 1,
              //Number - The percentage of the chart that we cut out of the middle
              percentageInnerCutout: 50, // This is 0 for Pie charts
              //Number - Amount of animation steps
              animationSteps: 100,
              //String - Animation easing effect
              animationEasing: "easeOutBounce",
              //Boolean - Whether we animate the rotation of the Doughnut
              animateRotate: true,
              //Boolean - Whether we animate scaling the Doughnut from the centre
              animateScale: false,
              //Boolean - whether to make the chart responsive to window resizing
              responsive: true,
              // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
              maintainAspectRatio: false,
              //String - A legend template
              legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
              //String - A tooltip template
              tooltipTemplate: "<%=value %> <%=label%>"
            };
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.  
            pieChart.Doughnut(PieData, pieOptions);
            });
        
       }
    });
    /* End Pie Chart */

    /* Generating Graph*/
    $.ajax({
       url: domain+'index.php/api/report-rated-monthly',
       success: function (response) 
       {            
          var datachart = JSON.parse(response);
          var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];                
          var month_format_bar = new Array();          
          var month_format_line = new Array();          

          // Formatting Label
          var result = datachart.map(function (item) {            
            month_format_bar.push(months[item.month-1]);
            month_format_line.push(months[item.month-1]);
          });        
          // console.log("legend: "+month_format_line);
          
          /* Bar Graph*/
          Morris.Bar({
              element: 'stats-monthly',             
              data: datachart,
             // xkey: 'months',
              ykeys: ['total'],
              labels: ['Rating'],
              xLabelFormat: function() {
                return month_format_bar.shift();    // take out array item one by one from front, http://www.w3schools.com/jsref/jsref_shift.asp                  
              },              
          });

          /* Multiple Line Graph*/
          Morris.Line({
              element: 'stats-weekly',             
              data: datachart,
              xkey: 'month',
              ykeys: ['rate_5', 'rate_4', 'rate_3', 'rate_2', 'rate_1'],
              labels: ['Cemerlang', 'Memuaskan', 'Sederhana', 'Kurang', 'Tidak'],
              barColors: ["#0b62a4", "#00a65a", "#d2d6de", "#f39c12", "#dd4b39"],
              xLabelFormat: function() {
                return month_format_line.shift();    // take out array item one by one from front, http://www.w3schools.com/jsref/jsref_shift.asp                  
              },              
          });          
       }
    });
    /* End Generating Graph*/


        /* test buat bar graf*/
    $.ajax({
       url: domain+'index.php/api/report-by-rated-category',
       success: function (response) 
       {            
          var datachartbar = JSON.parse(response);
          var rate = ["Cemerlang", "Memuaskan", "Sederhana", "Kurang", "Tidak"];                 
          var rate_format_bar = new Array();                 

          // Formatting Label
           var result = datachartbar.map(function (item) {            
             // rate_format_bar.push(rate[item.rate-1]);
              rate_format_bar.push(rate[item.rate_5]);
            });        
          // console.log("legend: "+month_format_line);
          
         
          /* Multiple bar Graph*/
          // Morris.Bar({
          //     element: 'stats-rate',             
          //     data: datachartbar,
          //     xkey: ['rate_5', 'rate_4', 'rate_3', 'rate_2', 'rate_1'],
          //     ykeys: ['rate_5', 'rate_4', 'rate_3', 'rate_2', 'rate_1'],
          //     labels: ['Cemerlang', 'Memuaskan', 'Sederhana', 'Kurang', 'Tidak'],
          //     xLabelFormat: function() {
          //       return rate_format_bar.shift();    // take out array item one by one from front, http://www.w3schools.com/jsref/jsref_shift.asp                  
          //     },              
          // }); 

          Morris.Bar({
              element: 'stats-rate',             
              data: datachartbar,
              xkey: '',
              ykeys: ['rate_5', 'rate_4', 'rate_3', 'rate_2', 'rate_1'],
              labels: ['Cemerlang', 'Memuaskan', 'Sederhana', 'Kurang', 'Tidak'],
              xLabelFormat: function() {
                return rate_format_bar.shift();    // take out array item one by one from front, http://www.w3schools.com/jsref/jsref_shift.asp                  
              },              
          });



       }
    });
    /* End Generating Graph*/


});     