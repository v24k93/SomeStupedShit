<form action="{base_url}index.php/profile/validate_settings" method="post" accept-charset="utf-8">
    <table style="margin: 0 auto;">
        <tr>
            <td colspan="2">{flashdata}</td>
        </tr>
        <tr>
            <td><span class="member" title="Nickname">Nickname *</span></td>
            <td align="right">
                {drop_nickname}
            </td>
        </tr>
        <tr>
            <td><span class="gender_0" title="Gender">Gender *</span></td>
            <td align="right">
                {drop_gender}
            </td>
        </tr>
        <tr>
            <td><label for="location"><span class="location" title="Location">Location</span></label></td>
            <td><input type="text" name="location" value="{user_location}" id="location" class="" style="width: 300px;" /></td>
        </tr>
        <tr>
            <td colspan="2" align="right"><input type="submit" name="submit" value="Submit" class="" /></td>
        </tr>
    </table>
</form>