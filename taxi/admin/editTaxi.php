<?php require_once 'include/header.php'?>
<?php
    require_once '../include/dbconnect.php';
    $query = "SELECT * FROM taxi WHERE taxi_id=".$_GET['id'];
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
?>
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
        <!-- Form starts -->
         <h1 class="mt-4">Driver</h1>
         <div class="row">
            <div class="col-xl-6">
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-list me-1"></i>
                     Enter Taxi Details
                  </div>
                  <div class="card-body">
                    <form method="post" action="include/admin_form.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Taxi Number</label>
                            <input type="text" name="taxi_number" class="form-control" value="<?php echo $data['taxi_number']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Made year</label>
                            <input type="number" name="year" class="form-control" value="<?php echo $data['made_year']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="0">Available</option>
                                <option value="1">N/A</option>
                            </select>
                        </div>
                        <input type="hidden" name="taxi_id" class="form-control" value="<?php echo $data['taxi_id']?>">
                        <input type="submit" value="Submit" name="update_taxi" class="btn btn-primary mt-2">
                    </form>

                  </div>
               </div>
            </div>
            <!-- Form ends -->
         </div>
      </div>
   </main>
<?php require_once 'include/footer.php'?>