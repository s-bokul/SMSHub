<!-- #BeginEditable "body" -->

	<ul class="tab settingpage">
	    <li><a href="/userpanel/account_details">Account Details</a></li>
		<li><a href="/userpanel/changepassword">Password</a></li>
		<li><a href="/userpanel/sender">Sender ID's</a></li>
		<li><a class="selected" href="/userpanel/setting_interface">Interface</a></li>
	</ul>
	<?php echo form_open(site_url('/userpanel/senderadd'),array('name'=>'sender','id'=>'sender'));?>
	<table class="usersettingtable senderidtable">
	 <?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<tr>
			<th class="leftalign">Sender ID</th>
			<th>Default</th>
			<th>Set Default</th>
			<th>Delete</th>
		</tr>
		
		<?php  foreach($sender_data as $row):?>
		<tr>
		
			<td class="leftalign"><?php echo $row->sender_number;  ?></td>
			<td>
			<?php if($row->sender_status==1):?>
			<img src="<?php echo base_url();?>/assets/images/right.png">
			<?php endif; ?>
			</td>
			<td><a href="/userpanel/setdefault/<?php echo $row->sender_id;?>">
			<?php if($row->sender_status==0):?>
			<img src="<?php echo base_url();?>/assets/images/right.png"></a>
			<?php endif; ?>
			</td>
			<td><a href="/userpanel/senderdelete/<?php echo $row->sender_id;?>"><img src="<?php echo base_url();?>/assets/images/remove2.png"></a></td>
		</tr>
		<?php endforeach;?>
		
	</table>
	
	<table class="usersettingtable">
		<tr>
			<td></td>
			<th class="leftalign">Add New Sender ID</th>
		</tr>
		<tr>
			<td>Sender ID <span class="req">*</span></td>
			<td class="leftalign"><input type="text" name="sender_number" id="sender_number"></td>
		</tr>
		<tr>
			<td></td>
			<td class="leftalign"><button class="tablebtn">Add Sender ID</button></td>
		</tr>
	</table>
<?php echo form_close();?>
	
	
<!-- #EndEditable -->