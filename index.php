<!DOCTYPE html>
<html lang="en">
    <!-- head -->
	<head>
		<!-- Required meta tags --> 
		<?php include("includes/head.php"); ?> 
	</head>
    <!-- head -->

	<!-- konten -->
		<?php 
		//pemanggilan konten halaman index
			if(isset($_GET["halaman"])){
				$halaman = $_GET["halaman"];
				if($halaman=="beranda"){			
			?>
    <!-- body -->
	<body data-spy="scroll" data-target=".navbar" data-offset="50">

        <!-- sidebar -->
		<nav class="navbar navbar-expand-lg fixed-top">
            <?php include("includes/sidebar.php"); ?> 
		</nav>
        <!-- sidebar -->
				<?php
				include("halaman/beranda.php");
			}else if($halaman=="masuk"){    
				include("halaman/login.php");
			}else if($halaman=="daftar"){    
				include("halaman/signin.php");
			}else if($halaman=="blog"){    
				include("halaman/blog.php");
			}else{
				include("halaman/beranda.php");
			}
		}else{
		include("halaman/beranda.php");
		}?>

		<!-- konten -->
		<footer class="footer">
            <?php include("includes/footer.php"); ?>
		</footer>
        
            <?php include("includes/script.php"); ?>
        
		
	</body>
    <!-- body -->
</html>