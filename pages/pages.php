<a href="?p=pages_new">New Pages</a> <br><br><hr><br><br><br>

<?php
$cn = mysqli_connect("localhost", "root", "", "bd_gym");
$sql = "select p.id, p.title, p.tags, p.createDate, p.userId, p.hitCount, c.name as category from pages p left join category as c on p.categoryId = c.id";
$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>Basic Info</th><th>Content</th><th>#</th></tr>';
while($row = mysqli_fetch_assoc($table))
{
     print '<tr>';
     print '<td><p>'.$row["title"].'</p><br><b>'.$row["tags"].'</b><br>'; 
     print $row["createDate"].', By : '; 
     print $row["userId"].'<br>';
     print '<b>Hit : </b>'.$row["hitCount"].', in : ';
     print $row["category"].'</td>';
     print '<td>';
    
     $fileName = "articles/".str_replace(" ", "_", trim($row['title'])).".html";
     $file = fopen($fileName, "r");
     
     $content = fread($file, filesize($fileName));
    
     print substr(strip_tags($content), 0, 300);
     print '<br> ... .. . <a href="#">Read More</a>';
     print '</td>';
     print '<td>Edit | Delete</td>'; 
     print '</tr>';
    } 
print '</table>';
?>