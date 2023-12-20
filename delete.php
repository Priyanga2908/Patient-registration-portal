<?php
session_start();
include "db.php";

if (!isset($_SESSION["ID"])) {
    header("location:login.php");
}

// Check if the form is submitted
if (isset($_POST["submit"])) {

  
$sql = "DELETE FROM register WHERE PNAME='{$_SESSION["NAME"]}' ORDER BY timestamp_column DESC LIMIT 1";


    $result = $db->query($sql);

    if ($result) {
        $successMessage = "Form successfully deleted";
    } else {
        $errorMessage = "Error deleting form: " . $db->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="home.css" rel="stylesheet"/>
    <title>Booking</title>
</head>
<body>
    <div class="contai">
        <div class="heading">
            <h1>PATIENT REGISTRATION PORTAL</h1>
        </div>
        <div class="wrap">
            <div class="center">
                <form method="post" action="">
                    <div class="box">
                        <?php
                        if (isset($successMessage)) {
                            echo "<p class='success'>$successMessage</p>";
                        } elseif (isset($errorMessage)) {
                            echo "<p class='error'>$errorMessage</p>";
                        } else {
                            echo '<div class="visi">
                                    <p style="text-align: center;">Are you sure to delete the Registration?</p>
                                    <br>
                                    <div class="sub all">
                                        <button type="submit" name="submit">submit</button>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
