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
                     Enter Details
                  </div>
                  <div class="card-body">
                    <form method="post" action="include/driver_form.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Details</label>
                            <input type="text" name="details" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Details">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input type="number" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount">
                        </div>
                       
                        
                        <input type="submit" value="Submit" name="add_expenses" class="btn btn-primary mt-2">
                    </form>

                  </div>
               </div>
            </div>
            <!-- Form ends -->
         </div>
      </div>
   </main>
<?php require_once 'include/footer.php'?>