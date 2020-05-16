This is City Page.<br><br><br>


<a href="?p=city_new">Add City</a><br><hr><br>
<?php 
$cn = mysqli_connect("localhost", "root", "", "bd_gym");

$sql = "select id, name from city";

$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>Id</th><th>Name</th><th>#</th>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tr>';
    print '<td>'.$row["id"].'</td>';
    print '<td>'.$row["name"].'</td>';
    print '<td> Edit || Delete</td>';
    print '</tr>';
}
print '</table>';
?>