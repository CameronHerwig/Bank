<?php
require_once "db_connect.php";
require_once "function.php";
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Loans</title>

	<!-- Bootstrap Core CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Site CSS -->
    	<link href="css/style.css" rel="stylesheet">
</head>

<body>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">BackToHome</a>
                    </li>
                    <li>
                        <a href="addcustomer.php">AddCustomer</a>
                    </li>
                    <li>
                        <a href="addemployee.php">AddEmployee</a>
                    </li>
                    <li>
                        <a href="addaccount.php">AddAccount</a>
                    </li>
                    <li>
                        <a href="addloan.php">AddLoan</a>
                    </li>
                    <li>
                        <a href="editaccount.php">EditAccounts</a>
                    </li>
                    <li>
                        <a href="editloan.php">EditLoans</a>
                    </li>
		    <li>
                        <a href="searchaccount.php">SearchAccounts</a>
                    </li>
		    <li>
                        <a href="searchloan.php">SearchLoans</a>
                    </li>
		    <li>
                        <a href="searchcustomer.php">SearchCustomers</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

  <form id="customerloans" method="post" action="searchloan.php">
    <h1>Find Customer's Loans</h1>
    <table border="0" width="100%">

      <tr>
        <td>Customer Number:</td>
        <td><input list="cnum" type="text" name="cnum" placeholder="Customer Number...">
        <datalist id="cnum">
         <?php 
          $sql = mysqli_query($db, "SELECT c1.cnum FROM Customer c1,Loan c2 WHERE c1.cnum = c2.cnum");
          while ($row = $sql->fetch_assoc()){
          echo "<option value= ".$row['cnum'] .">";
          }
         ?>
         </datalist>
       </td>
      </tr>
      <tr>
      <td><input type="submit" value= "Submit"></td>
      </tr>  
      
    </table>
  </form>

</body>
</html>

<?php
if(isset($_POST['cnum'])){
    $cnum = $_POST['cnum'];

  $query  = "SELECT * FROM Loan WHERE cnum = '$cnum'";
  $result = $db->query($query);
  if ($result->num_rows)
  {
      $row = $result->fetch_array(MYSQLI_NUM);
      $result->close();
      echo "<br>";
      echo "<table id='result' width='70%'>
              <tr>
                <th>Loan Number</th>
                <th>Customer Number</th>
                <th>Interest Rate</th>
                <th>Balance</th>
                <th>Last Payment Amount</th>
                <th>Last Payment Date</th>
                <th>Representative</th>
              </tr>";
              echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
                <td>$row[6]</td>
              </tr>";
            echo "</table>";
  }
}
?>
