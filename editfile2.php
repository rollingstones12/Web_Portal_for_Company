<?php
include 'connection1.php';
session_start();
$sno = $_SESSION['sno'];
echo $sno;
if (isset($_POST['add_annexure2_btn'])) {
  $sql1 = "SELECT * FROM annexure2 where sno='$sno'";
  $result1 = mysqli_query($db1, $sql1);
  if (!$result1)
    mysqli_error($db1);
  $r = mysqli_fetch_assoc($result1);
  unlink("annexure2/" . $r['file_name']);
  include 'filelogicannexure2.php';
  $sql1 = "UPDATE annexure2 SET file_name='$filename' WHERE sno='$sno'";
  $result1 = mysqli_query($db1, $sql1);
  if (!$result1)
    echo "error";
}
header('location:annexure2.php');
?>