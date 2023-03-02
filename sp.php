<?php 
include "config/koneksi.php";
session_start();
$v_sp = mysqli_query($koneksi,"SELECT * FROM v_sp where id_sp='$_GET[id_sp]'");
$data_v = mysqli_fetch_assoc($v_sp);

$t = substr($data_v['tgl_pengajuan'],0,4);
$b = substr($data_v['tgl_pengajuan'],5,2);
$h = substr($data_v['tgl_pengajuan'],8,2);

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

<?php
$alasan = $data_v['alasan'];
$no_surat_pemanggilan = $data_v['no_surat_pemanggilan']; 
if ($alasan !='' and $no_surat_pemanggilan=='') {
  $hasil = "hasil yudisium";
}else if($alasan =='' and $no_surat_pemanggilan !=''){
  $hasil = "surat pemanggilan orang tua nomer :".$data_v['no_surat_pemanggilan'];
}else if($alasan !='' and $no_surat_pemanggilan !=''){
  $hasil  = "hasil yudisium dan menindaklanjuti surat pemanggilan orang tua nomer :".' '.$data_v['no_surat_pemanggilan'];
}else{
  $hasil  = "Diisi Terlebih dahulu";
}

?>



<!DOCTYPE html>
<html>
<head>
 <script src="https://kit.fontawesome.com/bd293d113e.js" crossorigin="anonymous"></script>
 <title></title>
 <style type="text/css">
  /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
  body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;

    font: 12pt "Tahoma";
  }

  * {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
  }

  .page {
    width: 210mm;
    min-height: 297mm;

    margin: 10mm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;

    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);



  }

  .subpage {
    padding: 1cm;

    height: 297mm;
    outline: 2cm white;
  }

  @page {
    size: A4;
    margin: 0;


  }

  @media print {

    html,
    body {
      width: 210mm;
      height: 297mm;
    }

    .page {
      margin: 0;
      border: initial;
      border-radius: initial;
      width: initial;
      min-height: initial;
      box-shadow: initial;
      background: initial;
      page-break-after: always;

    }
  }
</style>
<title></title>
</head>
<body>

  <div class="book">
    <div class="page">
      <div class="subpage">
        <p style="margin-top:0pt; margin-left:60pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:14pt;"><span style="height:0pt; text-align:left; display:block; position:absolute; z-index:-65536;"><img src="data:image/png;base64,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" width="133" height="92" alt="" style="margin: 0 0 0 auto; text-align: right; display: block; "></span><span style="font-family:'Times New Roman';">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:72.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:17px;line-height:115%;font-family:"Times New Roman",serif;'>RISET, DAN TEKNOLOGI</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:72.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:17px;line-height:115%;font-family:"Times New Roman",serif;'>POLITEKNIK NEGERI CILACAP</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:72.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>JURUSAN TEKNIK INFORMATIKA</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:72.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>Jalan Dr. Soetomo No. 1, Sidakaya &ndash; CILACAP 53212 Jawa Tengah</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:72.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>Telepone: (0282) 533329, Fax: (0282) 537992</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:72.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><a href="http://www.pnc.ac.id"><span style='font-family:"Times New Roman",serif;'>www.pnc.ac.id</span></a><span style='font-family:"Times New Roman",serif;'>, Email:&nbsp;</span><a href="mailto:sekretariat@pnc.ac.id"><span style='font-family:"Times New Roman",serif;'>sekretariat@pnc.ac.id</span></a></p>
        <div style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;border:none;border-top:solid windowtext 2.25pt;padding:3.0pt 0cm 0cm 0cm;'>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:#0563C1;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Cilacap, <?php echo $h." ". $nm. " ". $t ?></span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Nomor&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <?php echo $data_v['no_sp'] ?></span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Perihal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Rekomendasi Drop Out Mahasiswa</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Kepada</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Koordinator Akademik dan Kemahasiswaan</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Politeknik Negeri Cilacap</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Di Cilacap</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Berdasarkan <?php echo $hasil ?>, Program Studi <?php echo $data_v['nama_prodi']; ?> bermaksud mengajukan rekomendasi Drop Out (DO) mahasiswa a.n. <?php echo $data_v['nama_mahasiswa'] ?>  NPM. <?php echo $data_v['npm']; ?>.</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
          <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;border:none;padding:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Demikian surat permohonan ini kami buat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</span></p>
        </div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:288.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:288.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:288.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:288.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:288.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:288.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:350.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Jurusan <?php echo $data_v['nama_jurusan']; ?></span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:350.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Ketua</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:350.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'><img src="form/ttd_pegawai/<?php echo $data_v['ttd_pegawai'];?>"  width="170px" height="150px"></span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:350.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><u><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'><?php echo $data_v['nama_pegawai']; ?></span></u></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:.0001pt;margin-left:350.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>NIDN <?php echo $data_v['npak']; ?></span></p>
      </body>

      <?php if ($_SESSION['jabatan']=="Bagian Jurusan"): ?>
        <script>
          window.print()
        </script>
      <?php endif ?>

      <script src="AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
      <script src="AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
      </html>