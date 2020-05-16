<?php 
$name = "";
$contact = "";
$email = "";
$password = "";
$passwordReType = "";

$ename = "";
$econtact = "";
$eemail = "";
$epassword = "";
$epasswordReType = "";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordReType = $_POST['passwordReType'];
    
    $er = 0;
    
    if($name == "")
    {
        $er++;
        $ename = '<span class="error">Required</span>';
    }
    
    if($contact == "")
    {
        $er++;
        $econtact = '<span class="error">Required</span>';
    }
    
    if($email == "")
    {
        $er++;
        $eemail = '<span class="error">Required</span>';
    }
    
    if($password == "")
    {
        $er++;
        $epassword = '<span class="error">Required</span>';
    }
    
    if($passwordReType == "")
    {
        $er++;
        $epasswordReType = '<span class="error">Required</span>';
    }
    else if($password != $passwordReType)
    {
        $er++;
        $epasswordReType = '<span class="error">Password MissMatch!</span>';
    }
    
    if($er == 0)
    {
        $sql = "insert into users(name, contact, email, password, createIp, type) values('".ms($name)."', '".ms($contact)."', '".ms($email)."', password('".ms($password)."'), '".$_SERVER['REMOTE_ADDR']."', 'U')";
        
        if(mysqli_query($cn, $sql))
        {
            print '<span class="success">Registration Was Completed Successfully.</span>';
            
            $message = "Dear ".$name."\n<br>";
            
            $message .= "You have recently register to our sytem. Plz, click the following link to activate your account.\n<br>";
            
            $message .= '<a href="http://localhost/bdgym/?c=activate$id='.mysqli_insert_id($cn).'">Activate My Account</a>'."\n<br>";
            
            $message .= 'If you have not register than click the following link'."\n<br>";
            
            $message .= '<a href="http://localhost/bdgym/?c=deactivate$id='.mysqli_insert_id($cn).'">Activate My Account</a>'."\n<br>";
            
            print $message;
                
            //mail($email, "account activation for user.com", $message);
        }
        else{
            print '<span class="error">'.mysqli_error($cn).'</span>';
            include(client/registration_form.php);
        }
    }
}
else
{
    include('client/registration_form.php');
}
?> 
