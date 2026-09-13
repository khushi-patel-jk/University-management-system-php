<?php
include("sidebar.php");
include("database.php");
// DELETE COURSE
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "DELETE FROM course WHERE c_id = $id";
    $res = mysqli_query($con, $query);

    if ($res) {
        echo "<script>
                alert('Course deleted successfully!');
                window.location.href='courses.php';
              </script>";
        exit;
    } else {
        echo "Delete failed: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="../images/fevicon.png" href="favicon.png">

</head>

<body class="admin-body">

    <main class="main-content">

        <header class="topbar">

            <div>
                <h3>Courses</h3>
                <p>Manage college courses and programs</p>
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


        <section class="page-content">

            <div class="page-heading">

                <div>
                    <h1>Course Management</h1>
                    <p>Create and manage all academic programs.</p>
                </div>

            </div>

            <!-- Course Summary -->

            <div class="content-card course-summary-card">

                <div class="table-toolbar">

                    <div>
                        <h2>All Courses</h2>
                        <p>Manage all academic programs</p>
                    </div>

                    <a href="add-course.php" class="primary-btn">
                        + Add New Course
                    </a>

                </div>


                <div class="course-summary-table">

                    <table class="student-table">

                        <thead>

                            <tr>
                                <th>No.</th>
                                <th>COURSE</th>
                                <th>CODE</th>
                                <th>DURATION</th>
                                <th>STUDENTS</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>

                        </thead>
                        

                        <tbody id="courseTableBody">
                                <?php
                                    $query = "SELECT * FROM course ORDER BY c_id DESC";
                                    $res = mysqli_query($con, $query);
                                    if (!$res) {
                                        die("Data not fetched: " . mysqli_error($con));
                                    }
                                    $i=1;
                                        while ($row = mysqli_fetch_assoc($res))
                                        {
                                ?>

                               <tr>
                                    <td>
                                        <strong>
                                            <?php echo $i; ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            <?php echo strtoupper($row['c_name']); ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <?php echo $row['c_code'];?>

                                    </td>
                                    <td>
                                        <?php echo $row['duration'];?>

                                    </td>
                                    <td>
                                        <?php echo $row['max_student'];?>
                                    </td>
                                    <td>
                                        <?php
                                        $status=$row['status'];
                                        if($status == 'Open'){
                                            echo "<span class='status green'>Open</span>";
                                        }
                                        elseif($status == 'Closed'){
                                            echo "<span class='status red'>Close</span>";

                                        }
                                        else{
                                            echo "<span class='status yellow'>Coming soon</span>";

                                        }
                                        ?>
                                        

                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                           <a href="view-course.php?c_id=<?php echo $row['c_id']; ?>" class="course-view">
                                                View Details →
                                            </a>
                                           
                                            <a
                                                href="courses.php?id=<?php echo $row['c_id']; ?>"
                                                class="delete-btn"
                                                onclick="return confirm('Are you sure you want to delete this course?');">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            $i++;
                                }
                            ?>
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