<?php
include("header.inc");
include("dbc.php");
/* These are our valid username and passwords */


if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $query="select count(*) from User where EMAIL='$username' and PASSWORD='$password' and CONFIRMED='yes' and STATUS='admin'";
    //echo $query;
    
    $result=mysqli_query($link,$query);
    while($row=mysqli_fetch_row($result)) {
        $count=$row[0];
    }
    
    if ($count) {    
        setcookie('username', $username, time()+3600);
        setcookie('password', $password, time()+3600);

        //echo 'Welcome back ' . $_COOKIE['username'];
        echo "<form method='POST' action='menu_update.php'>\n";
        echo "    <table>
      <tr>
        <th>Περιγραφή</th>
        <th>Κυριακή</th>
        <th>Δευτέρα</th>
        <th>Τρίτη</th>
        <th>Τετάρτη</th>
        <th>Πέμπτη</th>
        <th>Παρασκευή</th>
        <th>Σάββατο</th>
      </tr>\n";
        $query="SELECT MID,NAME from Meal";
        $result = mysqli_query($link,$query);
        while($row = mysqli_fetch_row($result)){
            $meal[$row[0]]=$row[1];
        }
        
        $mealnum=count($meal);
        for($i=1;$i<=$mealnum;$i++){
            for($j=1;$j<=7;$j++){
                $meal_day[$i][$j]="";
            }
        }
        
        $query="SELECT * from Meal_Day";
        $result = mysqli_query($link,$query);
        while($row = mysqli_fetch_row($result)){
            $meal_day[$row[0]][$row[1]]=" checked";
        }

        for($i=1;$i<=$mealnum;$i++){
            echo "      <tr>\n";
            echo "        <td>$meal[$i]</td>\n";
            for($j=1;$j<=7;$j++){
                echo "        <td><input".$meal_day[$i][$j]." name='$i"."x"."$j' type='checkbox'></td>\n";
            }
            echo "      </tr>\n";
        }
        
        echo "</table>\n";
        echo "<button formmethod='post' type='submit' name='Submit'>Υποβολή</button>\n";
        echo "<input name='Reset' type='reset'>\n";
        echo "</form>\n";

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
