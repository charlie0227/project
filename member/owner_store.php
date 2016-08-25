<?php
require_once "../sysconfig.php";
$sql = "SELECT * FROM `jangsc27_cs_project`.`store` WHERE `id`= ?";
$sth = $db->prepare($sql);
$sth->execute(array($_GET['store_id']));
$result = $sth->fetchObject();

$sql = "SELECT * FROM `jangsc27_cs_project`.`company` a JOIN `jangsc27_cs_project`.`contract` b ON a.`id` = b.`company_id` AND b.`store_id` = ?";
$sth1 = $db->prepare($sql);
$sth1->execute(array($_GET['store_id']));

$sql = "SELECT * FROM `jangsc27_cs_project`.`store_image` WHERE `store_id`= ?";
$sth2 = $db->prepare($sql);
$sth2->execute(array($_GET['store_id']));
$result_img = $sth2->fetchObject();

?>	
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<style>

</style>
	</head>	
		<?php
		if($result) 
		{?>
			<p>店名 <?echo $result->name?></p>
			<?if($result_img){?>
			<img id="store_img" onclick=" var newwin = window.open();newwin.location='http://people.cs.nctu.edu.tw/~cwchen05030530/<?echo $result_img->image_url?>';" src="<?echo $result_img->image_url?>"/>
			<?}?>
			<p>電話 <?echo $result->phone?></p>
			<p>地址 <?echo $result->address?></p>
			<div id="owner_map" ></div>
			<p>網站 <?echo $result->url?></p>
			<p>合作企業 <?
				while($result_company = $sth1->fetchObject()){
					echo $result_company->name.'</p><p>';
				}?>
			</p>
		<?}?>
	<input type="button" class="abutton" style="width:auto;" value="edit" onclick="owner_store_edit(<?echo $_GET['store_id']?>)">
	<input type="button" class="abutton" style="width:auto;" value="分析" onclick="show_own_store_analysis(<?echo $_GET['store_id']?>)">
	<input type="button" class="abutton" style="width:auto;" value="返回" onclick="my_store_company_list()">

</html>
