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
        echo "<h3>Παρακαλούμε, εκτυπώστε την κράτησή σας!</h3>\n";
        $RID = $_POST["RID"];
        $dayofweek = $_POST["dayofweek"];
        //echo "$RID\n";
        $query="select NAME,SURNAME from User where EMAIL='$username'";
        $result = mysqli_query($link, $query);
        while($row=mysqli_fetch_row($result)) {
            $name=$row[0];
            $surname=$row[1];
        }
        echo "Ονοματεπώνυμο: $name $surname<br>\n";
        echo "Email: $username<br>\n";
        echo "Κωδικός Κράτησης: $RID<br>\n";
        $query="select DATEHOUR,CLIENTNUM from Res where RID='$RID'";
        $result = mysqli_query($link, $query);
        while($row=mysqli_fetch_row($result)) {
            $datetime=$row[0];
            $clientnum=$row[1];
        }
        echo "Ημερομηνία/Ώρα Κράτησης: $datetime<br>\n";
        $i=0;
        $query="select TID from Res_Tab where RID=$RID";
        $result = mysqli_query($link, $query);
        while($row=mysqli_fetch_row($result)) {
            $table[$i]=$row[0];
            $i++;
        }
        $tables=implode(", ",$table);
        echo "Αριθμός Πελατών: $clientnum<br>\n";
        echo "Κωδικοί Τραπεζιών: $tables<br>\n";
        $cost=0;
        echo "<table>\n";
        echo "<tr><th>Περιγραφή</th><th>Τιμή</th><th>Ποσότητα</th></tr>\n";
        $query="select Meal.MID,NAME,PRICE from Meal,Meal_Day where Meal.MID=Meal_Day.MID and DID=$dayofweek";
        $result = mysqli_query($link, $query);
        while($row=mysqli_fetch_row($result)) {
            $MID=$row[0];
            $mealname=$row[1];
            $price=$row[2];
            $quantity =$_POST[$MID];
            if($quantity) {
                $query1="INSERT INTO Res_Meal(RID,MID,QUANTITY) VALUES ($RID,$MID,$quantity)";
                $result1 = mysqli_query($link, $query1);
                $cost+=$quantity*$price;
                echo "<tr><td style='text-align: center'>$mealname</td><td style='text-align: center'>";
                printf("%.2f €",$price);
                echo "</td><td style='text-align: center'>$quantity</td></tr>\n";
            }
        }
        echo "</table>\n";
        printf("Συνολικό Κόστος: %.2f €<br>\n",$cost);
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
