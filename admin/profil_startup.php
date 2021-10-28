<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php 
include 'head.php';
include "../knk.php";
session_start();
$kd_startup = mysqli_real_escape_string($konek, $_GET['kd_startup']);
$qs = mysqli_query ($konek, "SELECT * FROM tbl_startup WHERE kd_startup = $kd_startup");
  while ($s = mysqli_fetch_array ($qs)){ 
    $email = $s['email'];
    $nama_startup = $s['nama_startup'];
    $bidang = $s['bidang'];
    $deskripsi_startup = $s['deskripsi_startup'];
    $alamat = $s['alamat'];
    $website = $s['website'];
    $media_sosial = $s['media_sosial'];
    $foto = $s['foto'];
  }
?>
<!-- Head -->
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php 
    include 'navbar.php';
    $status = $_SESSION["status"];
  if ($status != "login"){
      echo "

            <script type='text/javascript'>
             window.location.replace('../index.php?notif=11&#login-daftar');
            </script>
                                            
        ";
    //header("location:../index.php?notif=11&#login-daftar");
  }
  ?>
  <!-- /.navbar -->

  <!-- ======= notifikasi ======= -->
  <?php
  include "notifikasi.php";
  echo $notif;
  ?>
<!-- End notifikasi -->

  <!-- Main Sidebar Container -->
  <?php 
  include 'aside.php';
  ?>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile <?php echo $nama_startup; ?></h1>
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="ft/logo_startup/<?php echo $foto; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $nama_startup; ?></h3>

                <p class="text-muted text-center"><?php echo $bidang; ?></p>

                <!--<ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>-->

                <a href="produk.php?kd_startup=<?php echo $kd_startup; ?>" class="btn btn-primary btn-block"><b>Produk</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang Kami</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Deskripsi</strong>

                <p class="text-muted">
                  <?php echo $deskripsi_startup; ?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted"><?php echo $alamat; ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Link Website</strong>

                <p class="text-muted"><?php echo $alamat; ?></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Link Media Sosial</strong>

                <p class="text-muted"><?php echo $media_sosial; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!--<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>-->
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Agenda</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Profil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <?php 
                  /*
                  ?>

                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>


                  <?php 
                  */
                  ?>

                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <?php
                      $qp = mysqli_query ($konek, "SELECT * FROM tbl_agenda ORDER BY kd_agenda ASC");
                        while ($p = mysqli_fetch_array ($qp)){ 
                        $tgl_agenda = date('d F Y', strtotime($p['tgl_agenda']));
                          ?>

                        <div class="time-label">
                          <span class="bg-red"><?php echo $tgl_agenda; ?></span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-envelope bg-blue"></i>
                          <div class="timeline-item">
                            <!--<span class="time"><i class="fas fa-clock"></i> 12:05</span>-->
                            <h3 class="timeline-header"><a href="#"><?php echo $p['judul_agenda']; ?></a>, Deskripsi Agenda:</h3>

                            <div class="timeline-body">
                              <?php echo $p['deskripsi_agenda']; ?>
                            </div>
                            <!--<div class="timeline-footer">
                              <a class="btn btn-primary btn-sm">Bergabung</a>
                              <a class="btn btn-danger btn-sm">Batal</a>
                            </div>-->
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                          <i class="fa fa-camera bg-purple"></i>
                          <div class="timeline-item">
                            <!--<span class="time"><i class="fas fa-clock"></i> 2 days ago</span>-->
                            <h3 class="timeline-header"><!--<a href="#">Mina Lee</a>--> Gambar Pendukung</h3>
                            <div class="timeline-body">
                              <img src="ft/agenda/<?php echo $p['foto']; ?>" width="100%" height="600" alt="...">
                            </div>
                          </div>
                        </div>
                      <!-- END timeline item -->

                      <?php
                        } 
                      ?>

                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="" action="proses_update_profil_startup.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" value="<?php echo $kd_startup; ?>" name="kd_startup" >
                      <input type="hidden" value="<?php echo $email; ?>" name="email" >
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name = "nama_startup" placeholder="Nama Startup" value="<?php echo $nama_startup; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Deskripsi Startup</label>
                        <div class="col-sm-10">
                          <textarea id="inputExperience" name="deskripsi_startup" class="form-control" rows="5" placeholder="Deskripsi Startup ...."><?php echo $deskripsi_startup; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" name='alamat' value="<?php echo $alamat; ?>" placeholder="Alamat">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Bidang</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" name='bidang' placeholder="Bidang" value="<?php echo $bidang; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" name='website' placeholder="Link Website" value="<?php echo $website; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Media Sosial</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" name='media_sosial' placeholder="Link Media Sosial" value="<?php echo $media_sosial; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                          <img class="profile-user-img img-fluid img-circle"
                           src="ft/logo_startup/<?php echo $foto; ?>"
                           alt="User profile picture">
                          <input type="file" name="foto" class="form-control" value="<?php echo $foto; ?>" accept="image/png, image/jpeg, image/jpg">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="update" value="update" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- footer -->
  <?php
    include 'footer.php';
  ?>
  <!-- end footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
