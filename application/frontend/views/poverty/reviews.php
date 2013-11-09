    <!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<h2 class="blue">Testimonials</h2>
            <div id="reviews">
                <div class="mar_b01" style="width:100%;">
                    <ul class="comments">
                    	<?php if(!empty($results)):
								$cnt=1;
                        	     foreach($results as $data):
								 if($cnt%2==0):
								 	$class='odd';
								else:
									$class='even';
								endif;
						?>
                        <li class="<?php echo $class;?>">
                            <div class="user"><img src="<?php echo base_url();?>themes/poverty/images/avatar_male.gif" alt="" /><br />
                            <?php echo $data->name;?></div>
                            <div class="detail">
                                <span class="curve"></span>                                        
                                <?php echo $data->review;?></div>
                          <div class="clear"></div>
                        </li>
                        <?php 
							$cnt++; 
							endforeach;
						else:?>
							<li class="odd">Sorry! no record found.</li>	
						<?php
                        endif;
						?>
                    </ul>
                   
                    <?php if($this->pagination->total_rows > 10):?>
                    <div class="pagination">
                        <?php echo $links; ?>
                    </div>
                    <?php endif;?>
                </div>
                 <div class="clear"></div>
                <div class="mar_b01">
                    <div class="f_01">Submit Feedback</div>
                    <?php if (isset($review_form_errors)):echo "<div id='error'>".$review_form_errors."</div>";endif; ?>
                    <form action="<?php echo site_url('/reviews/post_review/');?>" method="post" id="frmReview">
                    <table width="560" border="0" align="center" cellpadding="7" cellspacing="0" class="form">
                      <tr>
                        <td>My Name is</td>
                        <td width="420"><input type="text" name="txtName" id="txtName" class="input" value="<?php echo set_value('txtName');?>"/></td>
                      </tr>
                      <tr>
                        <td>Organisation</td>
                        <td><select name="selGroup" id="selGroup" class="required">
							<?php foreach($organisation_groups as $row ){?>
                            	<option value="<?php echo $row['group_id'];?>"><?php echo $row['group_name'];?></option>                            
                            <?php }?>
                                    
		                   </select>
                        </td>
                      </tr>
                      <tr>
                        <td valign="top">Feedback</td>
                        <td><textarea name="txtFeedback" id="txtFeedback" cols="45" rows="5" class="input h_01"><?php echo set_value('txtFeedback');?></textarea></td>
                      </tr>
                      <tr>
                        <td valign="top">Captcha</td>
                        <td><?php echo $recaptcha_html; ?></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td align="right"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit Feedback" class="btn" /></td>
                      </tr>
                    </table>
                    </form>
              </div>
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