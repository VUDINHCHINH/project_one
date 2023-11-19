<div class="row2">
 <div class="row2 form_content ">
 <div
 id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
   </div>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            // Set Data
                const data = google.visualization.arrayToDataTable([
                ['DANH MỤC', 'SỐ LƯỢNG'],
                <?php
                    foreach ($dsthongke as $thongke) {
                        extract($thongke);
                        echo "['$name',$soluong],";
                    }
                ?>
                ]);
            // Set Options
                const options = {
                title:'BIỂU ĐỒ SẢN PHẨM TRONG DANH MỤC',
                is3D:true
            };
            // Draw
            const chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
</script>

 </div>
 </div>