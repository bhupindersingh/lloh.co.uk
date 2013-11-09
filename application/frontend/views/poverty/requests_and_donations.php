    <!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
                <!-- Start: Left Patt -->
                <div class="l_part">
                	<h2 class="blue">Requests &amp; <b>Donations</b></h2>
                    <ul class="short_by">
                    	<li>Short by</li>
                    	<li class="list"><a href="#">list</a></li>
                    	<li class="grid"><a href="#">Grid</a></li>
                     </ul>
                     <div class="clear"></div>
                    <ul class="post_01" id="updates">
                    <?php if(!empty($list_latest_requests)):$cnt=1;?>
                    
                    <?php 
					foreach($list_latest_requests as $row):if($cnt%2 == 0): $class="even";else:$class="odd";endif;$msg_id=$row->POST_ID;
					$date=strtotime(date($row->deadline));
					if($row->status=="expired" || $this->common->TimeToLeft($date)=="Time Over"){
						$class="disable";	
					}
					?>
                        <li class="<?php echo $class;?>"> 
                        <div class="img"><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $row->POST_ID;?>"><img src="<?php echo base_url();?>uploads/images/thumb_<?php echo $row->photo;?>" class="bor_01" width="150" height="150"/></a></div>
                        <div class="details">
                          	<h5><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $row->POST_ID;?>"><?php echo $row->post_name;?></a></h5>
                          	<ul>
                          	<li class="user"><?php echo $row->organization_name;?></li>
                            <li class="time">
							<?php 
									
                                echo $this->common->TimeToLeft($date);
							?>
                            </li>
                            </ul>
                            <div class="text"><?php echo substr($row->description,0,255);?>...</div>
                            <div class="donate"><a href="<?php if($class=="disable"):?>javascript:void(0);<?php else:?><?php echo site_url('/donate/');?>?POSTID=<?php echo $row->POST_ID;?><?php endif;?>">Donate</a></div>
                        </div>
                        <div class="clear"></div>
                        </li>                        
                    <?php $cnt++;endforeach;?>
                    <?php else:?>
                    <li>Sorry! no record found.</li>
                    <?php endif;?>
                    </ul>
                    <?php if(!empty($list_latest_requests)):?><div class="load_more" id="more<?php echo $msg_id; ?>"><a class="more" href="javascript:void(0);" id="<?php echo $msg_id; ?>"><span>Load More Requests</span></a><input type="hidden" id="cnt" value="<?php echo $cnt;?>" /></div><?php endif;?>                    
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
    <script type="text/javascript">
$(function() {	
	//More Button
	$('.more').live("click",function(){
		var ID = $(this).attr("id");
		var cnt=$("#cnt").val();
		if(ID){
			$("#more"+ID).html('<p align="center"><img src="<?php echo base_url();?>themes/poverty/images/moreajax.gif" /></p>');
			$.ajax({
				type: "POST",
				url: "<?php echo site_url('/requests_and_donations/load_more/');?>",
				data: "lastmsg="+ ID+"&cnt="+cnt, 
				cache: false,
				async: false,
				success: function(html){
					$("ul#updates").append(html);
					$("#more"+ID).remove();
				}
			});
		}
		else{
			$(".load_more").html('<p align="center"><span>No more result to be shown here..</span></p>');	
		}	
		return false;	
	});
});

</script>