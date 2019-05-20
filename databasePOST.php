<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="esame";

    $conn=new mysqli ($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn,"SELECT Role FROM table1 where Username='$username' and Password='$password'");
    $row = mysqli_fetch_array($result);
    $data = $row[0];
 
    if($data){
       echo $data;
    }
    mysqli_close($con);
?>