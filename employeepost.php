<?php
require_once 'db_connect.php';
require_once 'function.php';
error_reporting(E_ALL ^ E_NOTICE);

  if(isset($_POST['neusername'])||isset($_POST['nepassword'])||isset($_POST['name'])||isset($_POST['phone'])){

    $neusername = $_POST['neusername'];
    $nepassword = $_POST['nepassword'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $salt1 = "qm&h*";
    $salt2 = "pg!@";
    $token = hash('ripemd128', "$salt1$nepassword$salt2");
    SaveEmployeeAccount($db, $neusername, $token, $name, $phone);

}


function SaveEmployeeAccount($_db, $_username, $_password, $_name, $_phone)
{
  /* Prepared statement, stage 1: prepare query */
  if (!($stmt = $_db->prepare("INSERT INTO Employees (Username, Password, Name, Phone) VALUES (?, ?, ?, ?)")))
  {
    echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
  }

  /* Prepared statement, stage 2: bind parameters*/
  if (!$stmt->bind_param('ssss', $_username, $_password, $_name, $_phone))
  {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }

  /* Prepared statement, stage 3: execute*/
  if (!$stmt->execute())
  {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  else{
      header('Location: index.php');
  }
}

?>
