<?php
require_once "sysconfig.php";
?>

<html>
<head>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<script src="http://connect.facebook.net/zh_TW/all.js"></script>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<script src="api/fbapi.js"></script>
<script src="store/store.js"></script>
<script src="function/index.js"></script>
<script src="js/jquery.min.js"></script>
<script src="http://kendo.cdn.telerik.com/2016.2.714/js/kendo.all.min.js"></script>
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.common.min.css"/>
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.rtl.min.css"/>
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.silver.min.css"/>
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.default.min.css"/>
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.mobile.all.min.css"/>
 <style>
	.fieldlist {
		margin: 0 0 -2em;
		padding: 0;
	}

	.fieldlist li {
		list-style: none;
		padding-bottom: 2em;
	}

	.fieldlist label {
		display: block;
		padding-bottom: 1em;
		font-weight: bold;
		text-transform: uppercase;
		font-size: 12px;
		color: #444;
	}
	.mobileShow { display: none;}
   @media only screen
   and (min-device-width : 320px)
   and (max-device-width : 480px){ .mobileShow { display: inline;}}

</style>
</head>
<div id="login_form"  style="margin: 0px auto;font-size:60px;">
<ul class="fieldlist">
	<body onload="m_list(<?echo $_GET['store_id'];?>)">
		<h3 style = "text-align:left; margin-left: 10px; margin-bottom: auto; margin-top: auto;">Hi, <?echo $_SESSION['name'];echo $_SESSION['id'];?> </h3>
		<div id="list"></div>
		
	</body>


</ul>
</div>
</html>

