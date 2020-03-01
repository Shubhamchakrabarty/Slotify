<?php//This file is basically ditto copy of the index.php file, then visited index.php file, removed everything and initited the openPage function to basically open this Browse.php file?>

<?php //include("includes/header.php"); <-- this already included in includeFiles.php 
	  include("includes/includedFiles.php");

?>


<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">
	
	<?php

		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

		while($row = mysqli_fetch_array($albumQuery)) {
			echo "<div class = 'gridViewItem'>

				<span role= 'link' tabindex= '0' onclick='openPage(\"album.php?id=".$row['id']."\")'>

				<img src = '".$row['artworkPath']."'>

				<div class = 'gridViewInfo'>".$row['title']."

				</div>

				</span>

			</div>";
		}

	?>

</div>