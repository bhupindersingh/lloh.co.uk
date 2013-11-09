		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Organization Groups</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/organization_groups/');?>" id="isoft_group_1" name="group_1" title="Manage Categories" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Categories
                                    </span>
        						</a>                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Category</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            	<?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">GROUP ID </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->GROUPID;?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Organization Name </label></td>
                                                        <td class="value">
                                                        	<input id="organization" name="organization" value="<?php echo $results[0]->group_name;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NAME OF THE ORGANIZATION TYPE]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                   
                                                                                                    
                                                </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
									</div>
								</div>                                
    						</li>
                            <li><a href="<?php echo site_url('/admin/organization_groups/add_category/');?>" id="isoft_group_2" name="group_1" title="Edit Category" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Create Category
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
                               <h3 class="icon-head head-products">Organization Groups - Edit Category</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/organization_groups/update_category/');?>?GROUPID=<?php echo $this->input->get('GROUPID');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
			 </div>
        </div>