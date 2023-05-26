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
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="../assets/front/images/drivers/<?php echo $data['image']?>" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $data['driver_name']?></h4>
                                    <p class="text-secondary mb-1">Driver</p>
                                    <p class="text-muted font-size-sm">Type: <?php echo $data['type']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $data['driver_name']?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $data['email']?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Expereince</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $data['experience']?> years
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php if($data['status'] == 1):?>
                                    <button class="btn btn-danger btn-sm">N/A</button>
                                <?php else:?>
                                    <button class="btn btn-success btn-sm">Available</button>
                                <?php endif?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="profile_edit.php">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'include/footer.php'?>