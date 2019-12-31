<?php
include("header.inc");
?>
      <h2>User Login</h2>
      <form name="login" method="post" action="login.php">
        <table>
	  <tr><td style="text-align:right">Email:</td><td><input type="text" name="username"></td></tr>
	  <tr><td style="text-align:right">Password:</td><td><input type="password" name="password"></td></tr>
          <tr><td></td><td><input type="submit" name="submit" value="Login"></td></tr>
	</table>
      </form>
    </div>
  </body>
</html>
