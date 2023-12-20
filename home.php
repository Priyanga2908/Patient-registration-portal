<?php
session_start();
include "db.php";

if(!isset($_SESSION["ID"]))
{
    header("location:login.php");//if the session variables match in ulogin then it will moves to user home page else in the same page
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="home.css" rel="stylesheet"/>
    <title>BOOKING</title>
</head>
<body>
    <div class="contai">
        <div class="heading">
            <h1>PATIENT REGISTRATION PORTAL </h1>
        </div>

        <div class="wrap">
            <h3 class="adh">Registration Form</h3>
            <div class="center">
            <?php
                if(isset($_POST["submit"]))
                {
                    $sql = "INSERT INTO register (PNAME,LOCATION , REGDATE, REGTIME, AMPM, DNAME, REASON, PHONE, ADDRESS, CITY, PINCODE, GENDER, DOB)
        VALUES ('{$_POST["uname"]}', '{$_POST["loc"]}', '{$_POST["registration_date"]}', 
        '{$_POST["registration_time"]}', '{$_POST["gen"]}', '{$_POST["consulting_doctor"]}', '{$_POST["reason"]}', '{$_POST["phone"]}',
         '{$_POST["address"]}', '{$_POST["city"]}', '{$_POST["pincode"]}', '{$_POST["gender"]}', '{$_POST["dob"]}')";

                       
                        $db->query($sql);

                        echo "<p class='success'>Registration successfull</p>";

                 }
               
               /*CREATE TABLE IF NOT EXISTS `register`(`ID` int(11) NOT NULL AUTO_INCREMENT, `LOCATION` varchar(150) NOT NULL,`REGDATE` DATE NOT NULL,`REGTIME` DATETIME NOT NULL,`PNAME` varchar(150) NOT NULL,`DNAME` varchar(150) NOT NULL,`REASON` varchar(150) NOT NULL,
               `PHONE` INT(10) NOT NULL,`ADDRESS` varchar(150) NOT NULL, `CITY` varchar(150) NOT NULL, `PINCODE` INT(10) NOT NULL,`GENDER` varchar(100) NOT NULL,
               `DOB` DATE NOT NULL,PRIMARY KEY (`ID`))ENGINE=INNODB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1; */
            ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <div class="name all">
                    <label>Name</label>
                        <input type="text" name="uname" required placeholder="Your name">
                    </div>

                    <div class="lo all">
                    <label>Location</label>
                        <select name="loc" required>
                            <option value="">select</option>
                            <option value="Craven street, Coimbatore">Craven street, Coimbatore</option>
                            <option value="Singanallur police station, Coimbatore">Singanallur police station, Coimbatore</option>
                            <option value="Avinashi, Coimbatore">Avinashi, Coimbatore</option>
                        </select>
                    </div>

                

                    <div class="da all">
                        <label>Registration date</label>
                        <input type="date" name="registration_date" required placeholder="Registration date">
                    </div>
 
                    <div class="tm all">
                    <label>Registration time</label>
                        <input type="time" name="registration_time" required placeholder="Registration time">
                    </div>

                    <div class="AM all">
                        <label for="gen">AM/PM</label>
                        <input type="radio" name="gen" value="AM" required> AM
                        <input type="radio" name="gen" value="PM" required> PM
                       
                    </div>

                    <div class="cd all">
                    <label>Consulting doctor</label>
                        <select name="consulting_doctor" required>
                            <option value="">select</option>
                            <option value="Dr. Ramnathan (cardiologist)">Dr. Ramnathan (cardiologist)</option>
                            <option value="Dr. Arun (Neurologist)">Dr. Arun (Neurologist)</option>
                            <option value="Dr. Bharathi (General Medicine & diabetics)">Dr. Bharathi (General Medicine & diabetics)</option>
                            <option value="Dr. Arjun Raja (Orthopedic surgeon)">Dr. Arjun Raja (Orthopedic surgeon)</option>
                            <option value="Dr. Karthick (Laproscopic surgeon)">Dr. Karthick (Laproscopic surgeon)</option>
                            <option value="Dr. Meena (Oral & Dentistry)">Dr. Meena (Oral & Dentistry)</option>
                            <option value="Dr. Mohan (Dermatology)">Dr. Mohan (Dermatology)</option>
                            <option value="Dr. Anuradha (Gynecologist)">Dr. Anuradha (Gynecologist)</option>
                            <option value="Dr. Jeyanthi (Pediatrician)">Dr. Jeyanthi (Pediatrician)</option>
                            <option value="Dr. Kandhan (ENT surgeon)">Dr. Kandhan (ENT surgeon)</option>
                        </select>
                    </div>
                   
                    <label style=padding-left:10px;>Reason</label>
                    <div class="rea all">
                   
                        <textarea name="reason" required placeholder="Reason"></textarea>
                    </div>

                    <div class="tel all">
                    <label>Phone number</label>
                        <input type="tel" name="phone" required placeholder="Phone number" pattern="[0-9]{10}" title="Please enter a 10-digit phone number (numbers only)">
                    </div>

                    <div class="ad all">
                    <label>Address</label>
                        <input type="text" name="address" required placeholder="Address">
                    </div>

                    <div class="city all">
                    <label>City</label>
                        <input type="text" name="city" required placeholder="City">
                    </div>

                    <div class="pin all">
                    <label>Pincode</label>
                        <input type="text" name="pincode" required placeholder="Pincode">
                    </div>

                    <div class="gen all">
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="male" required> Male
                        <input type="radio" name="gender" value="female" required> Female
                        <input type="radio" name="gender" value="other" required> Other
                    </div>

                    <div class="dob all">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" required>
                    </div>

                    <div class="sub all">
                        <button type="submit" name="submit">Confirm</button>
                    </div>

                    <div class="log all">
                        <a href="logout.php"><label>log out</label></a>
                    </div>
                    <div class="change all log">
                        <a href="changepass.php"><label>Change password</label></a>
                    </div>
                    <div class="change all log">
                        <a href="delete.php"><label>Delete the form</label></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>