<script language='javascript'>
$(document).ready(function()
{           
    var base_url = "<?php echo base_url(); ?>";
    var domain = "<?php echo mydomain; ?>";

    /* Pie Chart */
    $.ajax({
       url: base_url+'index.php/api/report-by-rated-category',
      // url: 'index.php/api/report-by-rated-category',
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
});
</script>

<body>
  <div class="row">
    <div class="col-md-7">
      <div class="chart-responsive">
        <canvas id="pieChart" height="165"></canvas>
      </div><!-- ./chart-responsive -->
    </div><!-- /.col -->
    <div class="col-md-5">
      <ul class="chart-legend clearfix">
        <li><i class="fa fa-circle-o text-blue"></i> Cemerlang</li>
        <li><i class="fa fa-circle-o text-green"></i> Memuaskan</li>
        <li><i class="fa fa-circle-o text-gray"></i> Sederhana Memuaskan</li>
        <li><i class="fa fa-circle-o text-yellow"></i> Kurang Memuaskan</li>                      
        <li><i class="fa fa-circle-o text-red"></i> Tidak Memuaskan</li>
      </ul>
    </div><!-- /.col -->
  </div>

  <table><tr>
  <td><center><label id="data_rate_5"></label></center></td>                              
  <td><center><label id="data_rate_4"></label></center></td>                              
  <td><center><label id="data_rate_3"></label></center></td>                              
  <td><center><label id="data_rate_2"></label></center></td>                              
  <td><center><label id="data_rate_1"></label></center></td>
  </tr></table>
</body>