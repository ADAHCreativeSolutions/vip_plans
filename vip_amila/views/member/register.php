

<h1>REGISTER</h1>

<div>&nbsp;</div>
<p>Please use this page to register with ViPlans. Registered users will receive the free newsletter and can submit work to the Feed section of this site. If you are a magazine subscriber, please register in order to access exclusive content on the site, including articles from the current issue of VIPlans.</p>
<div>&nbsp;</div>

<H2>Create An Account</H2>
<p>* all the fields are mandatory</p>
<div id="registration">
  <form id="RegisterUserForm" action="index.php" method="post">
    <input id="module" name="module" type="hidden" class="text" value="member" />
    <input id="task" name="task" type="hidden" class="text" value="register" />
    <fieldset>
      <?php 
      if(isset($_SESSION['user']['error'])){?>
      <p style="color: chartreuse;">
        <?php echo $_SESSION['user']['error']; ?>
      </p>
      <?php
        unset($_SESSION['user']['error']);
      }
      ?>
      <div class="tableLike contact-form" style="width:100%">

        <div class="tableRow">
          <div class="normCell right-column" style="width:27%">Name</div>
          <div class="normCell" style="width:4%">&nbsp;</div>
          <div class="normCell" style="width:69%"><input id="name" name="member[member_name]" type="text" class="text" value="" placeholder="your name" required /></div>
        </div>
        <div class="tableRow">
          <div class="normCell right-column" style="width:27%">Phone Number</div>
          <div class="normCell" style="width:4%">&nbsp;</div>
          <div class="normCell" style="width:69%"><input id="tel" name="member[member_phone]" type="text" onkeyup="IsPhone('tel');" class="text" value="" placeholder="phone number" required /></div>
        </div>
        <div class="tableRow">
          <div class="normCell right-column" style="width:27%">Email</div>
          <div class="normCell" style="width:4%">&nbsp;</div>
          <div class="normCell" style="width:69%"><input id="email" name="member[member_email]" type="email" class="text" value="" placeholder="email" required /></div>
        </div>
        <div class="tableRow">
          <div class="normCell right-column" style="width:27%">Password</div>
          <div class="normCell" style="width:4%">&nbsp;</div>
          <div class="normCell" style="width:69%"><input id="password" name="member[member_password]" class="text" type="password" placeholder="password" required /></div>
        </div>
        <div class="tableRow">
          <div class="normCell right-column" style="width:27%">Confirm password</div>
          <div class="normCell" style="width:4%">&nbsp;</div>
          <div class="normCell" style="width:69%"><input id="re-password" name="password" class="text" type="password" onkeyup="passValidation(this.value);" placeholder="confirm password"  required /><br /><span class="form-error" id="err_confirm_password"></span></div>
        </div>
        <div class="tableRow">

                                 <div class="normCell right-column" style="width:27%"></div>                                                          <div class="normCell" style="width:4%">&nbsp;</div>  
          <div class="normCell" style="width:69%; text-align: center;">
            <input type="submit" id="button3" class="reg-button" name="submit" value="  REGISTER  " />
            <input type="reset" id="reset2" class="reg-button" name="reset" value="  CLEAR  " />
          </div>
        </div>
      </div>     
    </fieldset>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function (){
	
	$('input[type=text]').focus(function(){
		var fId = $(this).attr("id");
		$('#err_' + fId + '').text("");
		
	});
	
	$('input[type=password]').focus(function(){
		var fId = $(this).attr("id");
		$('#err_' + fId + '').text("");
		
	});
	$('textarea').focus(function(){
		var fId = $(this).attr("id");
		$('#err_' + fId + '').text("");
		
	});
	
});

function passValidation(thisValue){
	var walkerPwd 	= $('#password').val();
	
	if(walkerPwd == thisValue){
    $('#err_confirm_password').addClass('form-correct');
		$('#err_confirm_password').text("passwords matching!");
    
		
	}else{
		setElementText("err_confirm_password","invalid confirmation");
		flag = false;
	}
}

function IsPhone(field)

{
   var ValidChars = "0123456789";
   var IsNumber=true;
   var Char;
	 var sText = $('#' + field + '').val(); 
	 
 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText .charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
	  
	 if(!IsNumber){
	 	alert("Please enter valid numbers!");
		$('#' + field + '').val(""); 
	 	return IsNumber;
	 }else{
	 	
		
		return IsNumber;
	 }
 
   
 }
 
 function validate(email) {
 	
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   
   if(reg.test(email) == false) {
     
      return false;
   }else{
   	 return true;
   }
}
function setElementText(elementId,msg)
{
     $('#' + elementId + '').text(msg);
}
function submitRegistration(){
	
		
	var flag		= true;
	var profileName = $('#profile_name').val();
	var walkerName 	= $('#walker_name').val();
	var walkerEmail	= $('#walker_email').val();
	var walkerCnt1 	= $('#walker_contact1').val();
	var walkerCnt2 	= $('#walker_contact2').val();
	var walkerAdd 	= $('#address').val();
	var walkerPwd 	= $('#walker_password').val();
	var walkerSName	= $('#walker_sname').val();
	var confirmPwd 	= $('#confirm_password').val();
	var wTSize	 	= $('#walker_t_size').val();
	var wGender 	= $('#walker_gender').val();
	var eCntName 	= $('#emergency_contact_name').val();
	var eCntNo	 	= $('#emergency_contact_no').val();
	var wCity	 	= $('#walker_city').val();
	var wTID	 	= $('#walker_type_id').val();
	var walkerId    = $('#walker_id').val();
	
	var tncNow			= $('#tnc2').val();

	if(profileName == ""){
		setElementText("err_profile_name","Required field");
		flag = false;
	}
	if(walkerName == ""){
		setElementText("err_walker_name","Required field");
		flag = false;
	}
	if(walkerEmail == ""){
		setElementText("err_walker_email","Required field");
		flag = false;
	}else{
		if(!validate(walkerEmail)){
			setElementText("err_walker_email","invalid email address");
			flag = false;
		}
	}
	if(walkerCnt1 == ""){
		setElementText("err_walker_contact1","Required field");
		flag = false;
	}
	if(walkerCnt2 == ""){
		setElementText("err_walker_contact2","Required field");
		flag = false;
	}
	if(walkerAdd == ""){
		setElementText("err_address","Required field");
		flag = false;
	}
	if(wCity == ""){
		setElementText("err_walker_city","Required field");
		flag = false;
	}
	if(walkerSName == ""){
		setElementText("err_walker_sname","Required field");
		flag = false;
	}
	if(walkerPwd == ""){
		setElementText("err_walker_password","Required field");
		flag = false;
	}
	if(confirmPwd == ""){
		setElementText("err_confirm_password","Required field");
		flag = false;
	}

	if(walkerPwd != "" && confirmPwd != "" && walkerPwd != confirmPwd){
		setElementText("err_confirm_password","invalid confirmation");
		flag = false;
	}
	if(wTID == 3){
	
	}else{
		if(wTSize == 0){
			setElementText("err_walker_t_size","Required field");
			flag = false;
		}
		if(eCntName == ""){
		setElementText("err_emergency_contact_name","Required field");
		flag = false;
	} 
		if(eCntNo == ""){
			setElementText("err_emergency_contact_no","Required field");
			flag = false;
		}
	}
	if(wGender == 0){
		setElementText("err_walker_gender","Required field");
		flag = false;
	} 
	
	if(walkerId > 0){
	
	}else{

		if(tncNow == 0){
			alert("You have to agree with our Terms and conditions");
			flag = false;
		}
	}

	return flag;
}


</script>