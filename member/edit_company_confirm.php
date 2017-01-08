<?php
require_once "../sysconfig.php";
$company_id=$_POST['company_id'];
$c_name=$_POST['name'];
$c_phone=$_POST['phone'];
$c_address=$_POST['address'];
$c_url=$_POST['url'];
$data = new stdClass();


if(isset($_POST['company_id'])){
	//check repeat
	$sql = "SELECT * FROM `jangsc27_cs_project`.`company` where `name`=? and `phone`=? and `address`=? and `url`=?";
	$sth = $db->prepare($sql);
	$sth->execute(array($c_name,$c_phone,$c_address,$c_url));
	if(!$sth->fetchObject()){
		//edit company
		$sql = "UPDATE `jangsc27_cs_project`.`company` SET `name` = ?,`phone` = ?,`address` = ?, `url` = ? WHERE `company`.`id` =?";
		$sth = $db->prepare($sql);
		$sth->execute(array($c_name,$c_phone,$c_address,$c_url,$company_id));
	}
}
//edit image 
if($_FILES["files"]["name"]!=NULL){
	//add image 
	$target_dir = "uploads/company/";
	$target_file = $target_dir . basename($_FILES["files"]["name"]);
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
	if (file_exists($target_file)) {
		date_default_timezone_set("Asia/Taipei");
		$target_file=str_replace(".".$imageFileType,"-".date(ymdhis)."-".rand(0,9).".".$imageFileType,$target_file);
		$uploadOk = 1;
	}
	// Check file size
	if ($_FILES["files"]["size"] > 5000000) {
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
		//Delete old image
		$sql = "SELECT * FROM `jangsc27_cs_project`.`company_image` WHERE `company_id`=?";
		$sth = $db->prepare($sql);
		$sth->execute(array($company_id));
		if(!unlink('/net/cs/102/0216207/public_html/'.$sth->fetchObject()->image_url))
			$data->error="DELETE Failed";
		$sql = "DELETE FROM `jangsc27_cs_project`.`company_image` WHERE `company_id`=?";
		$sth = $db->prepare($sql);
		$sth->execute(array($company_id));
		//Add new image
		$size = getimagesize($_FILES['files']['tmp_name']);
		$size = $size[3];
		$name = $_FILES['files']['name'];
		$imgfp = $target_file;
		
		$sql = "INSERT INTO `jangsc27_cs_project`.`company_image` (company_id,image_url,image_size,image_name) VALUES(?,?,?,?)";
		$sth = $db->prepare($sql);
		
		$sth->bindParam(1, $company_id);
		$sth->bindParam(2, $imgfp);
		$sth->bindParam(3, $size);
		$sth->bindParam(4, $name);
		
		$sth->execute(array($company_id,$imgfp,$size,$name));
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$data->error=$data->error."Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["files"]["tmp_name"],$root_dir.$target_file)) {
			chmod($root_dir.$target_file,0755); 
			$data->message="The file ". basename( $_FILES["files"]["name"]). " has been uploaded.";
		} else {
			$data->error=$data->error."Sorry, there was an error uploading your file.";
		}
	}
}
//header('Location:index.php');
$data->p=$company_id;


echo json_encode($data);
?>