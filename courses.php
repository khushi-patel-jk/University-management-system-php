<?php
include("admin/database.php");
include("header.php");

$query = "SELECT * FROM course ORDER BY c_id DESC";
$res = mysqli_query($con, $query);

if (!$res) {
    die("Data not fetched: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Courses</title>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="images/fevicon.png" href="favicon.png">


</head>


<body>




<!-- ================= PAGE HEADER ================= -->

<section class="page-header">

    <p class="small-title">
        ACADEMIC PROGRAMS
    </p>

    <h1>
        Our Courses
    </h1>

    <p>
        Choose the right course for your career.
    </p>

</section>



<!-- ================= COURSES ================= -->

<section class="section">

    <div class="course-grid">


        <?php

        if (mysqli_num_rows($res) > 0) {

            while ($row = mysqli_fetch_assoc($res)) {

        ?>


        <!-- ================= COURSE CARD ================= -->

        <div class="course-card">


            <!-- Course Type -->

            <span class="course-type">
                <?php echo $row['c_code']; ?>
            </span>


            <!-- Course Name -->

            <h2>
                <?php echo strtoupper($row['c_name']); ?>
            </h2>


            <!-- Course Information -->

            <p>

                <strong>
                    Duration:
                </strong>

                <?php echo $row['duration']; ?>

            </p>


            <p>

                <strong>
                    Maximum Students:
                </strong>

                <?php echo $row['max_student']; ?>

            </p>
            <p>
                <?php echo substr($row['description'], 0, 100); ?>...
            </p>

            <!-- Status -->

            <div class="course-status">

                <strong>
                    Status:
                </strong>


                <?php

                $status = $row['status'];


                if ($status == 'Open') {

                    echo '<span class="status green">
                            Open
                          </span>';

                }

                elseif ($status == 'Closed') {

                    echo '<span class="status red">
                            Closed
                          </span>';

                }

                else {

                    echo '<span class="status yellow">
                            Coming Soon
                          </span>';

                }

                ?>

            </div>



            <!-- ================= BUTTONS ================= -->

            <div class="course-buttons">


                <!-- View Details -->

                <a
                    href="view-course.php?c_id=<?php echo $row['c_id']; ?>"
                    class="btn"
                >
                    View Details →
                </a>


                <!-- Apply Button -->

                <?php

                if ($status == 'Open') {

                ?>

                    <a
                        href="registration.php?course_id=<?php echo $row['c_id']; ?>"
                        class="btn"
                    >
                        Apply Now
                    </a>

                <?php

                }

                else {

                ?>

                    <button
                        class="btn disabled-btn"
                        disabled
                    >
                        Not Available
                    </button>

                <?php

                }


                ?>

            </div>


        </div>


        <?php

            }

        }

        else {

        ?>


            <div class="no-course">

                <h2>
                    No Courses Available
                </h2>

                <p>
                    Currently, there are no courses available.
                </p>

            </div>


        <?php

        }

        ?>


    </div>

</section>



<!-- ================= CTA ================= -->

<section class="cta">

    <h2>
        Find Your Right Course
    </h2>


    <p>
        Start your academic journey with ABC College.
    </p>


    <a
        href="registration.php"
        class="btn white-btn"
    >
        Register Now
    </a>

</section>



<!-- ================= FOOTER ================= -->

<?php
include("footer.php");
?>


</body>

</html>