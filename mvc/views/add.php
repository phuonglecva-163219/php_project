<?php 
 function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}



$target_dir = "/var/www/html/public/images/";
$file = random_string(40);
$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir.$file .'.'. $imageFileType);

$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];
$image = $file .'.'. $imageFileType;

if ($status == 'Enable') {
    $status = 1;
}else {
    $status = 0;
}

$url = $title ."/". $status."/".  $description."/". $image; 
// echo $url;
header("Location: http://localhost/public/admin/add/" . $url);
die();


?>