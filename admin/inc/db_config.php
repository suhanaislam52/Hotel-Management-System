<?php
$hname='localhost';
$uname='root';
$pass='';
$db='hbwebsite';

$con=mysqli_connect($hname,$uname,$pass,$db);

if(!$con){
   die("Cannot Connect to Database".mysqli_connect_error());

}

function filteration($data)
{
   foreach($data as $key => $value){ 
     $data[$key]=trim($value);
     $data[$key]=stripcslashes($value);
     $data[$key]=htmlspecialchars($value);
     $data[$key]=strip_tags($value);
 }
 return $data;
}

function select($sql,$values,$datatypes)
{
 $con=$GLOBALS['con'];
 if($stmt=mysqli_prepare($con,$sql)){
 mysqli_stmt_bind_param($stmt,$datatypes,...$values);
 if(mysqli_stmt_execute($stmt)){
 $res=mysqli_stmt_get_result($stmt);
 mysqli_stmt_close($stmt);
 return $res;
 }
 else
 {
 mysqli_stmt_close($stmt);
 die("Query cannot be executed -Select");

 }

 }
 else{
die("Query cannot be prepared -Select");
 }
}

function execute_query($sql, $values, $datatypes, $db_host, $db_user, $db_pass, $db_name) {
     $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }

 $stmt = $conn->prepare($sql);


 $stmt->bind_param($datatypes, ...$values);


$result = $stmt->execute();


 $stmt->close();
 $conn->close();

 return $result;
}
if (!function_exists('select')) {
 function select($sql,$values,$datatypes)
 {
$con=$GLOBALS['con'];
 if($stmt=mysqli_prepare($con,$sql)){
 if(!empty($datatypes)) {
 mysqli_stmt_bind_param($stmt,$datatypes,...$values);
}
 if(mysqli_stmt_execute($stmt)){
 $res=mysqli_stmt_get_result($stmt);
 mysqli_stmt_close($stmt);
 return $res;
 }
 else
 {
 mysqli_stmt_close($stmt);
 die("Query cannot be executed -Select");

 }

 }
 else{
 die("Query cannot be prepared -Select");
 }
 }
}

?>