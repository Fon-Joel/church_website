<?php
// Database configuration
$db['servername']= "100.26.181.56";
$db['username'] = "fjoel";
$db['password'] = "school1";
$db['database'] = "leaders";

// Create the database connection
foreach($db as $key => $value){
define(strtoupper($key), $value);
}
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
if(!$conn){
    die("connecion failed". mysqli_error($conn));

}
?>
