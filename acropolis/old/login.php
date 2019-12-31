<?php
include("dbc.php");
error_reporting( E_ALL );
/* These are our valid username and passwords */


if (isset($_POST['username']) && isset($_POST['password'])) {
    
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $query="select count(*) from User where EMAIL='$username' and PASSWORD='$password' and CONFIRMED='yes'";
    //echo $query;
    
    $result=mysqli_query($link,$query);
    while($row=mysqli_fetch_row($result)) {
        $count=$row[0];
    }
    
    if ($count) {    
        setcookie('username', $username, time()+3600);
        setcookie('password', md5($password), time()+3600);
        header('Location: logged.php');
    }
    else {
        echo 'Username/Password Invalid';
    }
}
else {
    echo 'You must supply a username and password.';
}
?>