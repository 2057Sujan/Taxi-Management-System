 <!-- footer section -->
 <section class="container-fluid footer_section">
    <div class="container">
      <p>
        &copy; <?php echo date('Y')?> All Rights Reserved By
        <a href="#">Fateh Group Pty Ltd</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="assets/front/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/front/js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>


  <!-- owl carousel script -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 20,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 2
        }
      }
    });
  </script>
  <!-- end owl carousel script -->

</body>

</html>