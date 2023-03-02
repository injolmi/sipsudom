<?php
include '../../config/koneksi.php';
?>

<?php

include "../../AdminLTE/sidebar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">
  <title>SIPSUDOM | Verifikasi Pengajuan Drop Out</title>
</head>
<body>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Verifikasi Pengajuan Surat Keterangan Drop Out</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a>Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengajuan Surat Keterangan Drop Out</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>
                        <center>No</center>
                      </th>
                      <th>
                        <center>Id Surat Pengajuan</center>
                      </th>
                      <th>
                        <center>No Surat Pengajuan</center>
                      </th>
                      <th>
                        <center>Nama Mahasiswa</center>
                      </th>
                      <th>
                        <center>Jurusan</center>
                      </th>
                      <th>
                       <center>Tanggal Pengajuan</center>
                     </th>
                     <th>
                       <center>Status</center>
                     </th>
                     <th>
                       <center>Aksi</center>
                     </th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                  $i=1;
                  $sqlGet = "SELECT * FROM v_sp WHERE status='2'";
                  $query = mysqli_query($koneksi, $sqlGet);

                  while($data = mysqli_fetch_array($query)){
                    if ($data['status'] == 0) {
                      $status = 'Belum Diverifikasi';
                      $warna = 'warning';
                    }
                    else if ($data['status'] == 1) {
                      $status = 'Diverifikasi Ketua Jurusan';
                      $warna = 'success';
                    }else if ($data['status'] == 2) {
                      $status = 'Menunggu Konfirmasi BAAK';
                      $warna = 'warning';
                    }
                    else {
                      $status = 'Pengajuan Diterima oleh BAAK';
                      $warna = 'success';
                    }


                    $t = substr($data['tgl_pengajuan'],0,4);
                    $b = substr($data['tgl_pengajuan'],5,2);
                    $h = substr($data['tgl_pengajuan'],8,2);

                    if($b == "01"){
                     $nm = "Januari";
                   } elseif($b == "02"){
                     $nm = "Februari";
                   } elseif($b == "03"){
                     $nm = "Maret";
                   } elseif($b == "04"){
                     $nm = "April";
                   } elseif($b == "05"){
                     $nm = "Mei";
                   } elseif($b == "06"){
                     $nm = "Juni";
                   } elseif($b == "07"){
                     $nm = "Juli";
                   } elseif($b == "08"){
                     $nm = "Agustus";
                   } elseif($b == "09"){
                     $nm = "September";
                   } elseif($b == "10"){
                     $nm = "Oktober";
                   } elseif($b == "11"){
                     $nm = "November";
                   } elseif($b == "12"){
                     $nm = "Desember";
                   }

                   ?>
                   <tr>
                    <th>
                      <center><?= $i++ ?></center>
                    </th>

                    <td>
                      <center>
                        <?php echo $data['id_sp']; ?>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?php echo $data['no_sp']; ?>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?php echo $data['nama_mahasiswa']; ?>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?php echo $data['nama_jurusan']; ?>
                      </center>
                    </td>
                    <td>
                      <center><?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></center>
                    </td>

                    <td>
                      <center>
                        <span class="badge badge-<?php echo $warna ?>"><?php echo $status ?></span>
                      </center>
                    </td>
                    <td>
                     <center>
                      <a href="function.php?id_sp=<?php echo $data["id_sp"]; ?>" 
                        onclick="return confirm('Apakah anda yakin akan melakukan verifikasi?');" class="btn btn-success"><i class="fas fa-check-circle"></i>Terima Pengajuan</a> ||
                        <a data-toggle="modal" data-target="#modal-detail<?php echo $data["id_sp"]; ?>" class="btn btn-warning" ><i class="fas fa-folder-open"></i> Detail</a>
                      </center>
                      <!-- modal Detail -->
                      <div class="modal fade" id="modal-detail<?php echo $data['id_sp']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Detail Data Surat Pengajuan Drop Out Mahasiswa</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="" action="">
                                <div class="form-group">
                                  <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                      <b>Id Surat Pengajuan</b> <a class="float-right"><?php echo $data['id_sp'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>No Surat Pengajuan</b> <a class="float-right"><?php echo $data['no_sp'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Nama Mahasiswa</b> <a class="float-right"><?php echo $data['nama_mahasiswa'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Ketua / Koordinator Jurusan</b> <a class="float-right"><?php echo $data['nama_pegawai'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Jurusan</b> <a class="float-right"><?php echo $data['nama_jurusan'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Program Studi</b> <a class="float-right"><?php echo $data['nama_prodi'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Alasan</b> <a class="float-right"><?php echo $data['alasan'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>No Surat Pemanggilan</b> <a class="float-right"><?php echo $data['no_surat_pemanggilan'] ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Tanggal Surat Keterangan</b> <a class="float-right"><?php echo $h." ". $nm. " ". $t ?></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>status</b> <a class="float-right"><?php echo $status ?></a>
                                    </li>
                                    <?php if($data['surat_pemanggilan_ortu']!='' and $data['berita_acara']==''){ ?>
                                     <li class="list-group-item">
                                      <b>Surat Pemanggilan Orang Tua</b> <a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['surat_pemanggilan_ortu'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                                    </li>
                                  <?php }elseif($data['surat_pemanggilan_ortu']=='' and $data['berita_acara']!=''){ ?>
                                    <li class="list-group-item">
                                      <b>Berita Acara</b><a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['berita_acara'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                                    </li>
                                  <?php }else{ ?>
                                    <li class="list-group-item">
                                      <b>Surat Pemanggilan Orang Tua</b> <a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['surat_pemanggilan_ortu'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Berita Acara</b><a class="float-right" target="_blank" href="../dokumen/<?php echo $data ['berita_acara'] ?>"><img src="../../pdf.png" width="100" height="50"></a>
                                    </li>
                                  <?php } ?>

                                </ul>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    </div>

                  </td>
                </tr>
              <?php } ?>
            </tbody>
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

<?php include "../../AdminLTE/footer.php"; ?>

<!-- jQuery -->
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>
</html>