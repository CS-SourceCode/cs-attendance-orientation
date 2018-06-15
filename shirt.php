<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CS Shirt Voting</title>
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
                    <div class="col-sm-11">
                        <h2>CS Shirt Voting</h2>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-11">
                    <h4>Student Name</h4>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle"></span> Vote</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/lights.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Lights" style="width:80%">
                    <div class="caption">
                        <p><?php echo 'Current PHP version: ' . phpversion(); ?></p>
                    </div>
                    </a>
                </div>
                </div>
                <div class="col-md-4">
                <div class="thumbnail">
                    <a data-toggle="modal" data-target=".shirtdetails">
                    <img src="images/blankshirt.jpg" alt="Nature" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/fjords.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Fjords" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/lights.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Lights" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/nature.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Nature" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/fjords.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Fjords" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/lights.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Lights" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/nature.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Nature" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
                <div class="col-md-4">
                <div class="thumbnail">
                    <a href="/w3images/fjords.jpg" target="_blank">
                    <img src="images/blankshirt.jpg" alt="Fjords" style="width:80%">
                    <div class="caption">
                        <p>Lorem ipsum donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                    </a>
                </div>
                </div>
            </div>
        </div>

        <!-- Shirt OnClick -->
        <div class="modal fade shirtdetails" id="voteshirt" tabindex="-1" role="dialog" aria-labelledby="shirtdetails">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form method="POST" action="addEvent.php">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalAttendance">Attendance Recorded: Student Name</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <label>Add New Event</label>
                        <input name="eventName" type="text" class="form-control" placeholder="Event Name">
                        </div>
                        <div class="form-group">
                        <label>Description</label>
                        <textarea name="eventDesc" class="form-control" placeholder="Event Description"></textarea>
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

    </body>

</html>