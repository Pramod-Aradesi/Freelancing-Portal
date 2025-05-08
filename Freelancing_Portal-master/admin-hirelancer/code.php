<?php
include 'security.php';




if(isset($_POST['login']))
{

    $name = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['name']))));
    $pass = mysqli_real_escape_string($connection,htmlspecialchars(stripslashes(trim($_POST['pass']))));
    $query = "SELECT * FROM admin WHERE email = '$name' OR name = '$name'";
    $query_run = mysqli_query($connection,$query);
    $count = mysqli_num_rows($query_run);
   

    if($count > 0)
    { 
        $row = mysqli_fetch_assoc($query_run);
        if(password_verify($pass,$row['password']))
        {

                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['name'];
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



if(isset($_POST['logout']))
{

	unset($_SESSION['admin_id']);
	unset($_SESSION['admin_name']);
	header('Location: index.php');
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



/* EMPLOYER ACTIVATE */


if(isset($_POST['employer_activate']))
{   

    $id = $_POST['id'];

   
        $query = "UPDATE employers SET status = '1' WHERE id = '$id'";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Employer With id : $id Account successfully Activated";
            header('Location: employers.php');
        }
        else
        {
            $_SESSION['status'] = "Failed To Activate Account Of Employer With id:$id";
            header('Location: employers.php');
        }

    

}


/* EMPLOYER DEACTIVATE */



if(isset($_POST['employer_deactivate']))
{   
    $id = $_POST['id'];

   
    $query = "UPDATE employers SET status = '0' WHERE id = '$id'";
    $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Employer With id : $id Account successfully Deactivated";
            header('Location: employers.php');
        }
        else
        {
            $_SESSION['status'] = "Failed To Deactivate Account Of Employer With id:$id";
            header('Location: employers.php');
        }

    

}






/* FREELANCER ACTIVATE */


if(isset($_POST['freelancer_activate']))
{   

    $id = $_POST['id'];

   
        $query = "UPDATE freelancers SET status = '1' WHERE id = '$id'";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Freelancer With id : $id Account successfully Activated";
            header('Location: freelancers.php');
        }
        else
        {
            $_SESSION['status'] = "Failed To Activate Account Of Freelancer With id:$id";
            header('Location: freelancers.php');
        }

    

}


/* FREELANCER DEACTIVATE */



if(isset($_POST['freelancer_deactivate']))
{   
    $id = $_POST['id'];

   
    $query = "UPDATE freelancers SET status = '0' WHERE id = '$id'";
    $query_run = mysqli_query($connection,$query);
    
    if($query_run)
    {
        $_SESSION['success'] = "Freelancer With id : $id Account successfully Deactivated";
        header('Location: freelancers.php');
    }
    else
    {
        $_SESSION['status'] = "Failed To Deactivate Account Of Freelancer With id:$id";
        header('Location: freelancers.php');
    }

}


?>