<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>{site_title} - {title}</title>
	<link rel="stylesheet" href="{base_url}application/views/thor/css/style.css" />
	<link rel="shortcut icon" href="./img/favicon.ico" />
	{header_content}
</head>
<body>
<div id="navbar">
	<div class="wrapper">
		<ul class="menu">
			<a href="{base_url}index.php"><li style="border-left:1px solid #002630;">{lang_home}</li></a>
			{not_logged2}
				<li><a href="{base_url}index.php/register"><span>{lang_account}</span></a>
					<div style="left: 0;"><ul>
						<li><a href="{base_url}index.php/register"><span>{lang_register_account}</span></a></li>
						<li><a href="{base_url}index.php/forget"><span>{lang_forgot_password}</span></a></li>
					</ul></div>
				</li>
			{/not_logged2}
			{logged2}
				<li><a href="{base_url}index.php/profile" class="parent"><span>{lang_profile}</span></a>
					<div style="left: 0;"><ul>
						<li><a href="{base_url}index.php/profile" class="parent"><span>{lang_characters}</span></a>
							<div style="left: 0;"><ul>
								{realm_characters}
									<li><a href="{link}" class="parent"><span>{name}</span></a>
										<div style="left: 0;"><ul>
											{characters}
												<li><a href="{char_link}"><span><img src="{base_url}content/img/icon/race/{char_race}-{char_gender}.gif" width="12" height="12" />&nbsp;&nbsp;{char_name}&nbsp;&nbsp;<img src="{base_url}content/img/icon/class/{char_class}.gif" width="12" height="12" /></span></a></li>
											{/characters}
										</ul></div>
									</li>
								{/realm_characters}
							</ul></div>
						</li>
						<li><a href="{base_url}index.php/profile" class="parent"><span>Change</span></a>
							<div style="left: 0;"><ul>
								<li><a href="{base_url}index.php/profile/change_password"><span>Password</span></a></li>
								<li><a href="{base_url}index.php/profile/change_settings"><span>Settings</span></a></li>
								<li><a href="{base_url}index.php/profile/change_expansion"><span>Expansion</span></a></li>
							</ul></div>
						</li>
						<li><a href="{base_url}index.php/profile/donate"><span>{lang_donate}</span></a></li>
						<li><a href="{base_url}index.php/profile/donate_shop"><span>{lang_donate_shop}</span></a></li>
						<li><a href="{base_url}index.php/profile/vote_shop"><span>{lang_vote_shop}</span></a></li>
						<li><a href="{base_url}index.php/home/out"><span>{lang_logout}</span></a></li>
					</ul></div>	
				</li>
			{/logged2}
			<li><a href="#" class="parent"><span>{lang_status}</span></a>
				<div style="left: 0;"><ul>
					{realms}
						<li><a href="{link}"><span>{name}</span></a></li>
					{/realms}
				</ul></div>
			</li>
			<li><a href="{base_url}index.php/forum">{lang_forum}</a></li>
			<li><a href="#"><span>{lang_tools}</span></a>
				<div style="left: 0;"><ul>
					{realms_tools}
						<li><a href="#" class="parent"><span>{name}</span></a>
							<div style="left: 0;"><ul>
								<li><a href="#" class="parent"><span>Top Arena Teams</span></a>
									<div style="left: 0;"><ul>
										<li><a href="{base_url}index.php/top_arenas/index/2/{id}"><span>2v2</span></a></li>
										<li><a href="{base_url}index.php/top_arenas/index/3/{id}"><span>3v3</span></a></li>
										<li><a href="{base_url}index.php/top_arenas/index/5/{id}"><span>5v5</span></a></li>
									</ul></div>
								</li>
								<li><a href="{top_link}"><span>Top Killers</span></a></li>
								<li><a href="{char_ban_link}"><span>Character Ban List</span></a></li>
							</ul></div>
						</li>
					{/realms_tools}
					<li><a href="#" class="parent"><span>Ban Lists</span></a>
						<div style="left: 0;"><ul>
							<li><a href="{base_url}index.php/bans/account"><span>Account</span></a></li>
							<li><a href="{base_url}index.php/bans/ip"><span>IP</span></a></li>
						</ul></div>
					</li>
				</ul></div>
			</li>
			<a href="{base_url}index.php/how"><li class="last"><span>{lang_how_to_connect}</span></li></a>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div id="headerFix">
	</div>
	
	<div id="header">
		<a href="{base_url}">
			<img src="{base_url}application/views/thor/img/logo.png" id="logo" alt="logo"/>
		</a>
	</div>
</div>

<div class="wrapper" id="body">
	{full_content_false}
	<div id="left-body">
		{not_logged}
			<div class="left-box">
				<div class="left-box-header">
					<div class="left-box-title">
					Login
					</div>
				</div>
				
				<div class="left-box-bg">
					<div class="left-box-text">
						<table id="login-table">
							<form action="{base_url}index.php/login/validation_login" method="post" accept-charset="utf-8">
								<input type="hidden" name="return_link" value="{current_url}" />
								<input type="hidden" name="login_remember_me" value="1" />
								<tr>
									<td>
										<input type="text" autocomplete="off" name="login_username" id="login_username" placeholder="{lang_account}..." />
									</td>
								</tr>
							
								<tr>
									<td>
										<input type="password" autocomplete="off" name="login_password" id="login_password" placeholder="{lang_password}..." />
									</td>
								</tr>
								
								<tr>
									<td>
										<input type="submit" name="submit" value="Login" style="float:left;width: 80px;"/>
										<div style="float:right;">
											<a href="{base_url}index.php/forget">Forgot Password?</a><br />
											<a href="{base_url}index.php/register">Members Registration</a>
										</div>
									</td>
								</tr>
								<tr><td>{login_status}</td></tr>
							</form>
						</table>
					</div>
				</div>
			</div>
		{/not_logged}
		{logged}
			<div class="left-box">
				<div class="left-box-header">
					<div class="left-box-title">
					Membership
					</div>
				</div>
				
				<div class="left-box-bg">
					<div class="left-box-text">
						<span style="float: left;">{lang_welcome}</span><span style="float: right;font-weight:bold;">{username} - <a href="{base_url}index.php/profile">{lang_profile}</a> - <a href="{base_url}index.php/home/out">{lang_logout}</a></span><span style="clear: both; display: block;"></span>
						<div class="addition" id="addition">
							<span style="float: left;">{lang_account} ID</span><span style="float: right;font-weight:bold;">{user_id}</span><span style="clear: both; display: block;"></span>
							<span style="float: left;">{lang_vote_points} (vp)</span><span style="float: right;font-weight:bold;">{user_vp}</span><span style="clear: both; display: block;"></span>
							<span style="float: left;">{lang_donate_points} (dp)</span><span style="float: right;font-weight:bold;">{user_dp}</span><span style="clear: both; display: block;"></span>
							<span style="float: left;">{lang_posts}</span><span style="float: right;font-weight:bold;">{user_posts}</span><span style="clear: both; display: block;"></span>
							<span style="float: left;">{lang_your_current} IP</span><span style="float: right;font-weight:bold;">{user_ip}</span><span style="clear: both; display: block;"></span>
							<hr style="margin:5px 0px 5px 0px;"></hr>
							<span style="float: left;">{lang_nickname}</span><span style="float: right;font-weight:bold;">{user_nickname} <a href="{base_url}index.php/profile/change_settings" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, 'Change Nickname');"><img src="{base_url}content/img/edit.png"></a></span><span style="clear: both; display: block;"></span>
						</div>
					</div>
				</div>
			</div>
		{/logged}
	
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
					{realms_status}
					<!--End Realms-->
				</div>
			</div>
		</div>
		<!-- REALM BOX END -->
		
		<!-- INFO BOX -->
		<div class="left-box">
			<div class="left-box-header">
				<div class="left-box-title">
				Additional information
				</div>
			</div>
			
			<div class="left-box-bg">
				<div class="left-box-text">
					<!--Begin INFO-->
					<div class="information">total accounts <u>{total_accounts}</u></div>
					<div class="information">current server time: <u>{current_server_time}</u></div>
					<div class="information">set realmlist <u>{realmlist}</u></div>
					<!--End INFO-->
				</div>
			</div>
		</div>
		<!-- INFO BOX END -->
	</div>
	<div id="right-body">
	{/full_content_false}
	<!-- SLIDER START-->
	