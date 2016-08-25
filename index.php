<?php
require_once "sysconfig.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta charset="utf-8" />
		<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
				
		<script src="js/jquery-3.1.0.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
		<script   src="http://code.jquery.com/ui/1.12.0/jquery-ui.js"   integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
		<script src="js/jquery.reveal.js"></script>
		<script src="js/jquery-an-showbox.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiauOm3OUKekSdpdCA9fRhZQUKArBSBoI"async defer></script>
		<script src="http://connect.facebook.net/zh_TW/all.js"></script>
		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
		<script src="api/fbapi.js"></script>
		<script src="store/store.js"></script>
		<script src="company/company.js"></script>
		<script src="member/member.js"></script>
		<script src="contract/contract.js"></script>
		<script src="function/index.js"></script>
		<script async src="api/googleAPI.js"></script>
		<!--contract UI-->
		
		<script src="js/jquery.min.js"></script>
		<script src="http://kendo.cdn.telerik.com/2016.2.714/js/kendo.all.min.js"></script>
		<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.common.min.css"/>
		<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.rtl.min.css"/>
		<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.silver.min.css"/>
		<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.default.min.css"/>
		<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2016.2.714/styles/kendo.mobile.all.min.css"/>
		<!---test-->
		<!---->
		
		<script src="http://malsup.github.com/jquery.form.js"></script>
		
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/reveal.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery-an-showbox.css" rel="stylesheet" type="text/css" />
		<link href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css" rel="stylesheet" >
		
		
		<style>
/* Material Theme padding adjustment*/
                
                

                #search_bar-list .k-item > span {
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    display: inline-block;
                    vertical-align: top;
                    margin: 20px 10px 10px 5px;
                }

                #search_bar-list .k-item > span:first-child {
                    -moz-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
                    -webkit-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
                    box-shadow: inset 0 0 30px rgba(0,0,0,.3);
                    margin: 10px;
                    width: 90px;
                    height: 90px;
                    border-radius: 50%;
                    background-size: 100%;
                    background-repeat: no-repeat;
                }

</style>

	</head>
	<body>  
		<!--<div style = "width:600px; margin:0 auto; font-size:13px;" id="sitebody">-->
		<div style="text-align:center;">
		<ul class="header">
			<li class="menu_bar"><a href="#" style=" font-weight: bold;">Home</a></li>
			
			<li class="menu_bar">
			<div class="dropdown" id="dropdown">
			<a href="#" id="dropbtn"><div class="title">Notice</div></a>
				
				  <div class="dropdown-content" id="dropdown-content">
					<p>YOLO</p>
				  </div>
				</div>
			</li>
			
			<li class="menu_bar_search" ><input id="search_bar" style="width:100%;"type="text" name="search_bar" placeholder="Search for store and company"></li>
			<li></li>
			<li><?if($_SESSION['name']){?>
			<a onclick="fblogout();location.href='./function/logout.php';" ><div class="title">logout</div></a>
			<?}else{?>
			<a href="#" class="big-link" data-reveal-id="show_box"><div class="title" onclick="login()">login</div></a>
			
			<?}?>
			</li>
		</ul>
		</div>
		

　		<div style = "text-align:center;">
			<div>
				<div id="sidebar">
					<!--<input class = "abutton" style = "width:90%; margin-bottom: 5px;" type="button" value="test" onclick="fblogin()">-->
					<!--login status-->
					<?if($_SESSION['name']){?>
						<h3 style = "text-align:left; margin-left: 10px; margin-bottom: auto; margin-top: auto;">Hi, <?echo $_SESSION['name']?> </h3>
						<input class = "k-button" style = "width: 90%; margin-bottom: 10px;" type="button" value="logout" onclick="fblogout();location.href='./function/logout.php';">
					<?}else{?>
						<h3 style = "text-align:left; margin-left: 10px; margin-bottom: auto; margin-top: auto;">Login</h3>
						<input style = "margin-bottom: 5px;" class="k-textbox" id="username" type="text" name="username" placeholder="Account">
						<input style = "margin-bottom: 5px;" class="k-textbox" id="password" type="password" name="password" placeholder="Password">
						<input class = "k-button" style = "width:90%; margin-bottom: 5px;" type="button" value="login" onclick="check_login()">
						<input class = "k-button" style = "width:90%; margin-bottom: 5px;" type="button" value="register" onclick="go_register()">
						<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
					<?}?>
					
					<input type="button" class = "sidebar" style="border-top:2px solid white;" id = "show_news" onclick="news()" value="News">
					<input type="button" class = "sidebar" id = "show_member" onclick="member()" value="Member">
					<input type="button" class = "sidebar" id = "show_store" onclick="store_list()" value="Store">
					<input type="button" class = "sidebar" id = "show_company" onclick="company_list()" value="Company">
					
					
				</div>
			</div>
			<div>
				<a href="#" class="close_left" id="close_side" onclick="min_sidebar()"></a>
			</div>
			<div id="content" ></div>
			
		</div>
		<div style='clear:both;'></div>		
　		<!--<div id="footer">footer</div>-->
		<div id="show_box" class="reveal-modal"><a class="close-reveal-modal"></a></div>
	</body>
</html>
