<!-- #BeginEditable "body" -->

	<table class="importcontact">
	<?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<tr>
			<th class="leftalign">Custom Fields</th>
		</tr>
		<tr>
			<td>To use the custom field in message, put the field name in [ ] like [My field name] and it will be replaced with its associated value when the message is sent</td>
		</tr>
	</table>
	
	

	<table class="defaulttable" id="customfield">
		<tr>
			<th>Field Name</th>
			<th>Description</th>
			<th>Date Added</th>
			<th>Date Updated</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php  foreach($data['custom_field'] as $row):?>
		<tr>
			<td class="leftalign"><?php echo $row->customfield_name;?></td>
			<td class="leftalign"><?php echo $row->customfield_description;?></td>
			<td><?php echo str_replace("-","/",$row->date_created);?></td>
			<td><?php echo str_replace("-","/",$row->last_update_date);?></td>
		<td><a href="/usercontact/customfield_edit/<?php echo $row->customfield_id;?>" style="display:block;width:60px;"><img src="<?php echo base_url(); ?>assets/images/pencil3.png"></a></td>
		<td><a href="/usercontact/customfield_delete/<?php echo $row->customfield_id;?>"><img src="<?php echo base_url(); ?>assets/images/remove2.png"></a></td>
		</tr>
		<?php  endforeach;?>

	</table>
	
	<ul class="page">
		<li class="page-prev"><a href="#"> << Prev</a></li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li class="page-next"><a href="#">Next >> </a></li>
	</ul>

	
	

<!-- #EndEditable -->