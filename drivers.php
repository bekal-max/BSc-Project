
<style> 
                body{
                  background:color                         
}
	        ul{ 
	        	padding:0;
	        	margin: 0 0 20px 0;
	        	list-style: none; }
</style>
<?php
include '../coree/init.php';
  include '../head.php';
 if(logged_in() === true){ 
?>
  <link href="../css/bootstrap.css" rel="stylesheet">
  
<?php
  include '../header.php';
  include '../headerr.php';
  mysql_connect('localhost','root','');
  mysql_select_db('datastore');

 	$epr='';
	if(isset($_GET['epr'])) 
		$epr=$_GET['epr'];
  if($epr == 'add'){if (isset($_POST['driverId'])&&isset($_POST['fullname']) &&isset($_POST['sex'])&&isset($_POST['address'])&&isset($_POST['phoneNo'])) {
		$errors = array();
		
		$driverId = $_POST['driverId'];
		$fullname = $_POST['fullname'];
		//$location = $_POST['location'];
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$phoneNo = $_POST['phoneNo'];
                $platenumber = $_POST['platenum'];
                $companyid = $_POST['companyid']; 
		
function file_already_exists($driverId){
		$driverId = sanitize($driverId);
		$querya = mysql_query("SELECT count(`driverId`) from `driver` where `driverId` = '$driverId'");
		return (mysql_result($querya, 0) == 1) ? true : false;

	}                   
                      $query = mysql_query("SELECT count(`plateNum`) from `vehicles` where `plateNum` = '$platenumber'");

				if ((mysql_result($query, 0) == 1) ? true : false){
                                    
				}else{
					$errors[] = 'Wrong plate number';
				}       
$quer = mysql_query("SELECT count(`CompanyId`) from `owner` where `CompanyId` = '$companyid'");

				if ((mysql_result($quer, 0) == 1) ? true : false){
                                    
				}else{
					$errors[] = 'Wrong CompanyID';
				}
/*
				if (file_already_exists($driverId) === true) {
					$errors[] = 'Existing DriverId';
				}
				if (empty($driverId) === true or empty($fullname) === true  or empty($sex) === true){
					$errors[] ='Fill all spaces';
				}


		if (empty($errors)){
	$sqlquary=mysql_query("INSERT INTO driver values('$driverId','$fullname','$sex','$address','$phoneNo','$platenumber','$companyid')");
		
		if ($sqlquary) {
			header("location:drivers.php");
		   $success = "File successfully Added";
		   echo $success;
		}else{echo "errrrrror";}
	 
  }
 }
}
if($epr=='delete'){
		$id=$_GET['id'];
		$delete=mysql_query("DELETE from driver where `driverId`='$id'");
		if($delete){
            header("location:drivers.php");
		}else{
			echo "error";
		}
	}
	if ($epr == 'saveup') {if (isset($_POST['driverId'])&&isset($_POST['fullname']) &&isset($_POST['sex'])&&isset($_POST['address'])&&isset($_POST['phoneNo'])) {
		$errors = array();
		
		$driverId = $_POST['driverId'];
		$fullname = $_POST['fullname'];
		//$location = $_POST['location'];
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$phoneNo = $_POST['phoneNo']; 
                $platenumber = $_POST['platenum'];
                $companyid = $_POST['companyid'];

				if (empty($driverId) === true or empty($fullname) === true  or empty($sex) === true){
					$errors[] ='Fill all spaces';
				}
		$update=mysql_query("UPDATE driver set  `driverId`='$driverId',`fullname`='$fullname',`sex`='$sex',`adderss`='$address', `phoneNo`='$phoneNo',`plateNum`='$platenumber',`CompanyId`='$companyid' where `driverId`='$driverId'");
				   if ($update) {
					$successs = "File successfully updated";
					
					header("Location:drivers.php");

				   }
	}}
?>

<div  class="container" style="padding-top: 50px;">
	<div class="row">
	<div class="col-md-3">
		<?php
						if($epr=='update'){
						  $id=$_GET['id'];
						  $row=mysql_query("SELECT * FROM driver where `driverId`= '$id'");
						  $st_row=mysql_fetch_array($row);
					?>	 
				<h2 style="color: black;">Update</h2>
		<form method="Post" action="drivers.php?epr=saveup" enctype="multipart/form-data">
	<ul>
		<li>
			DriverId:<br>
			<input type="text" name="driverId" class="form-control" value="<?php echo $st_row['driverId']?>">
		</li>
		<li>
			Full Name:<br>
			<input type="text" name="fullname" class="form-control" value="<?php echo $st_row['fullname']?>">
				</li>
				<li>
				   	Sex:<br>
				   	<input type="text" name="sex" class="form-control" value="<?php echo $st_row['sex']?>">
				</li>
				<li>
				   	Address:<br>
				   	<input type="text" name="address" class="form-control" value="<?php echo $st_row['address']?>">
				</li>
				<li>
				   	PhoneNo:<br>
				   	<input type="text" name="phoneNo" class="form-control" value="<?php echo $st_row['phoneNo']?>">
				</li><li>
				   	Plate num:<br>
				   	<input type="text" name="phoneNo" class="form-control" value="<?php echo $st_row['plateNum']?>">
				</li><li>
				   	CompanyId:<br>
				   	<input type="text" name="phoneNo" class="form-control" value="<?php echo $st_row['CompanyId']?>">
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
	   	  <form action="drivers.php?epr=add" method="POST" >
			<ul>
				<li>
				   	DriverId:<br>
				   	<input type="text" name="driverId" class="form-control">
				</li>
				<li>
				   	Full Name:<br>
				   	<input type="text" name="fullname" class="form-control">
				</li>
				<li>
				   	Sex:<br>
				   	<input type="text" name="sex" class="form-control">
				</li>
				<li>
				   	Address:<br>
				   	<input type="text" name="address" class="form-control">
				</li>
				<li>
				   	PhoneNo:<br>
				   	<input type="text" name="phoneNo" class="form-control">
				</li>
				<li>
				   	plate num:<br>
				   	<input type="text" name="platenum" class="form-control">
				</li>
				<li>
				   	CompanyId:<br>
				   	<input type="text" name="companyid" class="form-control">
				</li>
				<li>
				   	<br><input type="submit" value="Add Driver" class="btn btn-success">
				</li>
			</ul>
          </form>
          <?php 
} ?>
	</div>
	<div class="col-md-9">
	   	<?php
$sql=mysql_query("SELECT * FROM driver");

?>
<div class="table-responsive">
	<table  class="table table-bordered table-hover table-striped" style="color: black;">
		<thead>
			<th>No</th>
			<th>Driver Id</th>
			<th>Full name</th>
			<th>Sex</th>
			<th>Address</th>
			<th>PhoneNo</th>
			<th>Plate Number</th>
			<th>CompanyId</th>
			</thead>
			  <?php
				$i=1; 
				  while($row=@mysql_fetch_array($sql)){
					echo "<tr>
							<td>".$i."</td>
							<td>".$row['driverId']."</td>
							<td>".$row['fullname']."</td>
							<td>".$row['sex']."</td>
							<td>".$row['address']."</td>
							<td>".$row['phoneNo']."</td>
							<td>".$row['plateNum']."</td>
							<td>".$row['CompanyId']."</td>
							<td align='center'>
									  <a href='drivers.php?epr=delete&id=".$row['driverId']."' title='are you shur you are trying to delete'>DELETE</a> |
									  <a href='drivers.php?epr=update&id=".$row['driverId']."'>UPDATE</a>
							</td>
						  </tr>";
						$i++;
					}
				 ?>   
	</table>
</div>
<a style="color: blue" href="../logout.php">Logout</a>
	</div></div>
</div>
<?php 
}else{
	echo "Please Login";
     }
?>
