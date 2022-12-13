<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Sold | Inventory Management</title>
    <link rel="stylesheet" href="StyleFront.css">
    <link rel="stylesheet" href="Demo.css">
    <link rel="stylesheet" href="StyleDashboard.css">
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
        <form action="" class="forms1" method=POST>
            <div>
            <?php
              $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
          
              // Check connection
              if($conn === false){
                  die("ERROR: Could not connect." 
                      . mysqli_connect_error());
              }
              $sql = "SELECT * FROM Customer";
              
              $result = mysqli_query($conn,$sql);
              
              
                  echo "<label>Customer Id:";
                  echo '<select name="Cust_id" class="text_box0">';
                  
                  while($row = mysqli_fetch_assoc($result)) {   
                      echo "<option>" .$row['Cust_id']. "</option>";
                  }
                  echo '</select>';
                  echo '</label>';
                  echo '<br><br>';
              
              $sql1 = "SELECT * FROM Product where Avaliability > 1";
              $result = mysqli_query($conn,$sql1);
              
                  echo "<label>Product Id:";
                  echo '<select name="Prod_id" class="text_box0">';
                  
                  while($row = mysqli_fetch_assoc($result)) {   
                      echo "<option>" .$row['Prod_id']. "</option>";
                  }
                  $row = mysqli_fetch_assoc($result);
                  $max = $row['Avaliability'];
                  echo '</select>';
                  echo '</label>';
                  echo '<br><br>';
                  echo "<label>Quantity Ordered:";
                  echo '<input min="1" type="number" required name="Cust_Quantity" class="text_box0">';
              

              mysqli_close($conn);
              ?><br><br>
                
            
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
          
          $Cust_id =  $_REQUEST['Cust_id'];
          $Prod_id = $_REQUEST['Prod_id'];
          $sql1 = "SELECT * from Product where Prod_id = '$Prod_id'";
          $result = mysqli_query($conn,$sql1);
          $row=mysqli_fetch_assoc($result);
          $Prod_Name = $row['Prod_Name'];
          $Brnd_Name = $row['Brnd_Name'];
          $Cust_Quantity = $_REQUEST['Cust_Quantity'];
          $Avaliability = $row['Avaliability'];
          
          if($Cust_Quantity > $Avaliability){
              function function_alert($message){
                echo "<script>alert('$message');</script>";
              }
              function_alert("Enter Quantity less than $Avaliability");
            
          }
          else{
            if(isset($_REQUEST['Cust_id']) && isset($_REQUEST['Prod_id']) && isset($_REQUEST['Cust_Quantity'])){
                $sql = "INSERT INTO ItemSold (Cust_id,Prod_id,Prod_Name,Brnd_Name,Cust_Quantity) VALUES ('$Cust_id','$Prod_id','$Prod_Name','$Brnd_Name','$Cust_Quantity')";
                    
                if(mysqli_query($conn, $sql)){
                  echo '<script>alert("Item Sold Details Added Sucessfully")</script>'; 
          
                    /*echo nl2br("\n$Emp_FName\n $Emp_LName\n "
                        . "\n $address\n $Email_id");*/
                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($conn);
                }
               
                
              }
          }
          
          
            
          // Performing insert query execution
          // here our table name is college
          
          
            
          // Close connection
          mysqli_close($conn);
         
                ?>