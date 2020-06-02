<!doctype html>
<html lang="en">
  <head>
    <title>
      <?php
        echo $pageTitle. " | UCO NSLS" ;
      ?> 
     </title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      header{
        font-size: 1.4em;
      }

    .footer {
        font-size: 0.9em;
      }
    </style>
  </head>
  <body>
    <!-- navbar of the page-->
    <header >
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class = "container">
            <a class="navbar-brand order-md-1" data-toggle="modal" data-target="#administrator">UCO NSLS Chapter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link  <?php if($pageTitle == 'Home') { echo "active"; } ?>  mr-3" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link  <?php if($pageTitle == 'Members') { echo "active"; } ?>  mr-3" href="members.php">Members</a>
                <a class="nav-item nav-link <?php if($pageTitle == 'Calendar') { echo "active"; } ?>  " href="calendar.php">Calendar</a>
                </div>
            </div>
          </div>
      </nav>
    </header>

    <!-- /navbar of the page -->


    <!-- Administrator page -->  
    <div class="modal fade" id="administrator" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="administrator">Administrator</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- connection to the admin page -->
            <form method="post" action="index.php"> 

              <div class="form-group row ">
                <label for="login" class="col-sm-2 col-form-label">Login</label>
                <div class="col-md-7">
                  <input type="password" name = "user_login" class="form-control" id="user_login" maxlength="7" required>
                </div>
              </div>

              <div class="form-group row ">
                <label for="password" class="col-sm-2 col-form-label" >Password</label>
                <div class="col-md-7">
                  <input type="password" name = "user_password" class="form-control" id="user_password" maxlength="20" required>
                </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="login-button"class="btn btn-primary">Login</button>
              </div>

            </form>
            <!-- Administrator of the page -->

          </div>
          
        </div>
      </div>
    </div>
    <!-- /Adminsitrator page -->

 