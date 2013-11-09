		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
					<div class="side-col" id="page:left">
    					<h3>News</h3>
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/manage_news/');?>" id="isoft_group_1" name="group_1" title="Manage News" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage News
                                    </span>
        						</a>                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Add News</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            	<?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <?php if(!empty($error)): echo "<div id='error'><p>".$error['upload'][0]."</p></div>";endif;?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                                                                      
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">News Title</label></td>
                                                        <td class="value">
                                                        	<input id="title" name="title" value="<?php echo $results[0]->title;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TITLE OF THE NEWS]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">News Description</label></td>
                                                        <td class="value">
                                                        	<textarea id="txtDescrition" name="txtDescription"><?php echo $results[0]->value;?></textarea>
                                                            <?php echo display_ckeditor($ckeditor_1); ?>
                                                        </td>
                                                        <td class="scope-label">[DESCRIPTION OF THE NEWS]</td>
                                                            <td><small></small></td>
                                                    </tr>    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Featured Image</label></td>
                                                        <td class="value">
                                                        	<input type="file" name="filePhoto" />
                                                        </td>
                                                        <td class="scope-label">[FEATURED IMAGE OF THE NEWS]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                  
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Meta Keyword</label></td>
                                                        <td class="value">
                                                        	<textarea id="txtMetaKeyword" name="txtMetaKeyword"><?php echo $results[0]->meta_keyword;?></textarea>
                                                        </td>
                                                        <td class="scope-label">[Meta Keyword OF THE NEWS]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Meta Description</label></td>
                                                        <td class="value">
                                                        	<textarea id="txtMetaDescription" name="txtMetaDescription"><?php echo $results[0]->meta_description;?></textarea>
                                                        </td>
                                                        <td class="scope-label">[Meta Description OF THE NEWS]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                     
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Status</label></td>
                                                        <td class="value">
                                                        	<select id="status" name="status"><option value="published" <?php if($results[0]->post_status=='published'):?>selected<?php endif;?>>Published</option><option value="draft" <?php if($results[0]->post_status=='draft'):?>selected<?php endif;?>>Draft</option></select>
                                                        </td>
                                                        <td class="scope-label">[Meta Description OF THE NEWS]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                 
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>                 
    						</li>
                            <li><a href="<?php echo site_url('/admin/manage_news/add_news/');?>" id="isoft_group_2" name="group_2" title="Add News" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Add News
                                    </span>
        						</a>                                
                                <div id="isoft_group_2_content" style="display:none;">
                                	
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
                               <h3 class="icon-head head-products">News - Edit News</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/manage_news/update_news/');?>?POSTID=<?php echo $this->input->get('POSTID');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
			 </div>
        </div>