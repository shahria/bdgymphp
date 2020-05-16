<?php

$page = "";
$title = "";
$file= array();

$epage = "";
$etitle = "";
$efile = "";

if(isset ($_POST['submit']))
{
    $page = $_POST['page'];
    $title = $_POST['title'];
    $file = $_FILES['file'];
    
    $er = 0;
    if($page == "0")
    {
        $er++;
        $epage = '<span class="error">Required</span>';
    }
    
    if($title == "")
    {
        $er++;
        $etitle = '<span class="error">Required</span>';
    }
    
    if($file['name'] == "")
    {
        $er++;
        $efile = '<span class="error">Required</span>';
    }
    else if($file['size'] > (2 * 1024 * 1024))
    {
        $er++;
        $efile = '<span class="error">File Must Be Less Than 2 MB</span>';
    }
    else{
        $a = explode(".", $file['name']);
        if(is_array($a) && count($a) > 1)
        {
            $ext = strtolower($a[count($a)-1]);
            if(!($ext == "doc" || $ext == "pdf" || $ext == "docx"))
               {
                   $er++;
                   $efile = '<span class="error">Only Doc, Pdf, Docx Supported</span>';
               }
        }
        else{
            $er++;
            $efile = '<span class="error"> . Not Available</span>';
            }
        }
               if($er == 0)
               {
                   $sql = "insert into pageFile(pageId, title, file) values( ".ms($page).", '".ms($title)."', '".ms($file['name'])."')";
                   if(mysqli_query($cn, $sql))
                   {
                       $sp = $file['tmp_name'];
                       $dp = "uploads/files/".mysqli_insert_id($cn)."_".$file['name'];
                       move_uploaded_file($sp, $dp);
                       
                       print '<span class="success">File Saved</span>';
                       $page = "";
                       $title = "";
                       $file = array(); 
                   }
                   else{
                         print '<span class="error">.mysqli_error($cn)</span>';
                   }
               }
}
?>

<form method="post" action="" enctype="multipart/form-data">

    <label>Page</label><br>
    <select name="page">
        <option value="0">Select</option>
        <?php 

        $sql = "select id, title from pages";

        $table = mysqli_query($cn, $sql);
        while($row = mysqli_fetch_assoc($table))
        {
            if($page == $row["id"])
            {
                print '<option value="'.$row["id"].'"selected>'.$row["title"].'</option>';
            }
            else{
                print '<option value="'.$row["id"].'">'.$row["title"].'</option>';
            }
        }
        ?>
    
    </select><?php print $epage; ?><br><br>

    <label>Title</label><br>
    <input type="text" name="title" value="<?php print $title; ?>"><?php print $etitle; ?><br><br>
    
    <label>File</label><br>
    <input type="file" name="file"><?php print $efile; ?><br><br>
    
    <input type="submit" name="submit" value="Submit">
    
</form>