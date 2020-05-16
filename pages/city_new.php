<?php
$name = "";

$ename = "";


if(isset($_POST['submit']))
{
    $name = $_POST["name"];
    
    $er = 0;
    
    if($name == "")
    {
        $er++;
        $ename = '<span class="error">Required</span>';
    }
    
    if($er == 0)
    {
        $sql = "insert into city(name) values('".mysqli_real_escape_string($cn, $name)."')";
        
        if(mysqli_query($cn, $sql))
        {
            print "<span clas=\"success\">City Inserted</span>";
            $name = "";
        }
        
        else{
            print '<span class="error">'.mysqli_error($cn).'</span>';
        }
    }
}

?>
   

   
   
   <form method="post" action="">
    <label>Name</label>
    <input type="text" name="name" value="<?php print $name; ?>"/>
    <?php print $ename; ?><br><br>
    
    <input type="submit" name="submit" value="Submit"/>
    
    
    
</form>