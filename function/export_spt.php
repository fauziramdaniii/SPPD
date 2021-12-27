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
    $diperintah = $conn->query("SELECT `IdSPT`, pegawai.Nama, pegawai.NIP, Dasar, pegawai.Golongan 
        as 'pangkat', pegawai.jabatan, Untuk, Keterangan,  `Tanggal`, `NomorS` 
        FROM `spt` inner join pegawai on spt.Kepada = pegawai.IdPegawai where IdSPT='{$_GET['kode']}'")->fetch_assoc();
    //$tanggal2 = date_format($diperintah['Tanggal'], "Y-m-d");

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

    $tanggal_dikeluarkan = tgl_indo($diperintah['Tanggal']);

    // query pengikut1
    $pengikut1 = $conn->query("SELECT `IdSPT`, pegawai.Nama, pegawai.NIP, pegawai.Golongan 
        as 'pangkat', pegawai.jabatan
        FROM `spt` inner join pegawai on spt.kepada2 = pegawai.IdPegawai where IdSPT='{$_GET['kode']}'")->fetch_assoc();
    if (empty($pengikut1)) {
        $nama_pengikut1 = " ";
        $nip_pengikut1 = " ";
        $pangkat_pengikut1 = " ";
        $jabatan_pengikut1 = " ";
    } else {
        $nama_pengikut1 = "{$pengikut1['Nama']}";
        $nip_pengikut1 = "{$pengikut1['NIP']}";
        $pangkat_pengikut1 = "{$pengikut1['pangkat']}";
        $jabatan_pengikut1 = "{$pengikut1['jabatan']}";
    }

    // query pengikut2
    $pengikut2 = $conn->query("SELECT `IdSPT`, pegawai.Nama, pegawai.NIP, pegawai.Golongan 
        as 'pangkat', pegawai.jabatan
        FROM `spt` inner join pegawai on spt.kepada3 = pegawai.IdPegawai where IdSPT='{$_GET['kode']}'")->fetch_assoc();
    if (empty($pengikut2)) {
        $nama_pengikut2 = " ";
        $nip_pengikut2 = " ";
        $pangkat_pengikut2 = " ";
        $jabatan_pengikut2 = " ";
    } else {
        $nama_pengikut2 = "{$pengikut2['Nama']}";
        $nip_pengikut2 = "{$pengikut2['NIP']}";
        $pangkat_pengikut2 = "{$pengikut2['pangkat']}";
        $jabatan_pengikut2 = "{$pengikut2['jabatan']}";
    }


    // query pengikut3
    $pengikut3 = $conn->query("SELECT `IdSPT`, pegawai.Nama, pegawai.NIP, pegawai.Golongan 
        as 'pangkat', pegawai.jabatan
        FROM `spt` inner join pegawai on spt.kepada4 = pegawai.IdPegawai where IdSPT='{$_GET['kode']}'")->fetch_assoc();
    if (empty($pengikut3)) {
        $nama_pengikut3 = " ";
        $nip_pengikut3 = " ";
        $pangkat_pengikut3 = " ";
        $jabatan_pengikut3 = " ";
    } else {
        $nama_pengikut3 = "{$pengikut3['Nama']}";
        $nip_pengikut3 = "{$pengikut3['NIP']}";
        $pangkat_pengikut3 = "{$pengikut3['pangkat']}";
        $jabatan_pengikut3 = "{$pengikut3['jabatan']}";
    }



    // variabel data
    $nama = "SPT_{$diperintah['Tanggal']}_{$diperintah['Nama']}";
}

// load file template
$inputFileName = '../dokumen/SPT.xlsx';
//log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($inputFileName);
// $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
// var_dump($sheetData);
$writer = new Xlsx($spreadsheet);
// var_dump($writer);
$writer->save("../dokumen/temp/test.xlsx"); // 

// temporary file
$inputTemp = '../dokumen/temp/test.xlsx'; //
$spreadsheetTemp = IOFactory::load($inputTemp);
$writer2 = new Xlsx($spreadsheetTemp);

$spreadsheetTemp->setActiveSheetIndex(0)
    ->setCellValue('B9', "{$diperintah['NomorS']}")
    ->setCellValue('C11', "{$diperintah['Dasar']}")
    ->setCellValue('G20', "{$diperintah['Nama']}")
    ->setCellValue('G21', "{$diperintah['NIP']}")
    ->setCellValue('G22', "{$diperintah['pangkat']}")
    ->setCellValue('G23', "{$diperintah['jabatan']}")

    ->setCellValue('G25', "{$nama_pengikut1}")
    ->setCellValue('G26', "{$nip_pengikut1}")
    ->setCellValue('G27', "{$pangkat_pengikut1}")
    ->setCellValue('G28', "{$jabatan_pengikut1}")

    ->setCellValue('G30', "{$nama_pengikut2}")
    ->setCellValue('G31', "{$jabatan_pengikut2}")

    ->setCellValue('G33', "{$nama_pengikut3}")
    ->setCellValue('G34', "{$jabatan_pengikut3}")

    ->setCellValue('C36', "{$diperintah['Untuk']}")
    ->setCellValue('C39', "{$diperintah['Keterangan']}")
    ->setCellValue('L43', "{$tanggal_dikeluarkan}");
ob_end_clean();
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header("Content-Disposition: attachment; filename={$nama}.xlsx");
// $writer2 ->save('php://output');
// die;
$writer2->save("../dokumen/temp/{$nama}.xlsx");
$file = "../dokumen/temp/{$nama}.xlsx";
if (file_exists($file)) {
    // biar gak korup
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    die;
}

//$writer2 -> save("../dokumen/temp/{$nama}.xlsx");
die;

?>
<script>
    var newwindow = window.open("");
    newwindow.focus();
    newwindow.onblur = function() {
        newwindow.close();
    };
</script>