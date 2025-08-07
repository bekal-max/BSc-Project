
<style> 
	        ul{ 
	        	padding:0;
	        	margin: 0 0 20px 0;
	        	list-style: none; }
</style>
<?php
  include 'core/init.php';
  include 'head.php';
 if(logged_in() === true){ 
?>
  <link href="css/bootstrap.css" rel="stylesheet">
  
<?php
    include 'header.php';
    include 'headerr.php';
  mysql_connect('localhost','root','');
  mysql_select_db('datastore');

 	$epr='';
	if(isset($_GET['epr'])) 
		$epr=$_GET['epr'];
  if($epr == 'add'){if (isset($_POST['companyid'])&&isset($_POST['companyname']) &&isset($_POST['address'])&&isset($_POST['phoneno'])&&isset($_POST['email'])&&isset($_POST['password'])) {
		$errors = array();
		
		$companyid = $_POST['companyid'];
		$companyname = $_POST['companyname'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phoneno = $_POST['phoneno']; 
		
function file_already_exists($companyid){
		$companyid = sanitize($companyid);
		$querya = mysql_query("SELECT count(`CompanyId`) from `owner` where `CompanyId` = '$companyid'");
		return (mysql_result($querya, 0) == 1) ? true : false;
	}
				if (file_already_exists($companyid) === true) {
					$errors[] = 'Existing ownerId';
				}
				if (empty($companyid) === true or empty($companyname) === true  or empty($email) === true){
					$errors[] ='Fill all spaces';
				}


		if (empty($errors)){
	$sqlquary=mysql_query("INSERT INTO owner values('$companyid','$companyname','$address','$phoneno','$email','$password')");
		
		if ($sqlquary) {
			header("location:index.php");
		   $success = "File successfully Added";
		   echo $success;
		}else{echo "errrrrror";}
	 
  }
 }
}
if($epr=='delete'){
		$id=$_GET['id'];
		$delete=mysql_query("DELETE from owner where `CompanyId`='$id'");
		if($delete){
            header("location:companyRegister.php");
		}else{
			echo "error";
		}
	}
if ($epr == 'saveup') 
{if (isset($_POST['companyid'])&&isset($_POST['companyname']) &&isset($_POST['address'])&&isset($_POST['phoneno'])&&isset($_POST['email'])) {
		$errors = array();
		
		$companyid = $_POST['companyid'];
		$companyname = $_POST['companyname'];
		$address = $_POST['address'];
		$phoneno = $_POST['phoneno'];
		$email = $_POST['email'];
		//$password = $_POST['password']; 	
				
$update=mysql_query("UPDATE owner set  `CompanyId`='$companyid',`CompanyName`='$companyname',`address`='$address',`phoneNo`='$phoneno', `email`='$email' where `CompanyId`='$companyid'");
				   if ($update) {
					header("Location:companyRegister.php");
					$successs = "File successfully updated";

				   }
	}else{
$errors[] ='Fill all spaces';
}
}
?>

<div  class="container" style="padding-top: 50px;">
	<div class="row">
	<div class="col-md-3"><a style="color: red"><?php echo output_errors($errors);?></a>
		<?php
						if($epr=='update'){
						  $id=$_GET['id'];
						  $row=mysql_query("SELECT * FROM owner where `CompanyId`= '$id'");
						  $st_row=mysql_fetch_array($row);
					?>	 
		<h2 style="color: black;">Update</h2>
		<form method="Post" action="companyRegister.php?epr=saveup" enctype="multipart/form-data">
			<ul>
				<li>
					CompanyId:<br>
					<input type="text" name="companyid" class="form-control" value="<?php echo $st_row['CompanyId']?>">
				</li>
				<li>
					CompanyName:<br>
					<input type="text" name="companyname" class="form-control" value="<?php echo $st_row['CompanyName']?>">
				</li>
				
				<li>
				   	Address:<br>
				   	<input type="text" name="address" class="form-control" value="<?php echo $st_row['address'] ?>">
				</li>
				<li>
					PhoneNo:<br>
					<input type="text" name="phoneno" class="form-control" value="<?php echo $st_row['phoneNo']?>">
				</li>
				<li>
                                        E-mail:<br>
	   					<input type="text" name="email" class="form-control" value="<?php  echo $st_row['email']?>">
				</li>
				</li>
				<li>
					<br><input type="submit" value="Update" class="btn btn-success">
				</li>
			</ul>  
		</form>
		   <?php
						}else{
		   ?>
		   
		   <?php //echo output_errors($errors); ?>
	   	  <form action="companyRegister.php?epr=add" method="POST" >
			<ul>
				<li>
				   	CompanyId:<br>
				   	<input type="text" name="companyid" class="form-control">
				</li>
				<li>
				   	CompanyName:<br>
				   	<input type="text" name="companyname" class="form-control">
				</li>
				<li>
				   	Address:<br>
				   	<input type="text" name="address" class="form-control">
				</li>
				<li>
				   	PhoneNo:<br>
				   	<input type="text" name="phoneno" class="form-control">
				</li>
				<li>
				   	E-mail:<br>
				   	<input type="text" name="email" class="form-control">
				</li>
                                <li>
				   	password:<br>
				   	<input type="password" name="password" class="form-control">
				</li>
				<li>
				   	<br><input type="submit" value="Add Company" class="btn btn-success">
				</li>
			</ul>
          </form>
          <?php 
} ?>
	</div>
	<div class="col-md-9">
	   	<?php
$sql=mysql_query("SELECT * FROM owner");

?>
<div class="table-responsive">
	<table  class="table table-bordered table-hover table-striped" style="color: black;">
		<thead>
			<th>No</th>
			<th>CompanyId</th>
			<th>CompanyName</th>
			<th>Address</th>
			<th>PhoneNo</th>
			<th>E-mail</th>
			</thead>
			  <?php
				$i=1; 
				  while($row=@mysql_fetch_array($sql)){
					echo "<tr>
							<td>".$i."</td>
							<td>".$row['CompanyId']."</td>
							<td>".$row['CompanyName']."</td>
                                                        <td>".$row['address']."</td>
                                                        <td>".$row['phoneNo']."</td>
							<td>".$row['email']."</td>
							
							
							<td align='center'>
	<a href='companyRegister.php?epr=delete&id=".$row['CompanyId']."' title='are you shur you are trying to delete'>DELETE</a> |
	<a href='companyRegister.php?epr=update&id=".$row['CompanyId']."'>UPDATE</a>
							</td>
						  </tr>";
						$i++;
					}
				 ?>   
	</table>
</div>
<a style="color: blue" href="logout.php">Logout</a>
	</div></div>
</div>
<?php 
}else{
	echo "Please Login";
     }
?>
