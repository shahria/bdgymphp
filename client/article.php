<?php
$search = "";
if(isset($_POST['btnSearch']))
{
    $search = $_POST['search'];
}
?>

<form method="post">
    <input type="text" name="search" value="<?php print $search; ?>">
    <input type="submit" name="btnSearch" value="Search">
</form>

<?php
$cn = mysqli_connect("localhost", "root", "", "bd_gym");

$a = array();

findSubCategory($_GET['ctg'], $a);

if(isset($_GET['likeId']) && isset($_SESSION['type']))
{
    $sql = "insert into pageLikes(pageId, userId) values(".$_GET['likeId'].",".$_SESSION['id'].")";
    mysqli_query($cn, $sql);
}

$sql = "select p.id, p.title, p.tags, p.createDate, p.userId, p.hitCount, c.name as category, (select count(id) from pagesComments where pageId = p.id) as comments from pages p left join category as c on p.categoryId = c.id where p.categoryId in(".implode(", ", $a).")";
if($search != "")
{
    $sql .= " and (p.title like %'".ms($search)."'% or p.tags like %'".ms($search)."'%)";
}

$table = mysqli_query($cn, $sql);

$totalItem = mysqli_num_rows($table);

$page = 1;
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}

$sql .= " limit ".(($page-1) *5).", 5";
$table = mysqli_query($cn, $sql);

print '<div class="summery"> '.((($page -1) * 5) +1).' - '.((($page -1) * 5) + 5).' /'.$totalItem.'</div><hr><br>';

$lastPage = $totalItem / 5;
if($totalItem % 5 > 0)
{
    $lastPage += 1;
}

if($page > 1)
{
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'">First </a> ';
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&page='.($page - 1).'">Previous</a> ';
}

if($page < $lastPage)
{
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&page='.($page + 1).'">Next </a> ';
print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&page='.$lastPage.'">Last </a> ';
}

while($row = mysqli_fetch_assoc($table))
{
     print '<div class="article">';
     print '<h1>'.$row["title"].'</h1>'; 
     print '<h3>'.$row["tags"].'</h3>'; 
     print '<h2> Created on : '.$row["createDate"].', By : ';
     print $row["userId"].', in : '.$row["category"].' Page Hit : '.$row["hitCount"].'</h2>';
        
     $fileName = "articles/".str_replace(" ", "_", trim($row['title'])).".html";
     $file = fopen($fileName, "r");
     
     $content = fread($file, filesize($fileName));
    
     print '<div>';
     findImage($row['id']);
     print substr(strip_tags($content), 0, 600);
     print ' <br>.......<a href="?c=articleDetails&article='.$row["id"].'">Read More</a></div>';
     print '<div>';
     $likeUsers = array();
     $likeUsersName = array();
     findLikes($row["id"], $likeUsers, $likeUsersName);
     if(isset($_SESSION['type'])) 
     {
         if(in_array($_SESSION['id'], $likeUsers))
         {
             print '<a href="#">You and Other Like</a> : ';
         }
         else{
     print '<a href="?c='.$_GET['c'].'&ctg='.$_GET['ctg'].'&likeId='.$row['id'].'">Like</a> : ';
     }}
     else{
         print ' like: ';
     }
     print '<a href="#" title="'.implode("\n", $likeUsersName).'">'.count($likeUsers).'</a>';
     print ', Comments : <a href="#">'.$row['comments'].'</a></div>';
     print '</div>';
    } 
function findSubCategory($cid, &$a)
{
    global $cn;   
    $a[] = $cid;
    
    $sql = "select id from category where categoryId = ".$cid;
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
     $a[] = $row["id"];
     findSubCategory($row["id"], $a);
    }
}
function findImage($pid)
{
    global $cn;
    $sql = "select id, title, image from pageImage where pageId = ".$pid." limit 0, 1";
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
        print '<img src="uploads/images/'.$row["id"].'_'.$row["image"].'"title="">';
    }
}

function findLikes($pid, &$likeUsers, &$likeUsersName)
{
    global $cn;
    $sql = "select pl.userId, u.name as user from pageLikes as pl left join users as u on pl.userId = u.Id where pl.pageId = ".$pid;
    $table = mysqli_query($cn, $sql);
    while($row = mysqli_fetch_assoc($table))
    {
        $likeUsers[] = $row["userId"];
        $likeUsersName[] = $row["user"];
    } 
}
?>