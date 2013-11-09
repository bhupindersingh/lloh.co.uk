    <!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
          <div class="l_part" id="page">
                <h2 class="blue"><?php echo $page['title'];?></h2>
                 <?php echo $page['value'];?>
          </div>
            <div class="r_part">
                <h2 class="red">Latest posts &amp; <b>requests</b></h2>
                <ul class="post_03">
                	<?php if(!empty($list_latest_requests)):$cnt=1;?>
					<?php 
					foreach($list_latest_requests as $row):if($cnt%2 == 0): $class="even";else:$class="odd";endif;$msg_id=$row->POST_ID;
					$date=strtotime(date($row->deadline));
					if($row->status=="expired" || $this->common->TimeToLeft($date)=="Time Over"){
						$class="disable";	
					}
					?>
                    <li class="<?php echo $class;?>">
                    <h5><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $row->POST_ID;?>">School Books neque vel porttitor commdo.</a></h5>
                    <div class="img"><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $row->POST_ID;?>"><img src="<?php echo base_url();?>uploads/images/thumb_<?php echo $row->photo;?>" class="bor_01" width="72" height="72"/></a></div>
                    <div class="details">
                        <ul>
                        <li class="user"><?php echo $row->organization_name;?></li>
                        <li class="time"><?php echo $this->common->TimeToLeft_sidebar($date);?> Time Left</li>
                        </ul>
                        <?php echo substr($row->description,0,100);?>...
                        <div class="donate"><a href="<?php if($class=="disable"):?>javascript:void(0);<?php else:?><?php echo site_url('/donate/');?>?POSTID=<?php echo $row->POST_ID;?><?php endif;?>">Donate</a></div>
                    </div>
                    <div class="clear"></div>
                    </li>                   
                  	<?php $cnt++;endforeach;?>
                    <?php else:?>
                    <li>Sorry! no record found.</li>
                    <?php endif;?>  
                </ul>
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