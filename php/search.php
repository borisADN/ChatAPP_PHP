<?php
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn,$_POST['searchTerm']);
// echo $searchTerm;
$output = "";
$query = "SELECT * FROM users WHERE fname LIKE '%".$searchTerm."%' OR lname LIKE '%".$searchTerm."%'";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    include "data.php";
}else{
    $output.= "no results found";
}
echo $output;
