<?php include "config.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CS Events | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/ckeditor.js"></script>
    <!--<script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>-->
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CS Events System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active"><a href="events.php">Events</a></li>
            <li><a href="posts.html">Statistics</a></li>
            <li><a href="users.html">Students</a></li>
            <li><a href="registration.php">Attendance/Registration</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, Jam</a></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Events </h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Quick Action
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Events</a></li>
                <li><a href="#">Record Registration</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="events.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Events <span class="badge"><!-- notifs # --></span></a>
              <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistics <span class="badge"><!-- notifs # --></span></a>
              <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Students <span class="badge"><!-- notifs # --></span></a>
              <a href="registration.php" class="list-group-item"><span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span> Registration <span class="badge"><!-- notifs # --></span></a>
            </div>

          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Events List</h3>
              </div>
              <div class="panel-body">
              <table class="table table-striped table-hover">
                    <?php 

                    $dbhost="localhost"; // hostname
                    $dbuser="root"; // username 
                    $dbpass="usbw"; // password
                    $dbname="csdivision_sample"; // database name

                    $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
                    mysqli_select_db($conn,$dbname);

                    if(!$conn)
                        die('Could not connect to MySQL: ' . mysqli_error());
                    
                    $sqlEvents = "SELECT id_event, eventName, eventDesc FROM events";
                    $result = mysqli_query($conn, $sqlEvents);

                        echo "<tr><th>Event Name</th><th>Description</th></tr>";
                    
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>".$row["eventName"]."</td><td>".$row["eventDesc"]."</td></tr>";
                        }
                    
                    mysqli_close($conn);
                    
                    ?>
                    </table>
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Add New Event</h3>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label>Add New Event</label>
                    <input name="eventName" type="text" class="form-control" placeholder="Event Name">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="eventDesc" class="form-control" placeholder="Event Description"></textarea>
                  </div>
                </div>
                <div class="panel-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Reset</button>
                  <button name="submitEvent" type="submit" class="btn btn-primary">Create</button>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright CSSEC Source Code, &copy; 2018</p>
    </footer>

    <!-- Modals -->

    <!-- Add Event -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="addEvent.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Event Creation</h4>
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
        <button name="submitEvent" type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
    </div>
  </div>
</div>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
