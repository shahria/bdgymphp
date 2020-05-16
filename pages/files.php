<a href="?p=file_new">New Files</a> <br><br><hr><br><br><br>

<?php 

$sql = "select pf.id, p.title as page, pf.title, pf.dateTime, pf.file from pageFile as pf left join pages as p on pf.pageId = p.id";

$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>Page</th><th>DateTime</th><th>File</th><th>#</th></tr>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tr>';
    print '<td>'.$row["page"].'</td>';
    print '<td>'.$row["dateTime"].'</td>';
    print '<td><a href="uploads/files/'.$row["id"].'_'.$row['file'].'" height="100px">'.$row['title'].'</a></td>';
    print '<td> Edit || Delete</td>';
    print '</tr>';
}
print '</table>';
?>