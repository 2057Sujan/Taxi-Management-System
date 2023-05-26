<?php require_once 'include/header.php'?>
<?php 
    $query = "SELECT * FROM earnings WHERE driver_id =".$_SESSION['driver_id'];
    $result = mysqli_query($conn,$query);
?>
<div id="layoutSidenav_content">
   <!-- Show all hotel rooms -->
   <main>
      <div class="container-fluid px-4">
      <h1 class="mt-4">Earnings Table</h1>
        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
            </div>
        <?php endif?>
        <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-table me-1"></i>
               All Earnings
            </div>
            
            <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Earning</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Earning</th>
                     </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($result as $i => $data):?>
                     <tr>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $data['date']?></td>
                        <td>$<?php echo $data['earning']?></td>
                     </tr>
                     <?php endforeach?>
                        <?php 
                            $query = "SELECT SUM(earning) as total FROM earnings WHERE driver_id =".$_SESSION['driver_id'];
                            $result = mysqli_query($conn,$query);
                            $data = mysqli_fetch_assoc($result);
                        ?>
                     <tr>
                        <td colspan="2"><strong>Total</strong></td>
                        <td></td>
                        <td class="tex-center"><strong>$<?php echo $data['total'] ?></strong></td>
                     </tr>
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
