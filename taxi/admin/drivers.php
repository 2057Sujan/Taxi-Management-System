<?php require_once 'include/header.php'?>
<?php 
   if(isset($_GET['delete_id'])){
      $id = $_GET['delete_id'];
      $query1="DELETE FROM driver WHERE driver_id='$id';";
      $query1.="DELETE FROM taxi_taken WHERE driver_id = '$id';";
      $query1.="DELETE FROM booking WHERE driver_id ='$id';";
      $query1.="DELETE FROM earnings WHERE driver_id = '$id'";
      $result1 = mysqli_multi_query($conn,$query1);
     
      if($result1){
         $_SESSION['success'] = "The data has been deleted successfully";
         echo'
            <script type="text/javascript">
            window.location.href = "drivers.php";
            </script>
         ';
      }  
   }

    $query = "SELECT driver.driver_id,driver.driver_name,driver.email,driver.type,driver.experience,driver.status,taxi.image 
    FROM driver 
    LEFT JOIN taxi_taken on taxi_taken.driver_id = driver.driver_id
    LEFT JOIN taxi on taxi_taken.taxi_id = taxi.taxi_id";
    $result = mysqli_query($conn,$query);
?>
<div id="layoutSidenav_content">
   <!-- Show all hotel rooms -->
   <main>
      <div class="container-fluid px-4">
      <h1 class="mt-4">Drivers Table</h1>
        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
            </div>
        <?php endif?>
        <div class="card mb-4">
            <div class="card-header">
                <div style="float: right;">
                    <a href="addDriver.php" class="btn btn-secondary">Add Driver</a>
                    <a href="exportDriver.php" class="btn btn-primary">Export</a>
                </div>
               <i class="fas fa-table me-1"></i>
               All Driver
            </div>
            
            <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Driver Name</th>
                        <th>Driver Email</th>
                        <th>Driver Type</th>
                        <th>Driver Expereince</th>
                        <th>Driver Status</th>
                        <th>Picked Taxi</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th>Driver Name</th>
                        <th>Driver Email</th>
                        <th>Driver Type</th>
                        <th>Driver Expereince</th>
                        <th>Driver Status</th>
                        <th>Taxi image</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($result as $i => $data):?>
                     <tr>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $data['driver_name']?></td>
                        <td><?php echo $data['email']?></td>
                        <td><?php echo $data['type']?></td>
                        <td><?php echo $data['experience']?></td>
                        <td>
                           <?php if($data['status'] == 1):?>
                              <button class="btn btn-danger btn-sm">N/A</button>
                           <?php else:?>
                              <button class="btn btn-success btn-sm">Available</button>
                           <?php endif?>
                        </td>
                        <td><img src="../assets/front/images/taxi/<?php echo $data['image']?>" alt="image" height="100"></td>
                        <td>
                            <a href="edit.php?id=<?php echo $data['driver_id']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="javascript:delete_id(<?php echo $data['driver_id'];?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                     </tr>
                     <?php endforeach?>
                  </tbody>
                </table>
            </div>
         </div>
        </div>
   </main>
<script>
   function delete_id(id) {
    if (confirm('Are you sure you want to delete this?')) {
        window.location.href = 'drivers.php?delete_id=' + id;
    }
}
</script>


<?php require_once 'include/footer.php'?>
