<?
require_once "../sysconfig.php";

$sql = "SELECT * FROM `jangsc27_cs_project`.`company` ";
if($_GET['word']){
	$sql=$sql."WHERE `name` LIKE '%".$_GET['word']."%'";
}
$sth = $db->prepare($sql);
$sth->execute();
echo '<div id = "list"><table class="bordered">
		<tbody>';
if(!$sth->fetchObject()){
	echo '<tr><td>No match result</td></tr>';
	echo '<tr><td><input type="button" onclick="add_new_company()" value="前往新增"></td></tr>';
}
$sth = $db->prepare($sql);
$sth->execute();
while($result = $sth->fetchObject()){?>
	<tr><td onclick="owner_show_company(<?echo $result->id?>)"><a href="#" class="big-link" data-reveal-id="show_box" style="width:200px; text-decoration: none; display: block;"><?echo $result->name?></a></td></tr>
<?}?> 
	</tbody>
</table></div>