<!DOCTYPE html>
<html>
<head>
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

 $results = mysqli_query($con,"SELECT * FROM listing");
 foreach($results as $result){
    ?>
    <ul>
        <li><?=$result["item_name"]?>: $<?=$result["item_price"]?></li>
    </ul>
    <?php
 }
 echo "<br>Create a New Listing:";
            ?>
            <br>
            <a class="button" href="thesis.php" target="_blank">New Listing</a>
<?php
 mysqli_free_result($results);
 mysqli_close($con);
 
  function redirect() {
    header("Location: /PHP/browese.php");
    die();
}
?>
</ul>
</body>
</html>
