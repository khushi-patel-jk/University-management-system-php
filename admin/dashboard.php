<?php
include("sidebar.php");
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="../images/fevicon.png" href="favicon.png">

</head>

<body class="admin-body">

    
    <!-- ================= MAIN CONTENT ================= -->

    <main class="main-content">


        <!-- TOPBAR -->

        <header class="topbar">

            <div class="topbar-left">

                <button class="sidebar-toggle">
                    ☰
                </button>

                <div>
                    <h1>Dashboard</h1>
                    <p>Welcome back, Admin 👋</p>
                </div>

            </div>


            <!-- <div class="topbar-right">

                <button class="notification-btn">
                    🔔
                    <span></span>
                </button>


                <div class="admin-profile">

                    <div class="profile-avatar">
                        A
                    </div>

                    <div class="profile-info">
                        <strong>Administrator</strong>
                        <small>Super Admin</small>
                    </div>

                    <span class="profile-arrow">⌄</span>

                </div>

            </div> -->

        </header>


        <!-- CONTENT -->

        <div class="dashboard-content">

            <div class="website-card">

                <h2>Welcome to Admin Dashboard</h2>

                <p>
                    Manage your university website from the admin panel.
                </p>

                <a href="../index.php" class="website-btn">
                    🌐 Visit Website →
                </a>

            </div>

        </div>


        <!-- FOOTER -->

        <?php
        include("footer.php");
        ?>

    </main>

</body>

</html>
