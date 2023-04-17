<!DOCTYPE html>
<html>
<head>
<link href="index.css" type="text/css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>
</head>
<body id = "index_body">
<h1 id= "indexHeader">Available Listings</h1>
<ul id = "listingIndex">
<?php
 $con = mysqli_connect("localhost", "root", "", "senior_thesis");

 if (mysqli_connect_errno()) {
     echo "Failed to Connect" . mysqli_connect_error();
     exit();
 }

 $results = mysqli_query($con,"SELECT * FROM listing, images WHERE listing.img_id = images.img_id");
 foreach($results as $result){
   
   
    ?>
<!--     popup match listing id, select pickup window, confirmation -->

        <li class = "listingTile"><?=$result["item_name"]?>: $<?=$result["item_price"]?>
        <br></br>
        <?php
        $imgID = $result["img_id"];
        $imgFile = $result["image_file"];
        
        $img = $imgID . $imgFile;
        ?>
        <img id ="indexImg" src="images/<?=$imgFile?>" alt="Listing Image" />
        </li>
    
    <?php
 }

            ?>
            
<?php
 mysqli_free_result($results);
 mysqli_close($con);
 
  function redirect() {
    header("Location: /PHP/browese.php");
    die();
}
?>
</ul>
<br>
<a href="thesis.php">
                  <button class = "browseBtn">New Listing</button>
                 </a> 

</body>
</html>