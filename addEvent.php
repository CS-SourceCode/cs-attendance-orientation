<?php 

include "config.php";

if(isset($_POST['submitEvent'])) {

    $eventName = $_POST['eventName'];
    $eventDesc = $_POST['eventDesc'];

    $addresult = mysqli_query($conn, "INSERT INTO events (id_event, eventName, eventDesc) VALUES (null, '$eventName', '$eventDesc')");

    mysqli_close($conn);

}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>