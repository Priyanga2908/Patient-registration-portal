<?php

include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>booking</title>
    <link href="new.css" rel="stylesheet">
</head>
<body>
<div class="heading">
        <h1>PATIENT REGISTRATION PORTAL - RM HOSPITAL</h1>
        </div>
    <div class="contai">
        
        <div class="wrap">
           <h3 class="adh">New User registeration</h3>
           <div class="center">
            <?php
                if(isset($_POST["submit"]))
                {
                    
                        $sql="insert into patient(NAME,PASS,MAIL) VALUES('{$_POST["uname"]}','{$_POST["upass"]}','{$_POST["mail"]}')";
                        $db->query($sql);
                        echo "<p class='success'>Registration successfull</p>";

                 }
               
                
            ?>
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
               <input type="text" name="uname" required placeholder="Enter your Name">
               <input type="password" name="upass" required placeholder="Enter your Password">
               <input type="email" name="mail" required placeholder="Enter your Email">
               <button type="submit" name="submit">Register</button>
               </form>
           </div>
        
        </div>
        
        
     </div>
    
</body>
</html>