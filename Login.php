<?php include('connection-maitha.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="styleforprojecg.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 350px;
            background: #ebdad0;
            border-radius: 10%;
        }

        .center h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid #96742e;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field {
            position: relative;
            border-bottom: 2px solid #96742e;
            margin: 30px 0;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }



        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #514543;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #514543;
            transition: .5s;
        }

        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -10px;
            color: #514543;
        }

        .txt_field input:focus~span::before,
        .txt_field input:valid~span::before {
            width: 100%;
        }

        .center button {
            width: 100%;
            height: 40px;
            border: 1px solid;
            border-radius: 25px;
            font-size: 18px;
            color: #514543;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        .center button:hover {
            border-color: #514543;
            transition: .5s;
        }

        .img {
            position: absolute;
            /* size: 1px; */
            top: 30px;
            left: 450px;
        }
    </style>

   
</head>

<body>
<div class="img">
                <img src="images/logo3.png" width= "160"   >
            </div>
    <div class="center">
        <h1>Login</h1>
        <form action="connection-maitha.php" method="post">
            <div class="txt_field">
                <input type="text" name= "username"required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password"required>
                <span></span>
                <label>Password</label>
            </div>
            <!-- div class="pass" later -->
            <button class="btn" type="submit" name="login_user">Login</button>
            
        </form>
    </div>
</body>

</html>