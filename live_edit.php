<?php
include_once("connection1.php");

$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
    $update_field='';
    if(isset($input['Marketing_Group'])) {
        $update_field.= "Marketing_Group='".$input['Marketing_Group']."'";
    } else if(isset($input['CONSU_CUST_NM'])) {
        $update_field.= "CONSU_CUST_NM='".$input['CONSU_CUST_NM']."'";
    } else if(isset($input['CONS_CUST_ENQNO_DT'])) {    
        $update_field.= "CONS_CUST_ENQNO_DT='".$input['CONS_CUST_ENQNO_DT']."'";
    } else if(isset($input['DUE_DATE'])) {
        $update_field.= "DUE_DATE='".$input['DUE_DATE']."'";
    } else if(isset($input['CONTACT_PERSON_PH_NO'])) {
        $update_field.= "CONTACT_PERSON_PH_NO='".$input['CONTACT_PERSON_PH_NO']."'";
    }else if(isset($input['DESCRIPTION'])) {
        $update_field.= "DESCRIPTION='".$input['DESCRIPTION']."'";
    }else if(isset($input['QTY_NOS'])) {
        $update_field.= "QTY_NOS='".$input['QTY_NOS']."'";
    }else if(isset($input['HPVP_OFFER_REF'])) {
        $update_field.= "HPVP_OFFER_REF='".$input['HPVP_OFFER_REF']."'";
    }else if(isset($input['DELIVERY_MONTH'])) {
        $update_field.= "DELIVERY_MONTH='".$input['DELIVERY_MONTH']."'";
    }else if(isset($input['REMARKS'])) {
        $update_field.= "REMARKS='".$input['REMARKS']."'";
    }
    if($update_field && $input['HPVP_ENQNO']) {
        $sql_query = "UPDATE tender SET $update_field WHERE HPVP_ENQNO='" . $input['HPVP_ENQNO'] . "'";
        $result = $db1->query($sql_query);
        if(!result)
            echo "error";
    }
}
?>