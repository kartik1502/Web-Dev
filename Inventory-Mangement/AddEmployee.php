<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee | Inventory Management</title>
    <link rel="stylesheet" href="StyleFront.css">
    <link rel="stylesheet" href="StyleDashboard.css">
    <link rel="stylesheet" href="Demo.css">
    <link rel="stylesheet" href="StyleDemo.css">
</head>
<body>
    <div class="imageC">
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
                First Name: <input type="text" required class="text_box0" name="Emp_FName"><br><br>
                Last Name: <input type="text" required class="text_box0" name="Emp_LName"><br><br>
                Email Id: <input type="email" required class="text_box0" name="Email_id"><br><br>
                Place: <input type="text" required class="text_box0" name="address"><br><br>
                Hired On: <input type="date" required class="text_box0" name="Hire_date"><br><br>
                Contact Number: <input type="number" required class="text_box0" name="Contact_no"><br><br>

            <?php
              $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
          
              // Check connection
              if($conn === false){
                  die("ERROR: Could not connect." 
                      . mysqli_connect_error());
              }
              $sql = "SELECT * FROM job";
              
              $result = mysqli_query($conn,$sql);
              
              
                  echo "<label>Job Id:";
                  echo '<select name="Job_id" class="text_box0">';
                  
                  while($row = mysqli_fetch_assoc($result)) {   
                      echo "<option>" .$row['Job_id']. "</option>";
                  }
                  echo '</select>';
                  echo '</label>';
                  echo '<br><br>';
              
    
              
              

              mysqli_close($conn);
              ?>
                
           
               
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
          
          $Emp_FName =  $_REQUEST['Emp_FName'];
          $Emp_LName = $_REQUEST['Emp_LName'];
          $Email_id = $_REQUEST['Email_id'];
          $address = $_REQUEST['address'];
          $Hire_date = $_REQUEST['Hire_date'];
          $Contact_no = $_REQUEST['Contact_no'];
          $Job_id = $_REQUEST['Job_id'];
          // Performing insert query execution
          // here our table name is college
          if(isset($_REQUEST['Emp_FName']) && isset($_REQUEST['Emp_LName']) && isset($_REQUEST['Email_id']) && isset($_REQUEST['address']) && isset($_REQUEST['Hire_date']) && isset($_REQUEST['Contact_no'])){
            $sql = "INSERT INTO addemployee (Emp_FName,Emp_LName,Email_id,address,Hire_date,Contact_no,Job_id) VALUES ('$Emp_FName','$Emp_LName','$Email_id','$address','$Hire_date','$Contact_no','$Job_id')";
                
              if(mysqli_query($conn, $sql)){
                echo '<script>alert("Employee Details Added Sucessfully")</script>'; 
        
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