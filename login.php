<?php
include 'core/init.php';
?>
<div style="padding-top: 50px;"></div><?php
if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'you need to enter ausername and password';
	} else if(user_exists($username) === false){
		$errors[] = 'not found enter ausername and password';
	} else {
		if (strlen($_POST['password']) > 15) {
			$errors[] = 'Password to0 Long';
		}
		$login = login($username, $password);
		if ($login === false) {
			$errors[] = 'incorrect username and password combination';
		}else{
			$_SESSION['user_id'] = $login;
			header('Location: index.php');
			exit();
		}
	}
?>
<?php
}else {
	$errors[] = 'no data rece';
}
include 'head.php';
include 'header.php';
include 'headerr.php';
if (empty($errors) === false) {?>

        <style> 
	        ul{ 
	        	padding:0;
	        	margin: 0 0 20px 0;
	        	list-style: none; }
        </style>

<div class="container">
   <div class="col-md-10"><h2>we tried to log you in but...</h2><?php echo output_errors($errors);}?></div>
   <div class="col-md-2"><?php
	   if(logged_in() === true){
	   }else{?>
	   <?php
	       include 'form.php';
	   }
	   ?> 
           <a href='form1.php'>Company Login</a>
   </div>
</div>
<?php include 'footer.php';?>
