<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.tabledit.js"></script>
        <script type="text/javascript" src="custom_table_edit2.js"></script>
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
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label>Enter HPVP enquiry number</label>
                    <input type="text" required autofocus="on" autocomplete='on' name='search_enqnum'>
                    <br><button type='submit' name="search_annex2_btn">Search</button>                          
                </form>
            <div id="annexure2_table">                                                          
                <table width=100% margin="20%" id="data_table2" class="table table-striped">             
                    <caption>
                        Annexure-2
                    </caption>
                    <tr>
                        <th>SNO</th>
                        <th>NAME OF DOCUMENT</th>
                        <th>DATE</th>
                        <th>FILE NAME</th>
                        <th>HPVP ENQ.NO</th>    
                    </tr>
                     <?php
                        include 'connection1.php';
                        if(isset($_POST['search_annex2_btn'])){                        
                        $HPVP2=$_REQUEST['search_enqnum'];
                        $sql="SELECT * from annexure2 where hpvp='$HPVP2'";
                        $result = $db1->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $_SESSION["sno"] = $row['sno'];
                                /*you can name your table columns and change it in the $row["column name"] if u wish*/
                                     echo   "<tr><td>".$row["sno"]
                                        ."</td><td>".$row["name_of_doc"]
                                        ."</td><td>".$row["date"]
                                        ."</td><td>".$row["file_name"]
                                        ."</td><td>".$row["hpvp"]
                                        ."</td><td>
                                        <form action='editfile2.php' method='post' enctype='multipart/form-data'>
                                                <input type='file' name='myfile2'> <br></td><td>
                                                <button type='submit' name='add_annexure2_btn'>DONE</button>"
                                        . "</form></td></tr>";
                            }
                        }}
                        mysqli_close($db1);

                        ?>
                    </table>
                </div>
                <!--<button name="add_btn" type="submit" onclick="window.location.href='annexure2.php';">Done</button> -->
            </DIV>
       </section>
    </body>
</html>
           
                        
                
                    