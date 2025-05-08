<?php
include 'security.php';


// Login

if(isset($_POST['login']))
{

    $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
    $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
    $query = "SELECT * FROM employers WHERE email = '$name' OR name = '$name'";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);
      

    if($count > 0)
    { 
        $row = mysqli_fetch_assoc($query_run);
        if(password_verify($pass,$row['password']))
        {

                $_SESSION['employers_id'] = $row['id'];
                $_SESSION['employers_name'] = $row['name'];
                header('Location: dashboard.php');

        }
        else{

            $_SESSION['status'] = "Incorrect Credentials Please Check Once Again";
            header('Location: index.php');
        }
    }
    else{
        $_SESSION['status'] = "Account Doesn't Exists";
        header('Location: index.php');
    }

}

// Logout

if(isset($_POST['logout']))
{

	unset($_SESSION['admin_id']);
	unset($_SESSION['admin_name']);
	header('Location: index.php');
}



/* Post  Job */

if(isset($_POST['post_job']))
{

    $title = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['title']))));
    $description = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['description']))));
    $bid = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['bid']))));
    $location = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['location']))));
    $skills = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['skills']))));
    $duration = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['duration']))));
    $employer_id = $_SESSION['employers_id'];
  
    $query = "INSERT INTO jobs(name,employer_id,description,bid,location,skills,duration) VALUES('$title',$employer_id,'$description','$bid','$location','$skills','$duration')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    { 
        $_SESSION['success'] = "Job Posted Successfully";
        header('Location: jobs.php');
    }
    else{
        $_SESSION['status'] = "Job Posted Unsuccessful.Please Try Again";
        header('Location: jobs.php');
    }
    
}


/* Update  Job */


if(isset($_POST['update_job']))
{
    $id = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['update_jobid']))));
    $title = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['title']))));
    $description = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['description']))));
    $bid = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['bid']))));
    $location = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['location']))));
    $employer_id = $_SESSION['employers_id'];
    $skills = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['skills']))));
    $duration = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['duration']))));
    
    $query = "UPDATE jobs SET name='$title',employer_id='$employer_id',description='$description',bid='$bid',location='$location',skills='$skills',duration='$duration' WHERE id=$id";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    { 
        $_SESSION['success'] = "Job Updated Successfully";
        header('Location: jobs.php');
    }
    else{
        $_SESSION['status'] = "Job Updated Unsuccessful.Please Try Again";
        header('Location: jobs.php');
    }
    
}




/* Delete  Job */

if(isset($_POST['job_delete']))
{
    
                                                                                  
    $id = $_POST['job_id'];
                                                                                
    $query = "DELETE FROM jobs WHERE id='$id' ";
    $query_run = mysqli_query($connection,$query);
                                                                                                
    if($query_run)
    {
            $_SESSION['success'] = "Job Deleted Successfully... :)";
            header('Location:  jobs.php');
    }
    else
    {
            $_SESSION['status'] = "Job Not Deleted ? Try Again....";
            header('Location:   jobs.php');
    }
                                                                                            
}  



    


  /* Freelancer  Dismiss */

  if(isset($_POST['freelancer_dismiss']))
  {
      
                                                                                    
      $employer_id = $_POST['employer_id'];
      $freelancer_id = $_POST['freelancer_id'];

                                                                                  
      $query = "DELETE FROM hire_applications WHERE employer_id='$employer_id' AND freelancer_id='$employer_id'";
      $query_run = mysqli_query($connection,$query);
                                                                                                  
      if($query_run)
      {
              $_SESSION['success'] = "Freelancer Dismissed Successfully... :)";
              header('Location:  freelancers.php');
      }
      else
      {
              $_SESSION['status'] = "Freelancer Not Dismissed.Try Again....";
              header('Location:   freelancers.php');
      }
                                                                                              
  }  



    /* Applied Freelancer  Dismiss */

  if(isset($_POST['applied_freelancer_dismiss']))
  {
      
                                                                                    
      $id = $_POST['id'];

      echo $id;
                                                                                  
      $query = "DELETE FROM job_applications WHERE id='$id'";
      $query_run = mysqli_query($connection,$query);
                                                                                                  
      if($query_run)
      {
              $_SESSION['success'] = "Freelancer Dismissed Successfully... :)";
              header('Location:  applied_jobs.php');
      }
      else
      {
              $_SESSION['status'] = "Freelancer Not Dismissed.Try Again....";
              header('Location:   applied_jobs.php');
      }
                                                                                              
  }  
  

  
/* Freelancer Rating */

if(isset($_POST['freelancer_rating']))
{

    $rating = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['rating']))));
    $employer_id = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['employer_id']))));
    $freelancer_id = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['freelancer_id']))));
  
    if($rating < 1 || $rating > 5)
    {
        $_SESSION['status'] = "Rating Should be between 1 and 5";
        header('Location: freelancers.php');
    }
    else
    {
        $query = "INSERT INTO rating(id,freelancer_id,rating) VALUES('$id',$freelancer_id,'$rating')";
        $query_run = mysqli_query($connection,$query);

        $query = "UPDATE freelancers set rating = $rating WHERE id = $freelancer_id";
        $query_run = mysqli_query($connection,$query);

    if($query_run)
    { 
        $_SESSION['success'] = "Rating Given Successfully";
        header('Location: freelancers.php');
    }
    else{
        $_SESSION['status'] = "Rating Unsuccessful.Please Try Again";
        header('Location: freelancers.php');
    }
    }
}
  


    ?>