<?php
$cn = mysqli_connect("localhost", "root", "", "bd_gym");

$sql = "select p.id, p.title, p.tags, p.createDate, p.userId, p.hitCount, c.name as category from pages p left join category as c on p.categoryId = c.id where p.id = ".$_GET['article'];
$table = mysqli_query($cn, $sql);

print '<div class="summery"> Total '.mysqli_num_rows($table).' Article Found in This Category</div><hr><br>';

while($row = mysqli_fetch_assoc($table))
{
     print '<div class="article">';
     print '<h1>'.$row["title"].'</h1>'; 
     print '<h3>'.$row["tag"].'</h3>'; 
     print '<h2> Created on : '.$row["createDate"].', By : ';
     print $row["userId"].', in : '.$row["category"].' Page Hit : '.$row["hitCount"].'</h2>';
    
     print '<div class="images">';
     findImages($row['id']);
     print '</div>';
        
     $fileName = "articles/".str_replace(" ", "_", trim($row['title'])).".html";
     $file = fopen($fileName, "r");
     
     $content = fread($file, filesize($fileName));
    
     print '<div>'.$content.'</div>';
     print '<div>Like : <a href="#">0</a>, Comments : <a href="#">0</a></div>';
     print '</div>';
}
$comment = "";
$ecomment = "";
if(isset($_POST['submit']))
{
   $comment = $_POST['comment'];
   $er = 0;
   if($comment == "")
   {
       $er++;
       $ecomment = '<span class="error">Required</span>';
   }
   if($er == 0)
   {
       $sql = "insert into pagescomments(pageId, userId, comment) values(".$_GET['article'].", 1, '".$comment."')";
       if(!mysqli_query($cn, $sql))
       {
           print '<span class="error">'.mysqli_error($cn).'</span>';
       }
   }
}
?>
<form method="post" action="">
    <textarea name="comment"></textarea><input type="submit" name="submit" value="Comment">
    
    
</form>

<?php
$sql = "select id, userId, dateTime, comment from pagescomments where pageId = ".$_GET['article'];
$table = mysqli_query($cn, $sql);
while($row = mysqli_fetch_assoc($table))
{
    print '<div>';
    print '<h3>User : '.$row["userId"].', DateTime : '.$row["dateTime"].'</h3>';
    print '<p>'.$row["comment"].'</p>';
    print '</div>';
}

function findImages($pid)
{
    global $cn;
    $sql = "select id, title, image from pageImage where pageId = ".$pid;
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
        print '<img src="uploads/images/'.$row["id"].'_'.$row["image"].'"title="">';
    }
}
?>