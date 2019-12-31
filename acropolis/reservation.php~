<?php
include("header.inc");
include("dbc.php");
/* These are our valid username and passwords */


if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $query="select count(*) from User where EMAIL='$username' and PASSWORD='$password' and CONFIRMED='yes'";
    //echo $query;
    
    $result=mysqli_query($link,$query);
    while($row=mysqli_fetch_row($result)) {
        $count=$row[0];
    }
    
    if ($count) {    
        setcookie('username', $username, time()+3600);
        setcookie('password', $password, time()+3600);

        echo 'Welcome back ' . $_COOKIE['username'];

    } else {
        header('Location: log.php');
    }
    
} else {
    header('Location: indx.php');
}
?>
    </div>
  </body>
</html>
