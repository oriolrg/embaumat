
	   <div id="myCarousel" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">        			
	   <?php foreach ($tsArray as $data): ?>	
	   <li data-target="#myCarousel" data-slide-to="'<?php echo $data['id_banner'];?>'" class="active"></li>
	   </ol>
	   <div class="carousel-inner" role="listbox">
	   <?php if($data['id_banner']==1){ ?>
	   <div class="item active">	
	   <?php }else{?>
	   <div class="item">
	   <?php }?>
	   <img class="slide" src="<?php echo $data['imatge'];?>" alt="<?php echo $data['titol'];?>">
	   <div class="container">
       <div class="carousel-caption">
       <h1><?php echo $data['titol'] ?></h1>
       <p><?php echo $data['descripcio'] ?> </p>
       <p><a class="btn btn-lg btn-primary" href="<?php echo $data["link"] ?>" role="button">Consulta</a></p>
       </div>
       </div>
       </div>
       <?php endforeach; ?>
       </div>

	