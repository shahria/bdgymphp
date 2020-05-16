<?php

if(isset($_GET['p']))
{
    if(file_exists("pages/".$_GET['p'].".php"))
    {
        print '<span class="title">'.ucwords(str_replace("_", " ", $_GET['p'])).'</span>';
        if(isset($_SESSION['type']))
        {
            include("pages/".$_GET['p'].".php");
        }
        else{
            print '<span class="error">You Need to Login With Admin Account to View This Content</span><br>';
            include('client/login.php');
        }
    }
    else
    {
        include("warning.php");
    }
}
else if(isset($_GET['c']))
{
    if($_GET['c'] == "login")
    {
        print '<span class="title">Login</span>';
        if(isset($_POST['btnLogin']))
        {
            if(isset($_SESSION['active']))
                {
                 print '<span class="error">You Have To Active Your Account, Plz Check Your Email.</span>'; 
                include('client/resend.php');
                }
            else if(isset($_SEESION['type']))
            {
                print '<span class="success">Loged In Was Successful</span>';
            }
            else{
                print '<span class="error">Invalid Login Plz Try Again<br></span>';
                include('client/login.php');
            }
        }
        else{
            include('client/login.php');
        }
    }
    else if(file_exists("client/".$_GET['c'].".php"))
    {
        print '<span class="title">'.ucwords(str_replace("_", " ", $_GET['c'])).'</span>';
        include("client/".$_GET['c'].".php");
    }
    else
    {
        include("warning.php");
    }
}
else
{
    include("pages/home.php");
}
?>