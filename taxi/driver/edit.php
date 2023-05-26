<?php require_once 'include/header.php'?>
<?php 
    $query = "SELECT * FROM booking WHERE book_id=".$_GET['id'];
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
?>
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
        <!-- Form starts -->
         <h1 class="mt-4">Booking </h1>
         <div class="row">
            <div class="col-xl-6">
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-list me-1"></i>
                  </div>
                  <div class="card-body">
                    <form method="post" action="include/driver_form.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Name</label>
                            <input type="text" name="room_num" class="form-control" value="<?php echo $data['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Customer Phone</label>
                            <input type="text" name="bed_type" class="form-control" value="<?php echo $data['phone']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pick up location</label>
                            <input type="text" name="size" class="form-control" value="<?php echo $data['pickup']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Drop up location</label>
                            <input type="text" name="lo" class="form-control"value="<?php echo $data['dropLocation']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="status" class="form-control">
                                <option> Select status</option>
                                <option value="not_accepted">Not accepted</option>
                                <option value="accept">Accept</option>
                                <option value="cancel">Cancel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price">
                        </div>
                        <?php
                            $sql = "SELECT * FROM taxi WHERE taxi_status = 0";
                            $q = mysqli_query($conn,$sql);
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Taxi</label>
                            <select class="form-control" name="taxi">
                                <option value="">SELECT TAXI</option>
                                <?php foreach ($q as $datas):?>
                                    <option value="<?php echo $datas['taxi_id']?>"><?php echo $datas['taxi_number']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <input type="hidden" name="book_id" value="<?php echo $data['book_id']?>">
                        <input type="submit" value="Update" name="book_ride" class="btn btn-primary mt-2">
                    </form>

                  </div>
               </div>
            </div>
            <!-- Form ends -->
         </div>
      </div>
   </main>
<?php require_once 'include/footer.php'?>