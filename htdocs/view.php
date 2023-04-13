<html>
<body>

<h1>Animals page</h1>

</body>
</html>


	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1.0"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>My First Pet</title>
	<style>
		body{background-color: coral; color: #333;}
		.main{box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; margin-top: 10px;}
		h3{background-color: SlateBlue; color: black; padding: 15px; border-radius: 4px; box-shadow: 0 1px 6px rgba(57,73,76,0.35);}
		.img-box{margin-top: 10px;}
		.img-block{float: left; margin-right: 5px; text-align: center;}
		p{margin-top: 0;}
		img{width: 375px; min-height: 250px; margin-bottom: 10px; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important; border:6px solid #f7f7f7;}
	</style>
	</head>

	<body>
		<!-------------------Main Content------------------------------>
		<div class="container main">
	<h3>Showing List of Animals</h3>
			<div class="img-box">

			</div>
		</div>
	</body>
	</html>
	
<?php 
// Include the database configuration file  
require_once 'database.php'; 
 
// Get image data from database 
$result = $db->query("SELECT
	animals.name, animals_img.img, animals_info.description, animals_info.AdoptionCenter
FROM animals
LEFT JOIN animals_img
ON animals.id = animals_img.animals_id
LEFT JOIN animals_info
ON animals.id = animals_info.animals_id"); 
?> 


<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
		<div>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['img']); ?>" />
		<div>
		<h5>
		<?php 
		echo $row['name'];
		?>
		</h5>
		<p>
		<?php
		echo $row['description'];
		?>
		</p>
		<p>
		<?php
		echo $row['AdoptionCenter'];
		?>
		</p>
	</div>
  </div>

		<?php } ?> 	
    </div> 
<?php }else{ ?> 

    <p class="status error">Image(s) not found...</p> 
<?php } ?>