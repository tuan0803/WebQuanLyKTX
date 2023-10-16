<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thống kê nợ</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/WEBQUANLYKTX/public/assets/staff/css/index.css">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .box {
      padding: 20px;
      margin: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>
  <?php

  foreach ($hdhh as $hdhh1) {
    $key_hdhh[]   = array_keys($hdhh1);
    $value_hdhh[] = array_values($hdhh1);
  }

  foreach ($hdm as $hdm1) {
    $key_hdm[]   = array_keys($hdm1);
    $value_hdm[] = array_values($hdm1);
  }
  //   foreach ($address as $address1) {
//     $key_address[]   = array_keys($address1);
//     $value_address[] = array_values($address1);
  
  //   }
  

  ?>
  <div class="container">
    <div class="box">
    <div id="hdshh_chart" style="width: 900px; height: 500px"></div>
    </div>
    <div class="box">
      <div id="chartclass_div" style="height: 500px"></div>
    </div>
    <div class="box">
      <div id="hdm_chart" style="width: 900px; height: 500px"></div>
    </div>
    <!-- <div class="box">
      <div id="piechart"></div>
    </div> -->
  </div>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    var key_hdm = <?php echo json_encode($key_hdm); ?>;
    var value_hdm = <?php echo json_encode($value_hdm); ?>;
    alert(value_hdm[0]);
    function drawChart() {
      
      var dataArray = [['String', 'Hợp đồng']];
      for (var i = 0; i < value_hdm.length; i++) {
        var year = value_hdm[i][0]+"/"+value_hdm[i][2];
        var sales = value_hdm[i][4];
        
        
        dataArray.push([year, sales]);
      }
      var data = google.visualization.arrayToDataTable(dataArray);

      var options = {
        title: 'Biểu đồ thống kê hợp đồng trong 4 tháng trở lại đây',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('hdm_chart'));

      chart.draw(data, options);
    }
  </script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    var key_hdhh = <?php echo json_encode($key_hdhh); ?>;
    var value_hdhh = <?php echo json_encode($value_hdhh); ?>;
    
    function drawChart() {
      
      var dataArray = [['String', 'Hợp đồng']];
      for (var i = 0; i < value_hdhh.length; i++) {
        var year = value_hdhh[i][0]+"/"+value_hdhh[i][2];
        var sales = value_hdhh[i][4];
        
        
        dataArray.push([year, sales]);
      }
      var data = google.visualization.arrayToDataTable(dataArray);

      var options = {
        title: 'Biểu đồ thống kê hợp đồng sẽ hết hạn trong 4 tháng tới',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('hdshh_chart'));

      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var key_hdhh = <?php echo json_encode($key_hdhh); ?>;
      var value_hdhh = <?php echo json_encode($value_hdhh); ?>;


      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Nam', parseInt(value_hdhh[0])],
        ['Nữ', parseInt(value_hdhh[3])]
      ]);

      var options = {
        title: 'Giới tính'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

  <!-- Biểu đồ cột -->
  <script type="text/javascript">
    google.charts.load('current', { packages: ['corechart', 'bar'] });
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {
      var key_hdhh = <?php echo json_encode($key_hdhh); ?>;
      var value_hdhh = <?php echo json_encode($value_hdhh); ?>;

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Số sinh viên');

      for (let index = 0; index < value_hdhh.length; index++) {
        data.addRows([
          [{ v: [index + 1, 0, 0], f: toString(value_hdhh[index][0]) + " " + toString(value_hdhh[index][2]) }, parseInt(value_hdhh[index][4])],]);

      }


      var options = {
        title: 'Biểu đồ sinh viên phân bố theo lớp học',
        hAxis: {
          title: 'Lớp học',
          format: 'h:mm a',
          viewWindow: {
            min: [0, 30, 0],
            max: [value_hdhh.length, 30, 0]
          }
        },
        vAxis: {
          title: 'Số lượng sinh viên'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chartclass_div'));

      chart.draw(data, options);
    }
  </script>

  <!-- Biểu đồ hợp đồng sắp hết hạn -->

  <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var key_address = <?php echo json_encode($key_hdhh); ?>;
      var value_address = <?php echo json_encode($value_hdhh); ?>;
      
      


      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Số sinh viên');
      data.addColumn({ type: 'string', role: 'style' });


      for (var i = 0; i < value_address.length; i++) {
        $year = value_address[i][0]

        data.addRow([value_address[i][0] + "/" + value_address[i][2], parseInt(value_address[i][4]), "#b87333"]);
      }


      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
        {
          calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation"
        },
        2]);

      var options = {
        title: "Biều đồ sinh viên phan bố theo quê quán",
        width: 600,
        height: 400,
        bar: { groupWidth: "95%" },
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("chartaddress_div"));
      chart.draw(view, options);
    }
  </script>
</body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>