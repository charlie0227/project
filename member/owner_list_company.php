<?
require_once "../sysconfig.php";

$sql = "SELECT * FROM `jangsc27_cs_project`.`company` a JOIN `jangsc27_cs_project`.`member_company` b ON a.`id` = b.`company_id` AND b.`member_id` = ?";
$sth = $db->prepare($sql);
$sth->execute(array($_SESSION['id']));
echo '<table><th style="font-size:25px;">Your company</th>';
while($result=$sth->fetchObject()){?>
	<tr><td style="width: 200px"><?echo $result->name?></td>
	<td><input class="member_option" style="width: auto; background: #E78F8E;"type="button" value="管理" onclick="show_own_company_content(<?echo $result->company_id?>)"></td>
	</tr>
<?}
echo '</table>';	
?>