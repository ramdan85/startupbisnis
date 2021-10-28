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
    $nama_startup = $s['nama_startup'];
  }

    if(isset ($_GET ["modal_kd_kategori"])){
      $modal_kd_kategori = $_GET ["modal_kd_kategori"];
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
            <h1>Produk <?php echo $nama_startup; ?></h1>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-produk">
            <i class="fas fa-plus-square"> Produk <?php echo $nama_startup; ?></i>
        </button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-kategori">
            <i class="fas fa-plus-square"> Kategori</i>
        </button>
    </div>
    <div class="modal fade" id="modal-produk">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Produk <?php echo $nama_startup; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="proses_simpan_produk.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name='kd_startup' value="<?php echo $kd_startup; ?>">
              <label>Kode Produk:</label>
              <input type="text" class="form-control" id="" name='kd_produk' placeholder="Kode Produk">
              <label>Kategori:</label>
              <select name='kd_kategori' class="form-control">
                  <?php
                      $qk = mysqli_query ($konek, "SELECT * FROM tbl_kategori_produk ORDER BY kd_kategori ASC");
                        while ($k = mysqli_fetch_array ($qk)){ 
                      ?>
                  <option value="<?php echo $k['kd_kategori']; ?>"><?php echo $k['kategori']; ?></option>
                  <?php
                  } 
                  ?>

              </select>
              <label>Nama Produk:</label>
              <input type="text" class="form-control" id="" name = 'nama_produk' placeholder="Nama Produk">
              <label>Deskripsi Produk:</label>
              <textarea id="" name="deskripsi_produk" class="form-control" rows="5" placeholder="Deskripsi Produk ....">
              </textarea>
              <label>Harga Produk:</label>
              <input type="number" class="form-control" id="" name = 'harga_produk' placeholder="Harga Produk">
              <label>Foto Produk: (JPG/JPEG/PNG) Max:2MB</label>
              <input type="file" id="" name="foto_produk" class="form-control" accept="image/png, image/jpeg, image/jpg">
              <hr>
              <button class="btn btn-primary" type="submit" name="simpan" value="simpan">Simpan</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-kategori">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Kategori Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="proses_tambah_kategori.php" method="post">
              <label>Kategori:</label>
              <input type="hidden" name='kd_startup' value="<?php echo $kd_startup; ?>">
              <input type="text" class="form-control" id="" name = "kategori" placeholder="Kategori">
              <hr>
              <button class="btn btn-primary" type="submit" name="simpan" value="simpan">Tambah</button>
            </form>
              <hr>
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kategori</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                      $qk = mysqli_query ($konek, "SELECT * FROM tbl_kategori_produk ORDER BY kd_kategori ASC");
                        while ($k = mysqli_fetch_array ($qk)){ 
                      ?>

                  <tr>
                    <td><?php echo $k['kategori']; ?></td>
                    <td>
                      <a href ="?kd_startup=<?php echo $kd_startup; ?>&modal_kd_kategori=<?php echo $k['kd_kategori']; ?>"><button type="button" class="btn btn-primary"><i class="fas fa-plus-square"> Edit Kategori</i></button></a>
                    </td>
                  </tr>

                  <?php
                  } 
                  ?>

                  
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                <?php 
                  if ($modal_kd_kategori<>''){
                    $qk = mysqli_query ($konek, "SELECT * FROM tbl_kategori_produk WHERE kd_kategori = $modal_kd_kategori");
                        while ($k = mysqli_fetch_array ($qk)){
                          $modal_kategori = $k['kategori'];
                        }
                ?>
                <hr>
                <form action="proses_ubah_kategori.php" method="post">
                  <label>Kategori:</label>
                  <input type="hidden" name='kd_startup' value="<?php echo $kd_startup; ?>">
                  <input type="hidden" name='kd_kategori' value="<?php echo $modal_kd_kategori; ?>">
                  <input type="text" class="form-control" id="" name = "kategori" value="<?php echo $modal_kategori; ?>">
                  <hr>
                  <button class="btn btn-primary" type="submit" name="ubah" value="ubah">Ubah</button>
                </form>
                <hr>
                <?php
                  }
                ?>

                <h3 class="card-title">Detail Data Produk <?php echo $nama_startup; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode Produk</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga Produk</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                      $qp = mysqli_query ($konek, "SELECT * FROM tbl_produk_startup WHERE kd_startup = $kd_startup ORDER BY kd_produk ASC");
                        while ($p = mysqli_fetch_array ($qp)){ 
                          $qk = mysqli_query ($konek, "SELECT * FROM tbl_kategori_produk WHERE kd_kategori = $p[kd_kategori]");
                             while ($k = mysqli_fetch_array ($qk)){
                              $kategori = $k['kategori'];
                             }
                      ?>
                  <tr>
                    <td><?php echo $p['kd_produk']; ?></td>
                    <td><?php echo $p['nama_produk']; ?></td>
                    <td><?php echo $kategori; ?></td>
                    <td><?php echo $p['harga_produk']; ?></td>
                    <td>
                      <a href ="proses_hapus_produk.php?kd_startup=<?php echo $p['kd_startup']; ?>&kd_produk=<?php echo $p['kd_produk']; ?>" onclick="return confirm('Anda yakin mau menghapus produk ini ?')"><button type="button" class="btn btn-danger"><i class="fas fa-minus-square"> Hapus Produk</i></button></a>
                    </td>
                  </tr>
                  <?php
                  } 
                  ?>

                  </tbody>
                 <!-- <tfoot>
                  <tr>
                    <th>Kode Produk</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga Produk</th>
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


