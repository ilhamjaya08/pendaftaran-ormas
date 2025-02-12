<?php 
$ormas = $conn->query('SELECT COUNT(*) as total FROM ormas');
$ormasResult = $ormas->fetch_assoc();
$ormasTotal = $ormasResult['total'];

$ormasDaftar = $conn->query("SELECT COUNT(*) as total FROM ormas WHERE status = 'Daftar'");
$ormasDaftarResult = $ormasDaftar->fetch_assoc();
$ormasDaftarTotal = $ormasDaftarResult['total'];

$ormasProses = $conn->query("SELECT COUNT(*) as total FROM ormas WHERE status = 'Proses'");
$ormasProsesResult = $ormasProses->fetch_assoc();
$ormasProsesTotal = $ormasProsesResult['total'];

$ormasAktif = $conn->query("SELECT COUNT(*) as total FROM ormas WHERE status = 'Aktif'");
$ormasAktifResult = $ormasAktif->fetch_assoc();
$ormasAktifTotal = $ormasAktifResult['total'];

$id_user = $_SESSION['id'];
$id_ormasQuery = $conn->query("SELECT id_ormas FROM ormas WHERE id_user = '$id_user'");
$id_ormasResult = $id_ormasQuery->fetch_assoc();
$id_ormas = $id_ormasResult['id_ormas'];
?>

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Ormas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                                echo($ormasTotal);
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-people fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Ormas (Daftar)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($ormasDaftarTotal); ?></div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Ormas (Proses)
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo($ormasProsesTotal); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Ormas (Aktif)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($ormasAktifTotal); ?></div>
                    </div>
                    <div class="col-auto">
                        <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-header">Data Ormas Anda</div>
            <div class="card-body">
                <form aria-disabled="true">
                    <div class="form-group">
                        <label >Nama Ormas</label>
                        <input type="text" name="nama_ormas" id="nama_ormas" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >Status Legalitas</label>
                        <input type="text" name="status_legalitas" id="status_legalitas" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >Alamat Kesekretariatan</label>
                        <input type="text" name="alamat_kesekretariatan" id="alamat_kesekretariatan" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >Kecamatan</label>
                        <input type="text" name="id_kecamatan" id="id_kecamatan" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >Kelurahan</label>
                        <input type="text" name="id_kelurahan" id="id_kelurahan" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >Nama Ketua</label>
                        <input type="text" name="nama_ketua" id="nama_ketua" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >No Telp. Ketua</label>
                        <input type="text" name="no_hp_ketua" id="no_hp_ketua" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label >Status</label>
                        <input type="text" name="status" id="status" class="form-control" disabled>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="card">
            <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="text-md">Akun Anda</h6>
                <button class="btn btn-primary btn-md rounded-sm">Edit</button>
            </div>
            <div class="card-body">
                <form aria-disabled="true">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" id="username" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" id="level" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="statususer" id="statususer" class="form-control" disabled>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var id_ormas = <?php echo $id_ormas;?> 
            var id_user = <?php echo $id_user;?>

            $.ajax({
                url: 'actions/get_ormas.php',
                method: 'POST',
                data: { id_ormas: id_ormas },
                success: function(response) {
                    const data = JSON.parse(response);
                    $('#nama_ormas').val(data.nama_ormas);
                    $('#status_legalitas').val(data.status_legalitas);
                    $('#alamat_kesekretariatan').val(data.alamat_kesekretariatan);
                    $('#id_kecamatan').val(data.id_kecamatan);
                    $('#id_kelurahan').val(data.id_kelurahan);
                    $('#nama_ketua').val(data.nama_ketua);
                    $('#no_hp_ketua').val(data.no_hp_ketua);
                    $('#status').val(data.status);
                }
            })

            
            $.ajax({
                url: 'actions/get_userinfo.php',
                method: 'POST', 
                data: { id_user: id_user },
                success: function(data) {
                    $('#username').val(data.username);
                    $('#nama_lengkap').val(data.nama_lengkap);
                    $('#email').val(data.email);
                    $('#no_hp').val(data.no_hp);
                    $('#level').val(data.level);
                    $('#statususer').val(data.status);
                }
            })
        })
    </script>
</div>