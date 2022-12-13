<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order | Inventory Management</title>
    <link rel="stylesheet" href="StyleFront.css">
    <link rel="stylesheet" href="StyleDemo.css">
    <link rel="stylesheet" href="StyleDashboard.css">
	<link rel="stylesheet" href="Demo.css">
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
        <form action="" class="forms1" method=POST>
            <div>
            <?php
              $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
          
              // Check connection
              if($conn === false){
                  die("ERROR: Could not connect." 
                      . mysqli_connect_error());
              }
              $sql = "SELECT * FROM Orders where Status = 0";
              $result = mysqli_query($conn,$sql);
              
                  echo "<label>Order Id:";
                  echo '<select name="Order_id" class="text_box0">';
                  
                  while($row = mysqli_fetch_assoc($result)) {   
                      echo "<option>" .$row['Order_id']. "</option>";
                  }
                  echo '</select>';
                  echo '</label>';
              
            
              

              mysqli_close($conn);
            ?><br><br>
                Status: <select name="Status" class="text_box0">
                            <option value="1">1</option>
                            <option value="0">0</option>
                </select><br><br>
                <input type="submit" name="" class="submit-btn">
            </div>
        </form>
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
            
          // Taking all 5 values from the form data(input)
          
          
          $Order_id = $_REQUEST['Order_id'];
          $Status = $_REQUEST['Status'];
          
          $sql0 = "SELECT * FROM Orders where Order_id = $Order_id";
		  $result = mysqli_query($conn,$sql0);
		  $row = mysqli_fetch_assoc($result);
		  $inc = $row['Quantity'];
          $Prod_id = $row['Prod_id'];
            
          // Performing insert query execution
          // here our table name is college
          if(isset($_REQUEST['Order_id']) && isset($_REQUEST['Status'])){
            $sql = "UPDATE Orders set Status = $Status where Order_id = $Order_id";
			$sql1 = "UPDATE Product set Avaliability = $Avaliability + $inc where Prod_id = $Prod_id";
                
              if(mysqli_query($conn, $sql)){

                echo '<script>alert("Status Updated Sucessfully")</script>'; 
        
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