<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<?php 
session_start();
include 'head.php';
include "../knk.php";
if ($_SESSION["level"]=='admin')
  { 
    $email = mysqli_real_escape_string($konek, $_GET['email']);
  }
else {
  $email = $_SESSION["email"];
}
?>
<!-- Head -->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php 
  include 'navbar.php';
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
            <h1>Data Startup</h1>
          </div>
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <?php 
        if ($email<>'')
        { 
        ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-produk">
             <i class="fas fa-plus-square"> Startup/Ide Bisnis</i>
        </button>
        <?php 
        }
        ?>
      </div>
    <div class="modal fade" id="modal-produk">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Startup </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="proses_tambah_startup.php" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $email; ?>" name="email" >
              <label>Nama Startup:</label>
              <input type="text" class="form-control" id="" name='nama_startup' placeholder="Nama Startup">
              <label>Deskripsi Startup:</label>
              <textarea id="" name="deskripsi_startup" class="form-control" rows="5" placeholder="Deskripsi Startup ....">
              </textarea>
              <label>Alamat:</label>
              <input type="text" class="form-control" id="" name='alamat' placeholder="Alamat">
              <label>Bidang:</label>
              <input type="text" class="form-control" id="" name='bidang' placeholder="Bidang">
              <label>Website:</label>
              <input type="text" class="form-control" id="" name='website' placeholder="Link Website">
              <label>Media Sosial:</label>
              <input type="text" class="form-control" id="" name='media_sosial' placeholder="Link Media Sosial">
              <label>Foto Logo <?php echo $_SESSION["nama_profil"]; ?>: (JPG/JPEG/PNG) Max:2MB</label>
              <input type="file" name="foto" class="form-control" accept="image/png, image/jpeg, image/jpg">
              <hr>
              <button class="btn btn-primary" type="submit" name="simpan" value="simpan">Simpan</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Detail Data Startup</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Startup</th>
                    <th>Bidang</th>
                    <th>Website</th>
                    <th>Media Sosial</th>
                     <?php 
                      if ($email<>'')
                      { 
                      ?>
                    <th>Aksi</th>
                    <?php 
                      }
                    ?>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($_SESSION["level"]=='admin')
                        {
                          $qp = mysqli_query ($konek, "SELECT * FROM tbl_startup ORDER BY kd_startup ASC");
                           
                        }
                      else
                        {
                          $qp = mysqli_query ($konek, "SELECT * FROM tbl_startup WHERE email = '$email' ORDER BY kd_startup ASC");
                           
                        }
                        while ($p = mysqli_fetch_array ($qp)){
                      ?>
                  <tr>
                    <td><?php echo $p['nama_startup']; ?></td>
                    <td><?php echo $p['bidang']; ?></td>
                    <td><?php echo $p['website']; ?></td>
                    <td><?php echo $p['media_sosial']; ?></td>
                    <?php 
                      if ($email<>'')
                      { 
                    ?>
                    <td>
                      <a href ="profil_startup.php?kd_startup=<?php echo $p['kd_startup']; ?>"><button type="button" class="btn btn-success"><i class="fas fa-edit">Profil</i></button></a>
                      <a href ="tim.php?kd_startup=<?php echo $p['kd_startup']; ?>"><button type="button" class="btn btn-info"><i class="fas fa-plus-square"> Tim</i></button></a>
                      <a href ="produk.php?kd_startup=<?php echo $p['kd_startup']; ?>"><button type="button" class="btn btn-warning"><i class="fas fa-plus-square"> Produk</i></button></a>
                      <a href="proses_hapus_startup.php?kd_startup=<?=$p['kd_startup']; ?>" onclick="return confirm('Anda yakin mau menghapus startup ini?, jika anda menghapus maka semua tim dan produk yang terkait startup ini akan terhapus')"><button type="button" class="btn btn-danger"><i class="fas fa-minus-square"> Hapus</i></button></a>
                    </td>
                    <?php 
                      }
                    ?>
                  </tr>
                  <?php
                  } 
                  ?>
                  </tbody>
                  <!--<tfoot>
                  <tr>
                    <th>Nama Startup</th>
                    <th>Bidang</th>
                    <th>Website</th>
                    <th>Media Sosial</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>-->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });
</script>
</body>
</html>


