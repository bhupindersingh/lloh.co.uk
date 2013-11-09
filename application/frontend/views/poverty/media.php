<link rel="stylesheet" href="<?php echo base_url();?>themes/poverty/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?php echo base_url();?>themes/poverty/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto({
		opacity: 0.80,
		theme: 'facebook',
		overlay_gallery: true,
		keyboard_shortcuts: true	
	});
  });
</script>
<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<div class="content_bg">
                <div class="bor_02">
                <div class="bor_02">
                <div class="bor_02">
                    <h3>Media <b>Library</b></h3><br/>
                    <div class="text_part form">
                     <form method="post" action="<?php echo site_url('/media/');?>" enctype="multipart/form-data" name="frmMedia" id="frmMedia">
                     <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tr>
                            <td width="20%">Chose Media Format</td>
                            <td width="37%">
                			<label class="width_01">
                            	<select name="selMedia" id="selMedia" class="required" onchange="document.frmMedia.submit();">                          			
                                    <option value="video" <?php if(set_value('selMedia')=='video'):?>selected<?php endif;?>>Videos</option>
                                    <option value="image" <?php if(set_value('selMedia')=='image'):?>selected<?php endif;?>>Images</option>
		                        </select>
                        	</label>
                            </td>
                            <td width="10">&nbsp;</td>
                            <td width="37%">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                      </table>  
                      </form>                  
               	 	</div>
                    <?php //echo "<pre>";print_r($results);?>
                    <div class="entry-content">
                    	<ul class="g1-grid">
                        <?php if(!empty($results)):?>
                            <?php if(set_value('selMedia')=='video' || set_value('selMedia')==''):?>
                            <?php 
								foreach($results as $data):								
								$youtube_id=$this->common->get_youtube_id($data->media_path);
							?>
                        	<li class="g1-column g1-one-third g1-valign-top">
								<div class="g1-fluid-wrapper">
                                 <a href="http://www.youtube.com/watch?v=<?php echo $youtube_id?>&amp;autohide=1&amp;autoplay=0&amp;disablekb=0&amp;fs=1&amp;loop=0&amp;enablejsapi=1&amp;rel=0&amp;controls=2&amp;showinfo=0&amp;wmode=transparent&amp;autohide=2&amp;autoplay=0&amp;disablekb=0&amp;fs=1&amp;loop=0&amp;enablejsapi=1&amp;rel=0&amp;controls=2&amp;showinfo=1" rel="prettyPhoto" title=""><img src="http://img.youtube.com/vi/<?php echo $youtube_id?>/0.jpg" width="225" height="150"/></a>
                                </div>
							</li> 
                            <?php endforeach;?>                  
                            <?php elseif(set_value('selMedia')=='image'):?>
                            <?php foreach($results as $data):?>
                            <li class="g1-column g1-one-third g1-valign-top">
								<div class="g1-fluid-wrapper">
                                	<a href="<?php echo base_url();?>uploads/media/<?php echo $data->media_path;?>" rel="prettyPhoto[pp_gal]" title="<?php echo $data->media_title;?>"><img src="<?php echo base_url();?>uploads/media/thumb_<?php echo $data->media_path;?>" alt="<?php echo $data->media_title;?>" width="225" height="225" title="<?php echo $data->media_title;?>"/></a>
                                </div>
                            </li>
                            <?php endforeach;?>
                            <?php endif;?>
                        <?php else:?>
                            <li class="g1-column g1-valign-top">Sorry ! no record found.</li>
                        <?php endif;?>      
                        </ul>
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