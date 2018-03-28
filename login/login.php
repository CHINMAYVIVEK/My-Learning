<?php
session_start();
include 'connection.php';

// login

if (isset($_POST['login'])) {
$email = trim($_POST['email']);
$pwd1 = trim($_POST['password']);

// validation
$email = emailValidation($email);
$pwd = passwordHashing($pwd1,$email);

try {
  $stmt = $conn->prepare("SELECT * FROM user where BINARY u_email = :email AND  BINARY u_pwd = :pwd AND u_status= 1");
  
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':pwd', $pwd);
  
     $stmt->execute();

     $rowCount = $stmt->rowCount();
       if ($rowCount >0) {
           $result = $stmt->fetchAll();

           if($result){
             foreach ($result as $value) {
                 $_SESSION['id'] = $value['u_id'];
                 $_SESSION['email'] = $value['u_email'];
                 $_SESSION['name'] = $value['u_name'];
                 $_SESSION['level'] = $value['u_level'];
                 $_SESSION['status'] = $value['u_status'];
                 $_SESSION['pic'] = $value['u_pic'];

                session_regenerate_id();
                session_write_close() ;
             if($value['u_level']==1){
                 echo "<script>
                      alert('Login successfull');
                      window.location.href='dashboard.php';
                      </script>";
             }
 else {
     echo "<script>
                      alert('Login successfull');
                      window.location.href='userboard.php';
                      </script>";
 }
              
                 //header('location:');

             }


           }
       }

       else {
         echo "<script>
              alert('Unauthorised Login');
              window.location.href='index.php';
              </script>";
       }
} catch(PDOException $e)
{
echo "Error: " . $e->getMessage();
}
$conn = null;


}

// registration

if(isset($_POST['reg'])){
    
    try{
        
    $email = trim($_POST['email']);
    $email = emailValidation($email);
    
    $name = trim($_POST['name']);
    $pwd1 = trim($_POST['pwd1']);
    $pwd2 = trim($_POST['pwd2']);
    
    $pwd = passwordCheck($pwd1, $pwd2,$email);
    
    $stmt = $conn->prepare("INSERT INTO user (u_name, u_email, u_pwd) VALUES (:u_name, :u_email, :u_pwd)");
    $stmt->bindParam(':u_name', $name);
    $stmt->bindParam(':u_email', $email);
    $stmt->bindParam(':u_pwd', $pwd);
    $stmt->execute();
    
    echo "<script>
                      alert('Registration Successfull');
                      window.location.href='index.php';
                      </script>"; 
                 /*   echo 'sucessfull'; */
      
    } catch (Exception $ex) {
       echo $ex->getMessage();
       /*echo "<script>
                      alert('Please Enter Valid Data');
                      window.location.href='index.php';
                      </script>"; */
    }
}



/* *********************************************************************************** */

// function to validate email

 function emailValidation($email_address){
     if (filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
  // The email address is valid
  return $email_address;
} else {
  // The email address is not valid
    echo "<script>
                      alert('email is not valid');
                      window.location.href='index.php';
                      </script>";
    
}
 }
  
 
/* ************************************************************ *
                      Password comaprison 
 */ 
 
function passwordCheck($pwd1, $pwd2 ,$email) {
    
     if(strcmp($pwd1, $pwd2) == 0){
          $pwd1= passwordHashing($pwd1,$email);
          return $pwd1;
      }
      
 else {
          echo "<script>
                      alert('Password does not matched');
                      window.location.href='index.php';
                      </script>";
      }
}

/* ************************************************************************************* */
 // password hashing

 function passwordHashing($pwd, $email){
     $pwd = $pwd.$email.$pwd;
     $pwd = md5($pwd);
    //$pwd= password_hash($pwd, PASSWORD_DEFAULT);
    return $pwd;
 }

 
