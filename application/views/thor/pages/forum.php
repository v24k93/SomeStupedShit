<ul class="forum_menu">
	{uri}
		<li><a href="{uri_link}" class="{uri_class}">{uri_name}</a></li>
	{/uri}
</ul>
<div class="clear"></div>
<br />
{content}
{is_allowed_new_thread}
	<a href="{base_url}index.php/forum/new_thread/{forum_id}" class="cool_button left">New Thread</a><div class="clear"></div><br />
{/is_allowed_new_thread}
	{show_forum}
		<table class="forum_content">
			<tr height="20px" class="first">
			<td class="td_header" width="500px">Forum</td>
			<td class="td_header" width="200px">Last Post</td>
			<td class="td_header">Threads</td>
			<td class="td_header">Posts</td>
			</tr>
			{forums}
				<tr>
					<td class="td" width="500px">
						<a href="{forum_link}"><span class="active">{forum_name}</span></a>
						<br />
						<span class="forum_description">{forum_description}</span>
					</td>
					<td class="td">
						{forum_last_post}
							<div class="last_overflowed"><a href="{last_forum_thread_link}">{last_forum_post_thread}</a></div>
							by: <a href="{last_forum_post_username_link}">{last_forum_post_username}</a><br />
							<span class="right">{last_forum_post_date} <a href="{last_forum_post_link}">>>></a></span>
						{/forum_last_post}
					</td>
					<td class="td acenter">
						{forum_threads}
					</td>
					<td class="td acenter">
						{forum_posts}
					</td>
				</tr>
				<tr>
					<td colspan="4"><div class="dotted"></div></td>
				</tr>
			{/forums}
		</table>
		<div class="clear"></div><br />
	{/show_forum}
	{show_threads}
		<table class="forum_content">
			<tr height="20px" class="first">
			<td class="td_header" width="500px">Thread</td>
			<td class="td_header">Last Post</td>
			<td class="td_header">Posts</td>
			<td class="td_header">Views</td>
			</tr>
			{threads}
				<tr class="thread">
					<td class="td" width="500px">
						<a href="{thread_link}"><span class="active" title="{thread_description}">{thread_name}</span></a><span class="mod_links">{thread_mod_links}</span>
						<br />
						<span class="forum_description"><a href="{thread_poster_link}" style="color: #cfcfcf;">{thread_poster}</a></span>
					</td>
					<td class="td">
						{thread_last_post}
							{last_thread_post_date} <a href="{last_thread_post_link}">>>></a><br />
							by: <a href="{last_thread_post_username_link}">{last_thread_post_username}</a>
						{/thread_last_post}
					</td>
					<td class="td acenter">
						{thread_posts}
					</td>
					<td class="td acenter">
						{thread_views}
					</td>
				</tr>
				<tr>
					<td colspan="4"><div class="dotted"></div></td>
				</tr>
			{/threads}
		</table>
		<div class="clear"></div>
	{/show_threads}
	{show_posts}
		<table class="post_content">
			<tr bgcolor="#013545" class="thread">
				<td colspan="2" class="table_title">{title}<span class="mod_links">{thread_mod_links}</span></td>
			</tr>
			{posts}
				<tr class="thread">
					<td class="table_user"><a href="{post_username_link}">{post_username}</a></td>
					<td class="table_user">{post_date} {post_show_last_edit_date}(Last edit: {post_last_edit_date}) {/post_show_last_edit_date}<span class="right"> #{post_number}</span><span class="mod_links">{post_mod_links}&nbsp;&nbsp;</span></td>
				</tr>
				<tr>
					<td width="200px" align="center" class="td" valign="top">
						<div class="post_user_content">
							<div class="avatar_content" style="background-image: url('{post_username_avatar_link}'); margin: 10px;"></div>
							{post_username_rank}
								<div class="rank_content" style="background-image: url('{img}');"></div>
							{/post_username_rank}
							</div>
							<div class="hr_line">Gender: {post_username_gender}</div>
							{post_username_show_location}
								<div class="hr_line">Location: {post_username_location}</div>
							{/post_username_show_location}
							<div class="hr_line">Posts: {post_username_posts}</div>
							<div class="hr_line" style="padding-bottom: 10px;">Reputation: {post_username_reputation}</div>
						</div>
					</td>
					<td class="table_text">{post_content}</td>
				</tr>
			{/posts}
		</table>
		{is_allowed_post}
			<div class="clear"></div><br />
			<table class="post_content">
					<tr bgcolor="#013545">
						<td colspan="2" class="table_title"><a name="quick_reply"></a>Quick Reply</td>
					</tr>
					<form action="{base_url}index.php/forum/validation_post" method="post" accept-charset="utf-8">
						<input type="hidden" name="return_link" value="{current_url}" />
						<input type="hidden" name="thread_id" value="{thread_id}" />
						<tr>
							<td colspan="2" align="center"><div class="post_container"><label for="forum_post">Message:</label><br /><textarea class="post_input" id="forum_post" name="forum_post" placeholder="Write your reply..."/></textarea>{status}</div></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" value="Post Quick Reply" class="" /></td>
						</tr>
					</form>
			</table>
			<div class="clear"></div>
		{/is_allowed_post}
		<div class="clear"></div>
	{/show_posts}
	{post}
		<div class="clear"></div><br />
			<table class="post_content">
					<tr bgcolor="#A0A0A0">
						<td colspan="2" class="table_title"><a name="quick_reply"></a>{title}</td>
					</tr>
					<form action="{base_url}index.php/forum/validation_edit_post" method="post" accept-charset="utf-8">
						<input type="hidden" name="return_link" value="{current_url}" />
						<input type="hidden" name="post_id" value="{id}" />
						<input type="hidden" name="thread_id" value="{thread}" />
						<tr>
							<td colspan="2" align="center"><div class="post_container"><label for="forum_post">Message:</label><br /><textarea class="post_input" name="forum_post" id="forum_post" placeholder="Write your reply..."/>{post}</textarea>{status}</div></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" value="Edit Reply" class="" /></td>
						</tr>
					</form>
			</table>
			<div class="clear"></div>
	{/post}
	{show_new_thread}
		<div class="clear"></div><br />
		<table class="post_content">
			<tr bgcolor="#013545">
				<td colspan="2" class="table_title"><a name="quick_reply"></a>{title}</td>
			</tr>
			<form action="{base_url}index.php/forum/validation_new_thread" method="post" accept-charset="utf-8">
				<input type="hidden" name="return_link" value="{current_url}" />
				<input type="hidden" name="forum" value="{forum_id}" />
				<tr>
					<td colspan="2" align="center">
						<div class="post_container">
							<span class="left" style="margin-top: 10px;"><label for="name">Name:</label></span>
							<span class="right"><input type="text" name="name" id="name" placeholder="Thread Name..." class="" style="width: 210px" /></span><span class="clear"></span><br />
							<span class="left" style="margin-top: 10px;"><label for="description">Description:</label></span>
							<span class="right"><input type="text" name="description" id="description" placeholder="Thread Description..." class="" style="width: 210px" /></span><span class="clear"></span>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><div class="post_container"><label for="forum_post">Message:</label><br /><textarea class="post_input" name="forum_post" id="forum_post" placeholder="Write your reply..."/></textarea>{status}</div></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Post New Thread" class="" /></td>
				</tr>
			</form>
		</table>
		<div class="clear"></div>
	{/show_new_thread}
	{thread}
		<div class="clear"></div><br />
			<table class="post_content">
					<tr bgcolor="#A0A0A0">
						<td colspan="2" class="table_title"><a name="quick_reply"></a>{title}</td>
					</tr>
					<form action="{base_url}index.php/forum/validation_edit_thread" method="post" accept-charset="utf-8">
						<input type="hidden" name="return_link" value="{current_url}" />
						<input type="hidden" name="thread_id" value="{id}" />
						<tr>
							<td align="center"></td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<div class="post_container">
									<span class="left" style="margin-top: 10px;"><label for="name">Name:</label></span><span class="right"><input type="text" style="width: 286px;" class="cool_textfield" name="name" id="name" value="{name}" /></span><span class="clear"></span>
									<span class="left" style="margin-top: 10px;"><label for="description">Description:</label></span><span class="right"><input type="text" style="width: 286px;" class="cool_textfield" name="description" id="description" value="{description}" /></span><span class="clear"></span>
									<span class="left" style="margin-top: 10px;">Forum:</span><span class="right">
										<?php echo form_dropdown('forum', $all_forums, $thread[0]['forum'],'class="" style="width: 300px;"'); ?>
									</span><span class="clear"></span>
									<span class="left" style="margin-top: 10px;">Locked:</span><span class="right">
										<?php $locked_types = array(0 => 'Not Locked', 1 => 'Locked'); echo ($this->auto->is_admin) ? form_dropdown('locked', $locked_types, $thread[0]['locked'],'class="" style="width: 300px;"') : ''; ?>
									</span><span class="clear"></span>
									{status}
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" value="Post Quick Reply" class="cool_button" /></td>
						</tr>
					</form>
			</table>
			<div class="clear"></div>
	{/thread}
		
		