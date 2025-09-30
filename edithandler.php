<?php 
include('connection.php');
include('authenticateManager.php');
$connection= mysqli_connect("localhost", "root" ,"123qweasdzxcAS",'iqraa');

if (isset ($_POST['update'])){
        $img1 = $_POST['img1'];
        $file = $_FILES['image-upload']['name'];
        if($file!="") {
        //  echo($file);
          move_uploaded_file($_FILES['image-upload']['tmp_name'],'images/'.$file);
          $file='images/'.htmlspecialchars(basename( $_FILES["image-upload"]["name"]));
        } else {
        $file = $img1;
        }
    $pname= $_POST['pname'];
    $author= $_POST['author'];
    $price= $_POST['price'];
    $description= $_POST['description'];
    $quantity= $_POST['quantity'];
    $noOfPages= $_POST['noOfPages'];
    $genre= $_POST['genre'];
    $queryForUpdate="UPDATE product SET  pname='$_POST[pname]', author='$_POST[author]', price='$_POST[price]', description='$_POST[description]', img1='$file', quantity='$_POST[quantity]', noOfPages='$_POST[noOfPages]', genre='$_POST[genre]' WHERE prodid='$_POST[prodid]' ";
    $Updateresult = mysqli_query($connection, $queryForUpdate);
    header('location:edit.php?msg=success');
}
function uploadImg() {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image-upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        echo htmlspecialchars( basename( $_FILES["image-upload"]["name"]));
      $check = getimagesize($_FILES["image-upload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["image-upload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image-upload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image-upload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    }
        
?>