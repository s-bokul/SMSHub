<!-- #BeginEditable "body" -->
<?php echo form_open(site_url('/usercontact/addlist'),array('name'=>'createlist','id'=>'createlist'));?>
	<table class="importcontact">
	<?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<tr>
			<th class="leftalign" colspan="2">Add Custom Field</th>
		</tr>
		<tr>
			<td style="width:100px">Name</td>
			<td><input type="text" name="contactlist_name" id="contactlist_name"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button class="suplist">Save</button> &nbsp; <button class="suplist">Cancel</button></td>
		</tr>
	</table>
<?php echo form_close();?>
<!-- #EndEditable -->