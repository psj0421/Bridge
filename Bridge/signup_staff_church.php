<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $church_code = mysqli_real_escape_string($conn, $_POST['church_code']);
    $church_title = mysqli_real_escape_string($conn, $_POST['church_title']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    $church_query = "SELECT * FROM church WHERE church_code = '$church_code'";
    $church_result = mysqli_query($conn, $church_query);

    if (mysqli_num_rows($church_result) == 0) {
        echo "<script>alert('존재하지 않는 교회 코드입니다.'); history.back();</script>";
        exit();
    }

    $church = mysqli_fetch_assoc($church_result);
    $church_id = $church['church_id'];

    $_SESSION['church_id'] = $church_id;
    $_SESSION['church_code'] = $church_code;
    $_SESSION['church_title'] = $church_title;
    $_SESSION['department'] = $department;

    header("Location: signup_staff2_.html");
    exit();
}
?>
