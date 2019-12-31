<?php
include("header.inc");
?>
      <h2>User Login</h2>
      <form name="login" method="post" action="email.php">
        <table>
	  <tr><td style="text-align:right">Email:</td><td><input type="text" name="email"></td></tr>
    <tr><td style="text-align:right">Password:</td><td><input type="password" name="password"></td></tr>
      <tr><td></td><td><input type="submit" name="submit" value="Submit"></td></tr>
	</table>
      </form>
      Don't have an account? <a href="signup.php">Sign Up!</a>
    </div>
  </body >
</html>
