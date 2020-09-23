<?php
include_once("connection1.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
$update_field='';
if(isset($input['name_of_doc'])) {
$update_field.= "name_of_doc='".$input['name_of_doc']."'";
} else if(isset($input['date'])) {
$update_field.= "date='".$input['date']."'";
} else if(isset($input['file_name'])) {
$update_field.= "file_name='".$input['file_name']."'";
} else if(isset($input['hpvp'])) {
$update_field.= "hpvp='".$input['hpvp']."'";
} 
if($update_field && $input['sno']) {
$sql_query = "UPDATE annexure2 SET $update_field WHERE sno='" . $input['sno'] . "'";
$result = $db1->query($sql_query);
if(!result)
    echo "error";
}
}
?>