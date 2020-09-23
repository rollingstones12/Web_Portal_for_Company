$(document).ready(function(){
$('#data_table2').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [0, 'sno'],
editable: [[1, 'name_of_doc'], 
          [2, 'date'], 
          [3, 'file_name'], 
          [4, 'hpvp']]
          
},
hideIdentifier: true,
url: 'live_edit2.php'
});
});