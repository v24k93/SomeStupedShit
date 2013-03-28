{membership}                                      
    <table class="profile_holder" >
        <tr>
            <td class="avatar_holder" rowspan="8">
                <a href="http://78.90.51.149/cms/index.php/profile/change_avatar">
                    <div class="avatar_content" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, 'Change Avatar');" style="cursor: pointer; background-image: url('http://78.90.51.149/cms/content/img/avatars/default-0.jpg');"></div>
                </a>
            </td>
            <td><span class="member" title="Nickname">Nickname</span></td>
            <td>{nickname}</td>
            <td style="width: 20px;">
                <a href="http://78.90.51.149/cms/index.php/profile/change_settings">
                    <div class="edit" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, 'Change Nickname');"></div>
                </a>
            </td>
            <td class="delimeter" rowspan="8"></td>
            <td><span class="in_game_rank" title="In-game Rank">In-Game Rank</span></td>
            <td>{gm_level}</td>
        </tr>
        <tr>
            <td><span class="location" title="Location">Location</span></td>
            <td></td>
            <td>
                <a href="http://78.90.51.149/cms/index.php/profile/change_settings">
                    <div class="edit" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, 'Edit Location');"></div>
                </a>
            </td>
            <td><span class="reputation" title="Reputation">Reputation</span></td>
            <td>{reputation}</td>
        </tr>
        <tr>
            <td><span class="email" title="E-mail">E-mail</span></td>
            <td>{email}</td>
            <td></td>
            <td><span class="posts" title="Posts">Posts</span></td>
            <td>{posts}</td>
        </tr>
        <tr>
            <td><span class="gender_0" title="Gander">Gender</span></td>
            <td>{gender}</td>
            <td>
                <a href="http://78.90.51.149/cms/index.php/profile/change_settings">
                    <div class="edit" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, 'Change Gender');"></div>
                </a>
            </td>
            <td><span class="status" title="Account Status">Account status</span></td>
            <td><font style="color:green">Active</font></td>
        </tr>
        <tr>
            <td><span class="expansion" title="Expansion">Expansion</span></td>
            <td><font style="color: blue">{expansion}</font></td>
            <td>
                <a href="http://78.90.51.149/cms/index.php/profile/change_expansion">
                    <div class="change" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, 'Change Expansion');"></div>
                </a>
            </td>
            <td><span class="web_rank" title="Web Rank">Web Rank</span></td>
            <td>{rank}</td>
        </tr>
        <tr height="20px"></tr>
        <tr>
            <td><span class="last_ip" title="Last IP">Last IP</span></td>
            <td>{last_ip}</td>
            <td></td>
            <td><span class="vote_points" title="Vote Points">Vote Points</span></td>
            <td>{vp}</td>
        </tr>
        <tr>
            <td><span class="last_login" title="Last Login">Last Login</span></td>
            <td>{last_login}</td>
            <td></td>
            <td><span class="donate_points" title="Donate Points">Donate Points</span></td>
            <td>{dp}</td>
        </tr>
    </table>
    <br />
    <table class="profile_holder" style="text-align: center;">
        <tr>
            <td>
                <a href="http://78.90.51.149/cms/index.php/profile/change_password" class="cool_button">
                    <span class="change_btn" title="Change Password">Change Password</span>
                </a>
            </td>
            <td>
                <a href="http://78.90.51.149/cms/index.php/profile/vote_shop" class="cool_button">
                    <span class="vote_points" title="Vote Shop">Vote Shop</span>
                </a>
            </td>
            <td>
                <a href="http://78.90.51.149/cms/index.php/profile/donate_shop" class="cool_button">
                    <span class="donate_points" title="Donate Shop">Donate Shop</span>
                </a>
            </td>
            <td>
                <a href="http://78.90.51.149/cms/index.php/profile/donate" class="cool_button">
                    <span class="donate_points" title="Donate">Donate</span>
                </a>
            </td>
        </tr>
    </table>
    <br />
    <div style="width: 100%;float: right;padding:5px;">
        {characters}
            For realm <a href="{link}"><strong>{realm_name}</strong></a>
            <br />
            <br />
            {realm_characters}
                <table width="100%">
                    <tr>
                        <td rowspan="4" width="86px">
                            <img src="{base_url}content/img/icon/avatars/{race}-{gender}.jpg">
                        </td>
                        <td>
                            <strong><a href="{base_url}character/index/{guid}/{realm_id}">{name}</a></strong> - Level: {level}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{base_url}content/img/icon/class/{class}.gif" title="Class" />
                            &nbsp;&nbsp;
                            <img src="{base_url}content/img/icon/race/{race}-{gender}.gif" title="Race" />
                        </td>
                    </tr>
                    <tr style="height: 20px"></tr>
                    <tr style="height: 10px"><td colspan="2"><hr></hr></td></tr>
                </table>
            {/realm_characters}
        {/characters}
    </div>
    <span style="clear: both; display: block;"></span>
{/membership}