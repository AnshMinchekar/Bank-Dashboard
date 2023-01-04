
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
<body style="background: url(images/InfinityBackground.jpg);background-size: 100%">    <br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Funds Transfer
  </div>
  <div class="card-body">
      <form method="POST">
          <div class="alert alert-success w-50 mx-auto">
            <h5>New Transfer</h5>
            <input type="text" name="otherNo" class="form-control " placeholder="Enter Receiver Account number" required>
            <button type="submit" name="get" class="btn btn-primary btn-bloc btn-sm my-1">Get Account Info</button>
          </div>
      </form>
      <?php if (isset($_POST['get'])) 
      {
        $array2 = $con->query("select * from otheraccounts where accountNum = '$_POST[otherNo]'");
        $array3 = $con->query("select * from userAccounts where accountNum = '$_POST[otherNo]'");
        {
          if ($array2->num_rows > 0) 
          { $row2 = $array2->fetch_assoc();
            echo "<div class='alert alert-success w-50 mx-auto'>
                  <form method='POST'>
                    Account No.
                    <input type='text' value='$row2[accountNum]' name='otherNo' class='form-control ' readonly required>
                    Account Holder Name.
                    <input type='text' class='form-control' value='$row2[holderName]' readonly required>
                    Account Holder Bank Name.
                    <input type='text' class='form-control' value='$row2[bankName]' readonly required>
                    Enter Amount for tranfer.
                    <input type='number' name='amount' class='form-control' min='1' max='$userData[balance]' required>
                    <button type='submit' name='transfer' class='btn btn-primary btn-bloc btn-sm my-1'>Tranfer</button>
                  </form>
                </div>";
          }elseif ($array3->num_rows > 0) {
           $row2 = $array3->fetch_assoc();
            echo "<div class='alert alert-success w-50 mx-auto'>
                  <form method='POST'>
                    Account No.
                    <input type='text' value='$row2[accountNum]' name='otherNo' class='form-control ' readonly required>
                    Account Holder Name.
                    <input type='text' class='form-control' value='$row2[name]' readonly required>
                    Account Holder Bank Name.
                    <input type='text' class='form-control' value='".bankName."' readonly required>
                    Enter Amount for tranfer.
                    <input type='number' name='amount' class='form-control' min='1' max='$userData[balance]' required>
                    <button type='submit' name='transferSelf' class='btn btn-primary btn-bloc btn-sm my-1'>Tranfer</button>
                  </form>
                </div>";
          }
          else
            echo "<div class='alert alert-success w-50 mx-auto'>Account No. $_POST[otherNo] Does not exist</div>";
        }
      } 
      ?>
    <br>
    <h5>Transfer History</h5>
    <?php
    if (isset($_POST['transferSelf']))
    {
      $amount = $_POST['amount'];
      setBalance($amount,'debit',$userData['accountNum']);
      setBalance($amount,'credit',$_POST['otherNo']);
      makeTransaction('transfer',$amount,$_POST['otherNo']);
      echo "<script>alert('Transfer Successfull');window.location.href='transfer.php'</script>";
    }
    if (isset($_POST['transfer']))
    {
      $amount = $_POST['amount'];
      setBalance($amount,'debit',$userData['accountNum']);
      makeTransaction('transfer',$amount,$_POST['otherNo']);
      echo "<script>alert('Transfer Successfull');window.location.href='transfer.php'</script>";
    }
      $array = $con->query("select * from transaction where userId = '$userData[id]' AND action = 'transfer' order by date desc");
      if ($array ->num_rows > 0) 
      {
         while ($row = $array->fetch_assoc()) 
         {
            if ($row['action'] == 'transfer') 
            {
              echo "<div class='alert alert-warning'>Transfer have been made for  Rs.$row[debit] from your account at $row[date] in  account no.$row[other]</div>";
            }

         }
      }
      else
        echo "<div class='alert alert-info'>You have made no transfer yet.</div>";
    ?>  
  </div>
  <div class="card-footer text-muted">
   <?php echo bankName ?>
  </div>
</div>

</div>
</body>
</html>