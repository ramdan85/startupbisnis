<section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Galeri</h2>
          <p>Galeri Produk Startup</p>
        </div>

        <div class="row no-gutters" data-aos="fade-left">

          <?php
            $qp = mysqli_query ($konek, "SELECT * FROM tbl_produk_startup ORDER BY kd_produk ASC");
                while ($p = mysqli_fetch_array ($qp)){ 
          ?>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
              <label><?php echo $p['nama_produk']; ?> </label>
              <a href="admin/ft/galeri_produk/<?php echo $p['foto_produk']; ?>" class="gallery-lightbox">
                <img src="admin/ft/galeri_produk/<?php echo $p['foto_produk']; ?>" alt="" class="img-fluid">
              </a>
              <label>Harga: Rp. <?php echo number_format($p['harga_produk'],0,',','.');?></label>
            </div>
          </div>

          <?php
          }
          ?>

          <!--
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
              <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
              <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
              <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
              <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
              <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
              <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
              <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>
        -->

        </div>

      </div>
    </section>