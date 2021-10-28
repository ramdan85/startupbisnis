<section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Leader</h2>
          <p>Startup Leader</p>
        </div>

        <div class="row" data-aos="fade-left">

          <?php
            $qp = mysqli_query ($konek, "SELECT tbl_startup.nama_startup, tbl_tim_startup.nama, tbl_tim_startup.jabatan, tbl_tim_startup.fb, tbl_tim_startup.twiter, tbl_tim_startup.instagram, tbl_tim_startup.linkedin, tbl_tim_startup.foto FROM tbl_tim_startup, tbl_startup WHERE tbl_startup.kd_startup = tbl_tim_startup.kd_startup ORDER BY tbl_tim_startup.nama ASC");
                while ($p = mysqli_fetch_array ($qp)){ 
            ?>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="admin/ft/foto_tim/<?php echo $p['foto']; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $p['nama']; ?></h4>
                <span><?php echo $p['jabatan']." ".$p['nama_startup']; ?></span>
                <!--<div class="social">
                  <a href="<?php echo $p['twiter']; ?>"><i class="bi bi-twitter"></i></a>
                  <a href="<?php echo $p['fb']; ?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?php echo $p['instagram']; ?>"><i class="bi bi-instagram"></i></a>
                  <a href="<?php echo $p['linkedin']; ?>"><i class="bi bi-linkedin"></i></a>
                </div>-->
              </div>
            </div>
          </div>

          <?php
          }
          ?>

        </div>

      </div>
    </section>