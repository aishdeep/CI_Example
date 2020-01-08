<?php $url =  $this->uri->segment(1);?>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			
			<li class="<?php echo ($url == 'dashboard') ? 'active' : '';?>"><a href="<?php echo site_url();?>dashboard">Dashboard</a></li>
			<li class="<?php echo ($url == 'jobList') ? 'active' : '';?>"><a href="<?php echo site_url();?>jobList">Job list</a></li>
			<li><a href="<?php echo site_url()?>logout">Logout</a></li>
		</ul>
	</div>
</nav>


