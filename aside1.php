
<?php
	
    if (logged_in() === true) {
?>
	
<?php
include 'loggedin.php';
} else {
    include 'form1.php';
}
?>
