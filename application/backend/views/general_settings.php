		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Settings</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/settings/general/');?>" id="isoft_group_1" name="group_1" title="Settings" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        General Settings
                                    </span>
        						</a>
                                
        						<div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">General Settings</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>
                                        <fieldset id="group_fields4">                                        
                                            <div class="hor-scroll">
                                            <?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Website Name </label></td>
                                                        <td class="value">
                                                        	<input id="site_name" name="site_name" value="<?php echo get_setting('site_name');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YOUR WEBSITE NAME]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Website E-Mail </label></td>
                                                        <td class="value">
                                                            <input id="site_email" name="site_email" value="<?php echo get_setting('site_email');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[WHERE E-MAILS ARE SENT FROM]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">E-Mail Sender Name </label></td>
                                                        <td class="value">
                                                            <input id="site_email_sender" name="site_email_sender" value="<?php echo get_setting('site_email_sender');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[Name OF THE E-MAIL SENDER]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Items Per Page </label></td>
                                                        <td class="value">
                                                            <input id="items_per_page" name="items_per_page" value="<?php echo get_setting('items_per_page');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[MAXIMUM POSTS,REVIEWS,ORGANIZATIONS TO LIST PER PAGE ON WEBSITE]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Max Thumbnail Width </label></td>
                                                        <td class="value">
                                                            <input id="max_thumb_width" name="max_thumb_width" value="<?php echo get_setting('max_thumb_width');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[GENERATED THUMBNAIL WIDTH IN PIXELS]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Max Thumbnail Height </label></td>
                                                        <td class="value">
                                                            <input id="max_thumb_height" name="max_thumb_height" value="<?php echo get_setting('max_thumb_height');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[GENERATED THUMBNAIL HEIGHT IN PIXELS]</td>
                                                        <td><small></small></td>
                                                    </tr>                                                  
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Facebook Social Link</label></td>
                                                        <td class="value">
                                                            <input id="facebook_social_link" name="facebook_social_link" value="<?php echo get_setting('facebook_social_link');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[FACEBOOK SOCIAL MEDIA PROFILE LINK]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                     <tr class="hidden">
                                                        <td class="label"><label for="status">Twitter Social Link</label></td>
                                                        <td class="value">
                                                            <input id="twitter_social_link" name="twitter_social_link" value="<?php echo get_setting('twitter_social_link');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TWITTER SOCIAL MEDIA PROFILE LINK]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    
                                                     <tr class="hidden">
                                                        <td class="label"><label for="status">Google Plus Social Link</label></td>
                                                        <td class="value">
                                                            <input id="google_social_link" name="google_social_link" value="<?php echo get_setting('google_social_link');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[GOOGLE SOCIAL MEDIA PROFILE LINK]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    
                                                     <tr class="hidden">
                                                        <td class="label"><label for="status">Youtube Social Link</label></td>
                                                        <td class="value">
                                                            <input id="youtube_social_link" name="youtube_social_link" value="<?php echo get_setting('youtube_social_link');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[YOUTUBE SOCIAL MEDIA CHANNEL LINK]</td>
                                                        <td><small></small></td>
                                                    </tr>                                                     
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Footer Links Block 1</label></td>
                                                        <td class="value">
                                                            <textarea id="footer_links_block_1" name="footer_links_block_1"><?php echo get_setting('footer_links_block_1');?></textarea>
                                                        </td>
                                                        <td class="scope-label">[PLACE HTML TEXT CODE FOR FOOTER LINK BLOCK 1]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Footer Links Block 2</label></td>
                                                        <td class="value">
                                                            <textarea id="footer_links_block_2" name="footer_links_block_2"><?php echo get_setting('footer_links_block_2');?></textarea>
                                                        </td>
                                                        <td class="scope-label">[PLACE HTML TEXT CODE FOR FOOTER LINK BLOCK 2]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Footer Links Block 3</label></td>
                                                        <td class="value">
                                                            <textarea id="footer_links_block_3" name="footer_links_block_3"><?php echo get_setting('footer_links_block_3');?></textarea>
                                                        </td>
                                                        <td class="scope-label">[PLACE HTML TEXT CODE FOR FOOTER LINK BLOCK 3]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Footer Links Block 4</label></td>
                                                        <td class="value">
                                                            <textarea id="footer_links_block_4" name="footer_links_block_4"><?php echo get_setting('footer_links_block_4');?></textarea>
                                                        </td>
                                                        <td class="scope-label">[PLACE HTML TEXT CODE FOR FOOTER LINK BLOCK 4]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Footer Left Widget</label></td>
                                                        <td class="value">
                                                            <textarea id="footer_left" name="footer_left"><?php echo get_setting('footer_left');?></textarea>
                                                        </td>
                                                        <td class="scope-label">[PLACE HTML TEXT CODE FOR FOOTER COPYRIGHT PORTION]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Footer Right Widget</label></td>
                                                        <td class="value">
                                                            <textarea id="footer_right" name="footer_right"><?php echo get_setting('footer_right');?></textarea>
                                                        </td>
                                                        <td class="scope-label">[PLACE HTML TEXT CODE FOR FOOTER ADDRESS PORTION]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>
    						</li>                            
                            
                            <li >
                                <a href="<?php echo site_url('/admin/settings/home/');?>" id="isoft_group_3" name="group_2" title="Homepage Settings" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Homepage Settings
                                    </span>
                                </a>
                                <div id="isoft_group_3_content" style="display:none;"></div>
                            </li>
                            
                            <li >
                                <a href="<?php echo site_url('/admin/settings/meta/');?>" id="isoft_group_9" name="group_3" title="Meta Settings" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Meta Settings
                                    </span>
                                </a>
                                <div id="isoft_group_9_content" style="display:none;"></div>
                            </li>                            
                           
                            <li >
                                <a href="<?php echo site_url('/admin/settings/email/');?>" id="isoft_group_11" name="group_4" title="Email Templates" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Email Templates
                                    </span>
                                </a>
                                <div id="isoft_group_11_content" style="display:none;"></div>
                            </li>
    						<!--li >
                                <a href="<?php echo site_url('/admin/settings/static_pages/');?>" id="isoft_group_5" name="group_5" title="Static Pages" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Static Pages
                                    </span>
                                </a>
                                <div id="isoft_group_5_content" style="display:none;"></div>
                            </li-->
                            <li >
                                <a href="<?php echo site_url('/admin/settings/slider/');?>" id="isoft_group_6" name="group_6" title="Slider Settings" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Slider Settings
                                    </span>
                                </a>
                                <div id="isoft_group_6_content" style="display:none;"></div>
                            </li>
						</ul>
                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_1', []);
                        </script>
                        
					</div>
                    
					<div class="main-col" id="content">
						<div class="main-col-inner">
							<div id="messages">                            
                              <?php if($message !=''):?>
                                <ul class="messages">
                                	<li class="success-msg">
                                    	<ul><li><?php echo $message;?></li></ul>
                                    </li>
                                </ul>
                                <?php endif;?>                          
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Settings - General Settings</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/settings/general_submit/');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>