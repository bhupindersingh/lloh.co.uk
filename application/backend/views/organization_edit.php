		<div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">
                
					<div class="side-col" id="page:left">
    					<h3>Directory</h3>
						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/manage_directory/');?>" id="isoft_group_1" name="group_1" title="Manage Directory" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Directory
                                    </span>
        						</a>                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Organization</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            	<?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                                                                      
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Organization Type </label></td>
                                                        <td class="value">
                                                        	<select name="group_type" id="group_type">                                                            	
                                                            <?php foreach($group_types as $row ){?>
                                                            	<option value="<?php echo $row['group_id'];?>" <?php if($results[0]->organization_group == $row['group_id']):?>selected<?php endif;?>><?php echo $row['group_name'];?></option>
                                                            <?php }?>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ORGANIZATION GROUP TYPE]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Organization Name </label></td>
                                                        <td class="value">
                                                        	<input id="organization_name" name="organization_name" value="<?php echo $results[0]->organization_name;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NAME OF THE ORGANIZATION]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                     <tr class="hidden">
                                                        <td class="label"><label for="name">Organization Logo </label></td>
                                                        <td class="value">
                                                        	<input id="organization_logo" name="organization_logo" value="" class=" required-entry required-entry input-text" type="file"/>
                                                        </td>
                                                        <td class="scope-label">[ORGANIZATION LOGO]</td>
                                                            <td><small></small></td>
                                                    </tr>  
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Address </label></td>
                                                        <td class="value">
                                                        	<textarea id="address" name="address" class=" textarea" type="textarea"><?php echo $results[0]->address;?></textarea>
                                                        </td>
                                                        <td class="scope-label">[ADDRESS OF ORGANIZATION]</td>
                                                            <td><small></small></td>
                                                    </tr>  
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">City </label></td>
                                                        <td class="value">
                                                        	<input id="city" name="city" value="<?php echo $results[0]->city;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[CITY OF ORGANIZATION]</td>
                                                            <td><small></small></td>
                                                    </tr>    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Postal Code </label></td>
                                                        <td class="value">
                                                        	<input id="postal_code" name="postal_code" value="<?php echo $results[0]->postalcode;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[POSTAL CODE OF ORGANIZATION]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Telephone</label></td>
                                                        <td class="value">
                                                        	<input id="telephone" name="telephone" value="<?php echo $results[0]->telephone;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[TELEPHONE OF ORGANIZATION]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Email</label></td>
                                                        <td class="value">
                                                        	<input id="email" name="email" value="<?php echo $results[0]->email;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[EMAIL OF ORGANIZATION]</td>
                                                            <td><small></small></td>
                                                    </tr>  
                                                     <tr class="hidden">
                                                        <td class="label"><label for="name">Website</label></td>
                                                        <td class="value">
                                                        	<input id="website" name="website" value="<?php echo $results[0]->website;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[WEBSITE OF ORGANIZATION]</td>
                                                            <td><small></small></td>
                                                    </tr>  
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Status </label></td>
                                                        <td class="value">
                                                        	<select name="status" id="status">
                                                            <option value="1" <?php if($results[0]->status==1):?>selected<?php endif;?>>Yes</option>
                                                            <option value="0" <?php if($results[0]->status==0):?>selected<?php endif;?>>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[STATUS OF ORGANIZATION]</td>
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
        						<a href="<?php echo site_url('/admin/manage_directory/add_organization/');?>" id="isoft_group_2" name="group_1" title="Add Organization to Directory" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Add Organization
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
                               <h3 class="icon-head head-products">Directory - Edit Organization</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/manage_directory/update_directory/');?>?DIRECTORYID=<?php echo $this->input->get('DIRECTORYID');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>

                        </div>
        </div>