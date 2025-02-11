<?php
require './config/auth.php';
require './config/database.php';


?>

<?php require './layouts/top.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrasi Ormas</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Form Registrasi Ormas
            </h5>
        </div>
        <div class="card-body">
            <form action="actions/registration.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_ormas">Nama Ormas</label>
                    <input type="text" class="form-control" name="nama_ormas" required>
                </div>
                <div class="form-group">
                    <label for="status_legalitas">Status Legalitas</label>
                    <select name="status_legalitas" class="form-control mb-2" id="status_legalitas">
                        <option value="1">Berbadan Hukum</option>
                        <option value="0">Tidak Berbadan Hukum</option>
                    </select>
                <div class="form-group">
                    <label for="alamat_kesekretariatan">Alamat Kesekretariatan</label>
                    <input type="text" class="form-control" name="alamat_kesekretariatan" required>
                </div>
                <div class="form-group">
                    <label for="id_kecamatan">Kecamatan</label>
                    <select name="id_kecamatan" class="form-control" id="id_kecamatan">
                        <option value="">-- Pilih Kecamatan --</option>
                        <?php 
                        $query = "SELECT * FROM kecamatan";
                        $result = $conn->query($query);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id_kecamatan'] . "'>" . $row['nama_kecamatan'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_kelurahan">Kelurahan</label>
                    <select name="id_kelurahan" class="form-control" id="id_kelurahan">
                        <option value="">-- Pilih Kelurahan --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_ketua">Nama Ketua</label>
                    <input type="text" class="form-control" name="nama_ketua" required>
                </div>
                <div class="form-group">
                    <label for="no_hp_ketua">Nomor Telp. Ketua</label>
                    <input type="text" class="form-control" name="no_hp_ketua" required>
                </div>
                <div class="form-group">
                    <label for="surat_permohonan">Surat Permohonan</label>
                    <input type="file" class="form-control" name="surat_permohonan" required>
                </div>
                <div class="form-group">
                    <button class="btn-primary" type="submit" name="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
    $('#id_kecamatan').change(function() {
        // Fix: Use $(this) instead of $this
        var id_kecamatan = $(this).val();

        $.ajax({
            url: 'actions/get_kelurahan.php',
            method: 'POST',
            data: { id_kecamatan: id_kecamatan },
            dataType: 'json', // Add this to parse JSON response
            success: function(response) {
                var kelurahanDropdown = $('#id_kelurahan');
                kelurahanDropdown.empty();
                kelurahanDropdown.append('<option value="">-- Pilih Kelurahan --</option>'); // Fix: Changed text to Kelurahan

                // Fix: Corrected $.each parameters order
                $.each(response, function(index, item) {
                    kelurahanDropdown.append('<option value="' + item.id_kelurahan + '">' + item.nama_kelurahan + '</option>');
                });
            },
            error: function(xhr, status, error) {
                // Add error handling
                console.error("Error:", error);
            }
        });
    });
});
</script>
<!-- /.container-fluid -->

<?php require './layouts/bottom.php' ?>