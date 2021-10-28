<?php echo $notif;?>
<section id="login-daftar" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <p>Login / Register</p>
        </div>

        <div class="row">
          
          <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="section-title" data-aos="fade-up">
            <h2>Login</h2>
          </div>
            <div class="info">
              <form action="cek_akun.php" method="post">
                <div class="col-md-9 form-group">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="col-md-9 form-group">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="g-recaptcha" data-sitekey="6LddUAsbAAAAAMsqVPVv7fBQ-GiT3v5E7nfRqpe3"></div>
                <div class="text-left"><button type="submit" class="btn btn-success">Login</button></div>
                <span class="helper-text"><a href="lupa_password.php">Lupa password?</a></span>
              </form>
            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <div class="section-title" data-aos="fade-up">
                  <h2>Register</h2>
            </div>

            <form action="proses_registrasi.php" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="nama_startup_perusahaan" id="" placeholder="Nama Startup / Perusahaan / Judul Ide Bisnis " required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="profil_singkat_startup_perusahaan" rows="5" placeholder="Deskripsi Singkat Startup / Perusahaan / Deksripsi Ide Bisnis" required></textarea>
              </div>
               
                <p>Pilih Kategori Pendaftar:
                    <input type="radio" id="" name="level" value="startup"> Startup
                    <input type="radio" id="" name="level" value="investor"> Investor
                </p>
              <div class="text-left"><button type="submit" class="btn btn-primary">Register</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>