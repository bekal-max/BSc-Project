       <?php 
         include 'coree/init.php';
         include 'head.php';
         include 'header.php';
         include 'headerr.php';
	$cmpname=$user_data['CompanyName'];
	$cmpID=$user_data['CompanyId'];
       ?>
	    <style> 
	        ul{ 
	        	padding:0;
	        	margin: 0 0 20px 0;
	        	list-style: none; }
	    </style>
	    <div  class="container" style="padding-top: 50px;">
	    	<?php if(logged_in() === true){?>
	    	         <div class="col-md-10">Company
                          
	   	<?php
//$sql=mysql_query("SELECT `CompanyId` FROM owner where `CompanyName`='$cmpname'");
//echo $sql;
$sqll=mysql_query("SELECT `fullname`,`plateNum` FROM driver where `CompanyId`='$cmpID'");

?>
<div class="table-responsive">
	<table  class="table table-bordered table-hover table-striped" style="color: black;">
		<thead>
			<th>No</th>
			<th>Driver Name</th>
			<th>Plate number</th>
			</thead>
			  <?php
				$i=1; 
				  while($row=@mysql_fetch_array($sqll)){
					echo "<tr>
							<td>".$i."</td>
							<td>".$row['fullname']."</td>
							<td>".$row['plateNum']."</td>
							<td><a href='map/index.php?platenumber=".$row['plateNum']."'>Show Location on Map </a></td>
						  </tr>";
						$i++;
					
					}
				 ?>   
	</table>
</div>	
	    	         </div>
			<div class="col-md-2">
<div>
		<h2 style="color: black"><?php echo $cmpname; ?></h2>
		<div >
			<ul>
				<li>
					<a style="color: blue" href="logout.php">Logout</a>
				</li>
				<li>
					<a style="color: blue" href="data/vehicles.php">Add Vehicles</a>
				</li>
				<li>
					<a style="color: blue" href="data/drivers.php">Add Drivers</a>
				</li>
<li>
					<a style="color: blue" href="map/index.php">Google Map</a>
				</li>
			</ul>
		</div>
</div>
				<?php
			   	//include 'aside.php?';
			   	}?>
			</div>
		   	
	    </div>
	   <?php include 'footer.php';?>
