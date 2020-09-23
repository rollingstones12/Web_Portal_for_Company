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
            <button style="width:7%" name="home" type="button" onclick="window.location.href='home.php';">HOME</button>
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
                <div id="passwordrecovery_form">
                    <center>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div id="passwordrecovery_heading">Password Recovery Form</div><br>
                        <span id="instruction">Enter your Staff No
                            to receive your password</span><br><br>
                        <span id="labelfor_enterstaffno" >Staff No</span>
                        <input type="text" id="enterstaffno" name="enterstaffno"  autocomplete="on" 
                            placeholder="Enter Staff Number" required>
                        <br><br>
                        <button type="submit" name="enter_btn">Send Password on my Email ID</button>
                        </form>   
                        <?php
                            
                           include 'connection1.php';

                            if ($db1->connect_error) {
                                die("Connection failed: " . $db1->connect_error);}

                            if(isset($_POST['enter_btn'])){
                                $staff_no=$_POST['enterstaffno'];
                                $query="select * from user WHERE Staffno=$staff_no";   
                                $query_run=mysqli_query($db1,$query);
	
                                if(mysqli_num_rows($query_run)>0)   
                                {
                                    $value= mysqli_fetch_array($query_run);
                                    $old_password=$value['password'];
                                    $sendto = $value['email'];
                                    $subject = 'Your Password';
                                    if(mail($sendto, $subject, $old_password)){
                                        echo '<div class="success">Your Password has been sent to your Mail.</div>';
                                        }       
                                     else{
                                        echo '<div class="error">Unable to send email. Please try again.</div>';
                                        }   
                                }
                                else{
                                    echo '<div class="error">Invalid</div>';
                                }    
                            }
                            $db1->close();
                        ?>
                    </center>           
            </div>
        </section>
    </body>
</html>    
     