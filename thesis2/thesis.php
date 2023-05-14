<!DOCTYPE html>
<html>
<head>
<link href="logged.css" type="text/css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

<script src="https://alcdn.msauth.net/browser/2.30.0/js/msal-browser.js"
    integrity="sha384-o4ufwq3oKqc7IoCcR08YtZXmgOljhTggRwxP2CLbSqeXGtitAxwYaUln/05nJjit"
    crossorigin="anonymous"></script>
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
  <h2 id="mville_sub">List an item for sale</h2>


<form id="formType" action="fileUploadScript.php" method="post" enctype="multipart/form-data">
    <div>
Item Name: <input type="text" name="item"/> <br />	

    
Price: <input type="text" name="price"><br> 
Image: <input type="file" name="user_file" id="fileToUpload">
<input id="emailTest" type="text" name="email" value="test" style="display:none"><br> 
<br>
<br>
Pickup Location:
<br>
<input type="radio" id="spell" name="pickup" value="Spellman">
<label for="html">Spellman</label><br>
<input type="radio" id="found" name="pickup" value="Founder's">
<label for="css">Founder's</label><br>
<input type="radio" id="ten" name="pickup" value="Tenney">
<label for="javascript">Tenney</label>

<!-- Radio buttons for location: ex spellman

calendar popup for pickup window -->
</div>
<br>
<input class="listBtn" type="submit" name="list" value="List">
</form>
  <br>
  <hr>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <!-- importing app scripts (load order is important) -->
  <script type="text/javascript" src="scripts/authConfig.js"></script>
  <script type="text/javascript" src="scripts/graphConfig.js"></script>
  <script type="text/javascript" src="scripts/ui.js"></script>

  <!-- <script type="text/javascript" src="./authRedirect.js"></script>   -->
  <!-- uncomment the above line and comment the line below if you would like to use the redirect flow -->
  <script type="text/javascript" src="scripts/authPopup.js"></script>
  <script type="text/javascript" src="scripts/graph.js"></script>
  <script>
   document.getElementById("emailTest").innerHTML = `${username}`;
    const currentAccounts = myMSALObj.getAllAccounts();
    console.log(currentAccounts[0]);
    username = currentAccounts[0].username;
    
    console.log(username);
    document.getElementById("emailTest").value = `${username}`;
    
  </script>
</body>
</html>
