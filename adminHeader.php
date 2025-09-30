
<!DOCTYPE html>
<html>
    <head>
        <style>
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
top:75px;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styleforprojecg.css" rel="stylesheet" type="text/css">
    </head>


<div class="dashboard">
  <div class="dashboard__container">
  <a href="Admin.php"><img src="images/back.png" style="width:2em; height:2em;"></a>
    Welcome
    <?php echo $_SESSION['username']; ?>
    <input type="button" class = "dashboard__btn" onclick="location.href='logout.php'" value = "Log Out"/>
  </div>
    </div>
</html>