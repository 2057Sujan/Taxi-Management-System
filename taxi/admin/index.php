<?php require_once 'include/header.php'?>
<?php require_once '../include/dbconnect.php'?>
<?php 
    if(!isset($_SESSION['admin_id'])){
        echo"
        <script>
            window.location.href = 'login.php'
        </script>
        ";
    }
?>
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
         <h1 class="mt-4">Dashboard</h1>
         <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
         <div class="row">
            <?php 
               $query = "SELECT driver.driver_id,earnings.earning_id,driver.driver_name, SUM(earnings.earning) as total_earnings 
               FROM driver 
               JOIN earnings on earnings.driver_id = driver.driver_id 
               GROUP BY earnings.driver_id;";
               $result = mysqli_query($conn,$query);
               foreach($result as $data){
                  $driver_name[] = $data['driver_name'];
                  $driver_earning[] = $data['total_earnings'];
               }

               // Expenditure
               $query2 = "SELECT driver.driver_id,expenditure.expenditure_id,driver.driver_name, SUM(expenditure.amount) as total 
               FROM driver 
               JOIN expenditure on expenditure.driver_id = driver.driver_id 
               GROUP BY expenditure.driver_id;";
               $result2 = mysqli_query($conn,$query2);
               foreach($result2 as $data){
                  $driver_name2[] = $data['driver_name'];
                  $driver_exp[] = $data['total'];
               }
            ?>
            <div class="col-xl-6 col-md-6">
               <div class="card text-white mb-4">
                  <div>
                     <canvas id="myChart"></canvas>
                  </div>
               </div>
            
            </div>

            <!-- Expenditure chart -->
            <div class="col-xl-6 col-md-6">
               <div class="card text-white mb-4">
                  <div>
                     <canvas id="myChart2"></canvas>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </main>
   <script>
      const ctx = document.getElementById('myChart');

      new Chart(ctx, {
         type: 'bar',
         data: {
            labels: <?php echo json_encode($driver_name)?>,
            datasets: [{
            label: 'Total Earnings $',
            data: <?php echo json_encode($driver_earning)?>,
            backgroundColor: [
               'rgba(255, 99, 132, 0.2)',
               'rgba(255, 159, 64, 0.2)',
               'rgba(255, 205, 86, 0.2)',
               'rgba(75, 192, 192, 0.2)',
               'rgba(54, 162, 235, 0.2)',
               'rgba(153, 102, 255, 0.2)',
               'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
               'rgb(255, 99, 132)',
               'rgb(255, 159, 64)',
               'rgb(255, 205, 86)',
               'rgb(75, 192, 192)',
               'rgb(54, 162, 235)',
               'rgb(153, 102, 255)',
               'rgb(201, 203, 207)'
            ],
            borderWidth: 1
            }]
         },
         options: {
            scales: {
            y: {
               beginAtZero: true
            }
            }
         }
      });
// Exp
const ctx2 = document.getElementById('myChart2');

      new Chart(ctx2, {
         type: 'bar',
         data: {
            labels: <?php echo json_encode($driver_name2)?>,
            datasets: [{
            label: 'Total Expenditure $',
            data: <?php echo json_encode($driver_exp)?>,
            backgroundColor: [
               'rgba(255, 99, 132, 0.2)',
               'rgba(255, 159, 64, 0.2)',
               'rgba(255, 205, 86, 0.2)',
               'rgba(75, 192, 192, 0.2)',
               'rgba(54, 162, 235, 0.2)',
               'rgba(153, 102, 255, 0.2)',
               'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
               'rgb(255, 99, 132)',
               'rgb(255, 159, 64)',
               'rgb(255, 205, 86)',
               'rgb(75, 192, 192)',
               'rgb(54, 162, 235)',
               'rgb(153, 102, 255)',
               'rgb(201, 203, 207)'
            ],
            borderWidth: 1
            }]
         },
         options: {
            scales: {
            y: {
               beginAtZero: true
            }
            }
         }
      });


      
   </script>
<?php require_once 'include/footer.php'?>