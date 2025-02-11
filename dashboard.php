<?php
require './config/auth.php';
require './config/database.php';
?>

<?php require './layouts/top.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div id="message"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const msg = urlParams.get('msg');
            const messageDiv = document.getElementById('message');
            
            if (msg) {
                let alertClass = 'alert ';
                let message = '';
                
                switch(msg) {
                    case 'error':
                    case 'failed':
                        alertClass += 'alert-danger';
                        message = 'Error: Operation failed!';
                        break;
                    case 'loginsuccess':
                        alertClass += 'alert-success';
                        message = 'Berhasil login!';
                        break;
                    case 'regsuccess':
                        alertClass += 'alert-success';
                        message = 'Registrasi Ormas Sukses!';
                        break;
                }
                
                if (message) {
                    messageDiv.className = alertClass;
                    messageDiv.innerHTML = message;
                }
            }
        });
    </script>

</div>
<!-- /.container-fluid -->

<?php require './layouts/bottom.php' ?>