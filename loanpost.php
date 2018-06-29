<?php
require_once 'db_connect.php';
require_once 'function.php';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['lnum'])||isset($_POST['cnum'])||isset($_POST['rate'])||isset($_POST['amount'])||isset($_POST['rep'])){

    $cnum = $_POST['cnum'];
    $rate = $_POST['rate'];
    $amount = $_POST['amount'];
    $rep = $_POST['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];


if(login($db,$username,$password)) {
    SaveLoanInfo($db, $cnum, $rate, $amount, $rep);
  }

}

function SaveLoanInfo($_db, $_cnum, $_rate, $_amount, $_rep)
{
  /* Prepared statement, stage 1: prepare query */
  if (!($stmt = $_db->prepare("INSERT INTO Loan (cnum, rate, amount, rep) VALUES (?, ?, ?, ?)")))
  {
    echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
  }

  /* Prepared statement, stage 2: bind parameters*/
  if (!$stmt->bind_param('idds', $_cnum, $_rate, $_amount, $_rep))
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
