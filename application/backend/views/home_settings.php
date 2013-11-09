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
                                <div id="isoft_group_1_content" style="display:none;"></div>
    						</li>                            
                            
                            <li >
                                <a href="<?php echo site_url('/admin/settings/home/');?>" id="isoft_group_2" name="group_2" title="Homepage Settings" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Home Page Settings
                                    </span>
                                </a>
                                
                                <div id="isoft_group_2_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Home Page Settings</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            <?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Video Link</label></td>
                                                        <td class="value">
                                                        	<input id="video_link" name="video_link" value="<?php echo get_setting('video_link');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[PLACE YOUTUBE VIDEO URL HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Welcome Text</label></td>
                                                        <td class="value">
                                                            <textarea id="welcome_text" name="welcome_text"><?php echo get_setting('welcome_text');?></textarea>
                                                            <?php echo display_ckeditor($ckeditor_1); ?>
                                                        </td>
                                                        <td class="scope-label">[INSERT WELCOME TEXT HERE, HTML WILL BE ACCECPTABLE]</td>
                                                        <td><small></small></td>
                                                    </tr>                                                   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Latest Request Per Load</label></td>
                                                        <td class="value">
                                                            <input id="latest_request_per_page" name="latest_request_per_page" value="<?php echo get_setting('latest_request_per_page');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[MAXIMUM LATEST REQUESTS PER LOAD]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Latest Request Ending Soon</label></td>
                                                        <td class="value">
                                                            <input id="latest_request_ending_soon" name="latest_request_ending_soon" value="<?php echo get_setting('latest_request_ending_soon');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NUMBER OF LATEST REQUEST ENDING SOON]</td>
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
                                <a href="<?php echo site_url('/admin/settings/meta/');?>" id="isoft_group_3" name="group_3" title="Meta Settings" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Meta Settings
                                    </span>
                                </a>
                                <div id="isoft_group_3_content" style="display:none;"></div>
                            </li>                            
                           
                            <li >
                                <a href="<?php echo site_url('/admin/settings/email/');?>" id="isoft_group_4" name="group_4" title="Email Templates" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Email Templates
                                    </span>
                                </a>
                                <div id="isoft_group_4_content" style="display:none;"></div>
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
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_2', []);
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
                               <h3 class="icon-head head-products">Settings - Home Page Settings</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/settings/home_submit/');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>