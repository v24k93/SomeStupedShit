<!DOCTYPE html>
<html>
<head>
	<title>{title}</title>
	<link rel="stylesheet" href="{base_url}application/views/thor/css/style.css" />
	<link rel="shortcut icon" href="./img/favicon.ico" />
	{head_content}
	<meta charset="utf-8" />
</head>

<body>

<div id="navbar">
	<div class="wrapper">
		<ul>
			<li onclick="window.location = './'" style="border-left:1px solid #002630;">Home</li>
			<li onclick="window.location = '?page=register'">Register</li>
			<li onclick="window.location = '?page=connect'">Connect</li>
			<li onclick="window.location = '#'">Forums</li>
			<li onclick="window.location = '?page=vote'">Vote</li>
			<li onclick="window.location = '?page=donate'">donate</li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div id="headerFix">
	</div>
	
	<div id="header">
		<a href="index.php">
			<img src="./img/logo.png" id="logo" alt="logo"/>
		</a>
	</div>
</div>

<div class="wrapper" id="body">
	<div id="left-body">
		<!-- LOGIN BOX -->
	<form method="POST">
		<div class="left-box">
			<div class="left-box-header">
				<div class="left-box-title">
				Login
				</div>
			</div>
			
			<div class="left-box-bg">
				<div class="left-box-text">
					<table id="login-table">
						<tr>
							<td>
								<input type="text" autocomplete="off" name="username" value="Username" onFocus="if(this.value == 'Username') this.value = '';" onBlur="if(this.value == '') this.value = 'Username';"/>
							</td>
						</tr>
						
						<tr>
							<td>
								<input type="password" autocomplete="off" name="password" value="Password" onFocus="if(this.value == 'Password') this.value = '';" onBlur="if(this.value == '') this.value = 'Password';" />
							</td>
						</tr>
						
						<tr>
							<td>
								<input type="submit" name="login" value="Login" style="float:left;"/>
								<div style="float:right;">
									<a href="?page=forgot">Forgot Password?</a><br />
									<a href="?page=register">Members Registration</a>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	<!-- LOGIN BOX END -->
	</form>
	
		<!-- REALM BOX -->
		<div class="left-box">
			<div class="left-box-header">
				<div class="left-box-title">
				Realm Status
				</div>
			</div>
			
			<div class="left-box-bg">
				<div class="left-box-text">
					<!--Begin Realms-->
					<div style="margin-left:5px;">Online - <a href="?page=realm&id={view_realms.id}">Trinity | PVP</a></div>
					<div class="realm-1">
					<div class="realm-2"></div>
					<div style="width:44%; background:#1b1b1b; height:3px; border:1px solid #323232; border-right:1px solid black; float:left;"></div></div>
					<!--End Realms-->
				</div>
			</div>
		</div>
	<!-- REALM BOX END -->
	</div>
	
	<div id="right-body">
	<!-- SLIDER START-->
	
		<div id="slider">
			<img src="./img/slider/slider_img_1.jpg" class="slider_img" id="slide_1" width="532" height="199" alt="slider-image-1"/>
			<img src="./img/slider/slider_img_2.jpg" class="slider_img" id="slide_2" width="532" height="199" alt="slider-image-2"/>
			<img src="./img/slider/slider_img_3.jpg" class="slider_img" id="slide_3" width="532" height="199" alt="slider-image-3"/>
			<img src="./img/slider/slider_img_4.jpg" class="slider_img" id="slide_4" width="532" height="199" alt="slider-image-4"/>
			<img src="./img/slider/slider_img_5.jpg" class="slider_img" id="slide_5" width="532" height="199" alt="slider-image-5"/>
		</div>
		
	<script type="text/javascript">
	$(function(){
		var count = $("#slider img").length, i = 1;
		
		$('#slide_' + i).css("display","block");
					
		setInterval(function(){
			var old_slide = $('#slide_' + i);
			if(i >= count)
				i = 0;
			var new_slide = $('#slide_' + (i + 1));
			old_slide.fadeOut(300);
			setTimeout(function(){
				old_slide.css("display","none");
				new_slide.css("display","block");
				new_slide.fadeIn(300);
				i++;
			}, 300);
		}, 3000);
	});
	</script>
	<!-- SLIDER END -->
	
	<div class="main-box">
			<div class="main-box-header">
				<div class="main-box-title">
					Welcome | Written By Ac0, 22.12.2012
				</div>
			</div>
			<div class="main-box-bg">
				<div class="main-box-text">
					<img src="./img/default-0.jpg" class="news-avatar" alt="News Avatar" />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non libero vel turpis facilisis laoreet in at sem. Cras ac sapien tincidunt augue dignissim condimentum a eget augue. Vestibulum lacus nisl, auctor ac posuere a, dictum et nisi. Pellentesque vulputate augue lacinia est aliquet luctus. Duis ipsum erat, lobortis quis cursus et, faucibus sed lacus. Nam vel ante eget eros venenatis vestibulum vitae in quam. Nullam non rutrum leo.
					<br /><br />Pellentesque placerat venenatis fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam sit amet laoreet velit. Curabitur et nisi vitae eros venenatis mollis id sit amet urna. Nam ut sem in mauris tincidunt consectetur ut ac felis. Phasellus luctus, libero id tempus facilisis, magna eros interdum ante, vel fermentum orci purus nec sapien. Morbi nec pretium sapien. Vestibulum elit purus, semper vitae imperdiet vitae, ullamcorper id nibh. Phasellus turpis ipsum, rhoncus eu scelerisque id, porta quis enim. Nam blandit pretium dolor in accumsan. Donec id pulvinar mi.
				</div>
			</div>
		</div>

	</div>
</div>

<div class="wrapper" id="footer">
	<div class="footer-copyright">
	&copy; 2012 All rights reserved to <a href="#">{copyright}</a><br />All img of this World of Warcraft web design are the property of their respective owners.
	</div>
	
	<div class="footer-author">
	<!--This area should not be removed, this is a free template so all i ask for is to keep this area here not touched. -NicholasWalkerHD-->
	Powered by: <a href="#">Ac0</a><br />	Design by: <a href="http://thorgfx.com">Thor</a><br />	Coded by: <a href="http://walkerhdd.com">NicholasWalkerHD</a>
	</div>
</div>

</body>
</html>