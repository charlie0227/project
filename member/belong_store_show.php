<?php
require_once "../sysconfig.php";
$sql = "SELECT * FROM `jangsc27_cs_project`.`store` WHERE `id`= ?";
$sth = $db->prepare($sql);
$sth->execute(array($_GET['store_id']));
$result = $sth->fetchObject();

$sql = "SELECT * FROM `jangsc27_cs_project`.`company` a JOIN `jangsc27_cs_project`.`contract` b ON a.`store_id` = b.`store_id` AND b.`store_id` = ?";
$sth1 = $db->prepare($sql);
$sth1->execute(array($_GET['store_id']));

$sql = "SELECT * FROM `jangsc27_cs_project`.`image` WHERE `store_id`= ?";
$sth2 = $db->prepare($sql);
$sth2->execute(array($_GET['store_id']));
$result_img = $sth2->fetchObject();

?>	
<html>
<script>
</script>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<script src="jquery-1.12.4.min.js"></script>
	<script src="jquery-tablepage-1.0.js"></script>
		<?php
		if($result) 
		{?>
			<p>店名 <?echo $result->name?></p>
			<?if($result_img){?>
			<a href="http://people.cs.nctu.edu.tw/~cwchen05030530/<?echo $result_img->image?>"><img src="<?echo $result_img->image?>" style="width: 30%;height: 30%;"/></a>
			<?}?>
			<p>電話 <?echo $result->phone?></p>
			<p>地址 <?echo $result->address?></p>
			<p>優惠內容 </p>
		<?}?>

</html>
