	<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
          <div class="l_part">
          		<h2 class="blue">Thank you for your testimonial!</h2><br/>
                <p>Dear <strong><?php echo $this->session->userdata('review_posted_username');?></strong>,</p>               
                We have received your review and The Leicester League of Heroes admin will review your testimonial. Once it has been approved, it will be published on the site.<br/><br/>If you have any questions please feel free to reach out to us at <a href="mailto:contactus@povertyproject.com">contactus@povertyproject.com</a><br/><br/>The Leicester League of Heroes thanks you for your support and we pray, that together, we can help beat poverty and help our fellow residents.
            	<br /><br />
               Yours faithfully,<br/>
				Leicester League of Heroes <br/>
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