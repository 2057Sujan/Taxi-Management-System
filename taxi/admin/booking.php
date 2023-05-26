<?php require_once 'include/header.php'?>
<?php 
    $query = "SELECT * FROM booking,driver WHERE booking.driver_id = driver.driver_id";
    $result = mysqli_query($conn,$query);
?>
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
      <h1 class="mt-4">Booking Table</h1>
        <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
            </div>
        <?php endif?>
        <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-table me-1"></i>
               All Bookings
            </div>
            <!-- Table start -->
            <div class="card-body">
                <table id="datatablesSimple">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Pickup locaiton</th>
                        <th>Drop locaiton</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Booker Driver</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Pickup locaiton</th>
                        <th>Drop locaiton</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Booked Driver</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($result as $i => $data):?>
                     <tr>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $data['name']?></td>
                        <td><?php echo $data['phone']?></td>
                        <td><?php echo $data['pickup']?></td>
                        <td><?php echo $data['dropLocation']?></td>
                        <td><?php echo $data['date']?></td>
                        <td><?php echo $data['book_status']?></td>
                        <td><?php echo $data['driver_name']?></td>

                        <td>
                            <a href="javascript:delete_id(<?php echo $data['book_id'];?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
        window.location.href = 'booking.php?delete_id=' + id;
    }
}
</script>


<?php require_once 'include/footer.php'?>
