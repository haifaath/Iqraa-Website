<?php
//Maitha Alqahtani
include('authenticateManager.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styleforprojecg.css" rel="stylesheet" type="text/css">
    <style>
        body {
  margin: 0;
  padding: 0;
  height: 100vh;
}

.center {
  /*padding: 0 0 20px 0;*/
  position: absolute;
  top:60%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 800px;
  height: 400px;
  background: #ebdad0;
  border-radius: 20%;
}


.images {
  padding: 40px 100px;
  box-sizing: border-box;
  display: flex;
  gap: 10%;

}

button.btn {
  width: 20%;
  height: 50px;
  position: absolute;
  left: 80px;
  bottom: 100px;
  border: 1px solid;
  border-radius: 25px;
  font-size: 18px;
  color: #514543;
  font-weight: 700;
  cursor: pointer;
  outline: none;
  background-color: #fdf9f6;
}

button.btn2 {
  width: 20%;
  height: 50px;
  position: absolute;
  right: 100px;
  bottom: 100px;
  border: 1px solid;
  border-radius: 25px;
  font-size: 18px;
  color: #514543;
  font-weight: 700;
  cursor: pointer;
  outline: none;
  background-color: #fdf9f6;
}

button.btn3 {
  width: 20%;
  height: 50px;
  position: absolute;
  right: 330px;
  bottom: 100px;
  border: 1px solid;
  border-radius: 25px;
  font-size: 18px;
  color: #514543;
  font-weight: 700;
  cursor: pointer;
  outline: none;
  background-color: #fdf9f6;
}

.center button:hover {
  border-color: #514543;
  transition: .5s;
}


.dashboard__container {
display: flex;
height: 3.5em;
flex-direction: row;
justify-content: space-between;
text-align: left;
background-color: #ebdad0;
padding: 1em 10px 1em 20px;
font-weight: bold;
color: #514543;
font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ;
}
.logo {
position: absolute;
top:70px;
left: 450px;
}



.dashboard__btn {
font-size: 13px;
height: 30px;
width: 60px;
padding: 0.25em 0.25em;
border: none;

border-radius: 10px;

  color: #514543;
  font-weight: 700;
  cursor: pointer;
  outline: none;
  background-color: #fdf9f6;
  text-decoration: none;
font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ; 
}
        </style>

</head>

<body>

<div class="logo">
   <img src="images/logo3.png" width="160">
    </div>
    <div class="dashboard">
  <div class="dashboard__container">
    Welcome
    <?php echo $_SESSION['username']; ?>
    <input type="button" class = "dashboard__btn" onclick="location.href='logout.php'" value = "Log Out"/>
  </div>
</div>
    <div class="center">
        
        <section class="images">
            <img src="images/library.png" height="150px" width="150px">
            <img src="images/letter.png" height="150px" width="170px">
            <img src="images/open-book.png" height="150px" width="150px">
        </section>
        <form action="addForm.php" method="post">
            <!-- the action here is for the add html-->
           <button class="btn" type="submit">Add a Book</button>
        </form>


        <form action="DeletePage.php" method="post">
            <!-- the action here is for the remove html-->
            <button class ="btn2" type="submit">Remove a Book</a>
           <!-- <button class="btn2" type="submit">Remove a Book</button>-->
        </form>

        <form action="edit.php" method="post">
            <!-- the action here is for the modify html-->
            <button class="btn3" type="submit">Modify a Book</button>
        </form>
    </div>
</body>

</html>
