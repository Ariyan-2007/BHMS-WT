<?php  
            
    $idErr = $nameErr = $emailErr = $genderErr = $dobErr = $name = $email = $dob = $gender = "";
    $username = $password = $userNameErr = $passErr = $confirmpassErr = $confirmpass ="";
    $message = ''; 
    $ValidateAllField = ''; 
    $error = ''; 


    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reset']))
    {
        unset($_post);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
    {
        $idErr = $_REQUEST["id"];
        $nameErr = $_REQUEST["name"];
        $emailErr = $_REQUEST["email"];
        $userNameErr = $_REQUEST["username"];
        $passErr = $_REQUEST["Password"];
        $confirmpassErr = $_REQUEST["confirmpass"];
        $genderErr = $_REQUEST["gender"];
        $dobErr = $_REQUEST["birthday"];

        if(empty($idErr) || empty($nameErr) || empty($_REQUEST["gender"]) || empty($passErr) || empty($confirmpassErr) || empty($userNameErr) || empty($dobErr))
        {
            $ValidateAllField = "Please Fillup All The Field!!";
        }
        else{ 
            include("../connection/dbConnect.php");
            $dbTry = new db();
            $conObj = $dbTry->OpenConn();
            $dataInsert = $dbTry->InsertData($conObj, $idErr, $nameErr, $emailErr, $userNameErr, $passErr, $_REQUEST["gender"], $_REQUEST["birthday"]);
            echo "<br>".$dataInsert;
            unset($_post);   
          }
        
        if(empty($nameErr) || strlen($nameErr)<4)
        {
            $nameErr = "Name is required";
        }
        else {
            //$nameErr= test_input($_POST["name"]);
            
            if (!preg_match("/^[a-zA-Z-.' ]*$/",$nameErr)) //name input con checking1..
            {
              $nameErr = "Only letters white space, period & dash allowed";
              $name ="";
            }
            else if (str_word_count($nameErr)<2)//name input con checking2..
             {
              $nameErr = "At least two words needed";
              $name ="";
            }
          } 
        
        if(empty($userNameErr) || strlen($userNameErr)<6 || !preg_match("/^[A-Za-z0-9_~\-!@.#\$%\^&*\(\)]+$/",$userNameErr))
        {
            $userNameErr = "Give user name or nick name";
        }
        else {
            //$userNameErr = test_input($userNameErr);
            $_SESSION["Sname"]="$username";
            if (!preg_match("/^[a-zA-Z-._]*$/",$userNameErr))
             {
              $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
              $username ="";
            }
            else if (strlen($userNameErr)<2) {
              $userNameErr = "At least two charecters needed";
              $username ="";
            }
          }

        if(empty($emailErr) || !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$email))
        {
            $emailErr = "Email is required";
        }
        else {
           // $email = test_input($_POST["email"]);
            $_SESSION["Semail"]="$email";
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //email validation checking
            {
              $emailErr = "Invalid email format Give valid";
              $email ="";
            }
          }
        
        if(empty($_REQUEST["gender"]))
        {
            $genderErr = "Select gender";
        }
        else 
        {
           // $gender = test_input($_POST["gender"]);
            $_SESSION["Sgender"]="$gender";
        }

        if(empty($_REQUEST["dob"]))
        {
            $dobErr = "Please Enter a Date";
        }
        if (empty($_POST["password"]))
        {
            $passErr = "Password is required";//if this field id empty 
        }
        else 
        {
           // $passErr = test_input($passErr);
            if (strlen($passErr)<8)
             {
              $passErr = "Password must be 8 charecters";
              $password ="";
            }
            else if (!preg_match("/[@,#,$,%]/",$passErr)) {
              $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
              $password ="";
            }
          }
          if (empty($_POST["confirmpassword"])) 
          {
            $confirmpassErr = "Retype The Current Password";//if this field id empty 
          } 
          else 
          {
            //$confirmpassErr = test_input($confirmpassErr);
            if (strcmp($passErr, $confirmpassErr)==1) {
              $confirmpassErr = "Password & Retyped Password Dosen't Match";
              $confirmpass ="";
            }
          } 
    }
?>