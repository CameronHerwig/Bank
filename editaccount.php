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

    <title>Edit Account</title>

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

  <form id="editaccount" method="post" action="editaccountpost.php">

    <h1>Add New Loan</h1>

    <table border="0" width="100%">

      <tr>
        <td>Username:</td>
        <td><input type="text" name="username" placeholder="Username..." /></td>
      </tr>

      <tr>
        <td>Password:</td>
        <td><input type="text" name="password" placeholder="Password..." /></td>
      </tr>

      <tr>
        <td>Account Number:</td>
        <td><input list="anum" type="text" name="anum" placeholder="Customer Number...">
        <datalist id="anum">
         <?php 
          $sql = mysqli_query($db, "SELECT anum FROM Account");
          while ($row = $sql->fetch_assoc()){
          echo "<option value= ".$row['anum'] .">";
          }
         ?>
         </datalist>
       </td>
      </tr>
      
      <tr>
        <td>Transaction Type:</td>
        <td>
        <select name = "type" placeholder="Transaction Type...">
        <option value="Withdrawal">Withdrawal</option>
        <option value="Deposit">Deposit</option>
        </select>
        </td>
      </tr>

      <tr>
        <td>Transaction Amount:</td>
        <td><input type="text" name="amount" placeholder="Transaction Amount..." /></td>
      </tr>

      <tr>
        <td><input type="submit" value= "Submit"></td>
      </tr>  

    </table>

  </form>

</body>
</html>
