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

  foreach ($gender as $gender1) {
    $key_gender   = array_keys($gender1);
    $value_gender = array_values($gender1);
  }
  foreach ($class as $class1) {
    $key_class[]   = array_keys($class1);
    $value_class[] = array_values($class1);
  }
  foreach ($address as $address1) {
    $key_address[]   = array_keys($address1);
    $value_address[] = array_values($address1);

  }


  ?>
  <div class="container">
    <div class="box">
      <div id="chartaddress_div"></div>
    </div>
    <div class="box">
      <div id="chartclass_div"></div>
    </div>
    <div class="box">
      <div id="piechart"></div>
    </div>
  </div>

  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var key_gender = <?php echo json_encode($key_gender); ?>;
      var value_gender = <?php echo json_encode($value_gender); ?>;


      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Nam', parseInt(value_gender[0])],
        ['Nữ', parseInt(value_gender[3])]
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
      var key_class = <?php echo json_encode($key_class); ?>;
      var value_class = <?php echo json_encode($value_class); ?>;

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Lớp học');
      data.addColumn('number', 'Số sinh viên');

      for (let index = 0; index < value_class.length; index++) {
        data.addRows([
          [value_class[index][0] , parseInt(value_class[index][2])],]);

      }


      var options = {
      title: 'Biểu đồ sinh viên phân bố theo lớp học',
      hAxis: {
        title: 'Lớp học',
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

  <!-- Biểu đồ quê quán -->

  <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var key_address = <?php echo json_encode($key_address); ?>;
      var value_address = <?php echo json_encode($value_address); ?>;
      
      
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Element');
      data.addColumn('number', 'Số sinh viên');
      data.addColumn({ type: 'string', role: 'style' });

      
      for (var i = 0; i < value_address.length; i++) {
        
        data.addRow([value_address[i][0], parseInt(value_address[i][2]), "#b87333"]);
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
        title: "Biều đồ thống kê sinh viên theo quê quán",
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