<?php
require_once 'db_connect.php';
require_once 'function.php';
error_reporting(E_ALL ^ E_NOTICE);


  if(isset($_POST['name'])||isset($_POST['phone'])||isset($_POST['street'])||isset($_POST['city'])||isset($_POST['zip'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(login($db,$username,$password)) {
    SaveCustomerAccount($db, $name, $phone, $street, $city, $zip);
    }
  }


function SaveCustomerAccount($_db, $_name, $_phone, $_street, $_city, $_zip)
{
  /* Prepared statement, stage 1: prepare query */
  if (!($stmt = $_db->prepare("INSERT INTO Customer (name, phone, street, city, zip) VALUES (?, ?, ?, ?, ?)")))
  {
    echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
  }

  /* Prepared statement, stage 2: bind parameters*/
  if (!$stmt->bind_param('sssss', $_name, $_phone, $_street, $_city, $_zip))
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
