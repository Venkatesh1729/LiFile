function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
	{
		alert("Enter Number");             
		return false;
	}
		return true;
}

function validatebirthform()
{
	var child_name = document.getElementById('child_name').value;
	var child_name_tamil = document.getElementById('child_name_tamil').value;
	var father_name = document.getElementById('father_name').value;
	var father_name_tamil = document.getElementById('father_name_tamil').value;
	var mother_name = document.getElementById('mother_name').value;
	var mother_name_tamil = document.getElementById('mother_name_tamil').value;
				
	if(document.getElementById('session_hosp_id').value=='')
	{			
		var birth_place = document.getElementById('birth_place').value;	
		var birth_hospital = document.getElementById('birth_hospital').value;
		var birth_place_tamil = document.getElementById('birth_place_tamil').value;
		var birth_hospital_tamil = document.getElementById('birth_hospital_tamil').value;
	}
	
	var informer_name = document.getElementById('informer_name').value;
	var informer_address1 = document.getElementById('informer_address1').value;
	var informer_address2 = document.getElementById('informer_address2').value;
	var informer_address_state = document.getElementById('informer_address_state').value;
	var informer_address3 = document.getElementById('informer_address3').value;
	var informer_name_tamil = document.getElementById('informer_name_tamil').value;
	var informer_address_tamil1 = document.getElementById('informer_address_tamil1').value;
	var informer_address_tamil2 = document.getElementById('informer_address_tamil2').value;
	var informer_address_tamil_state = document.getElementById('informer_address_tamil_state').value;
	var informer_address_tamil3 = document.getElementById('informer_address_tamil3').value;
	var permanent_mother_add_state = document.getElementById('permanent_mother_add_state').value;
	var permanent_mother_add_district = document.getElementById('permanent_mother_add_district').value;
	var permanent_mother_add_state_tamil = document.getElementById('permanent_mother_add_state_tamil').value;
	var permanent_mother_add1 = document.getElementById('permanent_mother_add1').value;
	var permanent_mother_add_district_tamil = document.getElementById('permanent_mother_add_district_tamil').value;	
	var permanent_mother_add_tamil1 = document.getElementById('permanent_mother_add_tamil1').value;
	var permanent_mother_townvillage = document.getElementById('permanent_mother_townvillage').value;
	var permanent_mother_town = document.getElementById('permanent_mother_town').value;
	var permanent_mother_townvillage_tamil = document.getElementById('permanent_mother_townvillage_tamil').value;
	var permanent_mother_town_tamil = document.getElementById('permanent_mother_town_tamil').value;
	var family_religion1 = document.getElementById('family_religion1').value;
	var family_religion2 = document.getElementById('family_religion2').value;
	var family_religion_tamil1 = document.getElementById('family_religion_tamil1').value;
	var family_religion_tamil2 = document.getElementById('family_religion_tamil2').value;	
	var mothers_edu_level_tamil = document.getElementById('mothers_edu_level_tamil').value;	
	var fathers_edu_level_tamil = document.getElementById('fathers_edu_level_tamil').value;
	var mothers_edu_level = document.getElementById('mothers_edu_level').value;
	var fathers_edu_level = document.getElementById('fathers_edu_level').value;
	var fathers_occupation = document.getElementById('fathers_occupation').value;
	var fathers_occupation_tamil = document.getElementById('fathers_occupation_tamil').value;
	var mothers_occupation = document.getElementById('mothers_occupation').value;
	var mothers_occupation_tamil = document.getElementById('mothers_occupation_tamil').value;	
	var ageattimeofmarriage = document.getElementById('ageattimeofmarriage').value;	
	var ageattimeofdelivery = document.getElementById('ageattimeofdelivery').value;
	var birth_order = document.getElementById('birth_order').value;
	var delivery_attention = document.getElementById('delivery_attention').value;
	var delivery_attention_tamil = document.getElementById('delivery_attention_tamil').value;
	var delivery_type = document.getElementById('delivery_type').value;
	var delivery_type_tamil = document.getElementById('delivery_type_tamil').value;	
	var childweight = document.getElementById('childweight').value;	
	var pregnancyduration = document.getElementById('pregnancyduration').value;
	var remarks = document.getElementById('remarks').value;
	var remarks_tamil = document.getElementById('remarks_tamil').value;

	/*if(document.getElementById('birth_registration_date').value < 0)
	{
		alert("Registration Date should not be less than today");
		document.getElementById('birth_registration_date').focus();
		return false;
	}*/

	if(child_name=="" && child_name_tamil=="")
	{
		alert("Please enter child name.");
		//document.getElementById('child_name').style.borderColor = '#FF0000';
		document.getElementById('child_name').focus();
		return false;
	}
	
	if(father_name=="" && father_name_tamil=="")
	{
		alert("Please enter father name.");
		//document.getElementById('father_name').style.borderColor = '#FF0000';
		document.getElementById('father_name').focus();
		return false;
	}
	
	if(mother_name=="" && mother_name_tamil=="")
	{
		alert("Please enter mother name.");
		//document.getElementById('mother_name').style.borderColor = '#FF0000';
		document.getElementById('mother_name').focus();
		return false;
	}
	
	if(document.getElementById('session_hosp_id').value=='')
	{	
		if(birth_place==""  && birth_place_tamil=="")
		{
			alert("Please enter birth place.");
			//document.getElementById('birth_place').style.borderColor = '#FF0000';
			document.getElementById('birth_place').focus();
			return false;
		}
		
	//	alert(birth_place); 
		if(birth_place=="HOSPITAL")
		{
			if(birth_hospital=="" &&  birth_hospital_tamil=="")
			{
				alert("Please enter birth hospital fields");
				//document.getElementById('birth_hospital').style.borderColor = '#FF0000';
				document.getElementById('birth_hospital').focus();
				return false;
			}
			if(birth_hospital!=birth_hospital_tamil)
			{
				alert("Hospitals should be same.");
				return false;
			}
		}	
		if(birth_place=="HOUSE" || birth_place_tamil=="HOUSE")
		{		
			if(document.getElementById('birth_address1').value=="" && document.getElementById('birth_address1').value=="")
			{
				alert("Please fill birth address1 fields");
				//document.getElementById('birth_address1').style.borderColor = '#FF0000';
				document.getElementById('birth_address1').focus();
				return false;
			}
			if(document.getElementById('birth_address2').value=="" && document.getElementById('birth_address_tamil2').value=="")
			{
				alert("Please fill birth address2 fields");
				//document.getElementById('birth_address2').style.borderColor = '#FF0000';
				document.getElementById('birth_address2').focus();
				return false;
			}
			if(document.getElementById('birth_address_state').value=="" && document.getElementById('birth_address_state_tamil').value=="")
			{
				alert("Please fill birth address state fields");
				//document.getElementById('birth_address_state').style.borderColor = '#FF0000';
				document.getElementById('birth_address_state').focus();
				return false;
			}
			if(document.getElementById('birth_address3').value=="" && document.getElementById('birth_address_tamil3').value=="")
			{
				alert("Please fill birth address2 fields");
				//document.getElementById('birth_address3').style.borderColor = '#FF0000';
				document.getElementById('birth_address3').focus();
				return false;
			}	
		}	
	}
	
	if(document.getElementById('permanent_address').value=="" && document.getElementById('permanent_address_tamil1').value=="")
	{
		alert("Please fill permanent address fields");
		//document.getElementById('permanent_address').style.borderColor = '#FF0000';
		document.getElementById('permanent_address').focus();
		return false;
	}
	if(document.getElementById('permanent_address2').value=="" && document.getElementById('permanent_address_tamil2').value=="")
	{
		alert("Please fill permanent address2 fields");
		//document.getElementById('permanent_address2').style.borderColor = '#FF0000';
		document.getElementById('permanent_address2').focus();
		return false;
	}
	if(document.getElementById('permanent_address_state').value=="" && document.getElementById('permanent_address_state_tamil').value=="")
	{
		alert("Please fill permanent address state fields");
		//document.getElementById('permanent_address_state').style.borderColor = '#FF0000';
		document.getElementById('permanent_address_state').focus();
		return false;
	}

	if(document.getElementById('permanent_address3').value=="" && document.getElementById('permanent_address_tamil3').value=="")
	{
		alert("Please fill permanent address3 fields");
		//document.getElementById('permanent_address3').style.borderColor = '#FF0000';
		document.getElementById('permanent_address3').focus();
		return false;
	}
	if(document.getElementById('parent_addr_at_childbirth1').value=="" && document.getElementById('parent_addr_at_childbirth_tamil1').value=="")
	{
		alert("Please fill parent address at childbirth fields");
		//document.getElementById('parent_addr_at_childbirth1').style.borderColor = '#FF0000';
		document.getElementById('parent_addr_at_childbirth1').focus();
		return false;
	}
	if(document.getElementById('parent_addr_at_childbirth2').value=="" && document.getElementById('parent_addr_at_childbirth_tamil2').value=="")
	{
		alert("Please fill parent address at childbirth2 fields");
		//document.getElementById('parent_addr_at_childbirth2').style.borderColor = '#FF0000';
		document.getElementById('parent_addr_at_childbirth2').focus();
		return false;
	}
	if(document.getElementById('parent_addr_at_childbirth_state').value=="" && document.getElementById('parent_addr_at_childbirth_state_tamil').value=="")
	{
		alert("Please fill parent address at childbirth2 fields");
		//document.getElementById('parent_addr_at_childbirth_state').style.borderColor = '#FF0000';
		document.getElementById('parent_addr_at_childbirth_state').focus();
		return false;
	}
	if(document.getElementById('parent_addr_at_childbirth3').value=="" && document.getElementById('parent_addr_at_childbirth_tamil3').value=="")
	{
		alert("Please fill parent address at childbirth3 fields");
		//document.getElementById('parent_addr_at_childbirth3').style.borderColor = '#FF0000';
		document.getElementById('parent_addr_at_childbirth3').focus();
		return false;
	}

	if(informer_name=="" && informer_name_tamil=="")
	{
		alert("Please fill informer name fields");
		//document.getElementById('informer_name').style.borderColor = '#FF0000';
		document.getElementById('informer_name').focus();
		return false;
	}	
	if(informer_address1=="" && informer_address_tamil1=="")
	{
		alert("Please fill informer address1 fields");
		//document.getElementById('informer_address1').style.borderColor = '#FF0000';
		document.getElementById('informer_address1').focus();
		return false;
	}
	if(informer_address2=="" && informer_address_tamil2=="")
	{
		alert("Please fill informer address2 fields");
		//document.getElementById('informer_address2').style.borderColor = '#FF0000';
		document.getElementById('informer_address2').focus();
		return false;
	}
	if(informer_address_state=="" && informer_address_tamil_state=="")
	{
		alert("Please fill informer address state fields");
		//document.getElementById('informer_address_state').style.borderColor = '#FF0000';
		document.getElementById('informer_address_state').focus();
		return false;
	}
	if(informer_address3=="" && informer_address_tamil3=="")
	{
		alert("Please fill informer address state fields");
		//document.getElementById('informer_address3').style.borderColor = '#FF0000';
		document.getElementById('informer_address3').focus();
		return false;
	}

	if(permanent_mother_add_state=="" && permanent_mother_add_state_tamil=="")
	{
		alert("Please fill permanent mother add state fields");
		//document.getElementById('permanent_mother_add_state').style.borderColor = '#FF0000';
		document.getElementById('permanent_mother_add_state').focus();
		return false;
	}
	
	if(permanent_mother_add_district=="" && permanent_mother_add_district_tamil=="")
	{
		alert("Please fill permanent mother add district fields");
		//document.getElementById('permanent_mother_add_district').style.borderColor = '#FF0000';
		document.getElementById('permanent_mother_add_district').focus();
		return false;
	}

	if(permanent_mother_add1=="" && permanent_mother_add_tamil1=="")
	{
		alert("Please fill permanent mother address fields");
		//document.getElementById('permanent_mother_add1').style.borderColor = '#FF0000';
		document.getElementById('permanent_mother_add1').focus();
		return false;
	}

	if(permanent_mother_townvillage=="" && permanent_mother_townvillage_tamil=="")
	{
		alert("Please select fields.");
		//document.getElementById('permanent_mother_townvillage').style.borderColor = '#FF0000';
		document.getElementById('permanent_mother_townvillage').focus();
		return false;
	}
	if(permanent_mother_town=="" && permanent_mother_town_tamil=="")
	{
		alert("Please select Religion of the Family.");
		//document.getElementById('permanent_mother_town').style.borderColor = '#FF0000';
		document.getElementById('permanent_mother_town').focus();
		return false;
	}

	if((family_religion1=="" && family_religion_tamil1==""))
	{
		alert("Please enter Religion of the Family.");
		//document.getElementById('family_religion1').style.borderColor = '#FF0000';
		document.getElementById('family_religion1').focus();
		return false;
	}
	
	if((family_religion2=="" && family_religion_tamil2==""))
	{
		alert("Please select Religion of the Family.");
		//document.getElementById('family_religion2').style.borderColor = '#FF0000';
		document.getElementById('family_religion2').focus();
		return false;
	}

	if((fathers_edu_level=="" && fathers_edu_level_tamil==""))
	{
		alert("Please select Literacy Status of the Father.");
		//document.getElementById('fathers_edu_level').style.borderColor = '#FF0000';
		document.getElementById('fathers_edu_level').focus();
		return false;
	}
	
	if((mothers_edu_level=="" && mothers_edu_level_tamil==""))
	{
		alert("Please select Literacy Status of the Mother.");
		//document.getElementById('mothers_edu_level').style.borderColor = '#FF0000';
		document.getElementById('mothers_edu_level').focus();
		return false;
	}
	
	if((fathers_occupation=="" && fathers_occupation_tamil==""))
	{
		alert("Please select Occupation of the Father.");
		//document.getElementById('fathers_occupation').style.borderColor = '#FF0000';
		document.getElementById('fathers_occupation').focus();
		return false;
	}
	if((mothers_occupation=="" && mothers_occupation_tamil==""))
	{
		alert("Please select Occupation of the Mother.");
		//document.getElementById('mothers_occupation').style.borderColor = '#FF0000';
		document.getElementById('mothers_occupation').focus();
		return false;
	}	
	if(ageattimeofmarriage=="" )
	{
		alert("Please enter Age of the Mother @ the time of  Marriage.");
		//document.getElementById('ageattimeofmarriage').style.borderColor = '#FF0000';
		document.getElementById('ageattimeofmarriage').focus();
		return false;
	}
	if(ageattimeofdelivery=="" )
	{
		alert("Please enter Age of the Mother @ the time  of Delivery.");
		//document.getElementById('ageattimeofdelivery').style.borderColor = '#FF0000';
		document.getElementById('ageattimeofdelivery').focus();
		return false;
	}
	if(birth_order=="" )
	{
		alert("Please enter Birth Order.");
		//document.getElementById('birth_order').style.borderColor = '#FF0000';
		document.getElementById('birth_order').focus();
		return false;
	}
	if((delivery_attention=="" && delivery_attention_tamil==""))
	{
		alert("Please enter Delivery Attention.");
		//document.getElementById('delivery_attention').style.borderColor = '#FF0000';
		document.getElementById('delivery_attention').focus();
		return false;
	}
	if((delivery_type=="" && delivery_type_tamil==""))
	{
		alert("Please enter Delivery Type.");
		//document.getElementById('delivery_type').style.borderColor = '#FF0000';
		document.getElementById('delivery_type').focus();
		return false;
	}
	if(childweight=="" )
	{
		alert("Please enter Child Weight.");
		//document.getElementById('childweight').style.borderColor = '#FF0000';
		document.getElementById('childweight').focus();
		return false;
	}
	if(pregnancyduration=="" )
	{
		alert("Please enter Pregnancy Duration.");
		//document.getElementById('pregnancyduration').style.borderColor = '#FF0000';
		document.getElementById('pregnancyduration').focus();
		return false;
	}
	if((remarks=="" && remarks_tamil==""))
	{
		alert("Please enter remarks.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('remarks').focus();
		return false;
	}
	return true;
}


function validatedeathform()
{
	alert("asds");
	
	var person_name = document.getElementById('person_name').value;
	var person_name_tamil = document.getElementById('person_name_tamil').value;
	var gender = document.getElementById('gender').value;
	var gender_tamil = document.getElementById('gender_tamil').value;
	var age_select = document.getElementById('age_select').value;
	var age = document.getElementById('age').value;
	
	if(document.getElementById('session_hosp_id').value=='')
	{	
		var death_place = document.getElementById('death_place').value;
		var death_place_tamil = document.getElementById('death_place_tamil').value;
		var death_hospital = document.getElementById('death_hospital').value;
		var death_hospital_tamil = document.getElementById('death_hospital_tamil').value;	
	}	
	
	/*var address_no1 = document.getElementById('address_no1').value;
	var address_no1_tamil = document.getElementById('address_no1_tamil').value;
	var address_no2 = document.getElementById('address_no2').value;
	var address_no2_tamil = document.getElementById('address_no2_tamil').value;
	var address_no3_state = document.getElementById('address_no3_state').value;
	var address_no3_state_tamil = document.getElementById('address_no3_state_tamil').value;
	var address_no4 = document.getElementById('address_no4').value;
	var address_no4_tamil = document.getElementById('address_no4_tamil').value;	*/
	var permanent_address1 = document.getElementById('permanent_address1').value;
	var permanent_address1_tamil = document.getElementById('permanent_address1_tamil').value;
	var permanent_address2 = document.getElementById('permanent_address2').value;
	var permanent_address2_tamil = document.getElementById('permanent_address2_tamil').value;
	var permanent_address3_state = document.getElementById('permanent_address3_state').value;
	var permanent_address3_state_tamil = document.getElementById('permanent_address3_state_tamil').value;
	var permanent_address4 = document.getElementById('permanent_address4').value;
	var permanent_address4_tamil = document.getElementById('permanent_address4_tamil').value;
	var deceased_address1 = document.getElementById('deceased_address1').value;
	var deceased_address1_tamil = document.getElementById('deceased_address1_tamil').value;
	var deceased_address2 = document.getElementById('deceased_address2').value;
	var deceased_address2_tamil = document.getElementById('deceased_address2_tamil').value;
	var deceased_address3_state = document.getElementById('deceased_address3_state').value;
	var deceased_address3_state_tamil = document.getElementById('deceased_address3_state_tamil').value;
	var deceased_address4 = document.getElementById('deceased_address4').value;
	var deceased_address4_tamil = document.getElementById('deceased_address4_tamil').value;	
	var permanent_address1 = document.getElementById('permanent_address1').value;
	var permanent_address1_tamil = document.getElementById('permanent_address1_tamil').value;
	var permanent_address2 = document.getElementById('permanent_address2').value;
	var permanent_address2_tamil = document.getElementById('permanent_address2_tamil').value;
	var permanent_address3_state = document.getElementById('permanent_address3_state').value;
	var permanent_address3_state_tamil = document.getElementById('permanent_address3_state_tamil').value;
	var permanent_address4 = document.getElementById('permanent_address4').value;
	var permanent_address4_tamil = document.getElementById('permanent_address4_tamil').value;
	var informer_name = document.getElementById('informer_name').value;
	var informer_name_tamil = document.getElementById('informer_name_tamil').value;
	var informer_address1 = document.getElementById('informer_address1').value;
	var informer_address1_tamil = document.getElementById('informer_address1_tamil').value;
	var informer_address2 = document.getElementById('informer_address2').value;
	var informer_address3_state = document.getElementById('informer_address3_state').value;
	var informer_address3_tamil_state = document.getElementById('informer_address3_tamil_state').value;
	var informer_address4 = document.getElementById('informer_address4').value;	
	var informer_address4_tamil = document.getElementById('informer_address4_tamil').value;	
	var mother_name = document.getElementById('mother_name').value;
	var mother_name_tamil = document.getElementById('mother_name_tamil').value;
	var father_name = document.getElementById('father_name').value;
	var father_name_tamil = document.getElementById('father_name_tamil').value;
	var husband_name = document.getElementById('husband_name').value;
	var husband_name_tamil = document.getElementById('husband_name_tamil').value;
	var deceased_residence_state = document.getElementById('deceased_residence_state').value;
	var deceased_residence_state_tamil = document.getElementById('deceased_residence_state_tamil').value;	
	var deceased_residence_district = document.getElementById('deceased_residence_district').value;	
	var deceased_residence_district_tamil = document.getElementById('deceased_residence_district_tamil').value;	
	var deceased_residence_address1 = document.getElementById('deceased_residence_address1').value;
	var deceased_residence_address1_tamil = document.getElementById('deceased_residence_address1_tamil').value;
	var deceased_residence_townvillage = document.getElementById('deceased_residence_townvillage').value;
	var deceased_residence_townvillage_tamil = document.getElementById('deceased_residence_townvillage_tamil').value;
	var deceased_residence_town = document.getElementById('deceased_residence_town').value;
	var deceased_residence_town_tamil = document.getElementById('deceased_residence_town_tamil').value;
	var deceased_religion1 = document.getElementById('deceased_religion1').value;
	var deceased_religion_tamil1 = document.getElementById('deceased_religion_tamil1').value;	
	var deceased_religion2 = document.getElementById('deceased_religion2').value;	
	var deceased_religion_tamil2 = document.getElementById('deceased_religion_tamil2').value;	
	var occupation = document.getElementById('occupation').value;
	var occupation_tamil = document.getElementById('occupation_tamil').value;
	var medical_attention = document.getElementById('medical_attention').value;
	var medical_attention_tamil = document.getElementById('medical_attention_tamil').value;
	var medical_certified = document.getElementById('medical_certified').value;
	var medical_certified_tamil = document.getElementById('medical_certified_tamil').value;
	var maternal_death = document.getElementById('maternal_death').value;
	var maternal_death_tamil = document.getElementById('maternal_death_tamil').value;	
	var death_cause = document.getElementById('death_cause').value;	
	var death_cause_tamil = document.getElementById('death_cause_tamil').value;	
	var smoke = document.getElementById('smoke').value;
	var smoke_tamil = document.getElementById('smoke_tamil').value;
	var txtsmokeyear = document.getElementById('txtsmokeyear').value;
	var txtsmokeyear_tamil = document.getElementById('txtsmokeyear_tamil').value;
	var tobacco = document.getElementById('tobacco').value;
	var txttobaccoyear = document.getElementById('txttobaccoyear').value;
	var tobacco_tamil = document.getElementById('tobacco_tamil').value;
	var txttobaccoyear_tamil = document.getElementById('txttobaccoyear_tamil').value;	
	var arecanut = document.getElementById('arecanut').value;	
	var txtarecanutyear = document.getElementById('txtarecanutyear').value;		
	var arecanut_tamil = document.getElementById('arecanut_tamil').value;
	var txtarecanutyear_tamil = document.getElementById('txtarecanutyear_tamil').value;	
	var alcohol = document.getElementById('alcohol').value;	
	var txtalcholyear = document.getElementById('txtalcholyear').value;
	var alcohol_tamil = document.getElementById('alcohol_tamil').value;	
	var txtalcholyear_tamil = document.getElementById('txtalcholyear_tamil').value;		
	var remarks = document.getElementById('remarks').value;
	var remarks_tamil = document.getElementById('remarks_tamil').value;	
		
	if(person_name=="" && person_name_tamil=="")
	{
		alert("Please enter Name.");
		//document.getElementById('person_name').style.borderColor = '#FF0000';
		//document.getElementById('person_name_tamil').style.borderColor = '#FF0000';
		document.getElementById('person_name').focus();
		return false;
	}
	//return false;
	if(gender=="" && gender_tamil=="")
	{
		alert("Please select gender.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('gender').focus();
		return false;
	}
	
	if(age_select=="")
	{
		alert("Please select age years.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('age_select').focus();
		return false;
	}
	if(age=="" )
	{
		alert("Please enter age.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('age').focus();
		return false;
	}
	
	if(document.getElementById('session_hosp_id').value=='')
	{	
		if(death_place=="" && death_place_tamil=="")
		{
			alert("Please enter death place.");
			//document.getElementById('remarks').style.borderColor = '#FF0000';
			document.getElementById('death_place').focus();
			return false;
		}
		
		if(death_place=="HOSPITAL")
		{			  
			if(death_hospital=="" && death_hospital_tamil=="")
			{
				alert("Please select hospital.");
				//document.getElementById('remarks').style.borderColor = '#FF0000';
				document.getElementById('death_hospital').focus();
				return false;
			}		
		}
		if(death_place=="HOUSE")
		{
			if(address_no1=="" && address_no1_tamil=="")
			{
				alert("Please enter address.");
				//document.getElementById('remarks').style.borderColor = '#FF0000';
				document.getElementById('address_no1').focus();
				return false;
			}
			
			if(address_no2=="" && address_no2_tamil=="")
			{
				alert("Please enter address.");
				//document.getElementById('remarks').style.borderColor = '#FF0000';
				document.getElementById('address_no2').focus();
				return false;
			}
			if(address_no3_state=="" && address_no3_state_tamil=="")
			{
				alert("Please select state.");
				//document.getElementById('remarks').style.borderColor = '#FF0000';
				document.getElementById('address_no3_state').focus();
				return false;
			}
			if(address_no4=="" && address_no4_tamil=="")
			{
				alert("Please enter address.");
				//document.getElementById('remarks').style.borderColor = '#FF0000';
				document.getElementById('address_no4').focus();
				return false;
			}
		}
	}
	
	if(permanent_address1=="" && permanent_address1_tamil=="")
	{
		alert("Please enter permanent address1.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address1').focus();
		return false;
	}
	if(permanent_address2=="" && permanent_address2_tamil=="")
	{
		alert("Please enter permanent address2.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address2').focus();
		return false;
	}
	if(permanent_address3_state=="" && permanent_address3_state_tamil=="")
	{
		alert("Please select state.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address3_state').focus();
		return false;
	}
	if(permanent_address4=="" && permanent_address4_tamil=="")
	{
		alert("Please enter address.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address4').focus();
		return false;
	}
	if(deceased_address1=="" && deceased_address1_tamil=="")
	{
		alert("Please enter deceased address1.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_address1').focus();
		return false;
	}
	if(deceased_address2=="" && deceased_address2_tamil=="")
	{
		alert("Please enter deceased address2.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_address2').focus();
		return false;
	}
	if(deceased_address3_state=="" && deceased_address3_state_tamil=="")
	{
		alert("Please enter state.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_address3_state').focus();
		return false;
	}
	if(deceased_address4=="" && deceased_address4_tamil=="")
	{
		alert("Please enter deceased address4.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_address4').focus();
		return false;
	}
	if(permanent_address1=="" && permanent_address1_tamil=="")
	{
		alert("Please enter permanent address1.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address1').focus();
		return false;
	}
	if(permanent_address2=="" && permanent_address2_tamil=="")
	{
		alert("Please enter permanent address2.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address2').focus();
		return false;
	}
	if(permanent_address3_state=="" && permanent_address3_state_tamil=="")
	{
		alert("Please enter state.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address3_state').focus();
		return false;
	}
	if(permanent_address4=="" && permanent_address4_tamil=="")
	{
		alert("Please enter permanent address4.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('permanent_address4').focus();
		return false;
	}
	if(informer_name=="" && informer_name_tamil=="")
	{
		alert("Please enter informer_name.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('informer_name').focus();
		return false;
	}
	if(informer_address1=="" && informer_address1_tamil=="")
	{
		alert("Please enter informe address1.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('informer_address1').focus();
		return false;
	}
	if(informer_address2=="" && informer_address2_tamil=="")
	{
		alert("Please enter informer address2.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('informer_address2').focus();
		return false;
	}
	if(informer_address3_state=="" && informer_address3_tamil_state=="")
	{
		alert("Please select state.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('informer_address3_state').focus();
		return false;
	}
	if(informer_address4=="" && informer_address4_tamil=="")
	{
		alert("Please enter informer address4.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('informer_address4').focus();
		return false;
	}
	if(mother_name=="" && mother_name_tamil=="")
	{
		alert("Please enter mother name.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('mother_name').focus();
		return false;
	}
	if(father_name=="" && father_name_tamil=="")
	{
		alert("Please enter father name.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('father_name').focus();
		return false;
	}
	if(husband_name=="" && husband_name_tamil=="")
	{
		alert("Please enter husband name.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('husband_name').focus();
		return false;
	}
	if(deceased_residence_state=="" && deceased_residence_state_tamil=="")
	{
		alert("Please select state.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_residence_state').focus();
		return false;
	}
	if(deceased_residence_district=="" && deceased_residence_district_tamil=="")
	{
		alert("Please select deceased residence district.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_residence_district').focus();
		return false;
	}
	if(deceased_residence_address1=="" && deceased_residence_address1_tamil=="")
	{
		alert("Please enter deceased residence address1.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_residence_address1').focus();
		return false;
	}
	if(deceased_residence_townvillage=="" && deceased_residence_townvillage_tamil=="")
	{
		alert("Please select town.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_residence_townvillage').focus();
		return false;
	}
	if(deceased_residence_town=="" && deceased_residence_town_tamil=="")
	{
		alert("Please select town.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_residence_town').focus();
		return false;
	}
	if(deceased_religion1=="" && deceased_religion_tamil1=="")
	{
		alert("Please select religion.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_religion1').focus();
		return false;
	}
	if(husband_name=="" && husband_name_tamil=="")
	{
		alert("Please enter husband name.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('husband_name').focus();
		return false;
	}
	if(deceased_residence_state=="" && deceased_residence_state_tamil=="")
	{
		alert("Please select state.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_residence_state').focus();
		return false;
	}
	if(deceased_residence_district=="" && deceased_residence_district_tamil=="")
	{
		alert("Please select deceased residence district.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_residence_district').focus();
		return false;
	}
	if(deceased_religion2=="" && deceased_religion_tamil2=="")
	{
		alert("Please enter deceased_religion2.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('deceased_religion2').focus();
		return false;
	}
	if(occupation=="" && occupation_tamil=="")
	{
		alert("Please select occupation.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('occupation').focus();
		return false;
	}
	if(medical_attention=="" && medical_attention_tamil=="")
	{
		alert("Please select medical attention.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('medical_attention').focus();
		return false;
	}
	if(medical_certified=="" && medical_certified_tamil=="")
	{
		alert("Please select medical certified.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('medical_certified').focus();
		return false;
	}
	if(maternal_death=="" && maternal_death_tamil=="")
	{
		alert("Please enter maternal death.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('maternal_death').focus();
		return false;
	}
	if(death_cause=="" && death_cause_tamil=="")
	{
		alert("Please select death cause.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('death_cause').focus();
		return false;
	}
	if(smoke=="" && smoke_tamil=="")
	{
		alert("Please select smoke.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('smoke').focus();
		return false;
	}
	if(txtsmokeyear=="" && txtsmokeyear_tamil=="")
	{
		alert("Please select smoke year.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('txtsmokeyear').focus();
		return false;
	}
	if(tobacco=="" && tobacco_tamil=="")
	{
		alert("Please enter tobacco.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('tobacco').focus();
		return false;
	}
	if(txttobaccoyear=="" && txttobaccoyear_tamil=="")
	{
		alert("Please select tobacco year.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('txttobaccoyear').focus();
		return false;
	}
	if(arecanut=="" && arecanut_tamil=="")
	{
		alert("Please select arecanut.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('arecanut').focus();
		return false;
	}
	if(txtarecanutyear=="" && txtarecanutyear_tamil=="")
	{
		alert("Please select arecanut year.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('txtarecanutyear').focus();
		return false;
	}
	if(alcohol=="" && alcohol_tamil=="")
	{
		alert("Please enter alcohol.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('alcohol').focus();
		return false;
	}
	if(txtalcholyear=="" && txtalcholyear_tamil=="")
	{
		alert("Please select alcohol year.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('txtalcholyear').focus();
		return false;
	}
	if(remarks=="" && remarks_tamil=="")
	{
		alert("Please select remarks.");
		//document.getElementById('remarks').style.borderColor = '#FF0000';
		document.getElementById('remarks').focus();
		return false;
	}
	return true;
}

function validatecommform()
{
	var diseases_type = document.getElementById('diseases_type').value;
	var diseases_type_tamil = document.getElementById('diseases_type_tamil').value;
	var patient_type = document.getElementById('patient_type').value;
	var patient_type_tamil = document.getElementById('patient_type_tamil').value;
	var patient_name = document.getElementById('patient_name').value;
	var patient_name_tamil = document.getElementById('patient_name_tamil').value;
	var patient_address1 =  document.getElementById('patient_address1').value;
	var patient_address2 =  document.getElementById('patient_address2').value;
	var patient_address_state =  document.getElementById('patient_address_state').value;
	var patient_address3 =  document.getElementById('patient_address3').value;
	var patient_address_tamil1 =  document.getElementById('patient_address_tamil1').value;
	var patient_address_tamil2 =  document.getElementById('patient_address_tamil2').value;
	var patient_address_state_tamil =  document.getElementById('patient_address_state_tamil').value;
	var patient_address_tamil3 =  document.getElementById('patient_address_tamil3').value;
	var contactno = document.getElementById('contactno').value;
	var patient_gender = document.getElementById('patient_gender').value;
	var patient_gendert = document.getElementById('patient_gendert').value;
	var age = document.getElementById('age').value;
	var reporting_date = document.getElementById('reporting_date').value;

	if(diseases_type=="" && diseases_type_tamil=="")
	{
		alert("Please Select Diseases Type.");
		return false;
	}
	if(patient_type=="" && patient_type_tamil=="")
	{
		alert("Please select patient type.");
		return false;
	}
	if(patient_name=="" && patient_name_tamil=="")
	{
		alert("Please select patient name.");
		return false;
	}
	if(patient_address1=="" && patient_address_tamil1=="")
	{
		alert("Please enter address.");
		return false;
	}
	if(patient_address2=="" && patient_address_tamil2=="")
	{
		alert("Please enter address.");
		return false;
	}
	if(patient_address_state=="" && patient_address_state_tamil=="")
	{
		alert("Please enter address.");
		return false;
	}
	if(patient_address3=="" && patient_address_tamil3=="")
	{
		alert("Please enter address.");
		return false;
	}
	if(contactno=="")
	{
		alert("Please enter contact no");
		return false;
	}
	if(patient_gender=="" && patient_gendert=="")
	{
		alert("Please enter gender.");
		return false;
	}
	if(age=="")
	{
		alert("Please enter age");
		return false;
	}
	if(reporting_date=="")
	{
		alert("Please enter reporting date");
		return false;
	}
	return true;
	
}