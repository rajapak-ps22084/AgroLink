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
            AND role='farmer'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password']))
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['role'] = $row['role'];

            header("Location: fardashboard.php");
            exit();
        }
        else
        {
            $error = "Invalid Password!";
        }
    }
    else
    {
        $error = "Farmer Account Not Found!";
    }
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>Farmer Login</title>
    <link rel="stylesheet" href="style.css">
<script>
function validateLogin()
{
    let email =
    document.getElementById("email").value.trim();

    let password =
    document.getElementById("password").value.trim();

    if(email === "")
    {
        alert("Please enter your email");
        return false;
    }

    let pattern =
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!pattern.test(email))
    {
        alert("Enter a valid email address");
        return false;
    }

    if(password === "")
    {
        alert("Please enter your password");
        return false;
    }

    if(password.length < 6)
    {
        alert("Password must be at least 6 characters");
        return false;
    }

    return true;
}
</script>



</head>

<body class="inner-page">

<div class="form-container">

    <div class="form-box">

        <h1>Farmer Login</h1>
<?php
if($error != "")
{
    echo "<p style='color:red;'>$error</p>";
}
?>

        <form action="farlogin.php" method="POST"
              onsubmit="return validateLogin()">

            <input type="email"
                   id="email"
                   name="email"
                   placeholder="Enter Email">

            <input type="password"
                   id="password"
                   name="password"
                   placeholder="Enter Password">

         <button type="submit" name="login">
    Login
</button>

        </form>

    </div>

</div>


</body>

</html>
