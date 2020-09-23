<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// Start the session
if(session_status()== PHP_SESSION_ACTIVE)
    session_destroy();
session_start();
?>
<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <img id="templogo" src="Temp.png" height="60" width="60">
            <img id="temp" src="Temp.png"  height="60" width="78">
            <div id="caption">COMPANY</div>
            <div id="heading_comp" >MARKETING</div>
            <div id="welcome_guest_group">
                <div id="welcome_message">Welcome: </div>
                <?php
                    echo'<div id="guest_message">Guest</div>';
                ?>
            <div id="login_link">
            <a href="login.php">Login</a>
            </div>
        </div>
        <div class="btn-group" style="width:100%">
            <button style="width:7%" name="home" onclick="window.location.href='home.php';" type="button" >HOME</button>
            <button style="width:10%" name="abt" type="button">ABOUT US</button>
            <button style="width:12%" name="cust" type="button">OUR CUSTOMERS</button>
            <button style="width:20%" name="bus" type="button">BUSINESS ENVIRONMENT</button>
            <button style="width:12%" name="onl" type="button">ONLINE SYSTEM</button>
            <button style="width:10%" name="tend" type="button">TENDERS</button>
            <button style="width:10%" name="cont" type="button">CONTRACTS</button>
            <button style="width:17%" name="emp" type="button">EMPLOYEE CORNER</button> 
        </div>
        <aside>
        <div id="qlinks">
            <center><div id="qlinks_heading">Quick Links</div><br></center>
            <ul>
                <li><a href="#">Old Website</a></li>
                <li><a href="#">Customer Directory</a></li>
                <li><a href="#">Client Certificate</a></li>
                <li><a href="#">Knowledge Management</a></li>
                <li><a href="#">Telephone Directory</a></li>
                <li><a href="#">Debator Management System(DMS)</a></li>
                <li><a href="#">WebMail</a></li>
                <li><a href="#">Policy Documents for Reference</a></li>
            </ul>
        </div> 
        </aside>
        <section>
            <div id="main_area">
            <div id="login_form">
                <center>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div id="login_heading">Login</div><br>
                    <span id="label_for_staffno" >Staff No</span>
                    <input type="number" id="staffno_input" name="staffno"  autocomplete="on" 
                            placeholder="Enter Staff Number" autofocus required>
                    <br><br>
                    <span id="label_for_password">Password</span>
                    <input type="password" minlength="6" id="password_input" name="passwd"  autocomplete="on" 
                           placeholder="Enter Password" required><br><br>
                    <button type="submit" name="login_btn">Login</button>
                    <br><br>
                    <div id="help">
                        <a href="passwordrecovery.php" name="forgot">Forgot you Password?</a>
                        |      <a name="help" href="#">Help?</a>
                    </div>
                <?php
                    include 'connection1.php';
                    if ($db1->connect_error) {
                        die("Connection failed: " . $db1->connect_error);
                    }
                    if(isset($_POST['login_btn'])){
                        $staffnum=$_REQUEST['staffno'];
                        $password=$_REQUEST['passwd'];
                        $sql="Select password,name from user where Staffno=$staffnum";
                        $result= mysqli_query($db1, $sql) or die(mysqli_error($db1));
                        $row= mysqli_num_rows($result);
                        if($row==1){
                            $r=$result->fetch_assoc();
                            if($r['password']==$password){
                                $_SESSION['username']=$r['name'];
                                header("location:afterlogin.php"); 
                            }
                            else{
                                session_destroy();
                                echo "<div class='error'>Incorrect Passsword</div>";
                            }
                        }    
                        else{
                            session_destroy();
                            echo "<div class='error'>User does not exist</div>";
                        }
                    } 
                    $db1->close();
                ?>
                </center>
                </form>
            </div> 
            </div>    
        </section>  
    </body>
</html>
        