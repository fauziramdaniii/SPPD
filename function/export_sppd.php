<?php
ob_start();
// dependency

require_once("../koneksi.php");
require_once("../vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

// buat nama temp baru untuk file xlsx, get data db
$nama = "";
if (isset($_GET['kode'])) {
  // query 1
  $query = mysqli_query($conn, "SELECT `IdSPPD`, pegawai.Nama, pegawai.NIP, pegawai.Golongan 
        as 'Pangkat', pegawai.jabatan, Biaya, Maksud, Angkut, TempBerangkat, TempTujuan, Lama, `TanggalBerangkat`, TanggalKembali,spt.Tanggal as 'TanggalDikeluarkan', spt.NomorS, sppd.Keterangan, sppd.KodeRek
        FROM `sppd` inner join spt on spt.IdSPT = sppd.IdSPT inner join pegawai on pegawai.IdPegawai = spt.Kepada 
        WHERE IdSPPD = '{$_GET['kode']}}'")->fetch_assoc();

  echo $query['TanggalDikeluarkan'];

  $query_pengikut = $conn->query("SELECT pegawai.Nama, pegawai.NIP from sppd inner join spt on spt.IdSPT = sppd.IdSPT 
        inner join pegawai on spt.kepada2 = pegawai.IdPegawai where IdSPPD = '{$_GET['kode']}'")->fetch_assoc();

  $query_pengikut2 = $conn->query("SELECT pegawai.Nama, pegawai.NIP from sppd inner join spt on spt.IdSPT = sppd.IdSPT 
        inner join pegawai on spt.kepada3 = pegawai.IdPegawai where IdSPPD = '{$_GET['kode']}'")->fetch_assoc();

  $query_pengikut3 = $conn->query("SELECT pegawai.Nama, pegawai.NIP from sppd inner join spt on spt.IdSPT = sppd.IdSPT 
        inner join pegawai on spt.kepada4 = pegawai.IdPegawai where IdSPPD = '{$_GET['kode']}'")->fetch_assoc();
  if (empty($query_pengikut)) {
    $pengikut = "";
    $nip_pengikut = "";
  } else {
    $pengikut = $query_pengikut['Nama'];
    $nip_pengikut = $query_pengikut['NIP'];
  }

  if (empty($query_pengikut2)) {
    $pengikut2 = "";
    $nip_pengikut2 = "";
  } else {
    $pengikut2 = $query_pengikut2['Nama'];
    $nip_pengikut2 = $query_pengikut2['NIP'];
  }

  if (empty($query_pengikut3)) {
    $pengikut3 = "";
    $nip_pengikut3 = "";
  } else {
    $pengikut3 = $query_pengikut3['Nama'];
    $nip_pengikut3 = $query_pengikut3['NIP'];
  }
  echo $pengikut;

  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }

  $tanggal_dikeluarkan = tgl_indo($query['TanggalDikeluarkan']);
  $tanggal_berangkat = tgl_indo($query['TanggalBerangkat']);
  $tanggal_kembali = tgl_indo($query['TanggalKembali']);

  // variabel data
  $nama = "SPPD_{$query['TanggalDikeluarkan']}_{$query['Nama']}";
}

// load file template
$inputFileName = '../dokumen/SPPD.xlsx';
//log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($inputFileName);
// $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
// var_dump($sheetData);
$writer = new Xlsx($spreadsheet);
// var_dump($writer);
$writer->save("../dokumen/temp/testSPPD.xlsx"); // 

// temporary file
$inputTemp = '../dokumen/temp/testSPPD.xlsx'; //
$spreadsheetTemp = IOFactory::load($inputTemp);
$writer2 = new Xlsx($spreadsheetTemp);

$spreadsheetTemp->setActiveSheetIndex(0)
  ->setCellValue('A11', "Nomor: {$query['NomorS']}")
  ->setCellValue('F14', "{$query['Nama']} / {$query['NIP']}")
  ->setCellValue('G15', "{$query['Pangkat']}")
  ->setCellValue('G16', "{$query['jabatan']}")
  ->setCellValue('G17', "{$query['Biaya']}")
  ->setCellValue('F18', "{$query['Maksud']}")
  ->setCellValue('F22', "{$query['Angkut']}")
  ->setCellValue('G23', "{$query['TempBerangkat']}")
  ->setCellValue('G24', "{$query['TempTujuan']}")
  ->setCellValue('G25', "{$query['Lama']}")
  ->setCellValue('G26', "{$tanggal_berangkat}")
  ->setCellValue('G27', "{$tanggal_kembali}")

  ->setCellValue('G38', "{$query['KodeRek']}")
  ->setCellValue('G39', "{$query['Keterangan']}")

  ->setCellValue('C29', "{$pengikut}")
  ->setCellValue('F29', "{$nip_pengikut}")

  ->setCellValue('C30', "{$pengikut2}")
  ->setCellValue('F30', "{$nip_pengikut2}")

  ->setCellValue('C31', "{$pengikut3}")
  ->setCellValue('F31', "{$nip_pengikut3}")

  ->setCellValue('I42', "{$tanggal_dikeluarkan}");
ob_end_clean();
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header("Content-Disposition: attachment; filename={$nama}.xlsx");
// $writer2 ->save('php://output');

$writer2->save("../dokumen/temp/{$nama}.xlsx");
$file = "../dokumen/temp/{$nama}.xlsx";
if (file_exists($file)) {
  ob_end_clean(); // biar gak korup
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="' . basename($file) . '"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($file));
  readfile($file);
  ob_end_clean(); // biar gak korup
  die;
}

// $inputTemp2 = "../dokumen/temp/{$nama}.xlsx";
// $spreadsheetTemp2 = IOFactory::load($inputTemp2);
// $writer3 = new Xlsx($spreadsheetTemp2);

// header('Content-Type: application/vnd.ms-excel');
// header("Content-Disposition: attachment;filename='{$nama}.xls");
// header('Cache-Control: max-age=0');

// $writer3 = IOFactory::createWriter($spreadsheetTemp2, 'xls');
// $writer3->save('php://output');
exit;


?>
<script>
  var newwindow = window.open("");
  newwindow.focus();
  newwindow.onblur = function() {
    newwindow.close();
  };
</script>