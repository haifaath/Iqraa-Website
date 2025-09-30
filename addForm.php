<?php
include('connection.php');
include('authenticateManager.php');
include('adminHeader.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styleforprojecg.css" rel="stylesheet" type="text/css">
    <style>
      html, body {
      justify-content: center;
      font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-size: 20px;
      color: #df9788;
      /*overflow:scroll;*/
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
      /*overflow:scroll;
      height:90%; */
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
        <script src="validateInput.js"></script>
    </head>
    <body>
        <h1>Add New Book</h1>
        <div class="formcontainer">
        <div class="container">
        <form id="myForm" method="post" action="addBooks.php" enctype="multipart/form-data">  
            <p><label for="title">Title</label>
                <input type="text" placeholder="Enter Book Title" id="title" name="title">
                <div id="msgTitle"></div></p>
                <p><label for="bookAuthor">Author</label>
                <input type="text" placeholder="Enter author's name" id="bookauthor" name="bookAuthor">
                <div id="msgAuthor"></div></p>
                <p><label for="bookDesc">Book Description</label>
                <input type="text" placeholder="Enter book description" id="bookDesc" name="bookdesc">
                <div id="msgBookDesc"></div></p>
            <p><label for="stock">Stock</label><br>
                <input type="number" placeholder="Enter Book Stock Availability" id="stock" name="stock" min="1" style="width:17em;">
                <div id="msgStock"></div></p>
                <p><label for="pages">Number of pages</label><br>
                <input type="number" placeholder="Enter number of pages" id="pgs" name="pages" min="1" style="width:17em;">
                <div id="msgPages"></div></p>                
            <p><label for="price">Price</label><br>
                <input type="number" placeholder="Enter Book Price in SAR" id="price" name="price" min="1" style="width:17em;">
                <div id="msgPrice"></div></p>
                <p><label for="genre">Genre</label>
                <input type="text" placeholder="Enter Book genre" id="genre" name="genre">
                <div id="msgGenre"></div></p>
                
            <p><label for="picture">Picture</label>
                <input type="file" id="image-upload" accept="image/*" name="image-upload" required></p>
                <div id="msgPic"></div></p>
            </div>
            <p><input name="submit" id="submit" type="submit" class="btn">
                <input name="reset" id="reset" type="reset" class="btn"></p>
        </form>
    </body>
</html>