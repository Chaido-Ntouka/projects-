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

        //echo 'Welcome back ' . $_COOKIE['username'];
        $query="SELECT count(*) from Meal";
        $result = mysqli_query($link,$query);
        while($row = mysqli_fetch_row($result)){
            $mealnum=$row[0];
        }

        //echo $mealnum;
        $query="truncate table Meal_Day";
        $result = mysqli_query($link,$query);
        for($i=1;$i<=$mealnum;$i++){
            for($j=1;$j<=7;$j++){
                $md=$i."x".$j;
                if(isset($_POST[$md])) {
                    $query="INSERT INTO Meal_Day (MID,DID) VALUES ('$i','$j')";
                    $result = mysqli_query($link, $query);
                }
            }
        }

        header("Location: menu.php");
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
