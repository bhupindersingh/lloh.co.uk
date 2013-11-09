<!-- Start: Content Part -->
<div id="content">
    <div class="lsize">
            <!-- Start: Left Patt -->
            <div class="l_part">
                <h2 class="blue">Poverty Busters</h2>
                 <div class="clear"></div>
                <ul class="post_01">
                	<?php 
				if(!empty($results)):
					$cnt=0;
					foreach($results as $row):
					if($cnt%2==0):
						$class="even";
					else:
						$class="odd";
					endif;
				?>
                    <li class="<?php echo $class;?>">
                    <div class="img"><a href="<?php echo site_url('/article/'.page_hperlink($row->ID));?>"><img src="<?php echo base_url()?>/uploads/images/thumb_<?php echo $row->image?>" alt="" class="bor_01" height="140" width="140"/></a></div>
                    <div class="details">
                        <h5><a href="<?php echo site_url('/article/'.page_hperlink($row->ID));?>"><?php echo $row->title;?></a></h5>
                        <ul>
                        <li><?php echo date("l, F jS, Y",strtotime($row->post_date));?></li>
                        </ul>
                        <?php echo substr(strip_tags($row->value),0,255);?>...
                        <div class="read_more" align="right"><a href="<?php echo site_url('/article/'.page_hperlink($row->ID));?>">Read More</a></div>
                    </div>
                    <div class="clear"></div>
                    </li> 
                    <?php 
					$cnt++; endforeach;
					else:?>
                    <li class="odd">Sorry! no record found.</li>
				<?php endif;?>                    
                </ul>
                <?php 
				if($this->pagination->total_rows > 10):?>
                    <div class="pagination">
                        <?php echo $links; ?>
                    </div>
            <?php endif;?>
            </div>
            <!-- End: Left Patt -->
            <!-- Start: Right Patt -->
            <div class="r_part">
                	<h2 class="red">Requests <b>ending soon</b></h2>
                	<ul class="post_02">
                    	 <?php if(!empty($list_request_ending_soon)):$count=1;?>
                         <?php 
						foreach($list_request_ending_soon as $row):if($cnt%2 == 0): $class="even";else:$class="odd";endif;?>
                       	<?php $date=strtotime(date($row->deadline));
						if($row->status=="expired" || $this->common->TimeToLeft($date)=="Time Over"){
							$class="disable";	
						}?>
                        <li class="<?php echo $class;?>">
                        <h5><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $row->POST_ID;?>"><?php echo $row->post_name;?></a></h5>
                        <div class="img"><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $row->POST_ID;?>"><img src="<?php echo base_url();?>uploads/images/thumb_<?php echo $row->photo;?>" class="bor_01" width="72" height="72"/></a></div>
                        <div class="details">
                          	<ul>
                          	<li class="user"><?php echo $row->organization_name;?></li>
                            <li class="time"><?php echo $this->common->TimeToLeft_sidebar($date);?> <span>Time Left</span></li>
                            </ul>
                            <div class="donate"><a href="<?php echo site_url('/donate/');?>?POSTID=<?php echo $row->POST_ID;?>">Donate</a></div>
                        </div>
                        <div class="clear"></div>
                        </li>
                       <?php $count++;endforeach;?>
                    <?php else:?>
                    <li>Sorry! no record found.</li>
                    <?php endif;?>           
                    </ul>
                </div>                
            <!-- End: Right Patt -->
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