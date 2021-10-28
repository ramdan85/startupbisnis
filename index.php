<!DOCTYPE html>
<html lang="en">

<!-- ======= Head ======= -->
  <?php
  session_start();
  include "head.php";
  include "knk.php";
  //$email = $_SESSION["email"];
  //code untuk menghilangkan pesan error
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  ?>
<!-- End Head -->

<!-- ======= notifikasi ======= -->
  <?php
  include "notifikasi.php";
  ?>
<!-- End notifikasi -->

<body>

  <!-- ======= Header ======= -->
    <?php
    include "header.php";
    ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    <?php
    include "section_hero.php";
    ?>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
      <?php
      include "section_about.php";
      ?>
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
      <?php
      //include "section_count.php"; 
      ?>
    <!-- End Counts Section -->

    <!-- ======= Details Section ======= -->
    <?php
    include "detail_section.php"; 
    ?>
    <!-- End Details Section -->

    <!-- ======= Features Section ======= -->
      <?php 
      include "section_feature.php";
      ?>
    <!-- End Features Section -->

    <!-- ======= Gallery Section ======= -->
    <?php
    include "galery_section.php"; 
    ?>
    <!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->
    <?php
    //include "testimoni_section.php"; 
    ?>
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <?php
    include "tim_section.php"; 
    ?>
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <?php
    //include "pricing_section.php"; 
    ?>
    <!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <?php
    //include "faq_section.php"; 
    ?>
    <!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <?php
    if ($_SESSION["status"] != "login"){
        include "contact_section.php"; 
      }
    ?>
    <!-- End Contact Section -->

  </main><!-- End #main -->

    <?php
    include "footer.php"; 
    ?>

</body>

</html>