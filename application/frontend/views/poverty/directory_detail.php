<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<div class="content_bg">
            	<div class="bor_02">
            	<div class="bor_02">
            	<div class="bor_02">
            		<h3>Directory <b>Detail Page</b></h3><br />
                    <div class="text_part">
                    	<div class="directory_detail">
                        	<div class="img"><img src="<?php echo base_url();?>uploads/images/thumb_<?php echo $results[0]->organization_logo;?>" alt="" class="bor_01" width="140" height="140"/></div>
                          <div class="details">
                            <table width="100%" border="0" cellspacing="0" cellpadding="8" class="f_14">
                              <tr>
                                <td colspan="2" class="title"><?php echo $results[0]->organization_name;?></td>
                              </tr>
                              <tr class="odd">
                                <td width="100" valign="top"><b>Address</b></td>
                                <td valign="top"><?php echo nl2br($results[0]->address);?></td>
                              </tr>
                              <tr>
                                <td><b>City</b></td>
                                <td><?php echo $results[0]->city;?></td>
                              </tr>
                              <tr class="odd">
                                <td><b>Post Code</b></td>
                                <td><?php echo $results[0]->postalcode;?></td>
                              </tr>
                              <tr>
                                <td><b>Tel</b></td>
                                <td><?php echo $results[0]->telephone;?></td>
                              </tr>
                              <tr class="odd">
                                <td><b>Email</b></td>
                                <td><a href="mailto:<?php echo $results[0]->email;?>"><?php echo $results[0]->email;?></a></td>
                              </tr>
                              <tr>
                                <td><b>Website</b></td>
                                <td><a href="<?php echo $results[0]->website;?>"><?php echo $results[0]->website;?></a></td>
                              </tr>
                            </table>
                          </div>
                          <div class="clear"></div>
                    </div>
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