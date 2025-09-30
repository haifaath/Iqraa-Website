<?php
include('connection.php');
include('authenticateManager.php');
uploadImg();
?>
<html>
    <body>
        <?php
        if (isset($_POST ["submit"])){
            $bookDesc = $_POST["bookdesc"];
            $title = $_POST["title"];
            $author=$_POST["bookAuthor"];
            $pages=$_POST["pages"];
            $stock = $_POST["stock"];
            $price = $_POST["price"];
            $img=htmlspecialchars( basename( $_FILES["image-upload"]["name"]));
            $genre=$_POST["genre"];
            $query = "INSERT INTO product" . "(Pname,author,price,description,img1,quantity,noOfPages,genre)" . "VALUES ('$title','$author','$price','$bookDesc','images/$img','$stock','$pages','$genre')";

            if (!($database = mysqli_connect("localhost", "root", "123qweasdzxcAS", "iqraa") ))
            die("<p>Could not connect to databse</p>");

            if(!($result = mysqli_query($database, $query))){
                print("<p>Could not execute query!</p>");
                die(mysqli_error($database));
            }
            else {
                 print("<p>New book added to database successfully.</p>");
                header('location: admin.php');
            }            

            
            mysqli_close($database);
        }
        else
            print("Fill the required form fields.</p>");
        
        print("<a href='admin.php'>OK</a>");
        ?>
    </body>
    <?php 
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
       //if ($uploadOk == 0) {
         // echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
     //   } else {
          if (move_uploaded_file($_FILES["image-upload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image-upload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
    //    }
        
        ?>
</html>