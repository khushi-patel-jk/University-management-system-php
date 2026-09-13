<?php
include("sidebar.php");
include("database.php");
// $query="create table course(c_id int primary key AUTO_INCREMENT, c_name varchar(100), c_code varchar(10), c_type varchar(30), duration varchar(30), semester int, description text, max_student int, department varchar(30), fee int, status varchar(30))";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $c_name=trim($_POST['c_name']);
    $c_code=strtoupper($_POST['c_code']);
    $c_type=$_POST['c_type'];
    $duration=$_POST['duration'];
    $semester=$_POST['semester'];
    $description=$_POST['description'];
    $max_student=$_POST['max_student'];
    $department=$_POST['department'];
    $c_fee=$_POST['c_fee'];
    $status=$_POST['status'];

    $query="insert into course(c_name,c_code,c_type,duration,semester,description,max_student,department,fee,status) values('$c_name','$c_code','$c_type','$duration','$semester','$description','$max_student','$department','$c_fee','$status')";
    $res=mysqli_query($con,$query);
    if($res){
        header("Location: courses.php"); 
            exit(); 
    }
    else{
        echo "Data is not inserted";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Course</title>

    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="../images/fevicon.png" href="favicon.png">
</head>

<body class="admin-body">


    <main class="main-content">

        <header class="topbar">

            <div>
                <h3>Add Course</h3>
                <p>Create a new academic program</p>
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
                    <h1>Add New Course</h1>
                    <p>Enter the details of the new academic program.</p>
                </div>

                <a href="courses.php" class="secondary-btn">
                    ← Back to Courses
                </a>

            </div>


            <div class="form-card">

                <div class="form-card-header">

                    <div>
                        <h2>Course Information</h2>
                        <p>Provide complete course details</p>
                    </div>

                    <div class="required-text">
                        * Required fields
                    </div>

                </div>


                <form method="POST">


                    <!-- Basic Details -->

                    <div class="form-section">

                        <div class="form-section-title">

                            <span class="section-number">01</span>

                            <div>
                                <h3>Basic Course Details</h3>
                                <p>Enter the main information about the course</p>
                            </div>

                        </div>


                        <div class="form-grid">

                            <div class="form-group">

                                <label>
                                    Course Name <span>*</span>
                                </label>

                                <input type="text" name="c_name" placeholder="e.g. Bachelor of Computer Applications" required>

                            </div>


                            <div class="form-group">

                                <label>
                                    Course Code <span>*</span>
                                </label>

                                <input type="text" name="c_code" placeholder="e.g. BCA-001" required>

                            </div>


                            <div class="form-group">

                                <label>
                                    Course Type <span>*</span>
                                </label>

                                <select name="c_type" required>

                                    <option value="">
                                        Select Course Type
                                    </option>

                                    <option value="Undergraduate">
                                        Undergraduate
                                    </option>

                                    <option value="Postgraduate">
                                        Postgraduate
                                    </option>

                                    <option value="Diploma">
                                        Diploma
                                    </option>

                                </select>

                            </div>


                            <div class="form-group">

                                <label>
                                    Duration <span>*</span>
                                </label>
                                <input type="number" name="duration" placeholder="e.g. 1 " required>

                            </div>


                            <div class="form-group">

                                <label>
                                    Number of Semesters <span>*</span>
                                </label>

                                <input type="number" name="semester" required>

                            </div>

                        </div>

                    </div>


                    <!-- Description -->

                    <div class="form-section">

                        <div class="form-section-title">

                            <span class="section-number">02</span>

                            <div>
                                <h3>Course Description</h3>
                                <p>Add information students should know</p>
                            </div>

                        </div>


                        <div class="form-grid">

                            <div class="form-group full-width">

                                <label>
                                    Description <span>*</span>
                                </label>

                                <textarea rows="4" name="description" placeholder="Write a short description about the course..."
                                    required></textarea>

                            </div>

                        </div>

                    </div>


                    <!-- Course Settings -->

                    <div class="form-section">

                        <div class="form-section-title">

                            <span class="section-number">03</span>

                            <div>
                                <h3>Course Settings</h3>
                                <p>Configure additional course information</p>
                            </div>

                        </div>


                        <div class="form-grid">

                            <div class="form-group">

                                <label>
                                    Maximum Students
                                </label>

                                <input type="number" name="max_student" placeholder="e.g. 120">

                            </div>


                            <div class="form-group">

                                <label>
                                    Department
                                </label>
                                <input type="text" name="department" placeholder="e.g. Computer">
                                
                            </div>


                            <div class="form-group">

                                <label>
                                    Course Fee
                                </label>

                                <input type="text" name="c_fee" placeholder="Enter course fee">

                            </div>


                            <div class="form-group">

                                <label>
                                    Admission Status
                                </label>

                                <select name="status">

                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Coming Soon">Coming Soon</option>

                                </select>

                            </div>

                        </div>

                    </div>


                    <!-- Buttons -->

                    <div class="form-actions">

                        <button type="submit" value="submit" class="save-btn">
                            ✓ Save Course
                        </button>

                    </div>


                </form>

            </div>

        </section>


        <?php
        include("footer.php");
        ?>

    </main>

</body>

</html>