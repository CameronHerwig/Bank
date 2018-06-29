<?php
require_once 'db_connect.php';
require_once 'function.php';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['anum'])||isset($_POST['type'])||isset($_POST['amount'])){

    $anum = $_POST['anum'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $username = $_POST['username'];
    $password = $_POST['password'];


if(login($db,$username,$password)) {
    SaveAccountInfo($db, $anum, $type, $amount);
  }

}

function SaveAccountInfo($_db, $_anum, $_type, $_amount)
{
  /* Prepared statement, stage 1: prepare query */
  if($_type == "Deposit")
  {
    if (!($stmt = $_db->prepare("UPDATE Account SET balance= balance + ? , lastamount = ? WHERE anum=?")))
    {
      echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
    }
  }
  else
  {
    if (!($stmt = $_db->prepare("UPDATE Account SET balance= balance - ? , lastamount = ? WHERE anum=?")))
    {
      echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
    }
  }

  /* Prepared statement, stage 2: bind parameters*/
  if (!$stmt->bind_param('ddi', $_amount, $_amount, $_anum))
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
