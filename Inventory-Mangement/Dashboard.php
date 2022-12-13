<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Inventory Management</title>
    <link rel="stylesheet" href="StyleFront.css">
    <link rel="stylesheet" href="StyleDashBoard.css">
    <link rel="stylesheet" href="Demo.css">
    <link rel="stylesheet" href="StyleDemo.css">
</head>
<body>
    <div class="image">
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
        <a href="AddEmployee.php" style="text-decoration: none;"><div class="card">
            <div class="card-background">
            <img src="470199.jpg" class="card-image">
        </div>
        <div class="card-info">
            <h1>Employees</h1>
            <br>
            <h2><?php $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
             $sql = "SELECT COUNT(Emp_id) from addemployee"; 
             $result = mysqli_query($conn,$sql); 
             while($row=mysqli_fetch_assoc($result))
            {
               print $row['COUNT(Emp_id)'];
            }?>
            </h2>
        </div></a>
        <a href="AddSupplier.php" style="text-decoration: none;"><div class="card2">
            <div class="card-background">
            <img src="Suppliers.jpg" class="card-image">
        </div>
        <div class="card-info">
            <h1>Suppliers</h1>
            <br>
            <h2><?php $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
             $sql = "SELECT COUNT(Sup_id) from Supplier"; 
             $result = mysqli_query($conn,$sql); 
             while($row=mysqli_fetch_assoc($result))
            {
               print $row['COUNT(Sup_id)'];
            }?></h2>
        </div></a>
        <a href="AddProduct.php" style="text-decoration: none;"><div class="card1">
            <div class="card-background">
            <img src="download.jfif" class="card-image">
        </div>
        <div class="card-info">
            <h1>Stocks</h1>
            <br>
            <h2><?php $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
             $sql = "SELECT COUNT(Prod_id) from Product"; 
             $result = mysqli_query($conn,$sql); 
             while($row=mysqli_fetch_assoc($result))
            {
               print $row['COUNT(Prod_id)'];
            }?></h2>
        </div></a>
        <a href="AddCustomer.php" style="text-decoration: none;"><div class="card2">
            <div class="card-background">
            <img src="customer.jpg" class="card-image">
        </div>
        <div class="card-info">
            <h1>Customers</h1>
            <br>
            <h2><?php $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
             $sql = "SELECT COUNT(Cust_id) from Customer"; 
             $result = mysqli_query($conn,$sql); 
             while($row=mysqli_fetch_assoc($result))
            {
               print $row['COUNT(Cust_id)'];
            }?></h2>
        </div></a>
        <a href="AddItemSold.php" style="text-decoration: none;"><div class="card1">
            <div class="card-background">
            <img src="sold.jpg" class="card-image">
        </div>
        <div class="card-info">
            <h1>Items Sold</h1>
            <br>
            <h2><?php $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
             $sql = "SELECT SUM(Cust_Quantity) from ItemSold"; 
             $result = mysqli_query($conn,$sql); 
             while($row=mysqli_fetch_assoc($result))
            {
               print $row['SUM(Cust_Quantity)'];
            }?></h2>
        </div></a>
        <a href="AddPlaceOrder.php" style="text-decoration: none;"><div class="card2">
            <div class="card-background">
            <img src="Orders.jpg" class="card-image">
        </div><br><br>
        <div class="card-info">
            <h1>Place Order</h1>
            <br>
            <h2><?php $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
             $sql = "SELECT COUNT(Order_id) from Orders"; 
             $result = mysqli_query($conn,$sql); 
             while($row=mysqli_fetch_assoc($result))
            {
               print $row['COUNT(Order_id)'];
            }?></h2>
        </div></a>
    </div>
</body>
</html>
<?php
        $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
          
          // Check connection
          if($conn === false){
              die("ERROR: Could not connect. " 
                  . mysqli_connect_error());
          }
         
          
            $sql = "SELECT COUNT(Emp_id) from addemployee";
            $result = mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
               print $row['COUNT(Emp_id)'];
            }
                
          
          
            
          
          mysqli_close($conn);
         
                ?>