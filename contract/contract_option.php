<div>
<?if($_GET['option']==1){?>
總累積人數達 100人 採95折<br>
總累積人數達 200人 採 9折<br>
總累積人數達 500人 採85折<br>
總累積人數達1000人 採 8折<br>
(直到合約終止)
<?}else if($_GET['option']==2){?>
總累積人數達 500人 採95折<br>
總累積人數達1000人 採 9折<br>
總累積人數達2000人 採85折<br>
總累積人數達5000人 採 8折<br>
(直到合約終止)
<?}else if($_GET['option']==3){?>
總累積人數達 1000人 採95折<br>
總累積人數達 2500人 採 9折<br>
總累積人數達 5000人 採85折<br>
總累積人數達10000人 採 8折<br>
(直到合約終止)
<?}else if($_GET['option']==4){?>
總累積人數達 2000人 採95折<br>
總累積人數達 4000人 採 9折<br>
總累積人數達10000人 採85折<br>
總累積人數達20000人 採 8折<br>
(直到合約終止)
<?}else if($_GET['option']==5){?>
當月人數達 50人 採95折<br>
當月人數達100人 採 9折<br>
當月人數達200人 採85折<br>
當月人數達400人 採 8折<br>
(每個月重新計算人數)
<?}else if($_GET['option']==6){?>
當季(三個月)人數達 100人 採95折<br>
當季(三個月)人數達 200人 採 9折<br>
當季(三個月)人數達 500人 採85折<br>
當季(三個月)人數達1000人 採 8折<br>
(每季(三個月)重新計算人數)
<?}else if($_GET['option']==7){?>
半年內人數達 250人 採95折<br>
半年內人數達 500人 採 9折<br>
半年內人數達1000人 採85折<br>
半年內人數達1500人 採 8折<br>
(每半年重新計算人數)
<?}else if($_GET['option']==8){?>
當年內人數達 500人 採95折<br>
當年內人數達1000人 採 9折<br>
當年內人數達2000人 採85折<br>
當年內人數達4000人 採 8折<br>
(每年重新計算人數)
<?}else if($_GET['option']==9){?>
	每 
	<input type="number" name="month" min="1" max="12" step="1" value="1">
	個月內累積人數增加
	<input type="number" name="amount" min="50" max="10000" step="50" value="100">人
	折扣下降
	<input type="number" name="amount" min="0" max="5" step="0.1" value="1">折
<?}else if($_GET['option']==10){?>

<?}else if($_GET['option']==11){?>

<?}?>

