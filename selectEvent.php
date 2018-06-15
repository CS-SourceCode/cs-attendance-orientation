<?php

include "config.php";

if(isset($_POST['selectEvent'])) {
    $selectedEvent = $_POST["changeEvent"];
    $_SESSION["currEvent"] = $selectedEvent;

    $eventDetails = mysqli_query($conn, "SELECT * FROM events WHERE id_event ='".$selectedEvent."'");
    while($row = mysqli_fetch_assoc($eventDetails)) {
        $_SESSION["currEvent"] = $row["eventName"];
    }
}

?>