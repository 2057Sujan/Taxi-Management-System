<?php require_once 'include/header.php'?>
<?php 
  require_once '../include/dbconnect.php';

  $query = "SELECT * FROM driver WHERE driver_id=".$_GET['id'];
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
                     Enter Driver Details
                  </div>
                  <div class="card-body">
                    <form method="post" action="include/admin_form.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Driver name</label>
                            <input type="text" name="driver_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['driver_name']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Driver Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['email']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Driver password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="<?php echo $data['password']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Driver Type</label>
                            <select name="type" class="form-control">
                              <option value="">----------</option>
                              <option value="50-50">50-50</option>
                              <option value="rent">Rent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Driver Expereince</label>
                            <input type="number" name="expereince" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['experience']?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <input type="submit" value="Update" name="update_driver" class="btn btn-primary mt-2">
                    </form>

                  </div>
               </div>
            </div>
            <!-- Form ends -->
         </div>
      </div>
   </main>
<?php require_once 'include/footer.php'?>