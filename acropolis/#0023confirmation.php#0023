<?php
include("dbc.php");
include("header.inc");
$email=$_GET["email"];
$pass=$_GET["token"];
//echo $email;
//echo $pass;

$query="select count(*) from User where EMAIL='$email' and PASSWORD='$pass'";
//echo "$query";
$result=mysqli_query($link,$query);
while ($row=mysqli_fetch_row($result)){
    $count=$row[0];
    //echo $count;
}

if($count){
    $query="update User set CONFIRMED='yes' where EMAIL='$email' and PASSWORD='$pass'";
    //echo $query;
    $result=mysqli_query($link,$query);
    echo "Your email has been confirmed<br>\n<a href='signin.php'>Sign in</a>";
}
else {
    echo "WRONG EMAIL\n";
}


?>
    </div>
  </body>
</html>