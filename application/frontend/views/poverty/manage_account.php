<script src="<?php echo base_url();?>themes/poverty/js/html5placeholder.jquery.js"></script>
<script language="javascript">
jQuery(function(){
  	jQuery(':input[placeholder]').placeholder();		
});
</script>
<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<div class="post_a_req">
        	<div class="l_panel">
            <ul class="list_02">
            	<?php if($this->session->userdata('post_request_approval')==1):?>
            	<li><a href="<?php echo site_url('/post_a_request/');?>">Post a Request</a></li>                
                <li><a href="<?php echo site_url('/request_published/');?>">Request Published</a></li>
                <?php endif;?>
                <?php if($this->session->userdata('dir_approval')==1):?>
                <li><a href="<?php echo site_url('/directory_page/submit_details/');?>">Submit Directory Listing</a></li>
                <li><a href="<?php echo site_url('/directory_page/manage_listing/');?>">Manage Directory LIsting </a></li>
                <?php endif;?>
                <li class="active"><a href="<?php echo site_url('/manage_account/');?>">Manage Account</a></li>
                <li><a href="<?php echo site_url('/notifications/');?>">Notifications</a></li>
            </ul>
            </div>
            <div class="r_panel">
            <div class="content_bg">
                <div class="bor_02">
                <div class="bor_02">
                <div class="bor_02">
                    <h3>Manage <b>Account</b><br />
                    <span>Fill these fields to update your account!</span></h3>
                    <div class="text_part form">
                    <?php if (isset($manage_form_errors)):echo "<div id='error'>".$manage_form_errors."</div>";endif; ?>
                    <?php if($message<>''):?>
                    	<ul class="messages">
                        	<li class="success-msg"><?php echo $message;?></li>
                        </ul>
					<?php endif;?>
                    <form method="post" action="<?php echo site_url('/manage_account/update/');?>" enctype="multipart/form-data" id="frmManageAccount">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="15%">My Gender</td>
                            <td width="50%">
                			<label class="width_01">
                            	<select name="selGender" id="selGender" class="required">                          			
                                    <option value="male" <?php if($results[0]->gender == "male"):?>selected<?php endif;?>>Male</option>
                                    <option value="female" <?php if($results[0]->gender == "female"):?>selected<?php endif;?>>Female</option>
		                        </select>
                        	</label>                            </td>
                            <td width="35%">&nbsp;</td>                           
                          </tr>
                          <tr>
                            <td>Firstname</td>
                            <td><label><input name="txtFirstname" type="text" class="input required" id="txtFirstname" placeholder="First Name" value="<?php echo $results[0]->firstname;?>" /></label></td>                           
                            
                           <td>&nbsp;</td>                            
                          </tr>
                           <tr>
                            <td>Lastname</td>
                            <td><label><input name="txtLastname" type="text" class="input required" id="txtLastname" placeholder="Last Name" value="<?php echo $results[0]->lastname;?>" /></label></td>                           
                            
                           <td>&nbsp;</td>                            
                          </tr>
                          <tr>
                            <td>Organization</td>
                            <td><label><input name="txtOrganization" type="text" class="input required" id="txtOrganization" placeholder="Name of organization" value="<?php echo $results[0]->organization_name;?>" /></label></td>
                            <td>&nbsp;</td>                            
                          </tr>
                          <tr>
                            <td>Type of Group</td>
                            <td><label class="width_02">
                            	<select name="selGroup" id="selGroup" class="required">
                          			 <?php foreach($organisation_groups as $row ){?>
                                            <option value="<?php echo $row['group_id'];?>" <?php if($results[0]->group_type == $row['group_id']):?>selected<?php endif;?>><?php echo $row['group_name'];?></option>
                                        <?php }?>
                                    
		                        </select>
                        	</label> </td>
                            <td>&nbsp;</td>                            
                          </tr>
                          <tr>
                            <td>Email Address</td>
                            <td><label><input name="txtEmail" type="text" class="input required email" id="txtEmail" placeholder="Enter your email" value="<?php echo $results[0]->email;?>"  autocomplete="off"/></label></td>
                            <td>&nbsp;</td>                            
                          </tr>
                          <tr>
                            <td>Username</td>
                            <td><label><input name="regUsername" type="text" class="input required" id="regUsername" placeholder="Select Username" value="<?php echo $results[0]->username;?>" readonly="readonly"/></label></td>                            
                            <td valign="middle"><div class="avail mar_b01"></div></td>                            
                          </tr>
                          <tr>
                            <td>Password</td>
                            <td><label><input name="regPassword" type="password" class="input" id="regPassword" placeholder="Password" value=""  autocomplete="off"/></label></td>
                            <td>&nbsp;</td>                           
                          </tr>                          
                          <tr>
                            <td>Photo</td>
                            <td>
                            <label><input type="file" size="35" tabindex="5" name="filePhoto" id="filePhoto" /></label></td>                            
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Date of Birth</td>
                            <td>
                            <div class="mar_b01">
                            <?php 
							$birthday = explode("-",$results[0]->birthday);							
							?>
                            <input name="txtDate" type="text" class="input wid_02" id="txtDate" value="<?php echo $birthday[2]; ?>" maxlength="2" placeholder="DD" /> &nbsp; 
                            <input name="txtMonth" type="text2" class="input wid_02" id="txtMonth" placeholder="MM" value="<?php echo $birthday[1]; ?>"  maxlength="2"/> &nbsp; 
                            <input name="txtYear" type="text3" class="input wid_03" id="txtYear" placeholder="YYYY" value="<?php echo $birthday[0]; ?>"  maxlength="4"/>
                            </div>                            </td>
                            <td>&nbsp;</td>                           
                          </tr>
                          <tr>
                            <td valign="top">Address</td>
                            <td valign="top"><label><textarea name="txtAddress" cols="" rows="" placeholder="Address" class="hei_01" id="txtAddress"><?php echo $results[0]->address;?></textarea></label></td>
                            <td>&nbsp;</td>                            
                          </tr>
                          <tr>
                            <td>City</td>
                            <td><label><input name="txtCity" type="text" class="input" id="txtCity" placeholder="City name" value="<?php echo $results[0]->city;?>" /></label></td>                            
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Postal Code</td>
                            <td><label><input name="txtPostalcode" type="text" class="input" id="txtPostalcode" placeholder="Postal Code" value="<?php echo $results[0]->postal_code;?>" /></label></td>
                            <td>&nbsp;</td>                            
                          </tr>
                          <tr>
                          	<td>&nbsp;</td><td><?php echo $recaptcha_html; ?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2" valign="top"><input name="btnSubmit" type="submit" id="btnSubmit" value="Update Details" /></td>
                          </tr>
                        </table>
                        </form>
                  </div>
                </div>
                </div>
                </div>
             </div>
            </div>
            <div class="clear"></div>
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