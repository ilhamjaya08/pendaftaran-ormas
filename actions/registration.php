<?php 
session_start();
require '../config/database.php';

if(isset($_POST['submit'])) {
    $targetDir = "../uploads/";

    $id_user = $_SESSION['id'];
    $nama_ormas = $_POST['nama_ormas'];
    $status_legalitas = "";
    $status_legalitas = ($_POST['status_legalitas'] == 1) ? "Berbadan Hukum" : "Tidak Berbadan Hukum";
    $alamat_kesekretariatan = $_POST['alamat_kesekretariatan'];
    $id_kecamatan = $_POST['id_kecamatan'];
    $id_kelurahan = $_POST['id_kelurahan'];
    $nama_ketua = $_POST['nama_ketua'];
    $no_hp_ketua = $_POST['no_hp_ketua'];
    $status = "Daftar";
    
    if (!isset($_FILES['surat_permohonan']) || $_FILES['surat_permohonan']['error'] !== 0) {
        die("Error: Please upload a valid file");
    }
    
    $surat_file = basename($_FILES['surat_permohonan']['name']);
    $targetFileSurat = "{$targetDir}{$surat_file}";
    $fileType = pathinfo($targetFileSurat, PATHINFO_EXTENSION);

    if(isset($_FILES['surat_permohonan']) && $_FILES['surat_permohonan']['error'] === 0) {
        $allowedTypes = ['pdf', 'doc', 'docx'];

        if(in_array(strtolower($fileType), $allowedTypes)) {
            if(move_uploaded_file($_FILES['surat_permohonan']['tmp_name'], $targetFileSurat)) {
                // Insert data into database
                $query = "INSERT INTO ormas (id_user, nama_ormas, status_legalitas, 
                         alamat_kesekretariatan, id_kecamatan, id_kelurahan, nama_ketua, 
                         no_hp_ketua, surat_permohonan, status) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                $stmt = $conn->prepare($query);
                $result = $stmt->execute([
                    $id_user,
                    $nama_ormas,
                    $status_legalitas,
                    $alamat_kesekretariatan,
                    $id_kecamatan,
                    $id_kelurahan,
                    $nama_ketua,
                    $no_hp_ketua,
                    $surat_file,
                    $status
                ]);

                if($result) {
                    header("Location: ../dashboard.php?msg=regsuccess");
                    exit();
                } else {
                    echo "Error inserting data";
                }
            }
        }
    }
}