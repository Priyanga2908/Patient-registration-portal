<?php
session_start();
include "db.php";

if(!isset($_SESSION["ID"]))
{
    header("location:login.php");//if the session variables match in ulogin then it will moves to user home page else in the same page and noone can access directly the user home page by simply writing in serach bar
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="new.css" rel="stylesheet"/>
    <title>Booking</title>
</head>
<body>
    <div class="contai">
        <div class="heading">
          <h1>PATIENT REGISTRATION PORTAL</h1>
        </div>
        <div class="wrap">
           <h3 class="adh">Change Password</h3>
           <div class="center">
            <?php
                if(isset($_POST["submit"]))
                {
                    $sql="SELECT * from patient where PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                         $s="UPDATE patient set PASS='{$_POST["npass"]}' where ID=".$_SESSION["ID"];//CONCATENATING PASSWORD
                         $db->query($s);
                         echo "<p class='success'> password changed</p>";
                    }
                    else
                    {
                         echo "<p class='error'>Invalid password</p>";
                    }
                }
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
               <label>old password</label>
               <input type="password" name="opass" required>
               <label>New password</label>
               <input type="password" name="npass" required>
               <button type="submit" name="submit">Update password</button>
               </form>
           </div>
        
        </div>
        
       
     </div>
    
</body>
</html>