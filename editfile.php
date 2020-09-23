<?php
include_once("connection1.php");
session_start();
$HPVP = $_SESSION['HPVP_ENQNO'];
if (isset($_POST['add_annexure1_btn'])) {
  $sql1 = "SELECT * FROM tender where HPVP_ENQNO='$HPVP'";
  $result1 = mysqli_query($db1, $sql1);
  if (!$result1)
    mysqli_error($db1);
  $r = mysqli_fetch_assoc($result1);
  unlink("uploads/" . $r['FILES']);
  include 'filelogic.php';
  $sql1 = "UPDATE tender SET FILES='$filename' WHERE HPVP_ENQNO='$HPVP'";
  $result1 = mysqli_query($db1, $sql1);
  if (!$result1)
    echo "error";
}
header('location:annexure1.php');
?>