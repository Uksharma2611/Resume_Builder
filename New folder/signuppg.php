<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) ) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
    <!-- .outer-box>.inner-box -->
    <div class="outer-box">
        <div class="inner-box">
            <header class="signup-header">
                <h1>Sign-Up</h1>
                <p>It Just Takes 30 seconds</p>
            </header>
            <main class="signup-body">
                <form action="registration.php">
                    <p>
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname"placeholder="Harsh Saxena" required>
                    </p>

                    <p>
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="harshsaxena056@gmail.com" required>
                    </p>

                    <p>
                        <label for="passwd">New Password</label>
                        <input type="password" id="passwd" name="password" placeholder="at least 8 characters" required>
                    </p>

                    <p>
                            <input type="submit" id="submit" value="Create Account">
                        
                    </p>
                </form>
            </main> 

            <footer class="signup-footer">
                <p>Already have an account?</p>
                <a href="Login.php">Login</a>
            </footer>
        </div>
        <div class="circle c1"></div>
        <div class="circle c2"></div>
    </div>
</body>
</html>