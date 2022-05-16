<?php  
			$image = ImageCreateTrueColor(270, 150);
imagesavealpha($image, true);
$trans_colour = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $trans_colour);
$x1 = $y1 = 0 ; 
$x2 = 270; $y2 = 150; 
$color = #4a235a; 
ImageLine($image, $x1, $y1, $x2, $y2, $color);
header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);
?>