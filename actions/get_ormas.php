<?php

require "../config/database.php";

if(isset($_POST['id_ormas'])) {
    $id_ormas = $_POST['id_ormas'];

    $ormas = $conn->query("SELECT * FROM ormas WHERE id_ormas = '$id_ormas'");
    $ormasResult = $ormas->fetch_assoc();
    $ormaskec = $ormasResult['id_kecamatan'];
    $ormaskel = $ormasResult['id_kelurahan'];

    $kecamatan = $conn->query("SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan = '$ormaskec'");
    $kelurahan = $conn->query("SELECT nama_kelurahan FROM kelurahan WHERE id_kelurahan = '$ormaskel'");
    $kecamatanResult = $kecamatan->fetch_assoc();
    $kelurahanResult = $kelurahan->fetch_assoc();

    $ormasResult['id_kecamatan'] = $kecamatanResult['nama_kecamatan'];
    $ormasResult['id_kelurahan'] = $kelurahanResult['nama_kelurahan'];

    if($ormasResult) {
        echo json_encode($ormasResult);
    } else {
        echo json_encode(['error' => 'Ormas not found!']);
    }
}