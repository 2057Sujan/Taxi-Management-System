<?php require_once 'include/header.php'?>
<?php 
    if(isset($_GET['delete_id'])){
        $query1 = "DELETE FROM taxi WHERE taxi_id=".$_GET['delete_id'];
        $result1 = mysqli_query($conn, $query1);

        if($result1){
        $_SESSION['success'] = "The data has been deleted successfully";
        }
    }
    $query = "SELECT * FROM taxi";
    $result = mysqli_query($conn,$query);
?>
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
      <h1 class="mt-4">Taxi Table</h1>
        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
            </div>
        <?php endif?>
        <div class="card mb-4">
            <div class="card-header">
                <div style="float: right;">
                    <a href="addTaxi.php" class="btn btn-secondary">Add Taxi</a>
                </div>
               <i class="fas fa-table me-1"></i>
               Taxi of the driver
            </div>
            <!-- Table start -->
            <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Taxi Number</th>
                        <th>Made year</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                     <th>#</th>
                        <th>Taxi Number</th>
                        <th>Made year</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($result as $i => $data):?>
                     <tr>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $data['taxi_number']?></td>
                        <td><?php echo $data['made_year']?></td>
                        <td>
                            <?php if($data['taxi_status'] == 0):?>
                                <button class="btn btn-success btn-sm">Available</button>
                            <?php else:?>
                                <button class="btn btn-danger btn-sm">N/A</button>
                            <?php endif?>
                        </td>
                        <td><img src="../assets/front/images/taxi/<?php echo $data['image']?>" height="100"></td>
                        <td>
                           <a href="editTaxi.php?id=<?php echo $data['taxi_id']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="javascript:delete_id(<?php echo $data['taxi_id']?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                     </tr>
                     <?php endforeach?>
                  </tbody>
                </table>
            </div>
            <!-- Table end -->
         </div>
        </div>
   </main>
<script>
   function delete_id(id) {
    if (confirm('Are you sure you want to delete this?')) {
        window.location.href = 'taxi.php?delete_id=' + id;
    }
}
</script>


<?php require_once 'include/footer.php'?>
