		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
					<div class="side-col" id="page:left">
    					<h3>Static Pages</h3>
						
                        <ul id="isoft" class="tabs">
    						
                            <li >
                                <a href="javascript:void(0);" id="isoft_group_1" name="group_1" title="Static Pages" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        CMS Pages
                                    </span>
                                </a>
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Static Pages</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            	<?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                            	<form action="<?php echo site_url('/admin/settings/submit_pages/');?>" method="post" id="main_form1" name="main_form1" enctype="multipart/form-data">
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status"><?php echo $page_title;?> </label></td>
                                                        <td class="value">
                                                            <input id="title" name="title" value="<?php echo get_static_page($pagenumber,'title');?>" class=" required-entry required-entry input-text" type="text"  style="width:700px"/>
                                                        </td>
                                                    </tr>   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status"><?php echo $page_data;?> </label></td>
                                                        <td class="value">
                                                        <textarea id="static_page" name="value" class=" textarea" type="textarea" style="width:700px; height:500px;" ><?php echo get_static_page($pagenumber,'value');?></textarea><?php echo display_ckeditor($ckeditor_1); ?>
                                                        </td>
                                                    </tr>  
                                                    
                                                    <tr class="hidden">
                                                        <td class="label">
                                                                <button type="button" class="scalable save" onclick="document.main_form1.submit();" style=""><span>Save Changes</span></button>			
                                                        </td>
                                                        <td class="value">
                                                        </td>
                                                    </tr>                                             
                                                </tbody>
                                                </table>
                                                <input type="hidden" id="submitform1" name="submitform<?php echo $pagenumber;?>" value="1" >
                                                </form>                                                                                           
                                            </div>
                                        </fieldset>
									</div>
								</div>
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
                               <h3 class="icon-head head-products">CMS Pages</h3>
                            </div>
                            
                            <div id="main_form">
                            </div>

						</div>
					</div>
				</div>

                        </div>
        </div>