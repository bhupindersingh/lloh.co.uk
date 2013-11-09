<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?php echo base_url();?>themes/poverty/js/html5placeholder.jquery.js"></script>
<script language="javascript">
jQuery(function(){
  	jQuery(':input[placeholder]').placeholder();	
	 $( "#dp1" ).datepicker({
		showOn: "button",
		buttonImage: "<?php echo base_url();?>themes/poverty/images/calender_icon.gif",
		buttonImageOnly: true,
		minDate: 0,
		dateFormat: 'yy-mm-dd'
	});
});
</script>
<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<div class="post_a_req">
        	<div class="l_panel">
            <ul class="list_02">
            	<?php if($this->session->userdata('post_request_approval')==1):?>
            	<li class="active"><a href="<?php echo site_url('/post_a_request/');?>">Post a Request</a></li>                
                <li><a href="<?php echo site_url('/request_published/');?>">Request Published </a></li>
                <?php endif;?>
                <?php if($this->session->userdata('dir_approval')==1):?>
                <li><a href="<?php echo site_url('/directory_page/submit_details/');?>">Submit Directory Listing</a></li>
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
                    <h3>Post a <b>request</b><br />
                    <span>Want to sign up fill out this form!</span></h3>
                    <div class="text_part form">
                    <?php if (isset($request_form_errors)):echo "<div id='error'>".$request_form_errors."</div>";endif; ?>
                    <form method="post" action="<?php echo site_url('/post_a_request/submit/');?>" name="frm_Post_A_Request" enctype="multipart/form-data">
                    	<div class="col_01">
                        <label>Name of Request
                            <input type="text" class="input" id="txtNameOfRequest" name="txtNameOfRequest" placeholder="e.g. A Winter Jacket For A Child" value="<?php echo set_value('txtNameOfRequest');?>" />
                            </label> 
                            <label>Description
                            <textarea name="txtDescription" id="txtDescription" cols="" rows="" class="hei_02"><?php echo set_value('txtDescription');?></textarea>
                            </label>
                            <label>Security Code
							<?php echo $recaptcha_html; ?></label>
                        </div>
                        <div class="col_01">
                        <label>Photo                            
                        <input type="file" size="35" tabindex="5" name="filePhoto" id="filePhoto"/>
                        </label>
                        <label>Quantity Required
                        <input type="text" class="input" placeholder="Type required quantity" id="txtQuantity" name="txtQuantity" value="<?php echo set_value('txtQuantity');?>" />
                        </label>
                        <label>Deadline
                        <input type="text" class="input" readonly="readonly" name="txtDeadline" placeholder="Select last date" value="<?php echo set_value('txtDeadline');?>" style="width:80%;" id="dp1"/>
                        </label> 
                        </div>
                        <div class="clear"></div>
                        <input type="Submit" value="Post a Request" />
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