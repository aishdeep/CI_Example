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
	<form id="form-discus">
		<div class="form-group">
			<label for="replay_msg">Your replay</label>
			<textarea class="form-control" id="replay_msg" rows="3" name="replay_msg"></textarea>
		</div>
		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10">
				<input type="hidden" name="ab" value="<?php echo $ab;?>">
				<input type="hidden" name="j" value="<?php echo $job_detail->job_id;?>">
				<button type="button" class="btn btn-default replay-info">Submit</button>
			</div>
		</div>
	</form>
	
	
	<div class = "discuss-container">
		<?php if($discussion->num_rows() > 0){
			foreach($discussion->result() as $disVal){ ?>
				<div class = "square">
					<p>Username : <span><?php echo $disVal->username;?></span></p>
					<p>Message :  <span><?php echo $disVal->jd_message;?></span></p>
					<p>Time   : <span><?php echo date('m j,Y',strtotime($disVal->jd_time));?></span></p>
				</div>
			<?php }
		} else{
		echo 'No discussion.';
		}?>
	</div>
	
	<div class = "discuss-container">
		<h3>Replies</h3>
		<?php if($replies->num_rows() > 0){
			foreach($replies->result() as $rplyVal){ ?>
				<div class = "square">
					<p>Username : <span><?php echo $rplyVal->username;?></span></p>
					<p>Message :  <span><?php echo $rplyVal->jd_message;?></span></p>
					<p>Time   : <span><?php echo date('m j,Y',strtotime($rplyVal->jd_time));?></span></p>
				</div>
			<?php }
		} else{
		echo 'No discussion.';
		}?>
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>