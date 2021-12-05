<!DOCTYPE html>
<html lang="en">
    <!-- head -->
	<head>
		<!-- Required meta tags --> 
		<?php include("includes/head.php"); ?> 
	</head>
    <!-- head -->


    <!-- body -->
	<body data-spy="scroll" data-target=".navbar" data-offset="50">

        <!-- sidebar -->
		<nav class="navbar navbar-expand-lg fixed-top">
            <?php include("includes/sidebar.php"); ?> 
		</nav>
        <!-- sidebar -->

		<!-- konten -->
		<?php 
			//pemanggilan konten halaman index
			if(isset($_GET["halaman"])){
				$halaman = $_GET["halaman"];
				if($halaman=="detail-buku"){
					include("halaman/detailbuku.php");
				}else if($halaman=="detail-blog"){    
					include("halaman/detailblog.php");
				}else if($halaman=="about-us"){    
					include("halaman/aboutus.php");
				}else if($halaman=="blog"){    
					include("halaman/blog.php");
				}else{
					include("halaman/beranda.php");
				}
			}else{
			include("halaman/beranda.php");
			}
			?>
			<?php include("halaman/beranda.php"); ?>
		<!-- konten -->
		<footer class="footer">
            <?php include("includes/footer.php"); ?>
		</footer>
        
            <?php include("includes/script.php"); ?>
        
		
	</body>
    <!-- body -->
</html>