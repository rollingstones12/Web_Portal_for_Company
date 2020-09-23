<?php
// connect to the database
include 'connection1.php';

// Uploads files
if (isset($_POST['add_annexure2_btn'])) { // if save button on the form is clicked
  // name of the uploaded file
  $filename = $_FILES['myfile2']['name'];
  //name of document and date of upload
  // destination of the file on the server
  $destination = 'annexure2/' . $filename;

  // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  // the physical file on a temporary uploads directory on the server
  $file = $_FILES['myfile2']['tmp_name'];
  $size = $_FILES['myfile2']['size'];

  if ($_FILES['myfile2']['size'] > 100000000) { // file shouldn't be larger than 100Megabyte
    echo "File too large!";
  } else {
    // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file, $destination)) {
      //echo "File uploaded successfully";
    } else {
      echo "Failed to upload file.";
    }
  }
}
//for dowload functionality

if (isset($_GET['file_id'])) {
  $id = $_GET['file_id'];
  echo $id . "ajdflk;jal;k<br>";
  // fetch file to download from database
  $sql = "SELECT * FROM annexure2 where  `sno`='$id'";
  $result = mysqli_query($db1, $sql);
  if (!$result)
    mysqli_error($db1);
  $file = mysqli_fetch_assoc($result);
  $filepath = 'annexure2/' . $file['file_name'];
  echo $filepath . "<br>";
  if (file_exists($filepath)) {
    echo "FILE EXISTS";
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filepath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('annexure2/' . $file['file_name']));
    readfile('annexure2/' . $file['file_name']);
    exit;
  } else {
    echo "File  not downloaded";
  }
}
