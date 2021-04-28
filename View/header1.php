<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .header {
        overflow: hidden;

        padding: 20px 10px;
    }

    .header a {
        float: left;
        color: black;
        text-align: center;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        line-height: 25px;
        border-radius: 4px;
    }

    .header a.logo {
        font-size: 25px;
        font-weight: bold;
    }

    .header .header-right a:hover {
        background-color: #ddd;
        color: blue;
    }

    .header a.active {
        background-color: dodgerblue;
        color: white;
    }

    .header-right {
        float: right;
         text-align: center;

    }

    @media screen and (max-width: 500px) {
        .header a {
            float: none;
            display: block;
            text-align: left;
        }

        .header-right {
            float: none;
        }
    }
    </style>
</head>

<body>
   <?php

if (empty($_SESSION['username'])) { ?>

    <?php
$home="home";

?>


    <div class="header">

        <div class="logo">
  
        </div>

        <div class="header-right">
            <?php
            if(isset($_SESSION["Sname"]))
            {
                $home=$_SESSION["Sname"];
                echo "<a class='active' href='homepage.php'>Logged in as $home</a>";
            }
            else{
                echo "<a class='active' href='homepage.php'>Home</a>";
            }
            
        echo "
        <a href='login.php'>login</a>
         <a href='about.html'>About us</a>
        <a href='registration.php'>Registration</a>";
        ?>

        </div>
    </div>
    <?php }

else if(!empty($_SESSION['username'])){ ?>
    <div class="header">

        <div class="logo">
  
        </div>

        <div class="header-right">
            <?php
            if(isset($_SESSION["Sname"]))
            {
                $home=$_SESSION["Sname"];
                echo "<a class='active' href='homepage.php'>Logged in as $home</a>";
            }
            else{
                echo "<a class='active' href='homepage.php'>Home</a>";
            }
            
        echo "
        <b>Welcome ".$_SESSION['username']."<b>
        <a href='logout.php'>logout</a>
         <a href='about.html'>About us</a>
        <a href='registration.php'>Registration</a>";
        ?>

        </div>
    </div>
    <?php }
?>
</body>

</html>