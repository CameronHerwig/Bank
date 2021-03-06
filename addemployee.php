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

    <title>Add Employee</title>

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

  <form id="addemployee" method="post" action="employeepost.php">

    <h1>Add New Employee Account</h1>

    <table border="0" width="100%">

      <tr>
        <td>New Employee Username:</td>
        <td><input type="text" name="neusername" placeholder="Username..." /></td>
      </tr>

      <tr>
        <td>New Employee Password:</td>
        <td><input type="text" name="nepassword" placeholder="Password..." /></td>
      </tr>

      <tr>
        <td>Name:</td>
        <td><input type="text" name="name" placeholder="Name..." /></td>
      </tr>

      <tr>
        <td>Phone Number:</td>
        <td><input type="text" name="phone" placeholder="0009990000..." /></td>
      </tr>
      
      <tr>
        <td><input type="submit" value= "Submit"></td>
      </tr>     
    </table>

  </form>

</body>
</html>
