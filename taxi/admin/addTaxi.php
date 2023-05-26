<?php require_once 'include/header.php'?>
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
                            <input type="text" name="taxi_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Taxi Number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Made year</label>
                            <input type="number" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Made year">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <input type="submit" value="Submit" name="add_taxi" class="btn btn-primary mt-2">
                    </form>

                  </div>
               </div>
            </div>
            <!-- Form ends -->
         </div>
      </div>
   </main>
<?php require_once 'include/footer.php'?>