<?php

require 'config.php';

function connect_db() {
    
     global $host, $username, $password, $dbname;

     $conn = mysqli_connect($host, $username, $password, $dbname);
     
     if (!$conn) {
         return false;
     } 
     return $conn;
 }

function attempt_login($email, $password) {
     $conn = connect_db();

    if (!$conn) {
         return false;
    } 
    
    $sql = "SELECT email, pword FROM USERS WHERE EMAIL = '$email' AND PWORD = '$password'";
    $result = mysqli_query($conn, $sql);
    

     if (mysqli_num_rows($result) == 1) {
          while ($row = mysqli_fetch_assoc($result)) {
          $_SESSION['users']['id'] = $row['id'];
          $_SESSION['users']['email'] = $row['email'];

          header('location: jokes.php');
          
          }         
          return true;
     }    
     return false;
}

function get_joke() {
     // create curl resource (make variable that holds curl request)
     $ch = curl_init(); 

     // set option - first the call - the variable above, then the option, then the value - what we want it to be(the url)
     curl_setopt($ch, CURLOPT_URL, "https://08ad1pao69.execute-api.us-east-1.amazonaws.com/dev/random_joke"); 

     //return the transfer as a string  first the call, then the option, then set it to true (1) - 
     //this means that we will get a json string back
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

     // set the variable $output  to the outcome of the call i.e send the transfer and store whatever comes back in $output
     $output = curl_exec($ch); 

     // convert the json string in $output to an array - now we can use it. 
     $joke = json_decode($output, true);
     
     // close curl resource to free up system resources 
     curl_close($ch); 

    
     return ($output); 

     
}



?>