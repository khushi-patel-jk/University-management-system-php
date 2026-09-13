<?php
include("database.php");
session_start();

// $query="create table login(l_id int primary key, user_name varchar(30), password varchar(30))";
// $res=mysqli_query($con,$query);
// if($res)
//     echo "created";
// else
//     echo "not created";

// $user_name=$_POST['user'];
// $password=$_POST['password'];

// $query="insert into login values(1,'university','univercity123')";
// $res=mysqli_query($con,$query);
// if($res)
//     echo "inserted";
// else
//     echo "not inserted";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = $_POST['user']; 
    $password = $_POST['password']; 

    if ($user_name == "university" && $password == "university123") 
    { 
        $_SESSION['admin'] = $user_name;
        header("Location: dashboard.php"); 
        exit(); 
    } 
    else 
    { 
        echo "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="../images/fevicon.png" href="favicon.png">

</head>

<body class="login-page">

    <div class="login-container">

        <!-- Left Section -->
        <div class="login-banner">

            <div class="brand">
                <div class="logo">
                            <a href="index.php">
                            <img src="../images/University.png" alt="Logo">
                            </a>
                        </div>
                        <style>
                            .logo img {
                                width: 255px;
                                height: 60px;
                                /* object-fit: contain; */
                            }
                        </style>

                
            </div>

            <div class="banner-content">

                <span class="welcome-label">ADMINISTRATION</span>

                <h1>
                    Manage Your<br>
                    University Easily.
                </h1>

                <p>
                    Manage courses and registrations
                    from one professional dashboard.
                </p>

            </div>

            <div class="banner-footer">
                <span>© <?php echo date("Y"); ?> Brightstone university. All Rights Reserved.</span>
            </div>

        </div>


        <!-- Right Section -->
        <div class="login-section">

            <div class="login-box">

                <div class="login-heading">

                    <div class="login-icon">
                        🔐
                    </div>

                    <h1>Welcome Back</h1>

                    <p>
                        Sign in to access your admin dashboard
                    </p>

                </div>


                <form method="POST">

                    <div class="form-group">

                        <label>Username</label>

                        <div class="input-wrapper">
                            <span>👤</span>

                            <input
                                type="text" name="user"
                                placeholder="Enter your username"
                                required
                            >
                        </div>

                    </div>


                    <div class="form-group">

                        <label>Password</label>

                        <div class="input-wrapper">
                            <span>🔒</span>

                            <input
                                type="password" name="password"
                                placeholder="Enter your password"
                                required
                            >
                        </div>

                    </div>
                    <button type="submit" value="submit" class="login-btn">
                        Sign In
                        <span>→</span>
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>
</html>

