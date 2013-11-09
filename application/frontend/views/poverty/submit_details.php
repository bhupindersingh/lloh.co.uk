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
                <li class="active"><a href="<?php echo site_url('/directory_page/submit_details/');?>">Submit Directory Listing</a></li>
                <li><a href="<?php echo site_url('/directory_page/manage_listing/');?>">Manage Directory LIsting </a></li>
                <?php endif;?>
                <li><a href="<?php echo site_url('/manage_account/');?>">Manage Account</a></li>
                <li><a href="<?php echo site_url('/notifications/');?>">Notifications</a></li>
            </ul>
            </div>
            <div class="r_panel">
            <div class="content_bg">
                <div class="bor_02">
                <div class="bor_02">
                <div class="bor_02">
                    <h3>Submit Your <b>Details</b><br />
                    <span>Want to enroll your organization fill out this form!</span></h3>
                    <div class="text_part form">
                    <?php if (isset($submit_form_errors)):echo "<div id='error'>".$submit_form_errors."</div>";endif; ?>
                    <form method="post" action="<?php echo site_url('/directory_page/submit/');?>" name="frm_Post_A_Request" enctype="multipart/form-data">
                    	<div class="col_01">
                       <label>Organization Name
                            <input type="text" class="input" placeholder="Organization Name" id="txtOrganizationName" name="txtOrganizationName" value="<?php echo set_value('txtOrganizationName');?>" />
                            </label>                       
                            
                            <label>Address
                            <textarea class="input" id="txtAddress" name="txtAddress" cols="10" rows="5"><?php echo set_value('txtAddress');?></textarea>
                            </label>
                            <label>City
                            <input type="text" class="input" placeholder="City" id="txtCity" name="txtCity" value="<?php echo set_value('txtCity');?>" />
                            </label>
                            <label>Postal Code
                        <input type="text" class="input" placeholder="Postal Code" id="txtPostalCode" name="txtPostalCode" value="<?php echo set_value('txtPostalCode');?>" />
                        </label>
                        <label>Security Code
                        <?php echo $recaptcha_html; ?></label>
                        </div>
                        <div class="col_01">
                        <label>Organization Group Type
                            <select name="selGroup" style="width:80%;">
                            	<?php foreach($organisation_groups as $row ){?>
                                    <option value="<?php echo $row['group_id'];?>"><?php echo $row['group_name'];?></option>
                                <?php }?>
                            </select>
                            </label> 
                        <label>Organization Logo                            
                        <input type="file" size="35" tabindex="5" name="filePhoto" id="filePhoto"/>
                        </label>
                        <label>Telephone
                        <input type="text" name="txtTelephone" id="txtTelephone" placeholder="Telephone" value="<?php echo set_value('txtTelephone');?>"/>
                        </label> 
                        <label>Email
                        <input type="text" class="input" name="txtEmail" id="txtEmail" placeholder="Email" value="<?php echo set_value('txtEmail');?>"/>
                        </label>
                        <label>Website
                        <input type="text" class="input" name="txtWebsite" id="txtWebsite" placeholder="Website" value="<?php echo set_value('txtWebsite');?>"/>
                        </label>
                        </div>
                        <div class="clear"></div>
                        <input type="Submit" value="Submit Details" />
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