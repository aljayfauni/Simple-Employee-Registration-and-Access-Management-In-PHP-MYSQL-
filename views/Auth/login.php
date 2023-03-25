<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family:calibri;
            
        }
        h2{
            color:grey;
        }
        html{
           
        }
        .login-form{
            width:400px;
            height:auto;
            padding:10px;
            box-shadow:1px 1px 10px 1px #ccc;
            margin:200px auto;
            font-size:16px;
        }
        input{margin-bottom:7px;padding:7px;}
        input[type="text"],
        input[type="email"],
        input[type="password"]{
            width:94%;

        }
        .login-btn{
            cursor:pointer;}
        
    </style>
</head>
<body>
        <div>
            <div class="class login-form">
                <form action="../../controller/LoginController.php" method="post">
                    <h2>Login Employee</h2>
                    <input type="email" name="email" placeholder="Email"></br>
                    <input type="password" name="password" placeholder="Password"></br>
                   <input type="submit" class="login-btn" style="width:98.5%;background:#2da2d8;border:none;color:#ffffff;" name="login_btn" value="Login">
                </form>
            </div>
        </div>
</body>
</html>