<?php 
 if (isset($_SESSION['user'])) {
      echo $_SESSION['user'];
  } else {
      echo "";
  }

  include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<div id="id01" class="modal">
    <div class="card-container" >
        <div class="upper-container">
           <div class="image-container">
              <img src="img/user/user-1.png" />
           </div>
        </div>
        <div class="lower-container">
           <div>
              <h3><?php echo $_SESSION['user']?></h3>
              <h4>Front-end Developer</h4>
              <?php  echo $_SESSION['user'];?>
           </div>
           <div>
              <p>sodales accumsan ligula. Aenean sed diam tristique,
                 fermentum mi nec, ornare arch.
              </p>
           </div>
           <div>
              <a href="profile.php?id=<?php  ?>" class="btn">Main Profile</a>
              <a href="logout.php" class="btn">Logout</a>
           </div>
        </div>
     </div>
</div>

<script>
        var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
</script>
</body>
</html>