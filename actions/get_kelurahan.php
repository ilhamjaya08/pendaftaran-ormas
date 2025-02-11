<?php 

require '../config/database.php';

if(isset($_POST['id_kecamatan'])) {
    $id_kecamatan = $_POST['id_kecamatan'];
    $query = "SELECT * FROM kelurahan where id_kecamatan = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_kecamatan);
    $stmt->execute();
    $result = $stmt->get_result();

    $kelurahan = [];
    while ($row = $result->fetch_assoc()) {
        $kelurahan[] = $row;
    }

    echo json_encode($kelurahan);
}