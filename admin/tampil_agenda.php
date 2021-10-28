<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php 
include 'head.php';
include "../knk.php";
session_start();
$email = $_SESSION["email"];
?>
<!-- Head -->
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php 
  include 'navbar.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
  include 'aside.php';
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
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agenda</h1>
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
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

              <!-- timeline item 
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                </div>
              </div>
              END timeline item -->
              <!-- timeline item
              <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-sm">View comment</a>
                  </div>
                </div>
              </div>
               END timeline item -->
              <!-- timeline time label
              <div class="time-label">
                <span class="bg-green">3 Jan. 2014</span>
              </div>
               /.timeline-label -->
              <!-- timeline item
              <div>
                <i class="fa fa-camera bg-purple"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                  <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                  <div class="timeline-body">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                  </div>
                </div>
              </div>
               END timeline item -->
              <!-- timeline item
              <div>
                <i class="fas fa-video bg-maroon"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>

                  <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                  <div class="timeline-body">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen></iframe>
                    </div>
                  </div>
                  <div class="timeline-footer">
                    <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                  </div>
                </div>
              </div>
               END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

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
