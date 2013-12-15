// JavaScript Document
		function getzone_id(zone_id)
		{
			if(zone_id!="")
			{
				$.post("ajax_data.php?zone_id="+zone_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#ward').html(data);
				   } else {
				   }
				});	
			}
		}
		function getward_id(ward_id)
		{
			if(ward_id!="")
			{
				$.post("ajax_data.php?ward_id="+ward_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#oldward').html(data);
				   } else {
				   }
				});	
			}
		}
		<!--------------------------------------------------------------------------------------->
		function getstate_id(state_id)
		{
			if(state_id!="")
			{
				$.post("ajax_data.php?state_id="+state_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#permanent_mother_add_district').html(data);
				   } else {
				   }
				});	
			}
		}
		
		function getstate_tamil_id(state_tamil_id)
		{
			if(state_tamil_id!="")
			{
				$.post("ajax_data.php?state_tamil_id="+state_tamil_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#permanent_mother_add_district_tamil').html(data);
				   } else {
				   }
				});	
			}
		}
		function getstatedeath_id(state_death_id)
		{	//alert(state_death_id);
			if(state_death_id!="")
			{
				$.post("ajax_data.php?state_death_id="+state_death_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#deceased_residence_district').html(data);
				   } else {
				   }
				});	
			}
		}
		function getstatetamildeath_id(state_tdeath_id)
		{	//alert(state_death_id);
			if(state_tdeath_id!="")
			{
				$.post("ajax_data.php?state_tdeath_id="+state_tdeath_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#deceased_residence_district_tamil').html(data);
				   } else {
				   }
				});	
			}
		}
		
		<!---------------------------------------------------------------------------------------------------->
		function getdistrict_id(dist_id)
		{
			if(dist_id!="")
			{
				$.post("ajax_data.php?dist_id="+dist_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#permanent_mother_town').html(data);
				   } else {
				   }
				});	
			}
		}
		function getdistrict_death_id(distdeath_id)
		{
			if(distdeath_id!="")
			{
				$.post("ajax_data.php?distdeath_id="+distdeath_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#deceased_residence_town').html(data);
				   } else {
				   }
				});	
			}
		}
		function getdistricttamil_death_id(disttdeath_id)
		{
			if(disttdeath_id!="")
			{
				$.post("ajax_data.php?disttdeath_id="+disttdeath_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#deceased_residence_town_tamil').html(data);
				   } else {
				   }
				});	
			}
		}
		
		function getdistricttamil_id(distttamil_id)
		{
			if(distttamil_id!="")
			{	//alert(distttamil_id)
				$.post("ajax_data.php?distttamil_id="+distttamil_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {
					   $('#permanent_mother_town_tamil').html(data);
				   } else {
				   }
				});	
			}
		}
		function getbirth_place_id(birthplace_id)
		{
			if(birthplace_id=="HOSPITAL")
			{	//alert(distttamil_id)
				var zone_id = $("#zone").val();
				$.post("ajax_data.php?birthplace_id="+birthplace_id+"&hosp_zone_id="+zone_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {	
				   	   $('#birth_hospital').show();
					   $('#birth_hospital').html(data);
				   } else {
				   }
				});	
				
				
			} else if(birthplace_id=="HOUSE")
			{
				$('#birth_hospital').hide();
				
				$('#birthadd').show();
				$('#hospital_div_code').val('');
				$('#hospital_add1').val('');
				$('#hospital_add2').val('');
				$('#hospital_add3').val('');
				$('#hospital_pincode').val('');
				$('#hospital_add1_tamil').val('');
				$('#hospital_add2_tamil').val('');
				$('#hospital_add3_tamil').val('');
			}
		}
		function getbirth_place_id_tamil(birthtplace_id)
		{
			if(birthtplace_id=="HOSPITAL")
			{	//alert(distttamil_id)
				var zone_id = $("#zone").val();
				$.post("ajax_data.php?birthtplace_id="+birthtplace_id+"&hospt_zone_id="+zone_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {	
				   	   $('#birth_hospital_tamil').show();
					   $('#birth_hospital_tamil').html(data);
				   } else {
				   }
				});	
			}else if(birthtplace_id=="HOUSE")
			{
				$('#birth_hospital_tamil').hide();
				
				$('#birthadd').show();
			}
		}			
		
		function gethospital_id(hospital_id)
		{
			if(hospital_id!="")
			{	//alert(distttamil_id)
				$.post("ajax_data.php?hospital_id="+hospital_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {	
				   	   var mySplitResult = data.split("^%$#@*&^");
						//alert(mySplitResult);
					   $('#hospital_div_code').val(mySplitResult[0]);	
					   $('#hospital_add1').val(mySplitResult[1]);
					   $('#hospital_add2').val(mySplitResult[2]);
					   $('#hospital_add3').val(mySplitResult[3]);					   
					   $('#hospital_pincode').val(mySplitResult[4]);	
					   $('#hospital_add1_tamil').val(mySplitResult[5]);
					   $('#hospital_add2_tamil').val(mySplitResult[6]);
					   $('#hospital_add3_tamil').val(mySplitResult[7]);
					   
					  /* $('#birth_address1').attr("disabled", "disabled");
					   $('#birth_address2').attr("disabled", "disabled");					   
					   $('#birth_address_state').attr("disabled", "disabled");
					   $('#birth_address3').attr("disabled", "disabled");
					   $('#birth_address_tamil1').attr("disabled", "disabled");
					   $('#birth_address_tamil2').attr("disabled", "disabled");					   
					   $('#birth_address_state_tamil').attr("disabled", "disabled");
					   $('#birth_address_tamil3').attr("disabled", "disabled");*/
					   $('#birthadd').hide();
				   } else {
				   }
				});	
			}
		}
		function gethospitaltamil_id(hospitaltamil_id)
		{
			if(hospitaltamil_id!="")
			{	//alert(distttamil_id)
				$.post("ajax_data.php?hospitaltamil_id="+hospitaltamil_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {	
				   	   var mySplitResult = data.split("^%$#@*&^");
						//alert(mySplitResult);
					   $('#hospital_div_code').val(mySplitResult[0]);	
					   $('#hospital_add1').val(mySplitResult[1]);
					   $('#hospital_add2').val(mySplitResult[2]);
					   $('#hospital_add3').val(mySplitResult[3]);					   
					   $('#hospital_pincode').val(mySplitResult[4]);	
					   $('#hospital_add1_tamil').val(mySplitResult[5]);
					   $('#hospital_add2_tamil').val(mySplitResult[6]);
					   $('#hospital_add3_tamil').val(mySplitResult[7]);
					   
					  /* $('#birth_address1').attr("disabled", "disabled");
					   $('#birth_address2').attr("disabled", "disabled");					   
					   $('#birth_address_state').attr("disabled", "disabled");
					   $('#birth_address3').attr("disabled", "disabled");
					   $('#birth_address_tamil1').attr("disabled", "disabled");
					   $('#birth_address_tamil2').attr("disabled", "disabled");					   
					   $('#birth_address_state_tamil').attr("disabled", "disabled");
					   $('#birth_address_tamil3').attr("disabled", "disabled");*/
					   $('#birthadd').hide();
				   } else {
				   }
				});	
			}
		}
		function getdeath_place_id(deathplace_id)
		{	//alert(deathplace_id)
			if(deathplace_id=="HOSPITAL")
			{	
				var zone_id = $("#zone").val();
				$.post("ajax_data.php?deathplace_id="+deathplace_id+"&death_zone_id="+zone_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {	
				   	   $('#death_hospital').show();
					   $('#death_hospital').html(data);
				   } else {
				   }
				});	
			} else {
				$('#death_hospital').hide();
				
				$('#deathadd').show();
			}
		}
		
		function getdeath_place_id_tamil(deathplaceta_id)
		{	//alert(deathplace_id)
			if(deathplaceta_id=="HOSPITAL")
			{	
				var zone_id = $("#zone").val();
				$.post("ajax_data.php?deathplace_id="+deathplaceta_id+"&deathta_zone_id="+zone_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {	
				   	   $('#death_hospital_tamil').show();
					   $('#death_hospital_tamil').html(data);
				   } else {
				   }
				});	
			} else {
				$('#death_hospital_tamil').hide();
				
				$('#deathadd').show();
			}
		}
		
		function getdeathhospital_id(hospitaldeath_id)
		{
			if(hospitaldeath_id!="")
			{	//alert(distttamil_id)
				$.post("ajax_data.php?hospitaldeath_id="+hospitaldeath_id,
				function(data)
				{	//alert(data);
				   if(data!=0)
				   {	
				   	   var mySplitResult = data.split("^%$#@*&^");
						//alert(mySplitResult);
					   $('#hospital_div_code').val(mySplitResult[0]);	
					   $('#hospital_add1').val(mySplitResult[1]);
					   $('#hospital_add2').val(mySplitResult[2]);
					   $('#hospital_add3').val(mySplitResult[3]);					   
					   $('#hospital_pincode').val(mySplitResult[4]);	
					   $('#hospital_add1_tamil').val(mySplitResult[5]);
					   $('#hospital_add2_tamil').val(mySplitResult[6]);
					   $('#hospital_add3_tamil').val(mySplitResult[7]);
					   
					  /* $('#birth_address1').attr("disabled", "disabled");
					   $('#birth_address2').attr("disabled", "disabled");					   
					   $('#birth_address_state').attr("disabled", "disabled");
					   $('#birth_address3').attr("disabled", "disabled");
					   $('#birth_address_tamil1').attr("disabled", "disabled");
					   $('#birth_address_tamil2').attr("disabled", "disabled");					   
					   $('#birth_address_state_tamil').attr("disabled", "disabled");
					   $('#birth_address_tamil3').attr("disabled", "disabled");*/
					   $('#deathadd').hide();
				   } else {
				   }
				});	
			}
		}