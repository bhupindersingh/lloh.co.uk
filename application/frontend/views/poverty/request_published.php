<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?php echo base_url();?>themes/poverty/js/html5placeholder.jquery.js"></script>
<script language="javascript">
jQuery(function(){
  	jQuery(':input[placeholder]').placeholder();	
	 $( "#dp1" ).datepicker({		
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
            	<li><a href="<?php echo site_url('/post_a_request/');?>">Post a Request</a></li>                
                <li class="active"><a href="<?php echo site_url('/request_published/');?>">Request Published</a></li>
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
                    <h3>Request <b>Published</b></h3><BR/>
                    <div class="text_part form">
                    <form method="post" action="<?php echo site_url('/request_published/');?>" name="frm_Post_A_Request" enctype="multipart/form-data">
                    	<div class="col_01">
                        	<label>Date
                            	<input class="input"  type="text" name="txtTo" value="<?php echo set_value("txtTo");?>" id="dp1" readonly="readonly"/>
                            </label>
                        </div>
                        <div class="col_01">
                            <label>Status<select name="selStatus"><option value=""></option><option value="active" <?php if(set_value('selStatus')=='active'):?>selected<?php endif;?>>Active</option><option value="expired" <?php if(set_value('selStatus')=='expired'):?>selected<?php endif;?>>Expired</option></select></label>
                        </div>
                        <div class="clear"></div>
                        <input type="Submit" value="Search" /><input type="button" value="Reset" onclick="location.href='<?php echo site_url('/request_published/');?>'"/>
                        </form>
                    </div>
                    <?php if($message<>''):?><ul class="messages">
                                	<li class="success-msg"><?php echo $message;?></li></ul><?php endif;?>
                    <ul class="post_01">
                    	<?php
                        if(!empty($results)):
							$cnt=1;							
                        	foreach($results as $data):
							if($cnt%2==0)
								$class='even';
							else
								$class='odd';	
							$date=strtotime(date($data->deadline));
							if($data->status=="expired" || $this->common->TimeToLeft($date)=="Time Over"){
								$class="disable";	
							}	
						?>  
                        <li class="<?php echo $class;?>">
                        <div class="img"><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $data->POST_ID;?>"><img src="<?php echo base_url();?>/uploads/images/thumb_<?php echo $data->photo;?>" alt="" class="bor_01" width="140"/></a></div>
                        <div class="details">
                          	<h5><a href="<?php echo site_url('/requests_detail/')?>?POSTID=<?php echo $data->POST_ID;?>"><?php echo $data->post_name;?></a></h5>
                          	<ul>
                          	<li class="time">
								<?php									
                                	echo $this->common->TimeToLeft($date);
								?>
                            </li>
                            </ul>
                            <div class="text"><?php echo substr($data->description,0,255);?>...</div>                            
                        </div>
                        <div class="clear"></div>
                        </li>                    
                        <?php $cnt++ ;endforeach;
						else:?>
						<li><div class="norecord">Sorry! no record found.</div></li>
						<?php
                        endif;
						?>
                    </ul>
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