<?php require_once 'include/header.php'?>
<?php if(isset($_SESSION['success'])):?>
  <script>
    alert("Booking successfull, driver will call you!")
  </script>
<?php unset($_SESSION['success']); endif?>
<?php 
require_once 'include/dbconnect.php';
  $query = "SELECT * FROM driver WHERE status = 0";
  $result = mysqli_query($conn,$query);
?>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section" id="index">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7 ">
            <div class="box">
              <div class="detail-box">
                <h4>
                  Welcome to
                </h4>
                <h1>
                Fateh Group Pty Ltd
                </h1>
              </div>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">

                    <div class="img-box">
                      <img src="assets/front/images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="assets/front/images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="assets/front/images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="assets/front/images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="assets/front/images/slider-img.png" alt="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-box">
                <a href="" class="btn-1">
                  Read More
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-5 ">
            <div class="slider_form">
              <h4>
                Get A Taxi Now
              </h4>
              <form action="include/form.php" method="post">
                <select name="driver">
                  <option value="null">Select Driver</option>
                  <?php foreach($result as $data):?>
                    <option value="<?php echo $data['driver_id'] ?>"><?php echo $data['driver_name']?></option>
                  <?php endforeach?>
                </select>
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="pickup" placeholder="Pick Up Location" required>
                <input type="text" name="drop" placeholder="Drop Location" required>
                <div class="btm_input">
                  <input type="text" name="phone" placeholder="Phone Number" required>
                  <input type="submit" class="btn btn-warning" value="Book now" name="book">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding" id="about">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-5 offset-lg-2 offset-md-1">
          <div class="detail-box">
            <h2>
              About <br>
              Fateh Group Pty Ltd
            </h2>
            <p>
            We are a Fateh Group Pty Ltd taxi booking company dedicated to providing our customers with the most efficient and reliable transport services. Our mission is to make travelling easier and more convenient for everyone. We offer a wide range of services including airport transfers, local transfers, corporate transfers and special event bookings. 
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="assets/front/images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- service section -->
  <!-- end info section -->
<?php require_once 'include/footer.php'?>
 