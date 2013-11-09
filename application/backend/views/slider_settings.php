<script language="javascript">
function open_upload_form(){
	jQuery.noConflict();
	jQuery.fancybox({
            'width': '60%',
            'height': '80%',
            'autoScale': true,
            'transitionIn': 'fade',
            'transitionOut': 'fade',
            'href': '<?php echo site_url('/admin/settings/upload_image/');?>',
            'type': 'iframe',
            'onClosed': function() {
                //window.location.href = "";
            }
        });
        return false;	
}
</script>
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
                                <div id="isoft_group_6_content" style="display:none;">
                                <div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Slider Settings</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            <?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 1</label></td>
                                                        <td class="value">
                                                        	<input id="image1_url" name="image1_url" value="<?php echo get_setting('image1_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 1 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                                                                       
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 2</label></td>
                                                        <td class="value">
                                                        	<input id="image2_url" name="image2_url" value="<?php echo get_setting('image2_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 2 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 3</label></td>
                                                        <td class="value">
                                                        	<input id="image3_url" name="image3_url" value="<?php echo get_setting('image3_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 3 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 4</label></td>
                                                        <td class="value">
                                                        	<input id="image4_url" name="image4_url" value="<?php echo get_setting('image4_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 4 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 5</label></td>
                                                        <td class="value">
                                                        	<input id="image5_url" name="image5_url" value="<?php echo get_setting('image5_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 5 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 6</label></td>
                                                        <td class="value">
                                                        	<input id="image6_url" name="image6_url" value="<?php echo get_setting('image6_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 6 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 7</label></td>
                                                        <td class="value">
                                                        	<input id="image7_url" name="image7_url" value="<?php echo get_setting('image7_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 7 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 8</label></td>
                                                        <td class="value">
                                                        	<input id="image8_url" name="image8_url" value="<?php echo get_setting('image8_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 8 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 9</label></td>
                                                        <td class="value">
                                                        	<input id="image9_url" name="image9_url" value="<?php echo get_setting('image9_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 9 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Slider Image 10</label></td>
                                                        <td class="value">
                                                        	<input id="image10_url" name="image10_url" value="<?php echo get_setting('image10_url');?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[SLIDER IMAGE 10 WILL GOES HERE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                   
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
                                </div>
                            </li>
						</ul>
                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_6', []);
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
                               <h3 class="icon-head head-products">Settings - Slider Settings</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="upload_image" type="button" class="scalable add" onclick="javascript:open_upload_form();" style=""><span>Upload Image</span></button>		 <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/settings/slider_submit/');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>