<?php include('partials/menu.php'); ?>





<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>


        <br><br>

            <?php

                    if(isset($_SESSION['add']))
                    {
                     echo $_SESSION['add'];
                        unset ($_SESSION['add']);     
                        }

            ?>



        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name"></td>

                </tr>

            <tr>

            </tr>
                <td>Username</td>
            <td>
                <input type="text" name="username" placeholder="Your Username">
                </td>


            
               </tr>
                <td>Password</td>
            <td>
                <input type="password" name="password" placeholder="Your Passowrd">
                </td>

            
              </tr>

              <tr>
                <td colspan="2">       
                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>   
        
        
            </table>


</form>



    </div>

</div>






<?php include('partials/footer.php'); ?>

<?php

//process the value from and save it in database
//check weather the submit botton is clicked or not

if(isset($_POST['submit']))
{
    //botton clicked 
    //echo Button Clicked

    //Get the data from form
    $full_name =  $_POST['full_name'];
    $username =  $_POST['username'];
    $password =  md5($_POST['password']); //Password encryption

    //SQL query to save the data into database
    $sql = "INSERT INTO  tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'

";



//EXECUTE QUERY

$res = mysqli_query($conn, $sql) or die(mysqli_error());


//check data inserterd or not
if($res==TRUE)
{
    //DATA INSERTED
    //echo "Data Inserted";
    $_SESSION['add'] = "Admin Added Successfully";
    header("location:".SITEURL. 'admin/manageadmin.php');
}
else
{
//failed to insert data
//echo "Failed to insert data";
$_SESSION['add'] = "Fail to add admin";
    header("location:",SITEURL, 'admin/manageadmin.php');
}



}






?>