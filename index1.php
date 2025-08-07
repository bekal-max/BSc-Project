       <?php 
         include 'coree/init.php';
         include 'head.php';
         include 'header.php';
         include 'headerr.php';
       ?>
	    <style> 
	        ul{ 
	        	padding:0;
	        	margin: 0 0 20px 0;
	        	list-style: none; }
	    </style>
	    <div  class="container" style="padding-top: 50px;">
	    	<?php if(logged_in() === true){?>
	    	         <div class="col-md-10">
                          <?php 
	    	            //include 'table.php';
                            //insert form  
                            include 'login1.php';
                          ?>	
	    	         </div>
	    	         <?PHP
	    	      }else {?>
	    	         <div class="col-md-10">welcome to vehicle Tracking website</div>
	    	         <?php  ?>
	    	<div class="col-md-2">
		   	<?php
		   	include 'form0.php';
		   	}?>
			<a href='index.php'>Admin Login</a>
		   	</div>
	    </div>
	   <?php include 'footer.php';?>
