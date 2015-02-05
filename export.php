<?php

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=exported-data.csv');

include 'classess/class.viewlog.php';

$data = new ViewLog();
$result = $data->getDownloadLog();
$rows = mysql_fetch_assoc($result);

if ($rows)
{
getcsv(array_keys($rows));
}
while($rows)
{
getcsv($rows);
$rows = mysql_fetch_assoc($result);
}

// get total number of fields present in the database
function getcsv($no_of_field_names)
{
$separate = '';


// do the action for all field names as field name
foreach ($no_of_field_names as $field_name)
{
if (preg_match('/\\r|\\n|,|"/', $field_name))
{
$field_name = '' . str_replace('', $field_name) . '';
}
echo $separate . $field_name;

//sepearte with the comma
$separate = ',';
}

//make new row and line
echo "\r\n";
}

?>
