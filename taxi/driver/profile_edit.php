<?php require_once 'include/header.php'?>
<?php
    require_once '../include/dbconnect.php';
    $id = $_SESSION['driver_id'];
    $query = "SELECT * FROM driver WHERE driver_id = '$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
?>
<div id="layoutSidenav_content">
    <div class="container">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../assets/front/images/drivers/<?php echo $data['image']?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4><?php echo $data['driver_name']?></h4>
                                    <p class="text-secondary mb-1">Driver</p>
                                    <p class="text-muted font-size-sm">Type: <?php echo $data['type']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form method="post" action="include/driver_form.php">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control" value=" <?php echo $data['driver_name']?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email" class="form-control" value=" <?php echo $data['email']?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="password" class="form-control" value=" <?php echo $data['password']?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Expereince</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="expereince" class="form-control" value=" <?php echo $data['experience']?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Type</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select name="type" class="form-control">
                                            <option value="">----------</option>
                                            <option value="50-50">50-50</option>
                                            <option value="rent">Rent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Status</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-control" name="status">
                                            <option>Select your status</option>
                                            <option value="1">N/A</option>
                                            <option value="0">Available</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" name="update_profile" class="btn btn-primary px-4" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'include/footer.php'?>