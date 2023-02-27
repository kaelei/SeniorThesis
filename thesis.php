<!-- Author: Kaelei Lewis-->
<?php


    ?>
    
    <form action="thesisList.php" method="post" enctype="multipart/form-data"> 
	<div>
        Item Name: <input type="text" name="item" value="itemName" /> <br />	

    
        Price: <input type="text" name="price"><br> 

        Image: <input class="form-control" type="file" name="uploadfile" value="itemIMG" /> <br/>

	</div>
        <input class="listBtn" type="submit" name="list" value="List"/>

 
</form>

<?php


?>

