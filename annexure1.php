<?php include 'filelogic.php'; ?>
<!--CHANGES -->

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div id="header">
        <img id="templogo" src="Temp.png" height="60" width="60">
        <img id="temp" src="Temp.png" height="60" width="78">
        <div id="caption">COMPANY</div>
        <div id="heading_comp">MARKETING</div>
        <div id="welcome_guest_group">
            <div id="welcome_message">Welcome: </div>
            <?php
            session_start();
            echo '<div id="guest_message">' . $_SESSION['username'] . '</div>';

            ?>
            <div id="user_link">
                <a href="login.php">Login</a>
                <a href="#">Update Profile</a>
                <a href="#">Change Password</a>
                <a href="login.php">Logout</a>
            </div>
        </div>
        <div class="btn-group" style="width:100%">
            <button style="width:7%" name="home" type="button" onclick="window.location.href='afterlogin.php';">HOME</button>
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
                <center>
                    <div id="qlinks_heading">Quick Links</div><br>
                </center>
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
            <a id="go_back" href="afterlogin.php">Go Back</a>
        </aside>
        <section>
            <div id="main_area">
                <div id="table_options">
                    <center>
                        <button name="add_btn" type="submit" onclick="window.location.href='add_annexure1.php';">ADD</button>
                        <button name="edit_btn" type="submit" onclick="window.location.href='edit_annexure1.php';">EDIT</button>
                        <button name="delete_btn" type="submit" onclick="window.location.href='delete_annexure1.php';">DELETE</button>
                    </center>
                </div>
                <div id="tender_table">
                    <div id="caption1">
                        <center>Current Tenders</center>
                    </div>
                    <table>
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
                            <th>FILES</th>
                        </tr>
                        <?php
                       include 'connection1.php';
                        $sql = "SELECT * FROM tender";
                        $result = $db1->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
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
       
                                    //HERE IS ONE MORE CHANGE
                                    . "</td><td><a href='annexure1.php?file_id=" . $row['HPVP_ENQNO'] . "'>Download</a>"
                                    //HERE IS ONE MORE CHANGE
                                    . "</td></tr>";
                            }
                        }
                        mysqli_close($db1);

                        ?>
                    </table>
                </div>
                <?php

                //if (!empty($_SESSION['message_add_annex1'])) {
                  //  $message = $_SESSION['message_add_annex1'];
                    //echo '<div class="success">' . $message . '</div>';
                //} else if (!empty($_SESSION['message_del_annex1'])) {
                  //  $message = $_SESSION['message_del_annex1'];
                   // echo '<div class="success">' . $message . '</div>';
                //}

                ?>
            </div>
        </section>
</body>

</html>