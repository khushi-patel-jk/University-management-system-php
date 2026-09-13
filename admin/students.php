<?php
include("sidebar.php");
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="../images/fevicon.png" href="favicon.png">

</head>

<body class="admin-body">

    <!-- Main Content -->
    <main class="main-content">

        <!-- Topbar -->
        <header class="topbar">

            <div>
                <h3>Students</h3>
                <p>Manage all registered students</p>
            </div>

            <!-- <div class="topbar-right">

                <button class="notification-btn">♢</button>

                <div class="admin-profile">
                    <div class="profile-avatar">A</div>

                    <div class="profile-info">
                        <strong>Administrator</strong>
                        <span>Super Admin</span>
                    </div>

                    <span class="profile-arrow">⌄</span>
                </div>

            </div> -->

        </header>


        <!-- Page Content -->
        <section class="page-content">

            <!-- Student Table Card -->
            <div class="content-card">

                <div class="table-toolbar">

                    <div>
                        <h2>All Students</h2>
                        <p>Showing registered student records</p>
                    </div>

                    <!-- <div class="table-filters">

                        <div class="search-box">
                            <span>⌕</span>
                            <input type="text" placeholder="Search student...">
                        </div>

                        <select>
                            <option>All Courses</option>
                            <option>BCA</option>
                            <option>BBA</option>
                            <option>MBA</option>
                        </select>

                        <select>
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Pending</option>
                            <option>Inactive</option>
                        </select>

                    </div> -->

                </div>


                <div class="student-table-wrapper">

                    <table class="student-table">

                        <thead>
                            <tr>
                                <th>STUDENT ID</th>
                                <th>STUDENT</th>
                                <th>EMAIL</th>
                                <th>COURSE<th>                 
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $query = "SELECT r_id,f_name, email, contact, c_name FROM registration, course WHERE registration.course = course.c_id ORDER BY r_id DESC;";
                            $res = mysqli_query($con, $query);
                            if (!$res) {
                                die("Data not fetched: " . mysqli_error($con));
                            }
                            $i=1;
                            while ($row = mysqli_fetch_assoc($res))
                            {
                            ?>
                            <tr>
                                <td><strong><?php echo $i;?></strong></td>

                                <td>
                                    <div class="student-info">
                                        <div>
                                            <strong><?php echo strtoupper($row['f_name']);?></strong>
                                            <span><?php echo $row['contact'];?></span>
                                        </div>
                                    </div>
                                </td>

                                <td><?php echo $row['email'];?></td>

                                <td>
                                    <span class="course-tag"><?php echo $row['c_name'];?></span>
                                </td>

                                <?php
                                $i++;
                                }
                                ?>
                            </tr>
                        </tbody>

                    </table>

                </div>

            </div>

        </section>


       <?php
        include("footer.php");
        ?>

    </main>

</body>

</html>