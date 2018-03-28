<?php
include 'session.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// dectivate the user

if(isset($_REQUEST['deactivate']))
{ $de_id = $_REQUEST['deactivate'];
    $sql = "UPDATE user SET u_status= 0 WHERE u_id= $de_id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    echo "<script>
                      alert('user Deactivated successfully');
                      window.location.href='dashboard.php';
                      </script>";
}


// Activate user

if(isset($_REQUEST['activate']))
{ $de_id = $_REQUEST['activate'];
    $sql = "UPDATE user SET u_status= 1 WHERE u_id= $de_id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    echo "<script>
                      alert('user activated successfully');
                      window.location.href='dashboard.php';
                      </script>";
}

// delete user

if(isset($_REQUEST['delete']))
{ $de_id = $_REQUEST['delete'];
   
    $sql = "DELETE FROM user WHERE u_id= $de_id";
   
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script>
                      alert('user activated successfully');
                      window.location.href='dashboard.php';
                      </script>";
}


// approve article
if(isset($_REQUEST['approve']))
{ $app_id = $_REQUEST['approve'];
    $sql = "UPDATE upload SET up_status= 1 WHERE up_id= $app_id";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();
    echo "<script>
                      alert('article Approved');
                      window.location.href='dashboard.php';
                      </script>";
}

// delete article
if(isset($_REQUEST['del']))
{ $del_id = $_REQUEST['del'];
    $sql = "DELETE FROM upload WHERE up_id= $del_id";
   
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script>
                      alert('article deleted successfully');
                      window.location.href='dashboard.php';
                      </script>";
}


// add article
if (isset($_POST['article'])){
    try {
        $img_folder = "uploads/upload-files/";
        $upload_image = $img_folder.basename($_FILES["image_upload"]["name"]); // upload image
        
        $dnld_folder = "uploads/downloadable/";
        $upload_zip = $dnld_folder.basename($_FILES["code"]["name"]); // upload zip file  -- source code 

   move_uploaded_file($_FILES["image_upload"]["tmp_name"], $upload_image);
   move_uploaded_file($_FILES["code"]["tmp_name"], $upload_zip);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cat_id = $_POST['cat'];
    $date = date('D-M-Y');
    $status = 0;
 // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

  $stmt = $conn->prepare("INSERT INTO upload 
      (u_id, cat_id,  up_date, up_title, up_content,  up_img,   up_status,  up_upload) VALUES 
      (:u_id,:cat_id, now(),   :up_title,:up_content, :up_img,  :up_status, :up_upload)");
  
      $stmt->bindParam(':u_id', $id);
      $stmt->bindParam(':cat_id', $cat_id);
      $stmt->bindParam(':up_title', $title);
      $stmt->bindParam(':up_content', $description);
      $stmt->bindParam(':up_img', $upload_image);
      $stmt->bindParam(':up_status', $status);
      $stmt->bindParam(':up_upload', $upload_zip);
     
      $stmt->execute();
      echo "<script>
           alert('File has been successfully uploaded ');
           window.location.href='post.php';
           </script>";
  //Navigate to display the image
  //header( 'Location: upload_doc.php' );

  
    } catch (Exception $ex) {

    }
    
    
}
