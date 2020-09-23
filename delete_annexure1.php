<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
    </head>
    <body >
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label>Enter HPVP enquiry number</label>
                    <input type="text" required autofocus="on" autocomplete='on' name='search_enqnum'>
                    <br><button type='submit' name="search_annex1_btn">Search</button>
                </form>
                <br><center>
                <div id="instruction">Select row to be deleted</div>
                </center><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div id="tender_table">
                <div id="caption1">
                    <center>Current Tenders</center>
                </div>
                <table id="annexure1_table">
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
                        
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
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
                                        ."</td></tr>";
                            }
                        }
                        }
                        mysqli_close($db1); 
                    ?>
                </table>
                <script>
                    highlight_row();
                    function highlight_row(){
                        var table=document.getElementById('annexure1_table');
                        var cells= table.getElementsByTagName('td');
                        for(var i=0;i<cells.length;i++){
                            var cell=cells[i];
                            cell.onclick=function(){
                                var rowId = this.parentNode.rowIndex;

                                var rowsNotSelected = table.getElementsByTagName('tr');
                                for (var row = 0; row < rowsNotSelected.length; row++) {
                                    rowsNotSelected[row].style.backgroundColor = "";
                                    rowsNotSelected[row].classList.remove('selected');
                                }
                                var rowSelected = table.getElementsByTagName('tr')[rowId];
                                rowSelected.style.backgroundColor = "yellow";
                                rowSelected.className += " selected";
                                
                                var myvar=rowSelected.cells[1].innerHTML;
                                document.cookie = "myvar="+myvar;
                                document.cookie = "rowId="+rowId;
                                document.cookie = "table="+table;
                            }
                        }
                    }
                </script>     
            </div>
                <button type="submit"  name="delete_annexure1_btn">Delete</button>
            </form>
            <?php
                include 'connection1.php';
                if(isset($_POST['delete_annexure1_btn'])){
                    if(isset($_COOKIE['myvar'])){
                        $hpvp_enqnum=$_COOKIE['myvar'];
                            //echo $hpvp_enqnum;
                        $sql1 = "SELECT * FROM tender where  HPVP_ENQNO='$hpvp_enqnum'";
                        $result1 = mysqli_query($db1, $sql1);
                        if (!$result1)
                            mysqli_error($db1);
                        $r = mysqli_fetch_assoc($result1);
                        echo $r['FILES'] . "<br>";
                        unlink("uploads/" . $r['FILES']);
                        
                        $sql="DELETE FROM tender where HPVP_ENQNO='$hpvp_enqnum'";
                        $result = $db1->query($sql);
                        if($result){
                            
                            $message='Successfully Deleted!';
                            $_SESSION['message_del_annex1']=$message;
                            echo '<script>window.location.href = "annexure1.php";</script>';
                        }
                        else
                             echo '<div class="error">Unable to add data. Please try again later.</div>';
                    }
                }
                mysqli_close($db1); 
                
            ?>
        </div>
    </section>
 </body>
</html>
