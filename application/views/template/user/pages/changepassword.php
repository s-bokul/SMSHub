<!-- #BeginEditable "body" -->
	<ul class="tab settingpage">
		<li><a href="/userpanel/account_details">Account Details</a></li>
		<li><a href="/userpanel/changepassword">Password</a></li>
		<li><a href="/userpanel/sender">Sender ID's</a></li>
		<li><a class="selected" href="/userpanel/setting_interface">Interface</a></li>
	</ul>
<?php echo form_open(site_url('/userpanel/changepass'),array('name'=>'password','id'=>'password'));?>
	<table class="usersettingtable">
	 <?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<tr>
			<td>Current Password<span class="req">*</span></td>
			<td><input type="password" name="old_password" id="old_password"></td>
		</tr>
		<tr>
			<td>New Password<span class="req">*</span></td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
		<tr>
			<td>Retype New Passowrd<span class="req">*</span></td>
			<td><input type="password" name="confirm_password" id="confirm_password"></td>
		</tr>
		<tr>
			<td></td>
			<td class="leftalign"><button class="tablebtn">Change Password</button></td>
		</tr>
	</table>
	<?php echo form_close();?>
	
<!-- #EndEditable -->