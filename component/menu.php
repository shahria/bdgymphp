   <ul id="css3menu2" class="topmenu">
            <li><a href="?p=home">Home</a></li>
            <?php
            $cn = mysqli_connect("localhost", "root", "", "bd_gym");
            $sql = "select id, name from category where categoryId = 0";
            $table = mysqli_query($cn, $sql);               
            while($row = mysqli_fetch_assoc($table))
            {
                print '<li><a href="?c=article&ctg='.$row["id"].'">'.$row["name"].'</a>';
                findChild($row["id"]);
                print '</li>';
            } 
               
               function findChild($pid)
               {
                   global $cn;
                   $sql = "select id, name from category where categoryId = ".$pid;
                   $table = mysqli_query($cn, $sql);
                   if(mysqli_num_rows($table) > 0)
                   {
                   print '<ul>';
                   while($row = mysqli_fetch_assoc($table))
                   {
                        print '<li><a href="?c=article&ctg='.$row["id"].'">'.$row["name"].'</a>';
                        findChild($row["id"]);
                        print '</li>';
                    } 
                   print '</ul>';
                   }
               }
       if(isset($_SESSION['type']))
       {
           print '<li><a href="?p=users">Users</a></li>
                  <li><a href="?p=category">Category</a></li>
                  <li><a href="?p=pages">Pages</a></li>
                  <li><a href="?p=files">File</a></li>
                  <li><a href="?p=image">Image</a></li>
                  <li><a href="?p=myaccount">'.$_SESSION['name'].'</a></li>
                  <li><a href="?c=logout">Logout</a></li>';
       }
       else{
              print '<li><a href="?c=register">Register</a></li>
                     <li><a href="?c=login">Login</a></li>';
       }
               ?>
               
            </ul>