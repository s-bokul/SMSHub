<!-- #BeginEditable "body" --> 
<?php echo form_open(site_url('/usercontact/createcustomfield'),array('name'=>'createcustomfield','id'=>'createcustomfield'));?>
 
	<table class="importcontact">
	<?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
			
		<tr>
			<th class="leftalign" colspan="2">Add Custom Field</th>
		</tr>
		<tr>
			<td style="width:100px"><label>Field Name</label></td>
			<td><input type="text" name="customfield_name" id="customfield_name" ></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><textarea name="customfield_description" id="customfield_description"></textarea></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><button class="suplist" >Save</button> &nbsp; <button class="suplist" type="reset">Cancel</button></td>
		</tr>
	</table>
<?php echo form_close();?>


	

<!-- #EndEditable -->