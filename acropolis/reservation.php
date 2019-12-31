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

        
?>
            <p>Φόρμα Κράτησης </p>
        <br>
        <form method="POST" action="makeres.php" name="form">Ημερομηνία
        <input name="date" value=<?php echo "\"".date('Y-m-j')."\"";?> type="date"> Ώρα <input name="time" type="time" value = <?php echo "\"".date('H:i')."\"";?>>
        Αριθμός Ατόμων
            <select name="number">
<?php
        for($i=1;$i<=20;$i++){
            echo "        <option value='$i'>$i</option>\n";
        }
?>
        </select>
        <br>
        <button type="submit" name="Enter">Υποβολή</button>
        <input name="Reset" type="reset"></form>
<?php 
        
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
