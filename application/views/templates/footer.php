<script type="text/javascript">

/* Check when user contact for particular job */
$('.contact-info').click(function(){
	var mesg = $('#contact_msg').val();
	if(mesg == ''){
		alert('Please write something to submit your query');
	}else{
		var formchecks = $('#form-priv').serialize();
		$.ajax({
			type : "POST",
			url: "<?php echo site_url();?>save_contact",
			data: formchecks,
			success: function(response) {
				location.reload();
			}
		});
	}
});

/* Check when user replay to user who have applied on his job */
$('.replay-info').click(function(){
	var mesg = $('#replay_msg').val();
	if(mesg == ''){
		alert('Please write something to submit your replay');
	}else{
		var formchecks = $('#form-discus').serialize();
		$.ajax({
			type : "POST",
			url: "<?php echo site_url();?>save_replay",
			data: formchecks,
			success: function(response) {
				location.reload();
			}
		});
	}
});
</script>


</body>
</html>                                		                            