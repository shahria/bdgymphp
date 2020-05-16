<form method="post" action="">
    <label>Name</label><br>
    <input type="text" name="name" value="<?php print $name; ?>"/>
    <?php print $ename; ?><br><br>
    
    <label>Contact</label><br>
    <input type="text" name="contact" value="<?php print $contact; ?>"/><?php print $econtact; ?><br><br>
     
    <label>Email</label><br>
    <input type="text" name="email" value="<?php print $email; ?>"/><?php print $eemail; ?><br><br>
     
    <label>Password</label><br>
    <input type="password" name="password" value=""/><?php print $epassword; ?><br><br>
    
    <label>Retype Password</label><br>
    <input type="password" name="passwordReType" value=""/><?php print $epasswordReType; ?><br><br>
     
     
    <input type="submit" name="submit" value="Submit">
    
    
</form>