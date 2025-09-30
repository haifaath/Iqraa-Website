<?php
//Roaa Ainaddin & Deema Bashamakh
include('connection.php');
include('authenticateManager.php');
?>
<html>
  <head>
    <title>Modify Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styleforprojecg.css" rel="stylesheet" type="text/css">
    <style>
      html, body, div {
      justify-content: center;
      font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 20px;
      color: #df9788;
      }

      input[type=text] {
      width: 100%;
      padding: 20px 8px;
      margin: 20px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
      }

      input[type=submit],input[type=reset] {
      background-color: #ebdad0;
      color: #000000;
      padding: 20px 0;
      margin: 10px 0;
      border: 1px solid #ebdad0;
      border-radius: 20px;
      cursor: grabbing;
      width: 10%;
      justify-content: center;
      font-size: 15px;
      font-family: verdana;
      }

      h1 {
      text-align:center;
      font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      color: #514543;
      font-size:40px;
      }


      button:hover {
      opacity: 0.7;
      }
      
      .formcontainer {
      text-align: center;
      margin: 24px 50px 12px;
      }
      
      .container {
      padding: 16px 0;
      text-align:left;
      }

.logo {
position: absolute;
top:75px;
left: 450px;
}

      </style>
<!--<script src="validateInput.js"></script>-->
  </head>
  <body>
  <?php include('adminHeader.php'); ?>
            <div class="formcontainer">
        <div class="container">
  <form action="edit.php" method="POST">
    <h1>Modify Product</h1>

      <div>
      <input type="text" name="prodid" type="search" placeholder="Search Product ID "  >
      <input type="submit" class="btn" name= "search" value="Search">
      </div>

  </form>

  <?php
  $db="iqraa";

  $connection= mysqli_connect("localhost", "root" ,"123qweasdzxcAS",$db);
  mysqli_select_db($connection, $db);
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    if ($msg=='success') {
      echo '<p>Product updated successfully. </p>';
    }

  }

  if (isset ($_POST['search'])){

  $id= $_POST['prodid'];
  $query="SELECT * FROM product WHERE prodid='$id' ";
  $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result)){
  ?>

  <form action="edithandler.php" method="post" id="myForm" enctype="multipart/form-data" onsubmit="return validate();">
          <div><input type="hidden" name="prodid" value="<?php echo $row['prodid']?>" /></div>
          <p>Book Name:
          <div></label><input id="title" type="text" name="pname" value="<?php echo $row['Pname']?>" /></div>
          <div id="msgTitle"></div></p>
          </p>
          <p>Author:
          <div><input id="bookauthor" type="text" name="author" value="<?php echo $row['author']?>" id="bookauthor"/></div></p>
          <div id="msgAuthor"></div></p>
          <p> Price:
          <div><input id="price" type="number" name="price" value="<?php echo $row['price']?>" id="price"/></div></p>
          <div id="msgPrice"></div></p>
          <p> Description: 
          <div><textarea id="bookDesc" name="description" id="bookDesc" rows="6"  cols="40" ><?php echo $row['description']?></textarea></div></p>
          <div id="msgBookDesc"></div></p>
          <p> Image:<br> 
            <img src="<?php echo $row['img1']?>" style="width:9em; height:14em;">
          <div><input type="hidden" name="img1" value="<?php echo $row['img1']?>" />
          <input type="file" id="image-upload" accept="image/*" name="image-upload"></div></p>
          <div id="msgPic"></div></p>
          <p> Quantity: 
          <div><input id="stock" type="number" name="quantity" value="<?php echo $row['quantity']?>" min="1" max="1000"/></div> </p>
          <div id="msgStock"></div></p>
          <p> Number of pages: 
          <div><input id="pgs" type="number" name="noOfPages" value="<?php echo $row['noOfPages']?>" min="1" max="2000" /></div></p>
          <div id="msgPages"></div></p>    
          <p> Genre: 
          <div><input id="genre" type="text" name="genre" value="<?php echo $row['genre']?>" /></div> </p>
          <div id="msgGenre"></div></p>

          <input type="submit" name="update" class="btn" value="Update">

  </form>
        </div></div>

  <?php
        }
    }
  ?>  
  <script>  
  console.log("TIRED BUTH")
    title = document.getElementById("title");
    author=document.getElementById("bookauthor");
    desc=document.getElementById("bookDesc");
    stock = document.getElementById("stock");
    pages=document.getElementById("pgs");
    price = document.getElementById("price");
    genre=document.getElementById("genre");
  //  var pic=document.getElementById("image-upload").value;
    //console.log(pic);
    helpText = document.getElementById("helpText");
   // var myForm = document.getElementById("myForm");
   // myForm.onsubmit = validate;
    //myForm.onreset = clear;

function validate(){
    var errTitle="";
    var errAuthor="";
    var errDesc="";
    var errStock="";
    var errPages="";
    var errPrice="";
    var errGenre="";
    var errPic="";
    var flag=true;

    if (title.value==""){
        errTitle = "Enter book title.<br/>";
        title.style.border= "2px solid red";
        flag=false;
    }
    if (author.value==""){
        errAuthor = "Enter book author.<br/>";
        bookauthor.style.border= "2px solid red";
        flag=false;
    }
    if (desc.value==""){
        errDesc = "Enter book description.<br/>";
        console.log("bruh. ");
        bookDesc.style.border= "2px solid red";
        flag=false;
    }

    if (stock.value==""){
        errStock = "Enter book stock availability.<br/>";
        stock.style.border= "2px solid red";
        flag=false;
    }
    else if(!stock.value.match(/^[0-9]+$/)){
        errStock = "Book stock contains numbers only.<br/>";
        stock.style.border= "2px solid red";
        flag=false;
    }
    if (pages.value==""){
        errPages = "Enter number of pages.<br/>";
        pgs.style.border= "2px solid red";
        flag=false;
    }
    else if(!pages.value.match(/^[0-9]+$/)){
        errPages = "Number of pages contains numbers only.<br/>";
        pgs.style.border= "2px solid red";
        flag=false;
    }
    if (price.value==""){
        errPrice = "Enter book price in SAR.<br/>";
        price.style.border= "2px solid red";
        flag=false;
    }
    else if(!price.value.match(/^[0-9]+$/)){
        errPrice = "Book price contains numbers only.<br/>";
        price.style.border= "2px solid red";
        flag=false;
    }
    if (genre.value==""){
        errGenre = "Enter book genre.<br/>";
        genre.style.border= "2px solid red";
        flag=false;
    }
 //  if (pic==null) {
   //   errPic= "Select book image.<br/>";
  //      flag=false;
    //}

    if (flag==false){
        msgTitle.innerHTML = errTitle;
        msgAuthor.innerHTML=errAuthor;
        msgBookDesc.innerHTML=errDesc;
        msgStock.innerHTML=errStock;
        msgPages.innerHTML = errPages;
        msgPrice.innerHTML = errPrice;
        msgGenre.innerHTML=errGenre;
        msgPic.innerHTML=errPic;
    }
    return flag;
}
  </script>
</body>
</html>
