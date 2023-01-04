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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@100&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
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
 <a class="navbar-brand" href="index.php">
    <img src="images/Infinity Logo.png" width="60" height="30" class="d-inline-block align-top" alt="">
    <?php echo bankName; ?>
  </a>
      <a class="nav-link" href="accounts.php">Accounts</a></li>
      <a class="nav-link" href="statements.php">Account Statements</a></li>
      <a class="nav-link" href="transfer.php">Funds Transfer</a></li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->
    <?php include 'sideButton.php'; ?>
   
  </div>
</nav>
<body style="background: url(images/InfinityBackground.jpg);background-size: 100%">    
  </div>
</nav><br><br><br>
<div class="row w-100" >
  <div class="col" style="padding: 22px;padding-top: 0">
    <div class="jumbotron shadowBlack" style="padding: 25px;height: 180;">
  <h4 class="display-5">Welcome to Infinity Bank</h4>
  <br>
  <p  class="lead alert alert-warning"><b>Latest Notification:</b>

  <?php 
      $array = $con->query("select * from notice where userId = '$_SESSION[userId]' order by date desc");
      if ($array->num_rows > 0)
      {
        $row = $array->fetch_assoc();
        // {
          echo $row['notice'];
        // }
      }
      else
        echo "<div class='alert alert-info'>Notice box empty</div>";
     ?></p>
  

<div class="col">
    <div class="row" style="padding: 22px;padding-top: 0">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/acount.jpg" style="height: 250px; width 500px" alt="Card image cap">
          <div class="card-body">
            <a href="accounts.php" class="btn btn-outline-success btn-block">Account Summary</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/transfer.jpg" alt="Card image cap" style="height: 250px; width 500px">
        <div class="card-body">
          <a href="transfer.php" class="btn btn-outline-success btn-block">Transfer Money</a>
         </div>
        </div>
      </div>
    </div>
    <div class="row" style="padding: 22px">
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/bell.gif" style="height: 250px; width 500px" alt="Card image cap">
          <div class="card-body">
            <a href="notice.php" class="btn btn-outline-primary btn-block">Notifications</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadowBlack ">
          <img class="card-img-top" src="images/Contact Us.png" alt="Card image cap" style="height: 250px; width 500px">
        <div class="card-body">
          <a href="feedback.php" class="btn btn-outline-primary btn-block">Contact Us</a>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>