<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stocks | Inventory Management</title>
    <link rel="stylesheet" href="StyleFront.css">
    <link rel="stylesheet" href="StyleDashboard.css">
    <link rel="stylesheet" href="StyleDemo.css">
	<link rel="stylesheet" href="Demo.css">
</head>
<body>
    <div class="imageS">
        <form action="" class="forms">
            <h1>Inventory Management</h1>
                <p>Manage the way you like.....</p>
				<div class="design">
        			<a href="#" class="logo"><img src="JK logo.jpg" alt="Karthik"></a>
    			</div>
        </form>
    <div class="navbar" id="nav">
	  <a href="Dashboard.php" class="active">Dashboard</a>
	  <div class="dropdown">
		<button class="btn">Employees
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
		  <a href="AddEmployee.php">+ New Employee</a>
		  <a href="SelectEmployee.php">View Employees</a>
		  <a href="DeleteEmployee.php">Remove Employee</a>
		</div>
	  </div> 
	  <div class="dropdown">
		<button class="btn">Suppliers
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
		  <a href="AddSupplier.php">+ New Suppliers</a>
		  <a href="SelectSupplier.php">View Suppliers</a>
		  <a href="RemoveSuppliers.php">Remove Suppliers</a>
		</div>
	  </div> 
	  <div class="dropdown">
		<button class="btn">Stocks 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
		  <a href="AddProduct.php">+ New Product</a>
		  <a href="SelectProduct.php">View Stocks</a>
		  <a href="RemoveProduct.php">Remove Product</a>
		</div>
	  </div> 
	  <div class="dropdown">
		<button class="btn">Transcation 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
		  <a href="AddTranscation.php">+ New Transcation</a>
		  <a href="SelectTranscation.php">View Transcation Details</a>
		</div>
	  </div> 
	  <div class="dropdown">
		<button class="btn">Customers 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
		  <a href="AddCustomer.php">+ New Customer</a>
		  <a href="SelectCustomer.php">View Customers</a>
		  <a href="RemoveCustomer.php">Remove Customer</a>
		</div>
	  </div> 
	  <div class="dropdown">
		<button class="btn">Item Sold 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
		  <a href="AddItemSold.php">+ Add Item Sold</a>
		  <a href="SelectItemSold.php">View Purchases</a>
		</div>
	  </div> 
	  <div class="dropdown">
		<button class="btn">Orders 
		  <i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
		  <a href="AddPlaceOrder.php">+ Place Order</a>
		  <a href="SelectPlaceOrder.php">View Orders</a>
		  <a href="StatusUpdate.php">Update Order</a>
		</div>
	  </div> 
	  <a href="Logout.php" class="active">Logout</a>
	  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div>
        <form class="forms1" method=POST>
            <div>
                Product Id: <input type="text" required name="Prod_id" class="text_box0"><br><br>
                Name: <input type="text" required name="Prod_Name" class="text_box0" id="fname"><br><br>
                Date Recived: <input type="date" required name="Date_recv" class="text_box0"><br><br>
                Serial Number: <input type="number" required name="Ser_No" class="text_box0"><br><br>
                Brand Name: <input type="text" required name="Brnd_Name" class="text_box0"><br><br>
                Avaliability: <input type="number" required name="Avaliability" class="text_box0"><br><br>
                <input type="submit" name="" class="submit-btn">
            </div>
        </form>
    </div>
   
    <script>
		function myFunction() {
		  var x = document.getElementById("nav");
		  if (x.className === "navbar") {
			x.className += " responsive";
		  } else {
			x.className = "navbar";
		  }
		}
</script>
</body>
</html>
<?php
        $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
          
          // Check connection
          if($conn === false){
              die("ERROR: Could not connect. " 
                  . mysqli_connect_error());
          }
            
          // Taking all 5 values from the form data(input)
          
          $Prod_id =  $_REQUEST['Prod_id'];
          $Prod_Name = $_REQUEST['Prod_Name'];
          $Date_recv = $_REQUEST['Date_recv'];
          $Ser_No = $_REQUEST['Ser_No'];
          $Brnd_Name = $_REQUEST['Brnd_Name'];
          $Avaliability = $_REQUEST['Avaliability'];
          
          
            
          // Performing insert query execution
          // here our table name is college
          if(isset($_REQUEST['Prod_id']) && isset($_REQUEST['Prod_Name']) && isset($_REQUEST['Date_recv']) && isset($_REQUEST['Ser_No']) && isset($_REQUEST['Brnd_Name']) && isset($_REQUEST['Avaliability'])){
            $sql = "INSERT INTO Product (Prod_id,Prod_Name,Date_recv,Ser_No,Brnd_Name,Avaliability) VALUES ('$Prod_id',
                '$Prod_Name','$Date_recv','$Ser_No','$Brnd_Name','$Avaliability')";
                
              if(mysqli_query($conn, $sql)){
                echo '<script>alert("Product Added Sucessfully")</script>'; 
        
                  /*echo nl2br("\n$Emp_FName\n $Emp_LName\n "
                      . "\n $address\n $Email_id");*/
              } else{
                  echo "ERROR: Hush! Sorry $sql. " 
                      . mysqli_error($conn);
              }
          }
          
            
          // Close connection
          mysqli_close($conn);
         
                ?>