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
        	<div class="content_bg">
                <div class="bor_02">
                <div class="bor_02">
                <div class="bor_02">
                    <h3>Register <b>Account</b><br />
                    <span>Want to sign up fill out this form!</span></h3>
                    <div class="text_part form">
                    	<?php if (isset($register_form_errors)):echo "<div id='error'>".$register_form_errors."</div>";endif; ?>
                    	<form method="post" action="<?php echo site_url('/register/submit');?>" enctype="multipart/form-data" id="frmRegister">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="15%">My Gender</td>
                            <td width="37%">
                			<label class="width_01">
                            	<select name="selGender" id="selGender" class="required">                          			
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
		                        </select>
                        	</label>                            </td>
                            <td width="10">&nbsp;</td>
                            <td width="37%">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>My Name is</td>
                            <td><label><input name="txtFirstname" type="text" class="input required" id="txtFirstname" placeholder="First Name" value="<?php echo set_value('txtFirstname'); ?>" /></label></td>
                            <td>&nbsp;</td>
                            <td><label>
                              <input name="txtLastname" type="text" class="input required" id="txtLastname" placeholder="Last Name" value="<?php echo set_value('txtLastname'); ?>" /> 
                            </label></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Organization</td>
                            <td><label><input name="txtOrganization" type="text" class="input required" id="txtOrganization" placeholder="Name of organization" value="<?php echo set_value('txtOrganization'); ?>" /></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Type of Group</td>
                            <td><label class="width_02">
                            	<select name="selGroup" id="selGroup" class="required">
                          			<?php foreach($organisation_groups as $row ){?>
                                    <option value="<?php echo $row['group_id'];?>"><?php echo $row['group_name'];?></option>
										
										<?php }?>
                                    
		                        </select>
                        	</label> </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Email Address</td>
                            <td><label><input name="txtEmail" type="text" class="input required email" id="txtEmail" placeholder="Enter your email" value="<?php echo set_value('txtEmail'); ?>"  autocomplete="off"/></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Username</td>
                            <td><label><input name="regUsername" type="text" class="input required" id="regUsername" placeholder="Select Username" value="<?php echo set_value('txtUsername'); ?>" autocomplete="off" remote="<?php echo site_url('/register/checkusername');?>"/></label></td>
                            <td>&nbsp;</td>
                            <td valign="middle"><div class="avail mar_b01"></div></td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Password</td>
                            <td><label><input name="regPassword" type="password" class="input required" id="regPassword" placeholder="Password" value="<?php echo set_value('txtPassword'); ?>"  autocomplete="off"/></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Retype Password</td>
                            <td><label><input name="regPassword2" type="password" class="input required" id="regPassword2" placeholder="Password" value="<?php echo set_value('txtPassword2'); ?>"  autocomplete="off"/></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Photo</td>
                            <td>
                            <label><input type="file" size="35" tabindex="5" name="filePhoto" id="filePhoto" /></label>                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Date of Birth</td>
                            <td>
                            <div class="mar_b01">
                            <input name="txtDate" type="text" class="input wid_02" id="txtDate" value="<?php echo set_value('txtDate'); ?>" maxlength="2" placeholder="DD" /> &nbsp; 
                            <input name="txtMonth" type="text2" class="input wid_02" id="txtMonth" placeholder="MM" value="<?php echo set_value('txtMonth'); ?>"  maxlength="2"/> &nbsp; 
                            <input name="txtYear" type="text3" class="input wid_03" id="txtYear" placeholder="YYYY" value="<?php echo set_value('txtYear'); ?>"  maxlength="4"/>
                            </div>                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">Address</td>
                            <td valign="top"><label><textarea name="txtAddress" cols="" rows="" placeholder="Address" class="hei_01" id="txtAddress"><?php echo set_value('txtAddress'); ?></textarea></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>City</td>
                            <td><label><input name="txtCity" type="text" class="input" id="txtCity" placeholder="City name" value="<?php echo set_value('txtCity'); ?>" /></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Postcode</td>
                            <td><label><input name="txtPostalcode" type="text" class="input" id="txtPostalcode" placeholder="Postcode" value="<?php echo set_value('txtPostalcode'); ?>" /></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $recaptcha_html; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          
                          <tr>
                            <td>&nbsp;</td>
                            <td height="40"><label><input name="chkTerms" type="checkbox" id="chkTerms" value="Y" /> I agree to the <a href="<?php echo site_url('/page/'.page_hperlink(4));?>" target="_blank">Terms &amp; Conditions</a></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="4" valign="top"><input name="btnSubmit" type="submit" id="btnSubmit" value="Create an Account" /></td>
                          </tr>
                        </table>
                        </form>
                  </div>
                </div>
                </div>
                </div>
             </div>
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