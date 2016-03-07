function RestAPI()
{
	var url = "api/execute/";
	addPerson = function()
	{
		fname = $("#create .fname").val();
		lname = $("#create .lname").val();
		contact_no = $("#create .contact_no").val();
		
		$.post(url+"person",{
			fname : fname,
			lname : lname,
			contact_no : contact_no
		}
	}
} 

