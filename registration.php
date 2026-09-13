<?php
include("admin/database.php");
include("header.php");

/* ================= COURSE FETCH ================= */

$query = "SELECT c_id, c_name, c_code, status FROM course ORDER BY c_name ASC";
$res = mysqli_query($con, $query);

if (!$res) {
    die("Course data not fetched: " . mysqli_error($con));
}


/* ================= SELECTED COURSE ================= */

$selected_course = "";

if (isset($_GET['course_id'])) {

    $selected_course = $_GET['course_id'];

}
// $query1="create table registration(r_id int primary key AUTO_INCREMENT, f_name varchar(100), email varchar(30), contact varchar(30),course varchar(100))";
// $res1=mysqli_query($con,$query1);



/* ================= REGISTRATION INSERT ================= */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $f_name = trim($_POST['f_name']);
    $email = strtolower(trim($_POST['email']));
    $contact = $_POST['contact'];
    $course_id = $_POST['course'];

    $query = "INSERT INTO registration
              (f_name, email, contact, course)
              VALUES
              ('$f_name', '$email', '$contact', '$course_id')";

    $res = mysqli_query($con, $query);

    if ($res) {

        echo "<script>
                alert('Registration Successful!');
                window.location.href='registration.php';
              </script>";

    } else {

        echo "Data is not inserted: " . mysqli_error($con);

    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Registration</title>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="images/fevicon.png" href="favicon.png">


</head>


<body>

    <!-- ================= PAGE HEADER ================= -->

    <section class="page-header">

        <p class="small-title">
            ADMISSIONS
        </p>

        <h1>
            Student Registration
        </h1>

        <p>
            Take the first step towards your future.
        </p>

    </section>



    <!-- ================= REGISTRATION FORM ================= -->

    <section class="section">

        <div class="form-box">

            <h2>
                Registration Form
            </h2>

            <p class="form-subtitle">
                Please enter your details below.
            </p>


            <form method="POST" action="">


                <!-- Full Name -->

                <label>
                    Full Name
                </label>

                <input type="text" name="f_name" placeholder="Enter your full name" required>



                <!-- Email -->

                <label>
                    Email Address
                </label>

                <input type="email" name="email" placeholder="Enter your email" required>



                <!-- Phone -->

                <label>
                    Phone Number
                </label>

                <input type="text" name="contact" placeholder="Enter your phone number" required>



                <!-- ================= COURSE DROPDOWN ================= -->

                <label>
                    Select Course
                </label>


                <select name="course" required>

                    <option value="">
                        Select Course
                    </option>


                    <?php

                        while ($row = mysqli_fetch_assoc($res)) {
                            if ($row['status'] == 'Open') {

                    ?>
                    <option value="<?php echo $row['c_id']; ?>" <?php if ($selected_course==$row['c_id']) {
                        echo "selected" ; } ?>
                        >

                        <?php echo $row['c_name']; ?>
                    </option>


                    <?php

                    }

                }

                ?>

                </select>



                <!-- Submit -->

                <button type="submit" class="btn">
                    Submit Registration
                </button>


            </form>

        </div>

    </section>



    <!-- ================= FOOTER ================= -->

<?php
include("footer.php");
?>


</body>

</html>