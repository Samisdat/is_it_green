<?php

require_once('./RgbColor.php');

require_once('./SimilarColor.php');

$compareColor = new RgbColor([0,255,0]);
$compareTo    = new SimilarColor(
	$compareColor,
	200
);

$red   = range(0, 255, 17);
$green = range(0, 255, 17);
$blue  = range(0, 255, 17);

$colors = [];

foreach($red as $r){

	foreach($green as $g){

		foreach($blue as $b){
		
			$colors[] = new RgbColor([$r, $g, $b]);			

		}	
		
	}	
}

?>
<ul>
	<?php foreach($colors as $color):?>
		<li style="border-left:10px solid <?php echo $color;?>;">
			<div style="margin-left:10px;padding-left:10px;border-left: 10px solid <?php echo $compareColor;?>">
				<?php echo ($compareTo->is_it_similar($color) === true) ? 'similar' : 'different' ;?>
				<?php echo ceil($compareTo->distance($color));?>
			</div>
		</li>
	<?php endforeach;?>
</ul>