<!DOCTYPE html>
<html>
<head>
  <title>inference</title>
  <style>
    .image-container {
      display: inline-block;
      position: relative;
    }
    .image-text {
      font-family: Tahoma, sans-serif;
      font-size: 13px;
      position: absolute;
      top: 0;
      left: 0;
      background-color: rgba(0,0,0,0.5);
      color: white;
      padding: 10px;
    }
  </style>
</head>
<body>
    
  
<?php

$file = 'image.json';
$json = file_get_contents($file);
$data = json_decode($json, true);

$temp_dir = './temp_imgs/';
mkdir($temp_dir);
array_map('unlink', glob($temp_dir.'/*')); //remove all files

$global_idx = 0;

foreach ($data as $category) {
  $categories = $category['categories'];
  $images = $category['images'];

  foreach ($images as $index => $image) {
    $decoded = base64_decode($image);
    
    $fileName = "$categories" . "_" . uniqid() . ".jpg";
    file_put_contents($temp_dir.$fileName, $decoded);

    $global_idx++;
    echo "<div class='image-container'>";
    echo "<img src='$temp_dir$fileName?rnd=$r'>";
    echo "<div class='image-text'>$categories ($global_idx)</div>";
    echo "</div>";
  }
}


?>

</body>
</html>
