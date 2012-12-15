<!-- #BeginEditable "body" -->
<?php echo form_open_multipart(site_url('/usercontact/do_upload'),array('name'=>'uploadcontact','id'=>'uploadcontact'));?>
	<table class="importcontact">
	<?php
            $message = json_decode($this->session->flashdata('msg'), 1);
            echo '<div class="'.$message['class'].'" style="padding-left:200px;" > '.$message['msg'].' </div>';
				
        ?>
		<tr>
			<th class="leftalign">Import Contact</th>
		</tr>
		
		<tr>
			<td>
				<label>Import Contact to List :</label> 
				<select class="listselect">
					<option>List Dhaka</option>
					<option>List Comilla</option>
					<option>List Sylhet</option>
					<option>List chittagong</option>
				</select>
				<input type="text" style="display:none">
				<a class="newlistbtn" href="#"> or CREATE NEW LIST +</a>
			</td>
		</tr>
		
		<tr>
			<td>
				<p>(Instruction: Please download the Excel template or CSV template and use this template to upload numbers. Only mobile number is required, other fields optional.)</p>
			</td>
		</tr>
		
		<tr>
			<td>
				<input class="uploadcntrl" name="userfile" size="20" type="file">
			</td>
		</tr>
	
		<tr>
			<td>
				<input type="radio" name="group"><label>Do not convert numbers but generate format error report</label><br>
				<input type="radio" name="group"><label>Convert numbers automatically and generate conversion report</label>
			</td>
		</tr>
	
		<tr>
			<td>
				<input type="checkbox"><label>First Row is Header</label>
			</td>
		</tr>
	
		<tr>
			<td>
				<button class="tablebtn">Upload</button>
			</td>
		</tr>
	
	</table>
<?php echo form_close();?>
<!-- #EndEditable -->