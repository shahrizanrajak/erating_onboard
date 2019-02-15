<script language='javascript'>
$(document).ready(function()
{           
    var base_url = "<?php echo base_url(); ?>";
    var domain = "<?php echo mydomain; ?>";

   /* Generating Graph*/
    $.ajax({
       url: base_url+'index.php/api/report-rated-monthly',
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
   

</script>

<body>

   <section class="col-lg-7 connectedSortable">
              <div class="box box-solid">
              <div class="nav-tabs-custom">                
                <ul class="nav nav-tabs pull-right">                                                
                  <li class="pull-left header"><i class="fa fa-bar-chart"></i> Jumlah Rating Bulanan Tahun <?php echo date("Y"); ?></li>
                </ul>
                <div class="tab-content no-padding">                  
                  <div class="chart" id="stats-monthly" style="position: relative; height: 362px;"></div>  </div>
              </div>  
              </div>    
            </section><!-- /.Right col -->   
  
</body>