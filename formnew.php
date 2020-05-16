<link rel="stylesheet" href="success.css">


<?php

$Name = "";
$Contact = "";
$Email = "";
$Address = "";
$City = "";

$EName = "";
$EContact = "";
$EEmail = "";
$EAddress = "";
$ECity = "";

if(isset($_POST['submit']))
{
    $Name = $_POST['Name'];
    $Contact = $_POST['Contact'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    
    $er = 0;
    if($Name == "")
    {
        $er++;
        $EName = "<span class=\"error\">Name Required</span><br>";
    }
    if($Contact == "")
    {   
    $er++;
    $EContact = "<span class=\"error\">Contact Required</span><br>";
    }
    if($Email == "")
    {
        $er++;
        $EEmail = "<span class=\"error\">E-mail Requiered</span><br>";
    }
    if($Address == "")
    {
        
    }
    else if(strlen($Address) < 6)
        
    {
        $er++;
        $EAddress = "<span class=\"error\">Address Must Be Five Characters.</span><br>";
    }
    
    if($City == "0")
    {
        $er++;
        $ECity = "<span class=\"error\">Select City</span><br>";
    }
    if($er == 0)
    {
        print "<span class=\"success\">Data Saved.</span>";
    }
    else{
        
    }
}

?>
<form method="post" action="">
<lavel>Name</lavel><br>
<input type="text" name="Name" value="<?php print $Name; ?>"><?php print $EName; ?><br><br>
    <lavel>Contact</lavel><br>
<input type="text" name="Contact" value="<?php print $Contact; ?>"><?php print $EContact; ?><br><br>
      <lavel>Email</lavel><br>
<input type="text" name="Email" value="<?php print $Email; ?>"><?php print $EEmail; ?><br><br>
      <lavel>Address</lavel><br>
    <textarea name="Address"> <?php print $Address; ?></textarea><?php print $EAddress; ?><br><br>
   <lavel>City</lavel><br>
   <select name="City">
       <option value="0">Select</option>
       <option value="1">Chandpur</option>
       <option value="2">Dhaka</option>
       <option value="3">Sylhet</option>
   </select><?php print $ECity; ?><br><br>
   
    <input type="submit" name="submit" value="Submit">
    
    
    
    
    
    
    
    
</form>