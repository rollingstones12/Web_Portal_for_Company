<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.tabledit.js"></script>
        <script type="text/javascript" src="custom_table_edit.js"></script>
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
        <a id="go_back" href="annexure1.php">Go Back</a>
       </aside>
       <section>
            <div id="main_area">
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label>Enter HPVP enquiry number</label>
                    <input type="text" required autofocus="on" autocomplete='on' name='search_enqnum'>
                    <br><button type='submit' name="search_annex1_btn">Search</button>
                </form>
            <div id="tender_table">
                <div id="caption1">
                    <center>Current Tenders</center>
                </div>
                <table id="data_table" class="table table-striped">
                    <caption>
                        All Tenders
                    </caption>
                    <tr>
                        
                        <th>MARKETING GROUP</th>
                        <th>HPVP ENQ.NO</th>
                        <th>CONSULTANT / CUSTOMER NAME</th>
                        <th>CONSULTANT / CUSTOMER ENQ.NO/DATE</th>
                        <th>DUE DATE</th>
                        <th>CONTACT PERSON / PH NO.</th>
                        <th>DESCRIPTION</th>
                        <th>QTY (NOS)</th>
                        <th>HPVP OFFER REF</th>
                        <th>DELIVERY (MONTH)</th>
                        <th>REMARKS</th>
                    </tr>
                     <?php
                        include 'connection1.php';
                        if(isset($_POST['search_annex1_btn'])){
                        $HPVP=$_REQUEST['search_enqnum'];
                        $sql="SELECT * from tender where HPVP_ENQNO='$HPVP'";
                        $result = $db1->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $_SESSION["HPVP_ENQNO"] = $row['HPVP_ENQNO'];
                                /*you can name your table columns and change it in the $row["column name"] if u wish*/
                                     echo "<tr><td>".$row["Marketing_Group"]
                                        ."</td><td>".$row["HPVP_ENQNO"]
                                        ."</td><td>".$row["CONSU_CUST_NM"]
                                        ."</td><td>".$row["CONS_CUST_ENQNO_DT"]
                                        ."</td><td>".$row["DUE_DATE"]
                                        ."</td><td>".$row["CONTACT_PERSON_PH_NO"]
                                        ."</td><td>".$row["DESCRIPTION"]
                                        ."</td><td>".$row["QTY_NOS"]
                                        ."</td><td>".$row["HPVP_OFFER_REF"]
                                        ."</td><td>".$row["DELIVERY_MONTH"]
                                        ."</td><td>".$row["REMARKS"]
                                        ."</td><td>".$row["FILES"]
                                        . "</td><td>
                                        <form action='editfile.php' method='post' enctype='multipart/form-data'>
                                                <input type='file' name='myfile'> <br></td><td>
                                                <button type='submit' name='add_annexure1_btn'>DONE</button>"
                                        . "</form></td></tr>";
                            }
                        }}
                        mysqli_close($db1);

                        ?>
                    </table>
                </div>
                <!--<button name="add_btn" type="submit" onclick="window.location.href='annexure1.php';">Done</button> !-->
            </DIV>
       </section>
    </body>
</html>
           
                        
                
                    