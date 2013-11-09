<script src="<?php echo base_url();?>themes/poverty/js/html5placeholder.jquery.js"></script>
<script src="<?php echo base_url();?>themes/poverty/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/poverty/js/signup.js" type="text/javascript"></script>
<script language="javascript">
$(function(){
  $(':input[placeholder]').placeholder();
});
</script>
<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<div class="login">
            <div class="content_bg">
                <div class="bor_02">
                <div class="bor_02">
                <div class="bor_02">
                    <div id="login_container"><h3>Login<br />
                    <span>Want to sign up fill out this form!</span></h3>
                    <div class="text_part form">
						<?php if (isset($login_form_errors)):echo "<div id='error'>".$login_form_errors."</div>";endif; ?>
                    	<form method="post" action="<?php echo site_url('/login/login_user/');?>" id="frmLogin">
                        <label>Username
                        <input name="txtUsername" type="text" class="input required" id="txtUsername" placeholder="User Name" value="<?php echo set_value('txtUsername'); ?>" autocomplete="off"/>
                        </label>
                        <label>Password
                        <input name="txtPassword" type="password" class="input required password" id="txtPassword" placeholder="Password" value="<?php echo set_value('txtPassword'); ?>"  autocomplete="off"/>
                        </label>
                        <label><input name="" type="radio" value="" class="radio" /> Remember</label>
                        <div class="clear"></div>
                        <input type="submit" id="btnLogin" name="btnLogin" value="Login" /><a href="javascript:void(0);" onclick="forgot_password();">Forgot Password</a>
                        </form>
                  		</div>
                  	</div>
                    <div id="forgot_container" style="display:none;">
                    <h3>Forgot Password<br />
                    <span>Want to get new password fill out this form!</span></h3>
                     <div class="text_part form">
                     <?php if($forgot_form_errors<>''):?><div id='error'><?php echo $forgot_form_errors;?></div><?php endif;?>
                     <?php if($this->session->flashdata('message')<>''):?> 
                     	<ul class="messages">
                        	<li class="success-msg"><?php echo $this->session->flashdata('message');?></li>
                        </ul>
					 <?php endif;?>
                     	<form method="post" action="<?php echo site_url('/login/forgot_password/');?>" id="frmLogin">
                        <label>Email Address
                        <input name="txtForgotEmail" type="text" class="input required" id="txtForgotEmail" placeholder="Email Address" value="<?php echo set_value('txtForgotEmail'); ?>" autocomplete="off"/>
                        </label>                        
                        <div class="clear"></div>
                        <input type="submit" id="btnForgot" name="btnForgot" value="Get Password" /><a href="javascript:void(0);" onclick="login_form();">Back to Login</a>
                        </form>
                     </div>
                    </div>
                </div>
                </div>
                </div>
             </div>
            </div>
            <div class="or">or</div>
            <div class="signup">
            <div class="content_bg">
                <div class="bor_02">
                <div class="bor_02">
                <div class="bor_02">
                    <h3>Sign up<br />
                    <span>Want to sign up fill out this form!</span></h3>
                    <div class="text_part form">
                    <?php if (isset($register_form_errors)):echo "<div id='error'>".$register_form_errors."</div>";endif; ?>
                    <form method="post" action="<?php echo site_url('/login/register/');?>" enctype="multipart/form-data" id="frmRegister">
                        <label class="width_01">My Gender<br />
                        <select name="selGender" id="selGender" class="required">                          			
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </label>
                      <label>My Name is
                        <input name="txtFirstname" type="text" class="input required" id="txtFirstname" placeholder="First Name" value="<?php echo set_value('txtFirstname'); ?>" />
                        </label>
                        <label>Last Name
                        <input name="txtLastname" type="text" class="input required" id="txtLastname" placeholder="Last Name" value="<?php echo set_value('txtLastname'); ?>" />
                        </label>
                        <label>Organization
                        <input name="txtOrganization" type="text" class="input required" id="txtOrganization" placeholder="Name of organization" value="<?php echo set_value('txtOrganization'); ?>" />
                        </label>
                        <label>Type of Group
                        <select name="selGroup" id="selGroup" class="required">
							<?php foreach($organisation_groups as $row ){?>
                            <option value="<?php echo $row['group_id'];?>"><?php echo $row['group_name'];?></option>
                                
                                <?php }?>
                            
                        </select>
                        </label>
                        <label>Email Address
                        <input name="txtEmail" type="text" class="input required email" id="txtEmail" placeholder="Enter your email" value="<?php echo set_value('txtEmail'); ?>"  autocomplete="off"/>
                        </label>
                        <label>Username
                        <input name="regUsername" type="text" class="input required" id="regUsername" placeholder="Select Username" value="<?php echo set_value('txtUsername'); ?>" autocomplete="off" remote="<?php echo site_url('/register/checkusername');?>"/>
                        </label>
                        <label>Password
                        <input name="regPassword" type="password" class="input required password" id="regPassword" placeholder="Password" value="<?php echo set_value('txtPassword'); ?>"  autocomplete="off"/>
                        </label>
                        <label>Retype Password
                        <input name="regPassword2" type="password" class="input required password2" id="regPassword2" placeholder="Password" value="<?php echo set_value('txtPassword2'); ?>"  autocomplete="off"/>
                        </label>
                        <label>Photo<br />
                        <input type="file" size="35" tabindex="5" name="filePhoto" id="filePhoto" />
                        </label>
                        <div class="mar_b01">Date of Birth<br /> 
                        <input name="txtDate" type="text" class="input wid_02" id="txtDate" value="<?php echo set_value('txtDate'); ?>" maxlength="2" placeholder="DD" /> &nbsp; 
                        <input name="txtMonth" type="text2" class="input wid_02" id="txtMonth" placeholder="MM" value="<?php echo set_value('txtMonth'); ?>"  maxlength="2"/> &nbsp; 
                        <input name="txtYear" type="text3" class="input wid_03" id="txtYear" placeholder="YYYY" value="<?php echo set_value('txtYear'); ?>"  maxlength="4"/>
                        </div>
                        <label>Address
                        <textarea name="txtAddress" cols="" rows="" placeholder="Address" class="hei_01" id="txtAddress"><?php echo set_value('txtAddress'); ?></textarea>
                        </label>
                        <label>City
                        <input name="txtCity" type="text" class="input" id="txtCity" placeholder="City name" value="<?php echo set_value('txtCity'); ?>" />
                        </label>
                        <label>Postcode
                        <input name="txtPostalcode" type="text" class="input" id="txtPostalcode" placeholder="Postcode" value="<?php echo set_value('txtPostalcode'); ?>" />
                        </label>
                        <div class="mar_b01" style="clear:both;width:100%;"><?php echo $recaptcha_html; ?></div>
                      	<label><input name="chkTerms" type="checkbox" id="chkTerms" value="Y" />
                   	  	By clicking Sign up you agree with our <a href="<?php echo site_url('/page/'.page_hperlink(4));?>" target="_blank">Terms of use</a>.</label>
                        <div class="clear"></div>
                        <input name="btnSubmit" type="submit" id="btnSubmit" value="Signup" />
                        </form>
                  </div>
                </div>
                </div>
                </div>
             </div>
            </div>
            <div class="clear"></div>
            <div id="social_media">
            	<ul>
            	<li class="facebook"><a href="<?php echo get_setting('facebook_social_link');?>" target="_blank">Facebook</a></li>
            	<li class="twitter"><a href="<?php echo get_setting('twitter_social_link');?>" target="_blank">Twitter</a></li>
            	<li class="g_plus"><a href="<?php echo get_setting('google_social_link');?>" target="_blank">Google Plus</a></li>
            	<li class="you_tube"><a href="<?php echo get_setting('youtube_social_link');?>" target="_blank">You Tube</a></li>
            </ul>
            <div class="clear"></div>
            </div>            	
        </div>
    </div>
<!-- End: Content Part -->
<script language="javascript">
function forgot_password(){
	$("#forgot_container").show();
	$("#login_container").hide();	
}
function login_form(){
	$("#forgot_container").hide();
	$("#login_container").show();
}
 <?php if($forgot_form_errors<>'' || $this->session->flashdata('message')<>''):?>
 forgot_password();
 <?php endif;?>
</script>