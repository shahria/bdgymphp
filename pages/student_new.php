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
        $sql = "INSERT INTO student (name, contact, email, address, cityId) VALUES ('".mysqli_real_escape_string($cn, $Name)."', '$Contact', '$Email', '".mysqli_real_escape_string($cn, $Address)."', $City)";
            
            if(mysqli_query($cn, $sql))
             {  
            print "<span class=\"success\">Data Saved.</span>";
                $Name = "";
                $Contact = "";
                $Email = "";
                $Address = "";
                $City = "";
    }
        else{
            print '<span class="error">'.mysqli_error($cn).'</span>';
        }}
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
        <a href="?p=city_new">Add City</a><br><hr><br>
        <?php 

        $sql = "select id, name from city";

        $table = mysqli_query($cn, $sql);

        while($row = mysqli_fetch_assoc($table))
        {
            if($city == $row["id"])
            {
                print '<option value="'.$row["id"].'"selected>'.$row["name"].'</option>';
            }
            else{
                print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
            }
        }
        ?>
   </select><?php print $ECity; ?><br><br>
   
    <input type="submit" name="submit" value="Submit">
       
</form>