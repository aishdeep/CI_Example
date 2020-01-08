<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/nav'); ?>
<style>
    .square
    {
    	margin:1px;
        width:50%;
        text-align:left;
        border: 1px solid gray;
        display:inline-block;    
    }
    .discuss-container
    {
    	
        display:inline-block;
    	width:100%;
    	height: 100%;
        border: 1px solid black;
    }
</style>
<div class="container">
	<h3><?php echo $job_detail->job_title;?></h3>
	<form id="form-priv">
		<div class="form-group">
			<label for="contact_msg">Your message</label>
			<textarea class="form-control" id="contact_msg" rows="3" name="contact_msg"></textarea>
		</div>
		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10">
				<input type="hidden" name="u" value="<?php echo $job_detail->user_id;?>">
				<input type="hidden" name="j" value="<?php echo $job_detail->job_id;?>">
				<button type="button" class="btn btn-default contact-info">Submit</button>
			</div>
		</div>
	</form>
	
	<div class = "discuss-container">
		<?php if($contacts->num_rows() > 0){
			foreach($contacts->result() as $contVal){ ?>
				<div class = "square">
					<p>Username : <span><?php echo $contVal->username;?></span></p>
					<p>Message :  <span><?php echo $contVal->jd_message;?></span></p>
					<p>Time   : <span><?php echo date('m j,Y',strtotime($contVal->jd_time));?></span></p>
				</div>
			<?php }
		} else{
		echo 'Not contacted yet.';
		}?>
	</div>

</div>
<?php $this->load->view('templates/footer'); ?>