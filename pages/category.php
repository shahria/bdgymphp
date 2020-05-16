<br><a href="?p=category_new">New Category</a><br><br><hr>

<?php
$cn = mysqli_connect("localhost", "root", "", "bd_gym");
$sql = "select c1.id, c1.name, c1.description, c2.name as category from category as c1 left join category c2 on c1.categoryId = c2.id";
$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>Id</th><th>Name</th><th>Description</th><th>Category</th><th>PageCount</th><th>#</th></tr>';
while($row = mysqli_fetch_assoc($table))
{
     $a = array();
     print '<tr>';
     print '<td>'.$row["id"].'</td>'; 
     print '<td>'.$row["name"].'</td>'; 
     print '<td>'.$row["description"].'</td>'; 
     print '<td>'.$row["category"].'</td>'; 
    
     findSubCategory($row["id"], $a); 
     
     print '<td>';
     
     $sql = "select count(id) as count from pages where categoryId in (".implode(", ", $a).")";
     $table2 = mysqli_query($cn, $sql);
     while($row2 = mysqli_fetch_assoc($table2))
     {
       print $row2["count"];
     }
     print '</td>';
     print '<td>Edit | Delete</td>'; 
     print '</tr>';
    } 
print '</table>';

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
    
?>