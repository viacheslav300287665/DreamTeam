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



        
}


?>
