<?php 
session_start();
include "db.php" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="login.css" rel="stylesheet">
    
</head>
<body>
    
     <div id="heading">
      <h1>PATIENT REGISTRATION PORTAL- RM HOSPITAL</h1>
     </div>
   <div id="contai">
   <div class="wrap">
          <h3 class="adh">LOG IN</h3>
           <div class="center">
            <?php
            if(isset($_POST["submit"]))
            {
                $sql="SELECT * FROM `patient` WHERE NAME='{$_POST["uname"]}' and  PASS='{$_POST["upass"]}'";
                $res=$db->query($sql);
                //it returns the sql queries from database and the res variable in array format
                if($res->num_rows>0)
                {
                    $row=$res->fetch_assoc();
                    $_SESSION["ID"]=$row["ID"];
                    $_SESSION["NAME"]=$row["NAME"];
                    header("location:home.php");
                }
                else{
                    echo "<p class='error'>check for your password and username</p>";
                }
                
            }
            ?>
           <form action="login.php" method="post">
           
            <input type="text" name="uname" required placeholder="Enter your Name">
            
            <input type="password" name="upass" required placeholder="Enter your Password">
            <button type="submit" name="submit">Log in </button>
           </form>
           <div id="new"><a href="new.php">New user?</a></div>
        </div>
     </div>
        
    </div>
</body>
</html>