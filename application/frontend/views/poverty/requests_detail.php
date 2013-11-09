	<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<h2 class="blue">Requests &amp; <b>Donations</b></h2>
            <div class="req_details">
            	<?php $date=strtotime(date($request[0]->deadline));?> 
                <div class="img"><img src="<?php base_url();?>uploads/images/<?php echo $request[0]->photo;?>" alt="" class="bor_01" width="340" height="290"/>
                <?php if($request[0]->status=="expired" || $this->common->TimeToLeft($date)=="Time Over"){
							$class="disable";	
						}else{$class="donate";}?>
                	<div class="<?php echo $class;?>"><a href="<?php if($class=="disable"):?>javascript:void(0);<?php else:?><?php echo site_url('/donate/');?>?POSTID=<?php echo $request[0]->POST_ID;?><?php endif;?>">Donate</a></div>
                    <div class="clear"></div>
                </div>
              	<div class="details">
                    <h5><?php echo $request[0]->post_name;?></h5>
                    <div class="clear"></div>
                    <ul>
                        <li class="user"><?php echo $request[0]->organization_name;?></li>
                        <li class="time">						
							<?php echo $this->common->TimeToLeft($date);?></li>
                            <li class="qty">Quantity Required: <?php echo $request[0]->quantity_required;?></li>
                    </ul>
                    <p><?php echo $request[0]->description;?><p>
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