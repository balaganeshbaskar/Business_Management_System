<?php

require('session.php');
require('connect.php');

// $mysqli = new mysqli('localhost', 'root', '', 'psk') or die(mysqli_error($mysqli));


if (isset($_POST['btnlogin'])) 
{


  $uname = trim($_POST['uname']);
  $pass = trim($_POST['pass']);
  // $h_pass = sha1($pass);

  if ($pass == '')
  {
    ?>    
      <script type="text/javascript">
        alert("Password is missing!");
        window.location = "login.php";
      </script>
    <?php
  }
  else
  {

    //create some sql statement             
    $result = $mysqli->query("SELECT * FROM credentials where uname='$uname' and pass='$pass'") or die($mysqli->error);
    
    if ($result)
    {
         //get the number of results based n the sql statement
        $numrows = mysqli_num_rows($result);

        //check the number of result, if equal to one   
        //IF theres a result
        if ($numrows == 1)
        {
            //store the result to a array and passed to variable found_user
            $found_user = $result->fetch_assoc();

            //fill the result to session variable
            $_SESSION['MEMBER_ID']  = $found_user['s_id']; 
            $_SESSION['USER_NAME'] = $found_user['uname']; 
            $_SESSION['USER_TYPE'] = $found_user['type']; 

            if( $found_user['type'] == 'teacher')
            {
                ?>    <script type="text/javascript">
                  //then it will be redirected to index.php
                  window.location = "adminpanel.php";
                    </script>
                <?php 
            }       

            else if( $found_user['type'] == 'student')
            {
                ?> 
                <script type="text/javascript">
                  window.location = "studentprofile.php";
                </script> 
                <?php
            }  

            else if( $found_user['type'] == 'parent')
            {
                ?> 
                <script type="text/javascript">
                  window.location = "studentprofile.php";
                </script> 
                <?php
            } 
    
        } 
        else 
        {
        //IF theres no result
          ?>    <script type="text/javascript">
            alert("Username or Password Not Registered! Contact Your administrator.");
            window.location = "login.php";
            </script>
          <?php

        }

    } 
    else
    {
             # code...
     die("Table Query failed: " );
    }
    
  }       
} 

else
{
    
    $_SESSION['MEMBER_ID']  = $_GET['id'];
    
    ?> 
    <script type="text/javascript">
      window.location = "studentprofile.php";
    </script> 
    <?php

}
 
?>