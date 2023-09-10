<?php
include('../db/connect.php');

session_start();
$user_id = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/assets/css/style.css">


</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($con, "SELECT * FROM `users` WHERE username = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="../images/default-avatar.png">';
         }else{
            echo '<img src="../uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a href="/WEB_CLOTHES_PHP/view/update_profile.php" class="btn">update profile</a>
      <a href="../../home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <a href="index.php" class="delete-btn">go back</a>
   </div>

</div>

</body>
</html>