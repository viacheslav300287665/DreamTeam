<?php
class Page  {

    public static $title = "Online Ratings";

    static function header() { ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title><?php echo self::$title; ?></title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- from https://colorlib.com/wp/template/login-form-v3/?v=3e8d115eb4b3-->
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/bootstrap/css/bootstrap.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/fonts/iconic/css/material-design-iconic-font.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/animate/animate.css">
            <!--===============================================================================================-->	
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/css-hamburgers/hamburgers.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/animsition/css/animsition.min.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/select2/select2.min.css">
            <!--===============================================================================================-->	
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/vendor/daterangepicker/daterangepicker.css">
            <!--===============================================================================================-->
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/css/util.css">
                <link rel="stylesheet" type="text/css" href="inc/Utility/css/css/main.css">
            <!--===============================================================================================-->
            </head>
            <body>
           
    <?php }

    static function footer()    { ?>
           </body>
            </html>
    <?php }

    static function showUserDetails(User $u) { ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST">
    <table class="table table-borderless">
        <tbody>
            <tr>
            <td colspan="3">User Name: <?php echo $u->getUserName(); ?></td>
            </tr>
            <tr>
            <td colspan="2">First Name: <?php echo $u->getFirstName(); ?></td>
            <td>Last Name: <?php echo $u->getLastName(); ?></td>
            </tr>
            <tr>
            <td colspan="2">Email Address: <?php echo $u->getEmail(); ?></td>
            <td>Phone Number: <?php echo $u->getPhone(); ?></td>
            </tr>
            <tr>
            <td colspan="2">Age: <?php echo $u->getAge(); ?></td>
            <td>Gender: <?php echo $u->getGender(); ?></td>
            </tr>
        </tbody>
        </table>
    <button type="submit" value= "submit" class="btn btn-primary">Logout</button>
</form>

   
<?php }

    static function showLogin() { ?>    
    <div class="limiter">
		<div class="container-login100" style="background-image: url('inc/Utility/css/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" value="submit" type="submit">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <?php }

static function showSearchForm() { ?>    
    <div class="limiter">
		<div class="container-login100" style="background-image: url('inc/Utility/css/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Search
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="usernameSearch" placeholder="Professor's Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn">
                        <input type="hidden" name="action" value="search">
						<button class="login100-form-btn" value="submit" type="submit">
							Search
						</button>
                        <label for="hidden">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="hidden" name="action" value="logout">
                        <button class="login100-form-btn" value="logout" type="submit">
							Logout
						</button>
					</div>
<br>
</br><br>
</br><br>
</br>
                    <span class="login100-form-title p-b-34 p-t-27">
						Add New Professor
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter college">
						<input class="input100" type="text" name="collegeAdd" placeholder="Name of School">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="usernameAdd" placeholder="Professor's Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter department">
						<input class="input100" type="text" name="departmentAdd" placeholder="Department">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn">
                        <input type="hidden" name="action" value="create">
						<button class="login100-form-btn" value="create" type="submit">
							Create
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    <?php }

    static function thankYou(){?>
            <label for="thankyou">Thank You!</label>
    <?php
    }

    static function listProffesorReviews(Instructor $instructor, array $ratings, $courses) { ?>
            <h1>Rating for Proffesor <?php echo $instructor->getFirstName() . " " . $instructor->getLastName() ?></h1>
            <h4>Courses that <?php echo $instructor->getFirstName() . " " . $instructor->getLastName() ?> is teaching </h1>
            <table border="1">
            <thead><th>CourseShortName</th><th>CourseLongName</th>
            <?php
            foreach ($courses as $course){
                echo "<tr><td>" . $course->getCourseShortName() . "</td><td>" . $course->getCourseLongName() . "</td><td>";
            }
            ?>
            </table>

            <h4>Students Rating</h4>
            <table border="1">
            <thead><th>Rating</th><th>Review</th>
            <?php 
            foreach ($ratings as $rating) { 
                echo "<tr><td>" . $rating->getRating() . "</td><td>" . $rating->getReview() . "</td><tr>";       
           }
            ?>
            </table>
     <?php }

static function showRegistrationForm() { ?>    
    <div class="limiter">
		<div class="container-login100" style="background-image: url('inc/Utility/css/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Registration Form
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Enter First Name">
						<input class="input100" type="text" name="firstname" placeholder="First Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter Last Name">
						<input class="input100" type="text" name="lastname" placeholder="Last Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#x2709;"></span>
					</div>
					<div class="container-login100-form-btn">
                        <input type="hidden" name="action" value="create">
						<button class="login100-form-btn" value="submit" type="submit">
							Register
				        </button>
					</div>
					<div class="text-center p-t-90">
                        <a class="txt1" href="project-login.php">
                            Already have an account?
                        </a>
					</div>
				</form>
			</div>
		</div>



	</div>
    <?php }

public static function listCourses(array $courses) { ?>
<h3>List of available Courses<button class="login100-form-btn" onclick="myFunction()" style="float:right">Add More</button></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>CourseID</th>
                <th>Course ShortName</th>
                <th>Course Long Name</th>
                <th>Edit</th>
                <th>Delete</th>
        </thead>

        <?php

        //List all the courses
        foreach ($courses as $course) {
            echo "<tr>";
            echo "<td>".$course->getCourseID()."</td>";
            echo "<td>".$course->getCourseShortName()."</td>";
            echo "<td>".$course->getCourseLongName()."</td>";
            echo '<td><a href="?action=edit&id='.$course->getCourseID().'">Edit</td>';
            echo '<td><a href="?action=delete&id='.$course->getCourseID().'">Delete</td>';
            echo "</tr>";
        } ?>
        </table>
                <script>
                function myFunction() {
        var x = document.getElementById("myForm");
            x.style.display = "block";
        
        }
        </script>
    
<?php }
//add a course
public static function createCourseForm() {?>
    <hr>
    
    <form id="myForm" ACTION="" METHOD="POST" style="display:none">
    <h3>Create Course</h3>
        <table>
          <tr>
               <td>Course Short Name</td>
               <td><input type="text" name="courseshortname"></td>
          </tr>
          <tr>
               <td>Course Long Name</td>
               <td><input type = "text" name = "courselongname"></td>
          </tr>
        </table>
        <input type="hidden" name="action" value="create">
        
        <input type="submit" value="create">
    </form>

<?php
                    }

                    public static function editCourseForm(Course $courseToEdit) { ?>
                        <hr>
                        <h3>Edit Course - <?php echo $courseToEdit->getCourseID(); ?></h3>
                        <form ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST">
                            <table>
                                <tr>
                                    <td>Course ID</td>
                                    <td>
                                        <?php echo $courseToEdit->getCourseID() ;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Course Short Name</td>
                                <td><input type="text" name="courseshortname" value="<?php echo $courseToEdit->getCourseShortName(); ?>"></td>
                           </tr>
                           <tr>
                                <td>Course Long Name</td>
                                <td><input type = "text" name = "courselongname" value="<?php echo $courseToEdit->getCourseLongName(); ?>"></td>
                           </tr>
                            </table>
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="courseid" value="<?php  echo $courseToEdit->getCourseID(); ?>">
                            <input type="submit" value="edit">
                            
                            
                        </form>
                
                    <?php
    }

    static function headerForProfessor() { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title><?php echo self::$title; ?></title>
            <meta charset="UTF-8">
            <meta name="description" content="Yoga Studio Template">
            <meta name="keywords" content="Yoga, unica, creative, html">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- from https://colorlib.com/wp/template/locals-directory/-->
            <!-- Google Font -->
            <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

            <!-- Css Styles -->
            <link rel="stylesheet" href="inc/Utility/css-professor/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/font-awesome.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/flaticon.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/nice-select.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/owl.carousel.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/magnific-popup.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/slicknav.min.css" type="text/css">
            <link rel="stylesheet" href="inc/Utility/css-professor/css/style.css" type="text/css">
        </head>
        <body>
       
<?php }

    static function searchFormProfessor() { ?>
        <!-- Page Preloder -->
        <div id="preloder">
                <div class="loader"></div>
            </div>

            <!-- Hero Section Begin -->
            <section class="hero-section set-bg" data-setbg="inc/Utility/css-professor/img/bg-01.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                                <img src="inc/Utility/css-professor/img/placeholder.png" alt="">
                                <h1>Professor's Name</h1>
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="filter-search">
                                <br>
                                    <div class="location-search">
                                        <h5>Professor's Name</h5>
                                        <input class="search" type="text" name="search" size="50">
                                    </div>
                                    <button type="submit">Search New</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hero Section End -->

            <br></br>
    <?php }

    static function reviewsSection() { ?>
        <!-- Filter Section Begin -->
    <section class="filter-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-left">
                        <div class="rating-filter">
                            <h3>Ratings</h3>
                            <div class="rating-option">
                                <div class="ro-item">
                                    <input type="radio">
                                    <label class="active">5.0</label>
                                    <div class="rating-pic">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="ro-item">
                                    <input type="radio">
                                    <label>4.0</label>
                                    <div class="rating-pic">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                    </div>
                                </div>
                                <div class="ro-item">
                                    <input type="radio">
                                    <label>3.0</label>
                                    <div class="rating-pic">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                    </div>
                                </div>
                                <div class="ro-item">
                                    <input type="radio">
                                    <label>2.0</label>
                                    <div class="rating-pic">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                    </div>
                                </div>
                                <div class="ro-item">
                                    <input type="radio">
                                    <label>1.0</label>
                                    <div class="rating-pic">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                        <i class="fa fa-star grey-bg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <a class="arrange-items" href="single-listing.html">
                                <div class="arrange-pic">
                                    <img src="inc/Utility/css-professor/img/bg.png" alt="">
                                    <div class="rating">4.9</div>
                                    <div class="tic-text">Student's Name</div>
                                </div>
                                <div class="arrange-text">
                                    <h5>Course Number</h5>
                                    <span>Date</span>
                                    <p>Full Review</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="arrange-items" href="single-listing.html">
                                <div class="arrange-pic">
                                    <img src="inc/Utility/css-professor/img/bg.png" alt="">
                                    <div class="rating">4.9</div>
                                    <div class="tic-text">Student's Name</div>
                                </div>
                                <div class="arrange-text">
                                    <h5>Course Number</h5>
                                    <span>Date</span>
                                    <p>Full Review</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="arrange-items" href="single-listing.html">
                                <div class="arrange-pic">
                                    <img src="inc/Utility/css-professor/img/bg.png" alt="">
                                    <div class="rating">4.9</div>
                                    <div class="tic-text">Student's Name</div>
                                </div>
                                <div class="arrange-text">
                                    <h5>Course Number</h5>
                                    <span>Date</span>
                                    <p>Full Review</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="arrange-items" href="single-listing.html">
                                <div class="arrange-pic">
                                    <img src="inc/Utility/css-professor/img/bg.png" alt="">
                                    <div class="rating">4.9</div>
                                    <div class="tic-text">Student's Name</div>
                                </div>
                                <div class="arrange-text">
                                    <h5>Course Number</h5>
                                    <span>Date</span>
                                    <p>Full Review</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="arrange-items" href="single-listing.html">
                                <div class="arrange-pic">
                                    <img src="inc/Utility/css-professor/img/bg.png" alt="">
                                    <div class="rating">4.9</div>
                                    <div class="tic-text">Student's Name</div>
                                </div>
                                <div class="arrange-text">
                                    <h5>Course Number</h5>
                                    <span>Date</span>
                                    <p>Full Review</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <a class="arrange-items" href="single-listing.html">
                                <div class="arrange-pic">
                                    <img src="inc/Utility/css-professor/img/bg.png" alt="">
                                    <div class="rating">4.9</div>
                                    <div class="tic-text">Student's Name</div>
                                </div>
                                <div class="arrange-text">
                                    <h5>Course Number</h5>
                                    <span>Date</span>
                                    <p>Full Review</p>
                                </div>
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Filter Section End -->
    <?php }

    static function ratingsForm() { ?>

        <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" METHOD="POST" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="number" placeholder="Your Rating (0/5)">
                            </div>
							&nbsp;
							<div class="rating-pic">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                            </div>
                            <div class="col-lg-12 text-center">
                                <input type="text" placeholder="Course Number">
                                <textarea placeholder="Your Experience"></textarea>
                                <button type="submit">Submit Ratings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php }


    static function footerforProfessor() { ?>

        <!-- Footer Section Begin -->
        <footer class="footer-section spad">
            <div class="container">
                
                <div class="row footer-bottom">
                    <div class="col-lg-5 order-2 order-lg-1">
                        <div class="copyright"><p class="text-white">
                Created By Dikshit Sharma, Viacheslav Sierkov and Robin Sidhu. All rights reserved.
                </p></div>
                    </div>
                    <div class="col-lg-7 text-center text-lg-right order-1 order-lg-2">
                        <div class="footer-menu">
                            <a href="project-logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="inc/Utility/css-professor/js/jquery-3.3.1.min.js"></script>
        <script src="inc/Utility/css-professor/js/bootstrap.min.js"></script>
        <script src="inc/Utility/css-professor/js/jquery.magnific-popup.min.js"></script>
        <script src="inc/Utility/css-professor/js/jquery.slicknav.js"></script>
        <script src="inc/Utility/css-professor/js/owl.carousel.min.js"></script>
        <script src="inc/Utility/css-professor/js/jquery.nice-select.min.js"></script>
        <script src="inc/Utility/css-professor/js/mixitup.min.js"></script>
        <script src="inc/Utility/css-professor/js/main.js"></script>
        </body>

        </html>

        <?php }


        
}


?>
