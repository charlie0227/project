<?php
require_once "../sysconfig.php";
$s_name=$_POST['name'];
$s_phone=$_POST['phone'];
$s_address=$_POST['address'];
$s_url=isset($_POST['url'])?$_POST['url']:"";
$data = new stdClass();
$location = '{"lat":25.0469826,"lng":121.51635190000002}';
$place_id = '6c8fd95d655eda7ce03a983139d66868fb8fd375';
function find_store_id($db,$name,$phone,$address,$url){
	$sql = "SELECT * FROM `jangsc27_cs_project`.`store` where `name`=? and `phone`=? and `address`=? and `url`=?";
	$sth = $db->prepare($sql);
	$sth->execute(array($name,$phone,$address,$url));
	return $sth->fetchObject()->id;
}
if($s_name){
	//create new store
	$sql = "INSERT INTO `jangsc27_cs_project`.`store` (name,phone,address,url,location,place_id) VALUES(?,?,?,?,?,?)";
	$sth = $db->prepare($sql);
	$sth->execute(array($s_name,$s_phone,$s_address,$s_url,$location,$place_id));
}
$store_id=find_store_id($db,$s_name,$s_phone,$s_address,$s_url);
$Iname = implode(' ', $_FILES["files"]["name"]);
if($Iname!=NULL){

	$Isize = implode(' ', $_FILES["files"]["size"]);
	$Itmp_name = implode(' ', $_FILES["files"]["tmp_name"]);
	//add image 
	$target_dir = "uploads/store/";
	$target_file = $target_dir . basename($Iname);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["files"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$data->error="File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($root_dir.$target_file)) {
		date_default_timezone_set("Asia/Taipei");
		$target_file=str_replace(".".$imageFileType,"-".date(ymdhis)."-".rand(0,9).".".$imageFileType,$target_file);
		$uploadOk = 1;
	}
	// Check file size
	if ($Isize > 5000000) {
		$data->error=$data->error."Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	$imageFileType = strtolower($imageFileType);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$data->error=$data->error."Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	//url to DB
	if($uploadOk==1){
		$size = getimagesize($Itmp_name);
		$size = $size[3];
		$name = $Iname;
		$imgfp = $target_file;
		
		
		$sql = "INSERT INTO `jangsc27_cs_project`.`store_image` (store_id,image_url,image_size,image_name) VALUES(?,?,?,?)";
		$sth = $db->prepare($sql);
		
		$sth->bindParam(1, $store_id);
		$sth->bindParam(2, $imgfp);
		$sth->bindParam(3, $size);
		$sth->bindParam(4, $name);
		
		$sth->execute(array($store_id,$imgfp,$size,$name));

	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$data->error=$data->error."Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($Itmp_name,$root_dir.$target_file)) {
			chmod($root_dir.$target_file,0755); 
			$data->message="The file ". basename($Iname). " has been uploaded.";
		} else {
			$data->error=$data->error."Sorry, there was an error uploading your file.";
		}
	}
}
$data->p=$store_id;

echo json_encode($data);
//header('Location:index.php');

?>