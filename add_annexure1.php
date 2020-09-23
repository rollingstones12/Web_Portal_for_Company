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
        <a id="go_back" href="annexure1.php">Go Back</a>
       </aside>
            <section>
            <div id="main_area">
            <div id="addtoannexure1_form">
                <center>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"  enctype="multipart/form-data">
                    <table width=500>
                        <caption> Add Row</caption>
                        <tr width=500>
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
                        <tr width=500>
                            <td>
                                <input maxlength=30 type="text"  name="Marketing_Group"  autocomplete="on" 
                                    autofocus>
                            </td>
                            <td>
                                <input  type="text"  name="HPVP_ENQNO"  autocomplete="on" 
                                required>
                            </td>
                            <td>
                                <input type="text"  name="CONSU_CUST_NM"  autocomplete="on" 
                                required>
                            </td>
                            <td>
                                <input type="text"  name="CONS_CUST_ENQNO_DT"  autocomplete="on" 
                                required>
                            </td>
                            <td>
                                <input  type="date"  name="DUE_DATE"  autocomplete="on"> 
                                    
                            </td>
                            <td>
                                <input type="text"  name="CONTACT_PERSON_PH NO"  autocomplete="on"> 
                                    
                            </td>
                            <td>
                                <input type="text"  name="DESCRIPTION"  autocomplete="on"> 
                                    
                            </td>
                            <td>
                                <input  type="number"  name="QTY_NOS"  autocomplete="on" >
                                    
                            </td>
                            <td>
                                <input type="text"  name="HPVP_OFFER_REF"  autocomplete="on"> 
                                    
                            </td>
                            <td>
                                <input  type="text"  name="DELIVERY_MONTH"  autocomplete="on"> 
                                    
                            </td>
                            <td>
                                <input  type="text"  name="REMARKS"  autocomplete="on"> 
                                    
                            </td>
                            <td>
                            <!--CHANGES -->
                             <input type="file" name="myfile"> <br>
                                <?php include 'filelogic.php'; ?>
                            <!--CHANGES -->
                            </td>
                        </tr>    
                    </table>
                   <button type="submit" name="add_annexure1_btn">Submit</button>
                   <br><br>
                </form>
                <?php
                    include 'connection1.php';
                    if(isset($_POST['add_annexure1_btn'])){
                        $Marketing_Group=$_REQUEST['Marketing_Group'];
                        $HPVP_ENQNO=$_REQUEST['HPVP_ENQNO'];
                        $CONSU_CUST_NM=$_REQUEST['CONSU_CUST_NM'];
                        $CONS_CUST_ENQNO_DT=$_REQUEST['CONS_CUST_ENQNO_DT'];
                        $DUE_DATE=$_REQUEST['DUE_DATE'];
                        $CONTACT_PERSON_PH_NO=$_REQUEST['CONTACT_PERSON_PH_NO'];
                        $DESCRIPTION=$_REQUEST['DESCRIPTION'];
                        $QTY_NOS=$_REQUEST['QTY_NOS'];
                        $HPVP_OFFER_REF=$_REQUEST['HPVP_OFFER_REF'];
                        $DELIVERY_MONTH=$_REQUEST['DELIVERY_MONTH'];
                        $REMARKS=$_REQUEST['REMARKS'];
                       
                        
                        $sql="INSERT INTO tender VALUES('$Marketing_Group','$HPVP_ENQNO',
                             '$CONSU_CUST_NM', '$CONS_CUST_ENQNO_DT','$DUE_DATE','$CONTACT_PERSON_PH_NO',
                             '$DESCRIPTION','$QTY_NOS','$HPVP_OFFER_REF','$DELIVERY_MONTH','$REMARKS','$filename')";
                        $result = $db1->query($sql);
                        if($result){
                             $message='Successfully Added!';
                             $_SESSION['message_add_annex1']=$message;
                             echo '<script>window.location.href = "annexure1.php";</script>';
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
     