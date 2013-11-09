	<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
          <div class="l_part">
          		<h2 class="blue">Thank you for your donation!</h2><br/>
               <p>Dear <strong><?php echo $this->session->userdata('donar_name');?></strong>,</p>
<p>Thank you for making a donation. The organisation dealing with the request you have responded to will contact you asap to arrange a collection / delivery.</p>
<p>We thank you for helping us fight local poverty!</p>
<p>Please share this site with your friends and family so we can help identify more people who might need help, and to help recruit more people to fight poverty together. </p>
<p>Yours faithfully,<br>
</p>
<p>The Leicester League of Heroes </p>
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