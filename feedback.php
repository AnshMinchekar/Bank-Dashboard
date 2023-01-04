
<?php
session_start();
if(!isset($_SESSION['userId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Banking</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php
    $error = "";
    if (isset($_POST['userLogin']))
    {
      $error = "";
        $user = $_POST['email'];
        $pass = $_POST['password'];
       
        $result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
        if($result->num_rows>0)
        { 
          session_start();
          $data = $result->fetch_assoc();
          $_SESSION['userId']=$data['id'];
          $_SESSION['user'] = $data;
          header('location:index.php');
         }
        else
        {
          $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
        }
    }

   ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@100&display=swap" rel="stylesheet">

</head>
<style>
		nav{
			font-family: 'Bebas Neue', cursive;
		}
		body{
			font-family: 'Oswald', sans-serif;
		}
</style>
<nav class="navbar fixed-top navbar-light bg-light">
 <a class="navbar-brand" href="#">
    <img src="images/Infinity Logo.png" width="60" height="30" class="d-inline-block align-top" alt="">
    <?php echo bankName; ?>
  </a>
      <a class="nav-link" href="accounts.php">Accounts</a></li>
      <a class="nav-link" href="statements.php">Account Statements</a></li>
      <a class="nav-link" href="transfer.php">Funds Transfer</a></li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->
    <?php include 'sideButton.php'; ?>
</nav>
<body style="background: url(images/InfinityBackground.jpg);background-size: 100%">    <br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Help Card
  </div>
  <div class="card-body">
      <form method="POST">
          <div class="alert alert-success w-50 mx-auto">
            <h5>Tell Us More About Your Issue</h5>
            <textarea class="form-control" name="msg" required placeholder="Write your message"></textarea>
            <button type="submit" name="send" class="btn btn-primary btn-block btn-sm my-1">submit</button>
          </div>
      </form>
      
    <br>
  
    <?php
    if (isset($_POST['send']))
    {
      if ($con->query("insert into feedback (message,userId) values ('$_POST[msg]','$_SESSION[userId]')")) {
        echo "<div class='alert alert-success'>Successfully send</div>";
      }else
      echo "<div class='alert alert-danger'>Not sent Error is:".$con->error."</div>";
    }
    
    ?>  
  </div>
  <div class="card-footer text-muted">
   <?php echo bankName ?>
  </div>
</div>

</div>
</body>
</html>