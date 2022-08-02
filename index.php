<div class="container">
	<h3 class="text-center">Dependent Dropdown in Php Codeigniter</h3>
	<form method="post">
		<div class="col-md-12 mt-5">
			<select class="form-select" aria-label="Default select example" id="country">
				<option selected>Select Country</option>
				<?php foreach ($countrys as $country){?>
				<option value="<?=$country->c_id?>"><?= $country->country_name ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="col-md-12 mt-5">
			<select class="form-select" aria-label="Default select example" id="state">
				<option selected>Select State</option>
			</select>
		</div>
		<div class="col-md-12 mt-5">
			<select class="form-select" aria-label="Default select example" id="city">
				<option selected>Select City</option>
			</select>
		</div>
	</form>
</div>

<script>
	$(document).ready(function (){
		$('#country').change(function (){
			var c_id = $('#country').val();
			$.ajax({
				url:"<?php echo site_url('dependent_country/state'); ?>",
				data:{'c_id':c_id},
				type:'POST',
				async : true,
				dataType : 'json',
				success: function (state){
					var html = '';
					var level = '';
					var i;
					var x = 1;
					for(i=0; i<state.length; i++){
						html += '<option value='+state[i].s_id+'>'+state[i].state_name+'</option>';
					}

					$('#state').html(html);

				}
			});
		});

		$('#state').change(function (){
			var ci_id = $('#state').val();
			// alert(ci_id)
			$.ajax({
				url:"<?php echo site_url('dependent_country/city'); ?>",
				data:{'ci_id':ci_id},
				type:'POST',
				async : true,
				dataType : 'json',
				success: function (city_data){
					var city = '';
					var i;
					var x = 1;
					for(i=0; i<city_data.length; i++){
						city += '<option value='+city_data[i].ci_id+'>'+city_data[i].city_name+'</option>';
					}

					$('#city').html(city);

				}
			});
		});
	});
</script>
