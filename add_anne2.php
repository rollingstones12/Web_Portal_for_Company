<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
    </head>
    <body onload="createTable()">
        <div id="header">
            <img id="templogo" src="Temp.png" height="60" width="60">
            <img id="temp" src="Temp.png"  height="60" width="78">
            <div id="caption">COMPANY</div>
            <div id="heading_comp" >MARKETING</div>
            <div id="welcome_guest_group">
                <div id="welcome_message">Welcome: </div>
                <?php
                    session_start();
                    echo '<div id="guest_message">'.$_SESSION['username'].'</div>';
                ?>
            <div id="user_link">
            <a href="login.php">Login</a>
            <a href="#">Update Profile</a>
            <a href="#">Change Password</a>
            <a href="login.php">Logout</a>
            </div>
        </div>
        <div class="btn-group" style="width:100%">
            <button style="width:7%" name="home" type="button" onclick="window.location.href='afterlogin.php';" >HOME</button>
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
        </div> <br>
        <a id="go_back" href="annexure2.php">Go Back</a>
       </aside>
            <section>
            <div id="main_area">                                                                        
            <div id="addtoannexure2_form">
                <center>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  enctype="multipart/form-data">              <!--//dont know about htmlspecial........ so didnt changed anything!-->
                    <table width=100%>
                        <caption> Add Row</caption>
                        <tr>
                            <th>NAME OF DOCUMENT</th>
                            <th>DATE</th>
                            <th>HPVP ENQ.NO</th>
                            <th>FILE NAME</th>
                        </tr>
                        <tr width=500>
                            <td>
                                <input maxlength=30 type="text"  name="name_of_doc2"  autocomplete="on" autofocus="on">  
                            </td>
                            <td>
                                <input name="date2" type="datetime" readonly value="<?php echo date('Y-m-d'); ?>" />
                            </td>
                            <td>
                                <input  type="text"  name="HPVP_ENQNO2"  autocomplete="on" 
                                required>
                            </td> 
                            <td>
                            <!--CHANGES -->
                             <input type="file" name="myfile2"> <br>
                                <?php include 'filelogicannexure2.php'; ?>
                            <!--CHANGES -->
                            </td>
                        </tr>    
                    </table>
                   <button type="submit" name="add_annexure2_btn">Submit</button>       
                   <br><br>
                </form>
                <?php
                     include 'connection1.php';
                    if(isset($_POST['add_annexure2_btn'])){                               //changed the button name
                        $Name_of_doc2=$_REQUEST['name_of_doc2'];
                        $Date2=$_REQUEST['date2'];
                        $HPVP_ENQNO2=$_REQUEST['HPVP_ENQNO2'];
                        $sql="INSERT INTO annexure2 VALUES('null','$Name_of_doc2',
                             '$Date2','$filename','$HPVP_ENQNO2')";                                 // i dont know what to do with the sno  :(
                        $result = $db1->query($sql);
                        if($result){
                             $message='Successfully Added!';
                             $_SESSION['message_add_annex2']=$message;              // changed snnex1 to annex2
                             echo '<script>window.location.href = "annexure2.php";</script>';
                            }
                        else
                             echo '<div class="error">Unable to add data. Please try again later</div>';
                    }
                    
                mysqli_close($db1);       
               ?>         
            </center>
            </div>
            </div>
            </section>
        </body>        
</html>
     
