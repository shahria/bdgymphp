<?php 
$name = "";
$contact = "";
$email = "";
$password = "";
$type = "";

$ename = "";
$econtact = "";
$eemail = "";
$epassword = "";
$etype = "";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(isset($_POST['type']))
        $type = $_POST['type']; 
    
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
    
    if($type == "")
    {
        $er++;
        $etype = '<span class="error">Required</span>';
    }
    if($er == 0)
    {
        $sql = "insert into users(name, contact, email, password, createIp, type) values('".ms($name)."', '".ms($contact)."', '".ms($email)."', password('".ms($password)."'), '".$_SERVER['REMOTE_ADDR']."', '".ms($type)."')";
        
        if(mysqli_query($cn, $sql))
        {
            print '<span class="success">Data Saved</span>';
            $name = "";
            $contact = "";
            $email = "";
            $password = "";
            $type = "";
        }
        else{
            print '<span class="error">'.mysqli_error($cn).'</span>';
        }
    }
}

?> 
<form method="post" action="">
    <label>Name</label><br>
    <input type="text" name="name" value="<?php print $name; ?>"/>
    <?php print $ename; ?><br><br>
    
    <label>Contact</label><br>
    <input type="text" name="contact" value="<?php print $contact; ?>"/><?php print $econtact; ?><br><br>
     
    <label>Email</label><br>
    <input type="text" name="email" value="<?php print $email; ?>"/><?php print $eemail; ?><br><br>
     
    <label>Password</label><br>
    <input type="password" name="password" value=""/><?php print $epassword; ?><br><br>
     
    <label>Type</label><br><br>
    <input type="radio" name="type" value="A"/>Admin
    <input type="radio" name="type" value="U"/>User <?php print $etype; ?><br><br>
     
    <input type="submit" name="submit" value="Submit">
    
    
</form>