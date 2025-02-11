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