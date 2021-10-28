<header id="header" class="fixed-top d-flex align-items-center header-transparent">
<div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php"><span>Startup Bisnis</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#alur-pendaftaran">Alur Pendaftaran</a></li>
          <li><a class="nav-link scrollto" href="#agenda">Agenda</a></li>
          <li><a class="nav-link scrollto" href="#startup">Startup</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galeri Produk</a></li>
          <li><a class="nav-link scrollto" href="#team">Leader Startup</a></li>
          <!--<li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>-->
          <!--<li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>-->
          <?php 
          if ($_SESSION["status"] != "login"){
          ?>
          <li><a class="nav-link scrollto" href="#login-daftar">Login/Register</a></li>
          <?php 
          }
          else {
          ?>
          <li><a class="nav-link scrollto" href="admin/">Beranda</a></li>
          <?php 
          }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>