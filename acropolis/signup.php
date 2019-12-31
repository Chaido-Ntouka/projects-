<?php
include("header.inc");
//include("dbc.php");
?>
<form method="POST" action="reg.php" name="form">
    <table>
   <tr><td style="text-align:right"  >Email</td><td> <input autocomplete="on" name="email" type="email"><br></td></tr>
   <tr><td style="text-align:right">Password </td><td><input autocomplete="on" name="password" type="password"><br></td></tr>
    <tr><td  style="text-align:right">Confirm Password </td><td><input autocomplete="on" name="conf_pass" type="password"><br></td></tr>
  <tr><td style="text-align:right">Name</td><td> <input autocomplete="on" name="name" type="text"><br></td></tr>
   <tr><td style="text-align:right">Surname</td><td><input autocomplete="on" name="surname" type="text"><br></td></tr>
    <tr><td style="text-align:right">Phone</td><td><input name="phone" type="tel"></td></tr>
    <tr><td style="text-align:right"></td><td><br> <button formmethod="post" value="SUBMIT" name="SUBMIT">SUBMIT</button></td></tr>
    </table>
      </form>
      <p><br>

    
      </p>
      </div>
      </body>
      </html>