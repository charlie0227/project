<?
require_once "../sysconfig.php";

$sql = "SELECT * FROM `jangsc27_cs_project`.`store` ";
if($_GET['word']){
	$sql=$sql."WHERE ";
	if($_GET['q']=="name")
		$sql=$sql."`name` LIKE '%".$_GET['word']."%'";
	if($_GET['q']=="phone")
		$sql=$sql."`phone` LIKE '%".$_GET['word']."%'";
	if($_GET['q']=="address")
		$sql=$sql."`address` LIKE '%".$_GET['word']."%'";
}
$sth = $db->prepare($sql);
$sth->execute();
echo '<table class = "bordered">
		<thead>
			<tr>
			<th style = "width: 200px;">NAME</th>
			<th style = "width: 200px;">PHONE</th>
			<th style = "width: 500px;">ADDRESS</th>
			</tr>
		</thead>
		</table>
		
		<div id = "list"><table class="bordered">
		<tbody>
		';?>
<?while($result = $sth->fetchObject()){?>
	<tr onclick="view_store(<?echo $result->id?>,'store_map')"><td style = "width: 200px;"><?echo $result->name?></td><td style = "width: 200px;"><?echo $result->phone?></td><td style = "width: 500px;"><?echo $result->address?></td></tr>
<?}?> 
	</tbody>
</table></div>