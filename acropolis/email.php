<?php
include("header.inc");
error_reporting( E_ALL );
include("dbc.php");

$email=$_POST['email'];
$password=$_POST['password'];
$password=md5($password);

$query="select count(*) from User where EMAIL='$email' and PASSWORD='$password'";
//echo $query;
$result=mysqli_query($link,$query);
while ($row=mysqli_fetch_row($result)){
    $count=$row[0];
    //echo $count;
}

if ($count) {
    setcookie('username', $email, time()+3600);
    setcookie('password', $password, time()+3600);
    $query="SELECT STATUS from User where EMAIL='$email'";
    $result=mysqli_query($link,$query);
    while ($row=mysqli_fetch_row($result)){
        $status=$row[0];
    }
    if($status=="user") {
        header('Location: reservation.php');
    }
    else if($status=="admin") {
        header('Location: menu.php');
    }
} else {
    echo 'Email/Password Invalid';
}
?>
    </div>
  </body>
</html>
