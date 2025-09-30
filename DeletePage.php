<?php
//Roaa Ainaddin & Deema Bashamakh
include('connection.php');
include('authenticateManager.php');
include('adminHeader.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styleforprojecg.css" rel="stylesheet" type="text/css">
    <title>Delete Page</title>
    <style>
  .t1{
  margin-left: 20px;
  border-collapse: collapse;
  border-width: 1px;
  border-color: #514543;
  border-style: solid;
  width: 95.5%;
  color: #fdf9f6;
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  }
  td{
    border-style: none;
    background-color: #a18f81;
    font-weight: bold;
  }
  thead, th{
    font-size: 15px;
    font-weight: bold;
    font-family:monospace;
    padding-left: 10px;
    padding-right: 10px;
    color: white;
    border-color: #000000;
    border-width: 2px;
    border-style: solid;
    background-color:#514543;
  }
  td:hover{
    background-color: #a18f81;
  }
  .tablebox {
    width: 100%;
    height: 70%;
    padding-top:20px;
    margin: auto;
    border-radius: 7px;
    border: solid 1px #ccc;
    box-shadow: 1px 2px 5px rgba(0,0,0,.31);
    background: #a18f81;
    overflow-x:auto; overflow-y:auto;
  }
  .productLabel{
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color: #514543;
    padding: 3%;

  }
  .S{
    padding: 100%;
  }
.logo {
position: absolute;
top:60px;
left: 450px;
}
</style>
  </head>
  <?php
extract($_POST);
if(isset($SearchButton)) 
    {
      $type="Select";
      $searchInput = $_POST['searchInput'];
      $query ="SELECT * FROM `product` WHERE prodid='$searchInput'";
      $search_result= filtertable($query , $type);
    }
else if(isset($DeleteButton)){
  $searchInput = $_POST['searchInput'];
  $type="Delete";
  $query ="DELETE FROM `product` WHERE prodid='$searchInput'";
  $search_result = filtertable($query , $type);
    }
else
{
  $type="Select";
  $query = "SELECT * FROM product";
  $search_result = filtertable($query , $type);
}
function filtertable($query, $type)
    {
      $link= mysqli_connect("localhost","root","123qweasdzxcAS");
             mysqli_select_db($link,"iqraa");
     if(!$link){
             die("connection error"); }

     if($type=="Delete"){
       mysqli_query($link, $query);
       $query = "SELECT * FROM product";
       $result = mysqli_query($link, $query);
       return $result;
     }
else if($type=="Select"){
        $result = mysqli_query($link, $query);
        return $result;
    }
   }
   ?>
  <body style="background-color:#fdf9f6 ">
  <center> <form  method="post" action="DeletePage.php">
    <br>
    <h1><label  class="productLabel" >Search for product: </label></h1>
				<input id="S" type="text" name="searchInput" placeholder="Enter ID to Search" size="50" value="<?php echo (isset ($_POST['searchInput'])) ? $_POST['searchInput'] : "";?>"> 
        <br>
        <div class="btn-block" >
          <Button id="fancy-button" type="submit" name="SearchButton" class="btn">Search</button>
          <Button id="fancy-button" type="submit" name="DeleteButton" class="btn">Delete</button>
        </div>
    </form>
<div class="tablebox">
    <div class="t1">
    <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Product name</th>
          <th>Product Price</th>
          <th>Product Image</th>
          <th>Product Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
          while ($row=mysqli_fetch_array($search_result)) {
          ?>
          <td><?php echo $row['prodid']; ?></td>
          <td><?php echo $row['Pname']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><img src="<?php echo $row['img1']; ?>" alt="<?php echo $row['Pname']; ?>" style="width:5em; height:8em;"></td>
          <td><?php echo $row['description']; ?></td>
        </tr> <?php } ?>
      </tbody>
    </table>
    </div>
        <br>
</div>
</div>
</center>
  </body>
</html>