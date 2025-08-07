<?php
include 'coree/init.php';
?>
<div style="padding-top: 50px;"></div><?php
if (empty($_POST) === false) {
	$CompanyName = $_POST['CompanyId'];
	$password = $_POST['password'];

	if (empty($CompanyName) === true || empty($password) === true) {
		$errors[] = 'you need to enter ausername and password';
	} else if(user_exists($CompanyName) === false){
		$errors[] = 'not found enter ausername and password';
	} else {
		if (strlen($_POST['password']) > 15) {
			$errors[] = 'Password to0 Long';
		}
		$login = login($CompanyName, $password);
		if ($login === false) {
			$errors[] = 'incorrect username and password combination';
		}else{
			$_SESSION['CompanyId'] = $login;
			//$CompanyName = $_POST['Companyname'];
                        //$companyId=mysql_query("SELECT `CompanyId` FROM owner where `CompanyName`= '$CompanyName'");
                        //include 'form1.php';
			header('Location: form1.php');
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
   
   <?php
	   if(logged_in() === true){
	   }else{?>
	   <div class="col-md-10"><h2>we tried to log you in but...</h2><?php echo output_errors($errors);}?></div>
	   <div class="col-md-2">
              <form action="login1.php" method="POST" >
	<ul>
		<li>
		   	Company Name:<br>
		   	<input type="text" name="Companyname" class="form-control">
		</li>
		<li>
		   	Password:<br>
		   	<input type="Password" name="password" class="form-control">
		</li>
		<li>
		   	<br><input type="submit" value="Company login" class="btn btn-success">
		</li>
	</ul>
</form>
           <?php
	   }
	   ?> 
           
   </div>
</div>
<?php include 'footer.php';?>
