<section id="startup" class="features">
  <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Startup</h2>
          <p>Startup Terdaftar</p>
        </div>

        <div class="row" data-aos="fade-left">
          <?php
            $qp = mysqli_query ($konek, "SELECT tbl_startup.nama_startup FROM tbl_startup, tbl_usr WHERE tbl_startup.email = tbl_usr.email and tbl_usr.aktif = '1' ORDER BY tbl_startup.kd_startup ASC");
                while ($p = mysqli_fetch_array ($qp)){ 
          ?>
          <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3><a href=""><?php echo $p['nama_startup']; ?></a></h3>
            </div>
          </div>

          <?php
          }
          ?>
          
      </div>
    </section>