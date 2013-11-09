		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">                
					<div class="side-col" id="page:left">
    					<h3>Administrators</h3>						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/admins_manage/');?>" id="isoft_group_1" name="group_1" title="Manage Administrators" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Administrators
                                    </span>
        						</a>
                                <div id="isoft_group_1_content" style="display:none;">
                                <div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Administrator</h4>
                                            <div class="form-buttons">
                                            </div>
                                    	</div>
										<fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            <?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                            	<table cellspacing="0" class="form-list">
                                                <tbody>
                                                	<tr class="hidden">
                                                        <td class="label"><label for="name">Admin ID </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->ADMINID;?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                	<tr class="hidden">
                                                        <td class="label"><label for="name">Username </label></td>
                                                        <td class="value">
                                                        	<input id="username" readonly="readonly" name="username" value="<?php echo $results[0]->username; ?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ADMIN USERNAME]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                	<tr class="hidden">
                                                        <td class="label"><label for="name">Password </label></td>
                                                        <td class="value">
                                                        	<input id="password" name="password" value="" class=" required-entry required-entry input-text" type="password"/>
                                                        </td>
                                                        <td class="scope-label">[ADMIN PASSWORD]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">E-Mail </label></td>
                                                        <td class="value">
                                                        	<input id="email" name="email" value="<?php echo $results[0]->email; ?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ADMIN E-MAIL ADDRESS]</td>
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
                                <a href="<?php echo site_url('/admin/admins_manage/create_admin/');?>" id="isoft_group_2" name="group_2" title="Create Administrator" class="tab-item-link">
                                	<span>
                                    	<span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Create Administrator
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
                            <div class="content-header">
                               <h3 class="icon-head head-products">Administrators - Edit Administrator</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Submit</span></button>			
                                </p>
                            </div>                            
                            <form action="<?php echo site_url('/admin/admins_manage/update_admin/');?>?ADMINID=<?php echo $this->input->get('ADMINID');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
             </div>
        </div>