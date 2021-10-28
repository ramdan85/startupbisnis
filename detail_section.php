<section id="agenda" class="details">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Agenda</h2>
          <p>Detail Agenda</p>
        </div>

        <?php
            $qp = mysqli_query ($konek, "SELECT * FROM tbl_agenda ORDER BY kd_agenda ASC");
                while ($p = mysqli_fetch_array ($qp)){ 

                  if ($p['kondisi']=='Kanan'){
                    $fade = 'fade-right';
                    $kelas1 = 'col-md-4';
                    $kelas2= 'col-md-8 pt-4';
                  }
                  else {
                    $fade = 'fade-left';
                    $kelas1 = 'col-md-4 order-1 order-md-2';
                    $kelas2= 'col-md-8 pt-5 order-2 order-md-1';
                  }

                  $tgl_agenda = date('d F Y', strtotime($p['tgl_agenda']));
                  $foto='admin/ft/agenda/'.$p['foto'];
          ?>

        <div class="row content">
          <div class="<?php echo $kelas1; ?>" data-aos="<?php echo $fade; ?>">
            <img src="<?php echo $foto; ?>" class="img-fluid" alt="">
          </div>
          <div class="<?php echo $kelas2; ?>" data-aos="fade-up">
            <h3><?php echo $p['judul_agenda'] ." dimulai pada tanggal ".$tgl_agenda; ?></h3>
            <p class="fst-italic">
              <?php echo $p['deskripsi_agenda']; ?>
            </p>
          </div>
        </div>

         <?php
          }
          ?>


    <!--
        <div class="row content">
          <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
            <img src="assets/img/details-2.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
            <h3>Inkubasi bisnis usaha</h3>
            <p class="fst-italic">
              Dalam proses inkubasi ini, startup bisnis usaha akan diajarkan bagaimana cara membuat proposal usaha, kemudian bagaimana menjalankan usaha yang baik sehingga melahirkan unit usaha yang mampu bersaing dengan usaha lainnya.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Pembuatan proposal usaha</li>
              <li><i class="bi bi-check"></i> Pemberian materi pengembangan usaha</li>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4" data-aos="fade-right">
            <img src="assets/img/details-3.png" class="img-fluid" alt="">
          </div>
          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>Pameran dan Temu Bisnis</h3>
            <p class="fst-italic">Dalam pameran ini akan ditampilkan digaley berbasis online produk produk usaha dari startup. Galery pameran ini akan dapat dilihat dan diakses oleh investor diberbagai tempat. Sehingga dengan pameran online ini diharapkan startup dapat memdapatkan mitra usaha untuk bisnis mereka</p>
            <ul>
              <li><i class="bi bi-check"></i> Menampilkan produk startup pada Gelery Online</li>
              <li><i class="bi bi-check"></i> Mempertemukan startup dengan investor</li>
              <li><i class="bi bi-check"></i> Terjalin hubungan bisnis antara startup dan investor</li>
            </ul>
          </div>
        </div>

      -->

      </div>
    </section>