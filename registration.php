<?php include "config.php";
session_start();
?>

<?php
    if(isset($_POST['selectEvent'])) {
        $selectedEvent = $_POST["changeEvent"];
    
        $eventDetails = mysqli_query($conn, "SELECT * FROM events WHERE id_event ='".$selectedEvent."'");
        while($row = mysqli_fetch_assoc($eventDetails)) {
            $_POST["eventName"] = $row["eventName"];
            $_SESSION["currEvent"] = $row["eventName"];
            $_SESSION["currEventID"] = $row["id_event"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CS Events | Registration</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/ckeditor.js"></script>
        <!-- <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script> -->
    </head>

    <body style="background-color: white">
        <div class="navbar-wrapper" name="header">
            <div class="container">
                <br/>
                <div class="row">
                    <div class="col-sm-1">
                        <img src="images\cslogo.png" class="img-responsive" height="75" width="75"/>
                    </div>
                    <div class="col-sm-9">
                        <h2>Event Registration</h2>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".selectEvent"><span class="glyphicon glyphicon-cog"></span>  Event</button>

                    </div>
                </div>
                <hr>
            </div>
        </div>
        
        <div class="container">
            <div class="jumbotron">
                <h1 id="currEvent" name="currEvent"><?php echo $_SESSION["currEvent"];?></h1>
                <p>
                <div class="container">
                    <div class="row">
                    <form method="POST" action="recordAttendance.php">
                        <div class="col-md-11">
                            <div class="form-group">
                                <label for="studbarcode">Student ID Number:</label>
                                <input type="text" class="form-control" name="studbarcode" id="studbarcode">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" name="submitAttendance" class="btn btn-primary" data-toggle="modal" data-target=".voteshirt">Enter</button>
                        </div>
                    </form>
                    </div>
                </div>
                </p>
            </div>
            <p>Recorded Attendances / Total Number of CS Students</p> 
            <p>Table of Recorded Attendances</p> 
        </div>

        <!-- Select Event -->
        <div class="modal fade selectEvent" id="selectEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Event Selection</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php
                                $getEvents = "SELECT * FROM events";
                                $result = mysqli_query($conn, $getEvents);
                            ?>
                            <label>Select Event</label>
                                <select name="changeEvent" class="form-control" placeholder="Select Event">
                                    <?php
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<option value='".$row['id_event']."'>".$row['eventName']."</option>";
                                        }
                                    ?>
                                </select>
                        </div>
                        <fieldset disabled>
                        <div class="form-group">
                        <label>Current Event</label>
                        <input name="eventName" type="text" class="form-control" placeholder="<?php echo $_SESSION["currEvent"];?>" value="<?php echo $_SESSION["currEvent"];?>">
                        </div>
                        <div class="form-group">
                        <label>Description</label>
                        <textarea name="eventDesc" class="form-control" placeholder="Event Description"></textarea>
                        </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="selectEvent" type="submit" class="btn btn-primary">Select</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
            <!-- T-Shirt Voting -->
        <div class="modal fade voteshirt" id="voteshirt" tabindex="-1" role="dialog" aria-labelledby="modalAttendance">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" action="addEvent.php">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalAttendance">Attendance Recorded: Student Name</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Add New Event</label>
                        <input name="test1" type="text" class="form-control" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                        <label>Description</label>
                        <textarea name="test2" class="form-control" placeholder="Event Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button name="submitEvent" type="submit" class="btn btn-primary">Vote</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    </body>

</html>