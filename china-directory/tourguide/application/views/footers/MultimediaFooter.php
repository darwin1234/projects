
<script type="text/javascript"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript">


$(function(){
	
	$("#change_password").on("submit", function(e){
		var dataform=$(this).serialize();
		
		
		$.ajax({
			url: "<?php echo base_url();?>Welcome/changePasswordMultimedia",
			type: "POST",
			data: dataform,
			success: function(e){
				alert(e);
			},
			error: function(){
				alert("error");
			}
		});
		e.preventDefault();
	});
	
});


</script>

</body>
</html> 

