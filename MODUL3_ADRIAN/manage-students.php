<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php'); // Pastikan koneksi menggunakan mysqli
include('includes/function.php');


//Buatkan logika untuk menghapus data siswa dari tabel tb_student berdasarkan id yang diterima dari parameter URL 'delID'

if (isset($_GET['delete'])) {

    $deleteID = $_GET['delete'];

    $query = "DELETE FROM tb_student WHERE tb_student.id = '$deleteID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data deleted');</script>";
        echo "<script>window.location.href = 'manage-students.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>U-WIBU || Manage Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="">
        <!-- partial:partials/_navbar.html -->
        <?php include_once('includes/header.php'); ?>
        <!-- partial -->
        <div class="page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Manage Students </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Manage Students</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center mb-4">
                                        <h4 class="card-title mb-sm-0">Manage Students</h4>
                                        <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Students</a>
                                    </div>
                                    <div class="table-responsive border rounded p-1">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="font-weight-bold">S.No</th>
                                                    <th class="font-weight-bold">Student ID</th>
                                                    <th class="font-weight-bold">Student Name</th>
                                                    <th class="font-weight-bold">Jurusan</th>
                                                    <th class="font-weight-bold">Angkatan</th>
                                                    <th class="font-weight-bold">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- // Jalankan query SQL untuk mengambil semua data dari tabel tb_student. -->
                                                <?php
                                                    $query = "SELECT * FROM tb_student";
                                                    $data  = mysqli_query($conn, $query);
                                                    $students = [];
                                                    while ($student = mysqli_fetch_assoc($data)) {
                                                        $students[] = $student;
                                                    }
                                                ?>

                                                <!-- // Loop untuk menampilkan semua data -->
                                                <?php foreach ($students as $student) : ?>
                                                    <tr>
                                                        <td>
                                                            <?= $student["id"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $student["nama"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $student["nim"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $student["jurusan"] ?>
                                                        </td>
                                                        <td>
                                                            <?= $student["angkatan"] ?>
                                                        </td>
                                                        <td>
                                                            <a href="edit-students.php?id=<?= $student["id"] ?>"><i class="icon-eye"></i></a>
                                                            ||
                                                            <a href="manage-students.php?delete=<?= $student["id"] ?>" onclick="return confirm('Do you really want to delete?');"><i class="icon-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once('includes/footer.php'); ?>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>