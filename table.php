<?php
$sql=mysql_query("SELECT `plateNum`,`date`,`time`,`longitude`,`latitude`,`speed` FROM gpsdata");
$redirect=true;
?>
<div class="table-responsive">
	<table  class="table table-bordered table-hover table-striped" style="color: black;">
		<thead>
			<th>No</th>
			<th>PlateNo</th>
			<th>date</th>
			<th>time</th>
			<th>longitude</th>
			<th>latitude</th>
			<th>speed</th>
			</thead>
			  <?php
				$i=1; 
				  while($row=mysql_fetch_array($sql)){
						echo "<tr>
							<td>".$i."</td>
							<td>".$row['plateNum']."</td>
							<td>".$row['date']."</td>
							<td>".$row['time']."</td>
							<td>".$row['longitude']."</td>
							<td>".$row['latitude']."</td>
							<td>".$row['speed']."</td>
							<td align='center'>
	                                                <!--button>a href='drivers.php'</a>Show location</button-->
							</td>
							</tr>";
							 $i++;
					}
				 ?>   
	</table>
</div>
