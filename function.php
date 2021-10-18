<?php  
include_once "config.php";

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
function statusMassage($statusCode=0){
    $status = [
        "0"=> "",
        "1"=> "User Created Successfully",
        "2"=> "Sorry, This Email already exist...",
        "3"=> "Email or Password empty",
        "4"=> "Email Does not exist",
        "5"=> "Email or Password empty",
        "6"=> "Password Did Not Matched",

    ];

    return $status[$statusCode];
}


function getWords($userID){
    global $connection;
    $query = "SELECT * FROM `words` WHERE `user_id`=$userID ORDER BY `words`";
   $data =  mysqli_query($connection, $query);

    return $data;
}