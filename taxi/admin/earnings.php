<?php require_once 'include/header.php'?>
<?php 
   if(isset($_GET['delete_id'])){
      $query1 = "DELETE FROM room WHERE room_num=".$_GET['delete_id'];
      $result1 = mysqli_query($conn, $query1);

      if($result1){
         $_SESSION['success'] = "The data has been deleted successfully";
      }
   }
    $query = "SELECT driver.driver_id,earnings.earning_id,driver.driver_name, SUM(earnings.earning) as total_earnings 
    FROM driver 
    JOIN earnings on earnings.driver_id = driver.driver_id 
    GROUP BY earnings.driver_id;";
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
                    <a href="exportEarning.php" class="btn btn-primary">Export</a>
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
                        <th>Driver's Total Earnings</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th>Driver Name</th>
                        <th>Driver's Total Earnings</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($result as $i => $data):?>
                     <tr>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $data['driver_name']?></td>
                        <td>$<?php echo $data['total_earnings']?></td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
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
        window.location.href = 'hotels.php?delete_id=' + id;
    }
}
</script>


<?php require_once 'include/footer.php'?>
