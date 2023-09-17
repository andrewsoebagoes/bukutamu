<?php
$table = 'tamu'; //nama table

Page::set_title('Tambah ' . ucwords(_($table)));
$error_msg = get_flash_msg('error');
$success_msg = get_flash_msg('success');
$old = get_flash_msg('old');
$fields = config('fields')[$table];
$conn = conn();

$db   = new Database($conn);

if (file_exists('../actions/' . $table . '/override-create-fields.php'))
    $fields = require '../actions/' . $table . '/override-create-fields.php';

if (request() == 'POST') {


    extract($_POST);
    // echo '<pre>';
    // print_r($_POST);
    // die;
    $data_ananda = [];
    if (isset($nama_ananda[1]) && $nama_ananda[1]) {
        foreach ($nama_ananda as $key => $lv) {
            $data_ananda[] = [
                'nama_ananda'   => isset($nama_ananda[$key]) ? $nama_ananda[$key] : null,
                'tahun_lahir_ananda'   => isset($tahun_lahir_ananda[$key]) ? $tahun_lahir_ananda[$key] : null,
                'status_ananda' => isset($status_ananda[$key]) ? $status_ananda[$key] : null,
            ];
        }
    }
    $data_ananda = serialize($data_ananda);

    $provinsi   = explode(",", $provinsi);
    $kabupaten  = explode(",", $kabupaten);
    $kecamatan  = explode(",", $kecamatan);
    $desa       = explode(",", $desa);
    $keperluan  = explode(",", $keperluan_id);
    $data = [
        'nama_tamu'          => $namatamu,
        'provinsi_id'       => $provinsi[0],
        'provinsi'          => $provinsi[1],
        'kabupaten_id'      => $kabupaten[0],
        'kabupaten'         => $kabupaten[1],
        'kecamatan_id'      => $kecamatan[0],
        'kecamatan'         => $kecamatan[1],
        'desa_id'           => $desa[0],
        'desa'              => $desa[1],
        'latitude'          => $latitude,
        'longitude'         => $longitude,
        'alamat_lengkap'         => $alamat_lengkap,
        'data_ananda'       => $data_ananda,
        'asalsekolah'       => $asalsekolah,
        'keperluan_id'      => $keperluan[0],
        'keperluan'         => $keperluan[1],
        'no_wa'             => "62" . $no_wa,
    ];

    $insert = $db->insert($table, $data);

    set_flash_msg(['success' => 'Data Berhasil di Simpan']);
    header('location:' . routeTo('index', []));
}
$db->query = "SELECT * FROM keperluan";
$keperluan = $db->exec('all');


return compact('table', 'error_msg', 'success_msg', 'old', 'fields', 'keperluan');
