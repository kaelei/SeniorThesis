<!DOCTYPE html>
<html>
<head>
<link href="logged.css" type="text/css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
</head>
<body>
  <div id="topnav">
   <a id="homeLink" href="index.php"> <h1 id="titlePage">SecondHand<img id ="header_img" src="images/second_hand.jpg" alt="Second Hand"/></h1> </a>

        <div id="topnavLog">
          <ul id="navList">
            <li class="navItem">
              <a class="navLink" href="thesis.php">
                List Item
               </a> 
                
            </li>
            <li class="navItem">
              <a class="navLink" href="browse.php">
                Browse
               </a> 
          </li>
          
          </ul>
        </div>
  </div>
  </div>
         
  <div id="welcomeBody">

  <h2 id="titleDisc">Manhattanville College Marketplace</h2>
  <hr>
  <?php
   $con = mysqli_connect("localhost", "root", "", "senior_thesis");

   if (mysqli_connect_errno()) {
        echo "Failed to Connect" . mysqli_connect_error();
        exit();
    }
    
    $currentDirectory = getcwd();
    $uploadDirectory = "/images/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['user_file']['name'];
    $fileSize = $_FILES['user_file']['size'];
    $fileTmpName  = $_FILES['user_file']['tmp_name'];
    $fileType = $_FILES['user_file']['type'];
    $tmp = explode('.', $fileName);
    
    $fileExtension = strtolower(end($tmp));

    $sql = "INSERT INTO images (image_file)
    VALUES ('$fileName')";

    if ($con->query($sql) === TRUE) {
        
       
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        
      }
      $con->close();
        $con = mysqli_connect("localhost", "root", "", "senior_thesis");
  
      if (mysqli_connect_errno()) {
          echo "Failed to Connect" . mysqli_connect_error();
          exit();
      }
      // Use for appending ID
      /* $results = mysqli_query($con, "SELECT concat(img_id, image_file) FROM images"); 
      foreach($results as $result){
          
          
            $idAppend = $result["concat(img_id, image_file)"];
            echo $idAppend;
            $sql = "UPDATE images SET image_file = 'test' WHERE img_id = '$idAppend'";
              
          
          
          }
        mysqli_free_result($results);

        $con->close(); */

    $results = mysqli_query($con, "SELECT concat(img_id, image_file) FROM images WHERE image_file = '$fileName'" ); 
    
   
    foreach($results as $result){
    
    $fileNameAppend = $result["concat(img_id, image_file)"];
    
    }
    mysqli_free_result($results);
   
    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileNameAppend); 
    
    $sql = "UPDATE images SET image_file = '$fileNameAppend' WHERE image_file = '$fileName'";
    if ($con->query($sql) === TRUE) {
        
       
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      
    }
    $con->close();
    if (isset($_POST['list'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            $item=$_POST["item"];
            $price=$_POST["price"];
            $selected_val = $_POST["pickup"];
            $email = $_POST["email"];
            $con = mysqli_connect("localhost", "root", "", "senior_thesis");

            if (mysqli_connect_errno()) {
                 echo "Failed to Connect" . mysqli_connect_error();
                 exit();
             }
             $sql = "INSERT IGNORE INTO user (user_email)
             VALUES ('$email')";

             if ($con->query($sql) === TRUE) {
                
                ?>

                         

                
                 <?php
                 
       
             } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
               
             }
             $con->close();
            $con = mysqli_connect("localhost", "root", "", "senior_thesis");

            if (mysqli_connect_errno()) {
                 echo "Failed to Connect" . mysqli_connect_error();
                 exit();
             }
             $sql = "INSERT INTO listing (user_id, item_name, item_price, loc, img_id)
             VALUES ((SELECT user_id FROM user WHERE user_email = '$email'), '$item', $price, '$selected_val', (SELECT img_id FROM images WHERE image_file = '$fileNameAppend'))";

             if ($con->query($sql) === TRUE) {
                
                ?>
                <div id = "newListing">
                <h2 id = "listing_Header">New Listing</h2>
                <p><?=$item?>: $<?=$price?> at <?=$selected_val?></p>
                <img id ="listImg" src="images/<?=$fileNameAppend?>" alt="Listing Image" />
                </div>
              

                
                 <?php
                 
       
             } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
               
             }
             $con->close();
             
            /* $con = mysqli_connect("localhost", "root", "", "senior_thesis");

            if (mysqli_connect_errno()) {
                 echo "Failed to Connect" . mysqli_connect_error();
                 exit();
             }
           $sql = "INSERT INTO listing (user_id, item_name, item_price, img_id)
            VALUES (1, '$item', $price, (SELECT img_id FROM images WHERE image_file = '$fileNameAppend'))"; 
             if ($con->query($sql) === TRUE) {
                echo "The file " . basename($fileName) . " has been uploaded";
               
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                
              } */
          
         

        } else {
          echo "An error occurred. Please contact the administrator.";
          
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
          
        }
      }

    }
    // $con->close();
?>
  <hr>
</div>
 
</body>
</html>