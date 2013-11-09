<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/admin/css/tcal.css" />
<script type="text/javascript" src="<?php echo base_url();?>themes/admin/js/tcal.js"></script> 
        <div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">                
					<div class="side-col" id="page:left">
    					<h3>Donations</h3>						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/manage_donations/');?>" id="isoft_group_1" name="group_1" title="Manage Donations" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Donations
                                    </span>
        						</a>                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Post</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            	<?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">POST ID </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->POST_ID;?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Post Sumitted By: </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->firstname.' '.$results[0]->lastname;?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Name of Request</label></td>
                                                        <td class="value">
                                                        	<input id="post_name" name="post_name" value="<?php echo $results[0]->post_name;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NAME OF REQUEST]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Description</label></td>
                                                        <td class="value">
                                                        	<textarea id="description" name="description"><?php echo $results[0]->description;?></textarea>
                                                        </td>
                                                        <td class="scope-label">[DESCRIPTION OF THE POST]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Post Image</label></td>
                                                        <td class="value">
                                                        	<img src="<?php echo base_url();?>uploads/images/thumb_<?php echo $results[0]->photo;?>" border="0"/>
                                                        </td>
                                                        <td class="scope-label">[POST IMAGE]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Quantity Required</label></td>
                                                        <td class="value">
                                                        	<input id="quantity_required" name="quantity_required" value="<?php echo $results[0]->quantity_required;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[QUANTITY REQUIRED FOR THE POST]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                     <tr class="hidden">
                                                        <td class="label"><label for="name">Post Deadline</label></td>
                                                        <td class="value">
                                                        	<input id="deadline" name="deadline" value="<?php echo date("Y-m-d",strtotime($results[0]->deadline));?>" class="tcal required-entry required-entry input-text" type="text" readonly="readonly"/>
                                                        </td>
                                                        <td class="scope-label">[DEADLINE FOR THE POST]</td>
                                                            <td><small></small></td>
                                                    </tr>   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Status</label></td>
                                                        <td class="value">
                                                        	<select name="selStatus" id="selStatus">
                                                            	<option value="active" <?php if($results[0]->status == "active"):?>selected<?php endif;?>>Active</option>
                                                                <option value="expired" <?php if($results[0]->status == "expired"):?>selected<?php endif;?>>Expired</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[STATUS OF THE POST]</td>
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
                               <h3 class="icon-head head-products">Donations - Edit Post</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/manage_donations/update_post/');?>?POSTID=<?php echo $this->input->get('POSTID');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
			 </div>
        </div>