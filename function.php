<?php
function login($_db, $_username, $_password) {
  //require_once "db_connect.php";
  $salt1 = "qm&h*";
  $salt2 = "pg!@";
  echo $_username;

  $query  = "SELECT * FROM Employees WHERE Username = '$_username'";
  $result = $_db->query($query);
  if ($result->num_rows)
  {
      $row = $result->fetch_array(MYSQLI_NUM);
      $result->close();
      $salt1 = "qm&h*";
      $salt2 = "pg!@";
      $token = hash('ripemd128', "$salt1$_password$salt2");
      print_r([$row]);
      echo "<br>";
      echo $token;

      if ($token == $row[1])
      {
        echo "<h3> Login Successful </h3>";
        return true;
      }
      else echo "<h3> Invalid Username/Password </h3>";
  }
  else echo "<h3> Invalid Username/Password </h3>";
}
?>