<!-- #BeginEditable "body" -->
<?php echo form_open(site_url('/usercontact/createcontact'),array('name'=>'createcontact','id'=>'createcontact'));?>
<table class="addcontact contactpages">
<?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<tr>
			<th colspan="2">Add Contact</th>
		</tr>
		<tr><td colspan="2">To use the First Name, Last Name in message, put them in [ ] like [FirstName], [LastName] and it will be replaced with its associated value for the contact when the message is sent <br><br></td></tr>
		<tr>
			<td style="width:120px">List</td>
			<td>
			
			<select>
					<option>Any</option>
					<?php  foreach($data['contact_list'] as $row):?>
					<option value="<?php echo $row->contactlist_id;?>"><?php echo $row->contactlist_name;?></option>
					
					<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Mobile Number</td>
			<td><input type="text"></td>
		</tr>

		<tr>
			<td>First Name</td>
			<td><input type="text"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text"></td>
		</tr>
		<?php  foreach($data['custom_field'] as $row):?>
		<tr>
			<td><?php echo $row->customfield_name;?></td>
			<td><input type="text" name="customfied_value" id="customfied_value"></td>
		</tr>
	<?php endforeach;?>
		<tr>
			<td>&nbsp;</td>
			<td><input class="save" type="submit" value="Save &radic;"><input type="submit" value="Cancel "></td>
		</tr>
	</table>
<?php echo form_close();?>
	
<!-- #EndEditable -->