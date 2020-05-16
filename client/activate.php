<?php 

if(isset($_GET('id')))
{
    $sql = "insert into usersactive(userId, ip) values(".ms($_GET['id'].", '".$_SERVER['REMOTE_ADDR']."')";
    if(mysqli_query($cn, $sql))
    {
        print "Your Account Have Been Activated, You Can Login Now";
    }
    else{
        print "You Are Activated Already";
    }
                                                            
}


?>