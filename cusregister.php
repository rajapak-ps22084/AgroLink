<?php
include("db.php");

$message = "";

if(isset($_POST['register']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $role = "customer";

    $sql = "INSERT INTO users
    (fullname,email,phone,address,password,role)
    VALUES
    ('$fullname','$email','$phone','$address','$password','$role')";

    if(mysqli_query($conn,$sql))
    {
        header("Location: cuslogin.php");
        exit();
    }
    else
    {
        $message = "Registration Failed!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Customer Register</title>

    <link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>

<body class="inner-page">

    <div class="form-container">

        <div class="form-box">

            <h1>Customer Register</h1>

            <?php
            if($message!="")
            {
                echo "<p style='color:red;'>$message</p>";
            }
            ?>

<form method="POST" onsubmit="return validateRegister()">

                <input type="text"
                    name="fullname"
                    placeholder="Full Name"
                    required>

                <input type="email"
                    name="email"
                    placeholder="Email Address"
                    required>

                <input type="text"
                    name="phone"
                    placeholder="Phone Number"
                    required>

                <input type="text"
                    name="address"
                    placeholder="Address"
                    required>

                <input type="password"
                    name="password"
                    placeholder="Password"
                    required>

                <button type="submit"
                    name="register">
                    Register
                </button>

            </form>

            <p>
                Already have an account?
                <a href="cuslogin.php">Login</a>
            </p>

        </div>

    </div>

</body>

</html>