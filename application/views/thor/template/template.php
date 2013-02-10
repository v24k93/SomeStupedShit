<!DOCTYPE html>
<html>
<head>
	<title>{title}</title>
	<link rel="stylesheet" href="{base_url}application/views/thor/css/style.css" />
        {head_content}
</head>
<body>
<div id="navbar">
    <div class="wrapper">
        <ul class="menu">
            <a href="{base_url}index.php"><li style="border-left:1px solid #002630;">{lang_home}</li></a>
            <li>
                <a href="{base_url}index.php/register"><span>{lang_account}</span></a>
                <div style="left: 0;">
                    <ul>
                        <li><a href="{base_url}index.php/register"><span>{lang_register_account}</span></a></li>
                        <li><a href="{base_url}index.php/forget"><span>{lang_forgot_password}</span></a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" class="parent"><span>{lang_status}</span></a>
                <div style="left: 0;">
                    <ul>
                        {realms}
                            <li><a href="{link}"><span>{name}</span></a></li>
                        {/realms}
                    </ul>
                </div>
            </li>
            <a href="{base_url}index.php/how"><li class="last"><span>{lang_how_to_connect}</span></li></a>
        </ul>
    </div>
</div>

<div class="wrapper">
    <div id="headerFix"></div>
    
    <div id="header">
        <a href="{base_url}">
            <img src="{base_url}application/views/thor/img/logo.png" id="logo" alt="logo"/>
        </a>
    </div>
</div>

<div class="wrapper" id="body">
    <div id="left-body">
        {membership_login}
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
                                    <td><input type="text" autocomplete="off" name="login_username" id="login_username" placeholder="{lang_account}..." /></td>
                                </tr>
                                <tr>
                                    <td><input type="password" autocomplete="off" name="login_password" id="login_password" placeholder="{lang_password}..." /></td>
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
        {/membership_login}
        {membership}
            <div class="left-box">
                <div class="left-box-header">
                    <div class="left-box-title">
                        Membership
                    </div>
                </div>
                <div class="left-box-bg">
                    <div class="left-box-text">
                        <table id="login-table">
                            <span style="float: left;">{lang_welcome}</span><span style="float: right;font-weight:bold;">{username} - <a href="{base_url}index.php/profile">{lang_profile}</a> - <a href="{base_url}index.php/home/out">{lang_logout}</a></span><span style="clear: both; display: block;"></span>
                            <span style="float: left;">{lang_account} ID</span><span style="float: right;font-weight:bold;">{id}</span><span style="clear: both; display: block;"></span>
                            <span style="float: left;">{lang_vote_points} (vp)</span><span style="float: right;font-weight:bold;">{vp}</span><span style="clear: both; display: block;"></span>
                            <span style="float: left;">{lang_donate_points} (dp)</span><span style="float: right;font-weight:bold;">{dp}</span><span style="clear: both; display: block;"></span>
                            <span style="float: left;">{lang_posts}</span><span style="float: right;font-weight:bold;">{posts}</span><span style="clear: both; display: block;"></span>
                            <span style="float: left;">{lang_your_current} IP</span><span style="float: right;font-weight:bold;">{user_ip}</span><span style="clear: both; display: block;"></span>
                            <span style="float: left;">{lang_last} IP</span><span style="float: right;font-weight:bold;">{last_ip}</span><span style="clear: both; display: block;"></span>
                            <span style="float: left;">{lang_last_login}</span><span style="float: right;font-weight:bold;">{last_login}</span><span style="clear: both; display: block;"></span>
                            <hr style="margin:5px 0px 5px 0px;"></hr>
                            <span style="float: left;">{lang_nickname}</span><span style="float: right;font-weight:bold;">{nickname} <a href="{base_url}index.php/profile/change_settings" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, 'Change Nickname');"><img src="{base_url}content/img/edit.png"></a></span><span style="clear: both; display: block;"></span>
			</table>
                    </div>
                </div>
            </div>
        {/membership}
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
                    {realm_status}
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
        {content}
    </div>
</div>
<div class="wrapper" id="footer">
    <div class="footer-copyright">
        &copy; 2012 All rights reserved to <a href="#">{site_title}</a><br />
        All img of this World of Warcraft web design are the property of their respective owners.
    </div>
    
    <div class="footer-author">
        <!--This area should not be removed, this is a free template so all i ask for is to keep this area here not touched. -NicholasWalkerHD-->
	Powered by: <a href="#">{core} - {elapsed_time}</a><br />
        Design by: <a href="http://thorgfx.com">Thor</a><br />
        Coded by: <a href="http://walkerhdd.com">NicholasWalkerHD</a>
    </div>
</div>
</body>
</html>