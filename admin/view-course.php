<?php
include("sidebar.php");
include("database.php");

if(isset($_GET['c_id']))
{
    $id = $_GET['c_id'];

    $query = "SELECT * FROM course WHERE c_id = $id";
    $res = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($res);
}
else
{
    echo "Course ID not found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Course Details</title>

    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="../images/fevicon.png" href="favicon.png">


    <style>

        .course-details-container {
            padding: 30px;
        }

        .course-header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 25px;
            border: 1px solid #e5e7eb;
        }

        .course-header small {
            color: #6b7280;
            font-weight: 600;
        }

        .course-header h1 {
            margin: 8px 0;
            font-size: 30px;
        }

        .course-code {
            color: #6b7280;
        }

        .course-section {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 20px;
            border: 1px solid #e5e7eb;
        }

        .course-section h2 {
            margin-bottom: 20px;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .info-box {
            background: #f8fafc;
            padding: 18px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .info-box span {
            display: block;
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 7px;
        }

        .info-box strong {
            font-size: 16px;
            color: #111827;
        }

        .description {
            line-height: 1.7;
            color: #4b5563;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .green {
            background: #d1fae5;
            color: #047857;
        }

        .red {
            background: #fee2e2;
            color: #dc2626;
        }

        .yellow {
            background: #fef3c7;
            color: #d97706;
        }

        .course-actions {
            margin-top: 25px;
            display: flex;
            gap: 12px;
        }

        .back-btn,
        .edit-course-btn {
            padding: 11px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }

        .back-btn {
            background: #f1f5f9;
            color: #334155;
        }

        .edit-course-btn {
            background: #2563eb;
            color: white;
        }

    </style>

</head>

<body class="admin-body">

<main class="main-content">

    <!-- TOPBAR -->

    <header class="topbar">

        <div>
            <h3>Course Details</h3>
            <p>View complete course information</p>
        </div>

        <!-- <div class="topbar-right">

            <div class="admin-profile">

                <div class="profile-avatar">
                    A
                </div>

                <div class="profile-info">
                    <strong>Administrator</strong>
                    <span>Super Admin</span>
                </div>

            </div>

        </div> -->

    </header>


    <section class="course-details-container">

        <!-- COURSE HEADER -->

        <div class="course-header">

            <small>COURSE INFORMATION</small>

            <h1>
                <?php echo $row['c_name']; ?>
            </h1>

            <div class="course-code">
                Course Code: <?php echo $row['c_code']; ?>
            </div>

        </div>


        <!-- BASIC DETAILS -->

        <div class="course-section">

            <h2>Basic Course Details</h2>

            <div class="course-grid">

                <div class="info-box">

                    <span>Course Name</span>

                    <strong>
                        <?php echo $row['c_name']; ?>
                    </strong>

                </div>


                <div class="info-box">

                    <span>Course Code</span>

                    <strong>
                        <?php echo $row['c_code']; ?>
                    </strong>

                </div>


                <div class="info-box">

                    <span>Course Type</span>

                    <strong>
                        <?php echo $row['c_type']; ?>
                    </strong>

                </div>


                <div class="info-box">

                    <span>Duration</span>

                    <strong>
                        <?php echo $row['duration']; ?>
                    </strong>

                </div>


                <div class="info-box">

                    <span>Number of Semesters</span>

                    <strong>
                        <?php echo $row['semester']; ?>
                    </strong>

                </div>


                <div class="info-box">

                    <span>Department</span>

                    <strong>
                        <?php echo $row['department']; ?>
                    </strong>

                </div>

            </div>

        </div>


        <!-- DESCRIPTION -->

        <div class="course-section">

            <h2>Course Description</h2>

            <p class="description">
                <?php echo $row['description']; ?>
            </p>

        </div>


        <!-- COURSE SETTINGS -->

        <div class="course-section">

            <h2>Course Settings</h2>

            <div class="course-grid">

                <div class="info-box">

                    <span>Maximum Students</span>

                    <strong>
                        <?php echo $row['max_student']; ?>
                    </strong>

                </div>


                <div class="info-box">

                    <span>Course Fee</span>

                    <strong>
                        ₹ <?php echo $row['fee']; ?>
                    </strong>

                </div>


                <div class="info-box">

                    <span>Admission Status</span>

                    <?php

                    $status = $row['status'];

                    if($status == "Open")
                    {
                        echo "<span class='status green'>Open</span>";
                    }
                    elseif($status == "Closed")
                    {
                        echo "<span class='status red'>Closed</span>";
                    }
                    else
                    {
                        echo "<span class='status yellow'>Coming Soon</span>";
                    }

                    ?>

                </div>

            </div>

        </div>


        <!-- BUTTONS -->

        <div class="course-actions">

            <a href="courses.php" class="back-btn">
                ← Back to Courses
            </a>

        </div>


    </section>


    <?php
        include("footer.php");
        ?>

</main>

</body>
</html>