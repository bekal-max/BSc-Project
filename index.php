       <?php 
         include 'core/init.php';
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
	    	         <div class="col-md-10">Registering Company
                          <?php 
	    	            //include 'table.php';
                            header("Location:companyRegister.php");
                            //insert form  
                            //include 'companyRegister.php';
                          ?>	
	    	         </div>
	    	         <?PHP
	    	      }else {?>
	    	         <div class="col-md-10">GSM/GPS Based vehicle Tracking System</div>
	    	<div class="col-md-2">
                    <a href='index1.php'>Company Login</a>
		   	<?php
		   	include 'aside.php';
		   	}?>
			
		   	</div>
	    </div>
	   <?php include 'footer.php';?>
