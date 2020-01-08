<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/nav'); ?>
<div class="container">
	<?php if($this->session->flashdata('message')){
		echo $this->session->flashdata('message');
	}?>
	<?php if($jobList->num_rows() > 0){ ?>
	<table class="table table-bordered">
    <thead>
      <tr>
        <th>Job title</th>
        <th>username</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach($jobList->result() as $jval){ ?>
			<tr>
				<td><?php echo $jval->job_title;?></td>
				<td><?php echo $jval->username;?></td>
				<td>
					<?php if($jval->user_id == $uDetail->user_id){?>
					<a href="javascript:void(0);" onclick="window.location.href='<?php echo site_url()?>inbox/<?php echo base64_encode(base64_encode($jval->job_id));?>'">Inbox</a>
					<?php }else{?>
					<a href="javascript:void(0);" onclick="window.location.href='<?php echo site_url()?>contact/<?php echo base64_encode(base64_encode($jval->job_id));?>'">Contact</a>
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</tbody>
	</table>
	<?php }else{ ?>
		<p>No record exist</p>
	<?php }?>
</div>
<?php $this->load->view('templates/footer'); ?>