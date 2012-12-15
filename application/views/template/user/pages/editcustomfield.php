<!-- #BeginEditable "body" --> 
<?php echo form_open(site_url('/usercontact/updatecustomfield'),array('name'=>'createcustomfield','id'=>'createcustomfield'));?>
 
	<table class="importcontact">
	<?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<?php  foreach($data['custom_field'] as $row):?>	
		<tr>
			<th class="leftalign" colspan="2">Add Custom Field</th>
			<input type="hidden" name="customfield_id" id="customfield_id" value="<?php echo $row->customfield_id;?>">
		</tr>
		<tr>
			<td style="width:100px"><label>Field Name</label></td>
			<td><input type="text" name="customfield_name" id="customfield_name" value="<?php echo $row->customfield_name;?>" ></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><textarea name="customfield_description" id="customfield_description"  ><?php echo $row->customfield_description;?></textarea></td>
		</tr>
		<?php  endforeach;?>
		<tr>
			<td>&nbsp;</td>
			<td><button class="suplist" >Edit</button> &nbsp; </td>
		</tr>
	</table>
<?php echo form_close();?>


	

<!-- #EndEditable -->