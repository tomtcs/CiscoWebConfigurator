<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Cisco 6500 Administration</title>
<style type="text/css">
body, div, h1, h1, h3, h4, h5, h6, p, ul, ol, li, dl, dt, dd, img, form, fieldset, input, textarea, blockquote {
	margin: 0; padding: 0; border: 0;
}

body {
	background: #4b5f67;
	font-family: Helvetica, sans-serif; 
	font-size: 16px; 
	line-height: 18px;
	color: #000000;
	min-height: 100%;
	height: 100%;
}

.container{
	width: 1000px;
	margin: 0 auto;
}

nav {
	margin: 20px auto; 
	text-align: center;
}

nav ul ul {
	display: none;
}

nav ul li:hover > ul {
	display: block;
}


nav ul {
	background: #efefef; 
	background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);  
	background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); 
	background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%); 
	box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
	padding: 0 20px;
	border-radius: 10px;  
	list-style: none;
	position: relative;
	display: inline-table;
}

nav ul:after {
	content: ""; clear: both; display: block;
}

nav ul li {
	float: left;
	width: 150px;
}

nav ul li:hover {
	background: #4b5f67;
	background: linear-gradient(top, #4b5f67 0%, #5f6975 40%);
	background: -moz-linear-gradient(top, #4b5f67 0%, #5f6975 40%);
	background: -webkit-linear-gradient(top, #4b5f67 0%,#5f6975 40%);
}

nav ul li:hover a {
	color: #fff;
}
		
nav ul li a {
	display: block;
	padding: 10px 20px;
	color: #000000; 
	text-decoration: none;
}
			
nav ul ul {
	background: #5f6975; 
	border-radius: 0px; 
	padding: 0;
	position: absolute; 
	top: 100%;
}

nav ul ul li {
	float: none; 
	border-top: 1px solid #6b727c;
	border-bottom: 1px solid #575f6a; position: relative;
}

nav ul ul li a {
	padding: 5px 10px;
	color: #fff;
}	

nav ul ul li a:hover {
	background: #4b5f67;
}

nav ul ul ul {
	position: absolute; left: 100%; top:0;
	}

#content {
	width: 800px;
	background: #FFFFFF;
	border: 2px solid #000000;
	margin: 10px auto;
	padding: 10px;
	font-size: 12px;
	overflow: auto;
	height: 620px;
	text-align: center;
}

#footercontainer{
	position: fixed;
	bottom: 20px;
	margin: 10px auto;
	width: 100%;
	padding-top: 20px
}

#footer{
	border: 2px solid #000000;
	margin: 0 auto;
	padding: 20px;
	background: #efefef; 
	background: linear-gradient(top, #efefef 0%, #bbbbbb 100%);  
	background: -moz-linear-gradient(top, #efefef 0%, #bbbbbb 100%); 
	background: -webkit-linear-gradient(top, #efefef 0%,#bbbbbb 100%); 
	box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
	padding: 0 20px;
	border-radius: 10px;
	min-height: 50px; 
	width: 600px;
	color: #000000;
}
</style>
</head>

<body>
<div class="container">
<div style="width: 100%; min-height:80px; margin-top: 20px;">
<div style="margin-left: 100px; float: left;">
<a style="border: 0px;" href="index.php"><img src="logo.png" alt="" /></a>
</div>
<div style="margin-left: 100px; float: right;">
<a style="border: 0px;" href="index.php"><img src="CatalystLogo.png" alt="" /></a>
</div>
</div>
<nav>
	<ul>
		<li><a href="#">Interface Configuration</a>
			<ul>
				<li><a href="#">VLAN Management</a>
					<ul>
						<li><a href="index.php">Add Menu Heading</a></li>
						<li><a href="index.php">Modify Menu Heading</a></li>
						<li><a href="index.php">Delete Menu Heading</a></li>
					</ul>

				</li>
				<li><a href="#">Port Management</a>
					<ul>
						<li><a href="index.php">Add Menu Item</a></li>
						<li><a href="index.php">Modify Menu Item</a></li>
						<li><a href="index.php">Delete Menu Item</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="#">Route Configuration</a>
			<ul>
				<li><a href="#">Static Routes</a>
					<ul>
						<li><a href="index.php">Add Menu Heading</a></li>
						<li><a href="index.php">Modify Menu Heading</a></li>
						<li><a href="index.php">Delete Menu Heading</a></li>
					</ul>

				</li>
				<li><a href="#">EIGRP</a>
					<ul>
						<li><a href="index.php">Add Menu Item</a></li>
						<li><a href="index.php">Modify Menu Item</a></li>
						<li><a href="index.php">Delete Menu Item</a></li>
					</ul>
				</li>
				<li><a href="#">OSPF</a>
					<ul>
						<li><a href="index.php">Add Menu Item</a></li>
						<li><a href="index.php">Modify Menu Item</a></li>
						<li><a href="index.php">Delete Menu Item</a></li>
					</ul>
				</li>

			</ul>
		</li>

		<li><a href="#">Global Configuration</a>
			<ul>
				<li><a href="index.php">Manage Users</a></li>
				<li><a href="index.php">Manage Modules</a></li>
				<li><a href="index.php">Manage Switch Models</a></li>
				<li><a href="index.php">Manage Switches</a></li>
			</ul>
		</li>

		<li><a href="#">System Backups</a>
			<ul>
				<li><a href="index.php">SQL Backup</a></li>
				<li><a href="index.php">CSV Export</a></li>
			</ul>
		</li>
		<li><a href="#">Switch Configuration</a>
			<ul>
				<li><a href="index.php">Manage Switches</a></li>
				<li><a href="index.php?ManageModels=1">Manage Switch Models</a></li>
				<li><a href="index.php?ManageModules=1">Manage Modules</a></li>
			</ul>
		</li>


	</ul>
</nav>
