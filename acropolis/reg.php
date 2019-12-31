<?php
include("header.inc");
include("dbc.php");

$email=$_POST['email'];
$password=$_POST['password'];
$conf_pass=$_POST['conf_pass'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$phone=$_POST['phone'];

if($password==$conf_pass && $password!=""){
    $query="select count(*) from User where EMAIL='$email'";
    //echo $query;
    $result=mysqli_query($link, $query);
    while($row=mysqli_fetch_row($result)){
        $count=$row[0];
    }
    if(!$count) {
        $md5=md5($password);
        $query="INSERT INTO  User (NAME,SURNAME,PHONE,EMAIL,PASSWORD,CONFIRMED,STATUS) VALUES ('$name', '$surname','$phone','$email','$md5','no','user')";
        //echo $query;
        $result=mysqli_query($link, $query);
        
        $to      = $email;
        $subject = 'Acropolis Restaurant: Please Confirm Subscription';
        $message = "Hi $name $surname,\r\nTo confirm your subscription, visit: http://localhost/~cntouka/acropolis/confirmation.php?email=$email&token=$md5\r\nThank you!";
        $headers = 'From: admin@acropolis.gr';
        mail($to, $subject, $message, $headers);
        echo "Check your email!";
    }
    else {
        echo "User exists!";
    }
}
else {
    echo "Passwords don't match or you have not set a password!";
}
?>    
    </div>
  </body>
</html>
