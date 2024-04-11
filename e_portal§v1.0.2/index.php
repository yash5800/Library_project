<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: aliceblue;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .log{
            position: absolute;
            display: block;
            top:38%;
            left: 20%;

        }
        .log button{
            font-size: large;
            border: none;
            border-top: 1px solid;
            width: 100%;
            padding: 1em;
            color: #fff;
            background-color: #333;
        }
        .log button:hover{
            box-shadow: 0 5px 10px black,0 -5px 10px black;
        }
        input{
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            padding: 15px;
            border-radius: 1rem;
            border: 1px solid black;
        }
        img{
            width: 100%;
            min-height: auto;
        }
    </style>
</head>
<body>
    <img src="images/geclogo.jpg">
    <div class='log'>
        <a href="log-in_admin.php">
        <button>Admin</button></a><br>
        <a href="log-in_admin.php">
        <button>Student</button></a><br>
        <a href="log-in_admin.php">
        <button >Staff</button></a><br>

    </div>
    <input type="text" placeholder="bookname">
</body>
</html>