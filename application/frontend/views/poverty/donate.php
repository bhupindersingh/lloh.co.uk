<script src="<?php echo base_url();?>themes/poverty/js/html5placeholder.jquery.js"></script>
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
                    <h3>Donate <b>Now</b><br />
                    <span>Want to donate fill out this form!</span></h3>
                    <div class="text_part form">
                    	<?php if (isset($donation_form_errors)):echo "<div id='error'>".$donation_form_errors."</div>";endif; ?>
                    	<form method="post" action="<?php echo site_url('/donate/submit');?>?POSTID=<?php echo $this->input->get('POSTID');?>" enctype="multipart/form-data" id="frmRegister">
                        <table width="60%" border="0" cellspacing="0" cellpadding="0">                          
                          <tr>
                            <td>First Name</td>
                            <td><label><input name="txtFirstname" type="text" class="input required" id="txtFirstname" placeholder="First Name" value="<?php echo set_value('txtFirstname'); ?>" /></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr> 
                          <td>Last Name</td>            
                            <td><label>
                              <input name="txtLastname" type="text" class="input required" id="txtLastname" placeholder="Last Name" value="<?php echo set_value('txtLastname'); ?>" /> 
                            </label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>   
                          <tr>
                            <td>Telephone</td>
                            <td><label><input name="txtTelephone" type="text" class="input" id="txtTelephone" placeholder="Telephone" value="<?php echo set_value('txtTelephone'); ?>" /></label></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>Mobile</td>
                            <td><label><input name="txtMobile" type="text" class="input" id="txtMobile" placeholder="Mobile" value="<?php echo set_value('txtMobile'); ?>" /></label></td>
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
                            <td>&nbsp;</td>
                            <td><?php echo $recaptcha_html; ?></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr> 
                          <tr>                            
                            <td colspan="5" valign="top">&nbsp;</td>
                          </tr>                         
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="4" valign="top"><input name="btnSubmit" type="submit" id="btnSubmit" value="Donate Now" /><input type="hidden" name="POSTID" value="<?php echo $this->input->get('POSTID');?>"/></td>
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