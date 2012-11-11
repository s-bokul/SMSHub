<!-- #BeginEditable "body" -->
	
	<ul class="tab settingpage">
	    <li><a href="/userpanel/account_details">Account Details</a></li>
		<li><a href="/userpanel/changepassword">Password</a></li>
		<li><a href="/userpanel/sender">Sender ID's</a></li>
		<li><a class="selected" href="/userpanel/setting_interface">Interface</a></li>
	</ul>
	<?php echo form_open(site_url('/userpanel/add_interface'),array('name'=>'interface','id'=>'interface'));?>
	<table class="usersettingtable">
	 <?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<tr>
			<td>Receive Low Balance Warning</td>
			<td class="leftalign"><input type="checkbox" name="receive_low_warning_type" value="sms">SMS &nbsp; <input type="checkbox" name="receive_low_warning_type" value="email">Email</td>
		</tr>
		<tr>
			<td>Low balance threshold</td>
			<td><input type="text" name="balance_threshold"></td>
		</tr>
		<tr>
			<td>Low balance email override</td>
			<td><input type="text" name="balance_override"></td>
		</tr>
		<tr>
			<td>Receive Invoices via email</td>
			<td><input type="text" name="recive_invoice_email"></td>
		</tr>
		<tr>
			<td>Invoice email override</td>
			<td><input type="text" name="invoice_email_override"></td>
		</tr>
		<tr>
			<td>Forward incoming messages to Email</td>
			<td class="leftalign"><input type="checkbox" name="messages_to_email" value="1"></td>
		</tr>
		<tr>
			<td>Forward incoming message email override</td>
			<td><input type="text" name="message_email_override"></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td class="leftalign"><button class="tablebtn">Update Settings</button></td>
		</tr>
	</table>
	<?php echo form_close();?>
<!-- #EndEditable -->
