$(document).ready(function(){
$('#data_table').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [1, 'HPVP_ENQNO'],
editable: [[0, 'Marketing_Group'], 
          [2, 'CONSU_CUST_NM'], 
          [3, 'CONS_CUST_ENQNO_DT'], 
          [4, 'DUE_DATE'], 
          [5, 'CONTACT_PERSON_PH_NO'],
          [6, 'DESCRIPTION'],
          [7, 'QTY_NOS'],
          [8, 'HPVP_OFFER_REF'],
          [9, 'DELIVERY_MONTH'],
          [10, 'REMARKS']]
          
},
hideIdentifier: true,
url: 'live_edit.php'
});
});