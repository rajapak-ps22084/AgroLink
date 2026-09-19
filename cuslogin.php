<?php
session_start();
include("db.php");

$error = "";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE email='$email' 
            AND role='customer'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password']))
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['role'] = $row['role'];

            header("Location: cusdashboard.php");
            exit();
        }
        else
        {
            $error = "Invalid Password";
        }
    }
    else
    {
        $error = "Customer Account Not Found";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Customer Login</title>

    <link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>

<body class="inner-page">

    <div class="form-container">

        <div class="form-box">

            <h1>Customer Login</h1>

            <?php
            if($error != "")
            {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>

            <form method="POST" onsubmit="return validateLogin()">

                <input type="email"
                    name="email"
                    placeholder="Enter Email"
                    required>

                <input type="password"
                    name="password"
                    placeholder="Enter Password"
                    required>

                <button type="submit"
                    name="login">
                    Login
                </button>

            </form>

            <p>
                Don't have an account?
                <a href="cusregister.php">Register</a>
            </p>

        </div>

    </div>

</body>

</html>