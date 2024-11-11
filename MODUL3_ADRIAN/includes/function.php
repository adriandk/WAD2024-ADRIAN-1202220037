<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent()
{
    // variabel global
    global $conn;

    // Silakan buat variabel di bawah dengan data yang diambil dari form
    $namaMahasiswa = $_POST['stuname'];
    $nimMahasiswa = $_POST['stuid'];
    $jurusanMahasiswa = $_POST['stuclass'];
    $angkatanMahasiswa = $_POST['stuangkatan'];

    // Periksa apakah NIM sudah ada
    $ret = mysqli_query($conn, "SELECT * FROM tb_student WHERE nim = '$nimMahasiswa'");

    if (mysqli_num_rows($ret) == 0) {
        // Masukkan data ke tabel tb_student
        $query = "INSERT INTO tb_student (id, nama, nim, jurusan, angkatan) VALUES (NULL, '$namaMahasiswa', '$nimMahasiswa', '$jurusanMahasiswa', '$angkatanMahasiswa')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<script> alert('Berhasil') </script>";
        } else {
            echo "<script> alert('Gagal'); document.location.href = add-students.php; </script>";
        }
    } else {
        echo "<script> alert('NIM itu udah terdaftar'); document.location.href = add-students.php; </script>";
    }
}

function editStudent($id) {
    global $conn;

    // Ambil input dari form dan simpan dalam variabel
    $namaMahasiswa = $_POST['stuname'];
    $nimMahasiswa = $_POST['stuid'];
    $jurusanMahasiswa = $_POST['stuclass'];
    $angkatanMahasiswa = $_POST['stuangkatan'];

    // Update data mahasiswa berdasarkan ID
    $query = "UPDATE tb_student SET nama = '$namaMahasiswa', nim = '$nimMahasiswa', jurusan = '$jurusanMahasiswa', angkatan = '$angkatanMahasiswa' WHERE tb_student.id = '$id';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong")</script>';
    }
}

function deleteStudent($id) {
    global $conn;

    // Update data mahasiswa berdasarkan ID

}

?>