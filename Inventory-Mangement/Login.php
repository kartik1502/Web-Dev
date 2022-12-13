<?php
    $conn = mysqli_connect("localhost", "root", "", "inventoryManagement");
          
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //include 'partials/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"]; 
        
         
        $sql = "Select * from user where username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: Dashboard.php");
    
        } 
        else{
            echo '<script type="text/javascript" language="javascript">
            if(confirm("Invalid Credentials!!!!!!!"))
            {
                self.location="Login.html";
            }
            </script> ';
            exit();
        }
    }
    mysqli_close($conn);
?>