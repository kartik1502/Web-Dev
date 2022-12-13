<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order | Inventory Management</title>
    <link rel="stylesheet" href="StyleFront.css">
    <link rel="stylesheet" href="StyleDashboard.css">
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
        <form action="" class="forms1" method=POST>
            <div>
               Date Ordered: <input type="date" required name="Date_ordered" class="text_box0"><br><br>
               Invoice Number: <input type="number" required name="Inv_No" class="text_box0"><br><br>
               Price: <input type="number" name="Price" required class="text_box0"><br><br>
               Quantity: <input type="number" required name="Quantity" class="text_box0"><br><br>
            <?php
              $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
          
              // Check connection
              if($conn === false){
                  die("ERROR: Could not connect." 
                      . mysqli_connect_error());
              }
              $sql = "SELECT * FROM Supplier";
              $result = mysqli_query($conn,$sql);
             
                  echo "<label>Supplier Id:";
                  echo '<select name="Sup_id" class="text_box0">';
                  
                  while($row = mysqli_fetch_assoc($result)) {   
                      echo "<option>" .$row['Sup_id']. "</option>";
                  }
                  echo '</select>';
                  echo '</label>';
                  echo '<br><br>';
              
              $sql1 = "SELECT * FROM Product";
              $result = mysqli_query($conn,$sql1);
             
                  echo "<label>Product Id:";
                  echo '<select name="Prod_id" class="text_box0">';
                  
                  while($row = mysqli_fetch_assoc($result)) {   
                      echo "<option>" .$row['Prod_id']. "</option>";
                  }
                  echo '</select>';
                  echo '</label><br><br>';
                 
              
              $sql1 = "SELECT * FROM AddEmployee";
              $result = mysqli_query($conn,$sql1);
             
                  echo "<label>Employee Id:";
                  echo '<select name="Emp_id" class="text_box0">';
                  
                  while($row = mysqli_fetch_assoc($result)) {   
                      echo "<option>" .$row['Emp_id']. "</option>";
                  }
                  echo '</select>';
                  echo '</label>';
                 
              
              

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
          
          
          $Date_ordered = $_REQUEST['Date_ordered'];
          $Inv_No = $_REQUEST['Inv_No'];
          $Price = $_REQUEST['Price'];
          $Quantity = $_REQUEST['Quantity'];
          
          $Sup_id = $_REQUEST['Sup_id'];
          $Prod_id = $_REQUEST['Prod_id'];
          $Emp_id = $_REQUEST['Emp_id'];
          
          
          
            
          // Performing insert query execution
          // here our table name is college
          if(isset($_REQUEST['Date_ordered']) && isset($_REQUEST['Inv_No']) && isset($_REQUEST['Price']) && isset($_REQUEST['Quantity']) && isset($_REQUEST['Sup_id']) && isset($_REQUEST['Prod_id']) && isset($_REQUEST['Emp_id']) ){
            $sql = "INSERT INTO Orders (Date_ordered,Inv_No,Price,Quantity,Tot_Price,Sup_id,Prod_id,Emp_id,Status) VALUES ('$Date_ordered','$Inv_No','$Price','$Quantity','0','$Sup_id','$Prod_id','$Emp_id','0')";
                
              if(mysqli_query($conn, $sql)){
                echo '<script>alert("Orders Details Added Sucessfully")</script>'; 
        
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