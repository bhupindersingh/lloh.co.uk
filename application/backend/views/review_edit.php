<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/admin/css/tcal.css" />
<script type="text/javascript" src="<?php echo base_url();?>themes/admin/js/tcal.js"></script> 
        <div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">                
					<div class="side-col" id="page:left">
    					<h3>Testimonials</h3>						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/manage_comments/');?>" id="isoft_group_1" name="group_1" title="Manage Members" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Testimonials
                                    </span>
        						</a>                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Testimonial</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            	<?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Testimonial ID </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->REVIEW_ID;?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Name </label></td>
                                                        <td class="value">
                                                        	<input id="name" name="name" value="<?php echo $results[0]->name;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[NAME OF THE USER WHO POSTED TESTIMONIAL]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Organization Type </label></td>
                                                        <td class="value">
                                                        	<select name="organization" id="organization">                                                            	
                                                            <?php foreach($group_types as $row ){?>
                                                            	<option value="<?php echo $row['group_id'];?>" <?php if($results[0]->organization == $row['group_id']):?>selected<?php endif;?>><?php echo $row['group_name'];?></option>
                                                            <?php }?>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ORGANIZATION TYPE OF THE TESTIMONIAL]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                      
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Testimonial</label></td>
                                                        <td class="value">                                                        	
                                                        	<textarea id="review" name="review" class=" textarea" type="textarea"><?php echo $results[0]->review;?></textarea>
                                                        </td>
                                                        <td class="scope-label">[TESTIMONIAL POSTED BY USER]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                                                
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Date Posted </label></td>
                                                        <td class="value">
                                                        	<?php echo date("F j, Y",strtotime($results[0]->date_posted));?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>                                                                                                   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Published </label></td>
                                                        <td class="value">
                                                        	<select name="status" id="status">
                                                            <option value="published" <?php if($results[0]->status == "published"):?>selected<?php endif;?>>Yes</option>
                                                            <option value="draft" <?php if($results[0]->status == "draft"):?>selected<?php endif;?>>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[TESTIMONIAL STATUS]</td>
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
                               <h3 class="icon-head head-products">Testimonial - Edit Testimonial</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/manage_comments/update_review/');?>?REVIEWID=<?php echo $this->input->get('REVIEWID');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
			 </div>
        </div>