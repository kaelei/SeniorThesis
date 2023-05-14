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
        <?=$result["loc"]?>
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




  <hr>
</div>
 
</body>
</html>
