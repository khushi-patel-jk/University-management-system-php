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
<html>
<head>
    <title>Brightstone university - Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="images/fevicon.png" href="favicon.png">

</head>

<body>



<section class="hero">
    <div>
        <p class="small-title">WELCOME TO Brightstone university</p>
        <h1>Build Your Future<br>With Quality Education</h1>

        <p>
            Learn, grow and prepare yourself for a successful
            professional career.
        </p>

        <a href="registration.php" class="btn">Apply Now</a>
        <a href="courses.php" class="btn secondary">Explore Courses</a>
    </div>
</section>

<section class="section">
    <p class="small-title">WHY CHOOSE US</p>
    <h2>Education That Builds Your Future</h2>

    <div class="cards">

        <div class="card">
            <div class="icon">01</div>
            <h3>Quality Education</h3>
            <p>
                We focus on providing strong academic knowledge
                and practical learning.
            </p>
        </div>

        <div class="card">
            <div class="icon">02</div>
            <h3>Experienced Faculty</h3>
            <p>
                Learn with the guidance of experienced and
                supportive faculty members.
            </p>
        </div>

        <div class="card">
            <div class="icon">03</div>
            <h3>Career Growth</h3>
            <p>
                Develop professional skills and prepare for
                your future career.
            </p>
        </div>

    </div>
</section>

<section class="about-home">

    <div>
        <p class="small-title">ABOUT Brightstone university</p>
        <h2>Learning Today,<br>Leading Tomorrow</h2>

        <p>
            Brightstone university is committed to creating an environment
            where students can learn, develop their skills and
            achieve their career goals.
        </p>

        <a href="courses.php" class="btn">Know More</a>
    </div>

    <div class="about-box">
        <h3>Our Commitment</h3>
        <p>✓ Academic Excellence</p>
        <p>✓ Practical Learning</p>
        <p>✓ Student Development</p>
        <p>✓ Career Guidance</p>
    </div>

</section>
<!-- Our Courses -->
<section class="section">

    <div class="course-grid">


        <?php

        if (mysqli_num_rows($res) > 0) {
            $count=0;

            while ($row = mysqli_fetch_assoc($res)) {
                if ($count >= 3) {
                    break;
                }

                $count++;
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
    <div class="more-courses" style="margin-top:50px">
        <a href="courses.php" class="btn">More Courses →</a>
    </div>
</section>

<section class="cta">
    <h2>Ready to Start Your Journey?</h2>
    <p>Join Brightstone university and take the first step towards your future.</p>
    <a href="registration.php" class="btn white-btn">Register Now</a>
</section>

<?php
include("footer.php");
?>

</body>
</html>

