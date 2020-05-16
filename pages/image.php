<a href="?p=image_new">New Image</a><br><hr><br>
<?php 

$sql = "select pi.id, p.title as page, pi.title, pi.dateTime, pi.image from pageImage as pi left join pages as p on pi.pageId = p.id";

$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>Title</th><th>Page</th><th>DateTime</th><th>Image</th><th>#</th></tr>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tr>';
    print '<td>'.$row["title"].'</td>';
    print '<td>'.$row["page"].'</td>';
    print '<td>'.$row["dateTime"].'</td>';
    print '<td><img src="uploads/images/'.$row["id"].'_'.$row['image'].'" height="100px"></td>';
    print '<td> Edit || Delete</td>';
    print '</tr>';
}
print '</table>';
?>