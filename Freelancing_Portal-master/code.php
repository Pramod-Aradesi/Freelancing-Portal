<?php
include 'database.php';
session_start();

if(isset($_POST['freelancer_login']))
{

    $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
    $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
    $query = "SELECT * FROM freelancers WHERE email = '$name' OR name = '$name'";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);
   

    if($count > 0)
    { 
        $row = mysqli_fetch_assoc($query_run);
        if($row['status'] == 0)
        {
          $_SESSION['status'] = "Account Not Yet Activated Please Contact Admin";
          header('Location: login.php');
        }
        else
        {
        if(password_verify($pass,$row['password']))
        {

                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['type'] = "freelancer";
                header('Location: index.php');

        }
        else{

            $_SESSION['status'] = "Incorrect Credentials Please Check Once Again";
            header('Location: login.php');
        }
      }
    }
    else{
        $_SESSION['status'] = "Account Doesn't Exists";
        header('Location: login.php');
    }

}



if(isset($_POST['logout']))
{

	unset($_SESSION['id']);
	unset($_SESSION['name']);
  unset($_SESSION['type']);
	header('Location: index.php');
}

// FreeLancer Job Apply 

if(isset($_POST['freelancer_apply']))
{

  if(isset($_SESSION['type']) && $_SESSION['type'] == 'freelancer')
{
   $id = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['id']))));
  $user_id = $_SESSION['id'];
   
    $query = "SELECT * FROM job_applications WHERE job_id = $id AND freelancer_id = $user_id";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);

    if($count > 0)
    {
          $_SESSION['status'] = "You Have Already Applied For This Job";
          header('Location: jobs.php');
    }
    else{
      $query = "INSERT INTO job_applications(job_id,freelancer_id) VALUES($id,$user_id)";
      $query_run = mysqli_query($connection,$query);

      if($query_run)
      { 
          $_SESSION['success'] = "Applied For This Job SuccessFully";
          header('Location: jobs.php');
      }
      else{
          $_SESSION['status'] = "Applied For This Job UnSuccessFul.Please Try Again";
          header('Location: jobs.php');
      }
    }
   
}
else{
  header('Location: login.php');
}
}


// Employer Hire


if(isset($_POST['employer_hire']))
{

  if(isset($_SESSION['type']) && $_SESSION['type'] == 'employer')
{
   $id = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['id']))));
  $employer_id = $_SESSION['id'];
   
    $query = "SELECT * FROM hire_applications WHERE freelancer_id = $id AND employer_id = $employer_id";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);

    if($count > 0)
    {
          $_SESSION['status'] = "You Have Already Hired this Freelancer.Wait For Them to Contact You";
          header('Location: hiring.php');
    }
    else{
      $query = "INSERT INTO hire_applications(freelancer_id,employer_id) VALUES($id,$employer_id)";
      $query_run = mysqli_query($connection,$query);

      if($query_run)
      { 
          $_SESSION['success'] = "Hired This FreeLancer SuccessFully";
          header('Location: hiring.php');
      }
      else{
          $_SESSION['status'] = "Applied For This Job UnSuccessFul.Please Try Again";
          header('Location: hiring.php');
      }
    }
   
}
else{
  header('Location: login.php');
}
}



// Employer Login


if(isset($_POST['employer_login']))
{

    $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
    $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
    $query = "SELECT * FROM employers WHERE email = '$name' OR name = '$name'";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);
   

    if($count > 0)
    { 
        $row = mysqli_fetch_assoc($query_run);
        if($row['status'] == 0)
        {
          $_SESSION['status'] = "Account Not Yet Activated Please Contact Admin";
          header('Location: login.php');
        }
        else
        {
          if(password_verify($pass,$row['password']))
          {
              $_SESSION['id'] = $row['id'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['type'] = "employer";
              header('Location: index.php');
          }
          else
          {
              $_SESSION['status'] = "Incorrect Credentials Please Check Once Again";
              header('Location: login.php');
          }
        }
        
    }
    else{
        $_SESSION['status'] = "Account Doesn't Exists";
        header('Location: login.php');
    }

}


// Employer Signup


if(isset($_POST['employer_signup']))
{

    $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
    $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
    $phone = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['phone']))));
    $email = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['email']))));
    $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
    $query = "SELECT * FROM employers WHERE phone = $phone";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);

    if($count > 0)
    {
          $_SESSION['status'] = "You Have Already Registered.Please Login";
          header('Location: login.php');
    }
    else{
      $query = "INSERT INTO employers(name,phone,email,password) VALUES('$name','$phone','$email','$hashedPassword')";
      $query_run = mysqli_query($connection,$query);

      if($query_run)
      { 
          $_SESSION['success'] = "Hurray , Registration Successful.Please Login";
          header('Location: login.php');
      }
      else{
          $_SESSION['status'] = "Registration Unsuccessful.Please Try Again";
          header('Location: join.php');
      }
    }
}




// Freelancer Signup


if(isset($_POST['freelancer_signup']))
{

    $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
    $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
    $phone = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['phone']))));
    $email = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['email']))));
    $job = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['job']))));
    $drive_link = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['drive_link']))));
    $skills = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['skills']))));
    $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
    $query = "SELECT * FROM freelancers WHERE phone = $phone";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);

    if($count > 0)
    {
          $_SESSION['status'] = "You Have Already Registered With This Phone Number.Please Login";
          header('Location: login.php');
    }
    else{
      $query = "INSERT INTO freelancers(name,phone,email,password,job,drive_link,skills) VALUES('$name','$phone','$email','$hashedPassword','$job','$drive_link','$skills')";
      $query_run = mysqli_query($connection,$query);

      if($query_run)
      { 
          $_SESSION['success'] = "Hurray , Registration Successful.Please Login";
          header('Location: login.php');
      }
      else{
          $_SESSION['status'] = "Registration Unsuccessful.Please Try Again";
          header('Location: join.php');
      }
    }
}




// Profile Update 

if(isset($_POST['update_profile']))
{   
    $id = $_SESSION['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $drive_link = $_POST['drive_link'];
    $skills = $_POST['skills'];


   
    $query = "UPDATE freelancers SET name = '$name',email = '$email',phone = '$phone',job = '$job',
    drive_link = '$drive_link',skills = '$skills' WHERE id = '$id'";
    $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Profile Updated successfully";
            header('Location: profile.php');
        }
        else
        {
            $_SESSION['status'] = "Failed To Update Profile.Please Try Again";
            header('Location: profile.php');
        }

    

}





?>