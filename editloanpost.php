<?php
require_once 'db_connect.php';
require_once 'function.php';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['lnum'])||isset($_POST['amount'])){

    $lnum = $_POST['lnum'];
    $amount = $_POST['amount'];
    $username = $_POST['username'];
    $password = $_POST['password'];


if(login($db,$username,$password)) {
    SaveAccountInfo($db, $lnum, $amount);
  }

}

function SaveAccountInfo($_db, $_lnum, $_amount)
{
  /* Prepared statement, stage 1: prepare query */

  if (!($stmt = $_db->prepare("UPDATE Loan SET amount = amount - ? , lastamount = ? WHERE lnum=?")))
   {
     echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
  }

  /* Prepared statement, stage 2: bind parameters*/
  if (!$stmt->bind_param('ddi', $_amount, $_amount, $_lnum))
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
