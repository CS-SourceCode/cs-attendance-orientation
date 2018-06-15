<?php 

include "config.php";
session_start();

if(isset($_POST['submitAttendance'])) {

    $sbarcode = $_POST['studbarcode'];
    $eventid = $_SESSION['currEventID'];
    $eventname = $_SESSION['currEvent'];

    $query1 = mysqli_query($conn, "SELECT * FROM student WHERE studbarcode = '".$sbarcode."'");
    if(mysqli_num_rows($query1) > 0){
        $record_attendance = mysqli_query($conn, 
        "INSERT INTO attendance(id_event, id_student, time_in) VALUES(".$eventid.",'".$sbarcode."',now())");
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>