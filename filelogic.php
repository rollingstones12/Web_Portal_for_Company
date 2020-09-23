<?php
include 'connection1.php';

// Uploads files
if (isset($_POST['add_annexure1_btn'])) { // if save button on the form is clicked
  // name of the uploaded file
  $filename = $_FILES['myfile']['name'];
  //name of document and date of upload
  // destination of the file on the server
  $destination = 'uploads/' . $filename;

  // get the file extension
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  // the physical file on a temporary uploads directory on the server
  $file = $_FILES['myfile']['tmp_name'];
  $size = $_FILES['myfile']['size'];

  if ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 100Megabyte
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
  //echo $id;
  // fetch file to download from database
  $sql = "SELECT * FROM tender where  HPVP_ENQNO='$id'";
  $result = $db1->query($sql);
  if (!$result)
    mysqli_error($db1);
  $file = mysqli_fetch_assoc($result);
  $filepath = 'uploads/' . $file['FILES'];
  //echo $filepath . "<br>";
  if (file_exists($filepath)) {
   // echo "FILE EXISTS";
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filepath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('uploads/' . $file['FILES']));
    readfile('uploads/' . $file['FILES']);
    exit;
  } else {
    echo "File is not downloaded";
  }
}
