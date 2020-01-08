<?php $this->load->view('templates/header'); ?>

<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
			<?php echo form_error('username');?>
            <input type="text" class="form-control" placeholder="Username" required="required" name="username" value="<?php echo set_value('username');?>" >
        </div>
        <div class="form-group">
			<?php echo form_error('password');?>
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
           
    </form>
</div>
<?php $this->load->view('templates/footer'); ?>