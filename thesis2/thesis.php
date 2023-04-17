<!DOCTYPE html>
<html>
<head>
<link href="add.css" type="text/css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

<script src="https://alcdn.msauth.net/browser/2.30.0/js/msal-browser.js"
    integrity="sha384-o4ufwq3oKqc7IoCcR08YtZXmgOljhTggRwxP2CLbSqeXGtitAxwYaUln/05nJjit"
    crossorigin="anonymous"></script>

</head>
<body id="listing_body">

<div id ="mville_header">
<h1>Second Hand<img id ="header_img" src="images/second_hand.jpg" alt="Second Hand" /></h1>

</div>
<h2 id="mville_sub">List an item for sale</h2>


<form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
    <div>
Item Name: <input type="text" name="item" value="itemName" /> <br />	

    
Price: <input type="text" name="price"><br> 
Image: <input type="file" name="user_file" id="fileToUpload">

<!-- Radio buttons for location: ex spellman

calendar popup for pickup window -->
</div>

<input class="listBtn" type="submit" name="list" value="List">
</form>

<p id="demo"></p>



</body>
</html>