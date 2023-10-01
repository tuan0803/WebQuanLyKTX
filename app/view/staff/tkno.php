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

  foreach ($no as $no1) {
    $key_gender   = array_keys($no1);
    $value_gender = array_values($no1);
  }
  


  ?>
  <div class="container">
    <div class="box">
            <ul class="room-lists">
                <table class="table">
                    <tr>
                        <th>STT</th>
                        <th>ID Sinh viên</th>
                        <th>Họ tên</th>
                        <th>Tiền</th>
                        <th >Ngày</th>
                        <th >ID Bill</th>
                        <th >Ghi chú</th>
                    </tr>

                    <?php
                    $i = 1;
                    foreach ($list as $list1) {
                        $id              = $list1['student_id'] ?? '';
                        $name            = $list1['student_name'] ?? '';
                        $cost = $list1['bill_cost'] ?? '';
                        $date         = $list1['bill_date'] ?? '';
                        $bill_id    = $list1['bill_id'] ?? '';
                        $bill_desc    = $list1['bill_desc'] ?? '';


                        ?>
                        <tr>
                            <td>
                                <?php echo $i++ ?>
                            </td>
                            <td>
                                <?php echo $id ?>
                            </td>
                            <td>
                                <?php echo $name ?>
                            </td>
                            <td>
                                <?php echo $cost ?>
                            </td>
                            <td>
                                <?php echo $date ?>
                            </td>
                            <td>
                                <?php echo $bill_id ?>
                            </td>
                            <td>
                                <?php echo $bill_desc?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </ul>
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
        ['Đã thu', parseInt(value_gender[3])],
        ['Nợ', parseInt(value_gender[0])]
      ]);

      var options = {
        title: 'Biểu đồ thống kê nợ'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>

  
</body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>