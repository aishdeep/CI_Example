<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/nav'); ?>
<div class="container">
	<h3><?php echo $job_detail->job_title;?></h3>
	<?php if($job_aplicatin->num_rows() > 0){ ?>
	<table class="table table-bordered">
    <thead>
      <tr>
        <th>Applied by</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach($job_aplicatin->result() as $jval){ ?>
			<tr>
				<td><a href="javascript:void(0);" onclick="window.location.href='<?php echo site_url()?>inbox_list/<?php echo base64_encode(base64_encode($job_detail->job_id));?>/<?php echo base64_encode(base64_encode($jval->applied_by));?>'"><?php echo $jval->username;?></a></td>
			</tr>
		<?php } ?>
	</tbody>
	</table>
	<?php }else{ ?>
		<p>No record exist</p>
	<?php }?>

</div>
<?php $this->load->view('templates/footer'); ?>