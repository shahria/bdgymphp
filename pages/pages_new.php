
<script src="js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'.editor'});</script>

<?php
$cn = mysqli_connect("localhost", "root", "", "bd_gym");

$title = "";
$tag = "";
$content = "";
$categoryId = "";

$etitle = "";
$etag = "";
$econtent = "";
$ecategoryId = "";

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $tag = $_POST['tag'];
    $content = $_POST['content'];
    $categoryId = $_POST['categoryId'];
    
    $er = 0;
    
    if($title == "")
    {
        $er++;
        $etitle = '<span class="error">Required</span>';
    }
    if($tag == "")
    {
        $er++;
        $teag = '<span class="error">Required</span>';
    }
    if($content == "")
    {
        $er++;
        $econtent = '<span class="error">Required</span>';
    }
    if($categoryId == "0")
    {
        $er++;
        $ecategoryId = '<span class="error">Required</span>';
    }
    if($er == 0)
    {
        $sql = "insert into pages(title, tags, createDate, userId, hitCount, categoryId) values('".mysqli_real_escape_string($cn, $title)."','".mysqli_real_escape_string($cn, $tag)."', '".date("Y-m-d")."', 1, 0, ".mysqli_real_escape_string($cn, $categoryId).")";
        
        if(mysqli_query($cn, $sql))
        {
            $file = fopen("articles/".str_replace(" ", "_", trim($title)).".html", "w");
            fwrite($file, $content);
            print '<span class="success">Data Saved</span>';
            $title = "";
            $tag = "";
            $content = "";
            $categoryId = "";
        }
        else{
            print '<span class="error">'.mysqli_error($cn).'</span>';
        }
    }
}

?>

<form method="post" action="">
   
    <br><label>Title</label><br>
    <input type="text" name="title" value="<?php print $title; ?>"/><?php print $etitle; ?><br><br>
    
    <label>Tag</label><br>
    <input type="text" name="tag" value="<?php print $tag; ?>"/><?php print $etag; ?><br><br>
    
    <label>Content</label><br>
    <textarea name="content" class="editor"><?php print $content; ?></textarea><?php print $econtent; ?><br><br>
    
    <label>Category</label><br>
    <select name="categoryId">
    <option value="0">Select</option> 
    
    <?php
    $sql = "select id, name from category";
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
        if($row["id"] == $categoryId)
        {
            print '<option value="'.$row["id"].'"Selected>'.$row["name"].'</option>';
        }
        else{
            print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
        }
    }
    
    ?>
    </select><?php print $ecategoryId; ?><br><br>
    
    <input type="submit" name="submit" value="Submit"/><br><br>
    
</form>