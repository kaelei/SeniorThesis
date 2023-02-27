<?php

$con = mysqli_connect("localhost", "root", "", "senior_thesis");

if (mysqli_connect_errno()) {
    echo "Failed to Connect" . mysqli_connect_error();
    exit();
}
$item=$_POST["item"];
$price=$_POST["price"];
/* $img=$_POST["uploadfile"]; */
        
        $sql = "INSERT INTO listing (user_id, item_name, item_price, img_id)
        VALUES (1, '$item', $price, 1)";
        /* $sql = "INSERT INTO image (image_file)
        VALUES ('$img')"; */
        if ($con->query($sql) === TRUE) {
            $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        //add id to file name to eliminate duplicates in images file
        if(isset($_POST["submit"])) {
             $check = getimagesize($_FILES["uploadfile"]["tmp_name"]);
             
             //file copy to temp name
             if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                 $uploadOk = 1;
              } else {
                 echo "File is not an image.";
                 $uploadOk = 0;
             }
}           echo $_FILES["uploadfile"]["tmp_name"];
            echo "New record created successfully";
            echo "<br>". $item . ": $" . $price;
           /*  echo "<br>". $img; */
            ?>
            <br>
            <a class="button" href="thesis.php" target="_blank">New Listing</a>
             <a class="button" href="browse.php" target="_blank">Browse Listings</a>
             <?php
           
            } else {
                echo "Error: Retry connection and list again:"
                ?>
                <br>
                <a class="button" href="thesis.php" target="_blank">New Listing</a>
                <?php
            }

        
  ?>
