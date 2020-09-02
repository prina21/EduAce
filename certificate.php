<?php 
session_start();

header('Content-type: image/jpeg');
$font1 = realpath('alata.ttf');
$image=imagecreatefromjpeg("format.jpg");
$color=imagecolorallocate($image, 51, 51, 51);

// Get image Width and Height
$image_width = imagesx($image);  
$image_height = imagesy($image);

// $date=date('d F, Y');
// imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$name=$_SESSION['name'];
$cid = "CID: {$_SESSION['CID']}";
$stmt = "has completed the course and passed the exam"."\r\n   under the vigiliance of Utkarshini Edutech in";
$bookname = $_SESSION['bookname'];
$text_box = imagettfbbox(55,0,$font1,$name);

// Get your Text Width and Height
$text_width = $text_box[2]-$text_box[0];
$text_height = $text_box[7]-$text_box[1];

// Calculate coordinates of the text
$x = ($image_width/2) - ($text_width/2);
$y = ($image_height/2) - ($text_height/2) + 120;


$text_box1 = imagettfbbox(22,0,$font1,$stmt);

// Get your Text Width and Height
$text_width1 = $text_box1[2]-$text_box1[0];
$text_height1 = $text_box1[7]-$text_box1[1];

// Calculate coordinates of the text
$x1 = ($image_width/2) - ($text_width1/2);
$y1 = ($image_height/2) - ($text_height1/2) + 170 ;


$text_box2 = imagettfbbox(35,0,$font1,$bookname);

// Get your Text Width and Height
$text_width2 = $text_box2[2]-$text_box2[0];
$text_height2 = $text_box2[7]-$text_box2[1];

// Calculate coordinates of the text
$x2 = ($image_width/2) - ($text_width2/2);
$y2 = ($image_height/2) - ($text_height2/2) + 300 ;


imagettftext($image, 55, 0, $x, $y, $color,$font1, $name);
imagettftext($image, 22, 0, $x1, $y1, $color,$font1, $stmt);
imagettftext($image, 35, 0, $x2, $y2, $color,$font1, $bookname);
imagettftext($image, 18, 0, 860, 1260, $color,$font1, $cid);
imagejpeg($image);
// imagejpeg($image,'certificate/'.$name.'.jpg');
// imagedestroy($image);
?>
