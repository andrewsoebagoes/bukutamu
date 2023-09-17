<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat objek Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menambahkan judul kolom
$sheet->setCellValue('A1', 'Nama Tamu');
$sheet->setCellValue('B1', 'Tanggal');
$sheet->setCellValue('C1', 'Data Ananda');
$sheet->setCellValue('D1', 'Keperluan');
// $sheet->setCellValue('E1', 'Tanggal');
// $sheet->setCellValue('F1', 'Tahun');



$pdo = new PDO("mysql:host=127.0.0.1;dbname=bukutamu", 'admin', 'root');
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

$statement = $pdo->prepare("SELECT * FROM `tamu` ");
$statement->execute();
$datas = $statement->fetchAll(PDO::FETCH_ASSOC);

// Menambahkan data ke dalam sheet
$row = 2;
foreach ($datas as $rowData) {
    $dataAnanda = unserialize($rowData['data_ananda']);
    $dataAnanda = array_map(function($v){
        return "$v[nama_ananda],$v[tahun_lahir_ananda],$v[status_ananda]";
    }, $dataAnanda);
    $dataAnanda = implode(",", $dataAnanda );

    $sheet->setCellValue('A' . $row, $rowData['nama_tamu']);
    $sheet->setCellValue('B' . $row, $rowData['created_at']);
    $sheet->setCellValue('C' . $row, $dataAnanda);
    $sheet->setCellValue('D' . $row, $rowData['keperluan']);
    // $sheet->setCellValue('E' . $row, $rowData['tanggal']);
    // $sheet->setCellValue('F' . $row, $selectedYear);
    $row++;
}

// Membuat objek writer untuk menulis ke file Excel
$writer = new Xlsx($spreadsheet);

// Menyimpan file Excel
$filename = 'data_export.xlsx';
$writer->save($filename);

echo "File Excel berhasil di-generate dengan nama: $filename";

set_flash_msg(['success'=>'Data Berhasi di Export']);
header('location:'.asset($filename));
die();