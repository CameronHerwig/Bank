<?php
require_once 'db_connect.php';
require_once 'function.php';
error_reporting(E_ALL ^ E_NOTICE);


  if(isset($_POST['cnum'])||isset($_POST['type'])||isset($_POST['balance'])){

    $cnum = $_POST['cnum'];
    $type = $_POST['type'];
    $bal = $_POST['balance'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(login($db,$username,$password)) {
      SaveAccountInfo($db, $cnum, $type, $bal);
    }
  }



function SaveAccountInfo($_db, $_cnum, $_type, $_bal)
{
  /* Prepared statement, stage 1: prepare query */
  if (!($stmt = $_db->prepare("INSERT INTO Account (cnum, type, balance) VALUES (?, ?, ?)")))
  {
    echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
  }

  /* Prepared statement, stage 2: bind parameters*/
  if (!$stmt->bind_param('isd',$_cnum, $_type, $_bal))
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
