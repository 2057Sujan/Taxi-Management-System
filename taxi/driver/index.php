<?php require_once 'include/header.php'?>
<?php 
    if(!isset($_SESSION['driver_id'])){
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
               $query = "SELECT COUNT(*) as total from booking WHERE driver_id=".$_SESSION['driver_id'];
               $result = mysqli_query($conn,$query);
               $data = mysqli_fetch_assoc($result); 
            ?>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-primary text-white mb-4">
                  <div class="card-body">Total Ride</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="#"><?php echo $data['total']?></a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>
            <?php
               $query = "SELECT SUM(earning) as total from earnings WHERE driver_id=".$_SESSION['driver_id'];
               $result = mysqli_query($conn,$query);
               $data = mysqli_fetch_assoc($result); 
             ?>
            <div class="col-xl-3 col-md-6">
               <div class="card bg-success text-white mb-4">
                  <div class="card-body">Total Income</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="#">$<?php echo $data['total']?></a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>

            <?php
            $query2 = "SELECT SUM(amount) as exp from expenditure WHERE driver_id= ".$_SESSION['driver_id'] ;
               $result1 = mysqli_query($conn,$query2);
               $data1 = mysqli_fetch_assoc($result1); 
               ?>
            <!-- Expenditure -->
            <div class="col-xl-3 col-md-6">
               <div class="card bg-success text-white mb-4">
                  <div class="card-body">Total Expenditure</div>
                  <div class="card-footer d-flex align-items-center justify-content-between">
                     <a class="small text-white stretched-link" href="#">$<?php echo $data1['exp']?></a>
                     <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </main>
<?php require_once 'include/footer.php'?>