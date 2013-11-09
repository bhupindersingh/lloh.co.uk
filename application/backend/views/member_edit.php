<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/admin/css/tcal.css" />
<script type="text/javascript" src="<?php echo base_url();?>themes/admin/js/tcal.js"></script> 
        <div class="middle" id="anchor-content">
            <div id="page:main-container">
				<div class="columns ">                
					<div class="side-col" id="page:left">
    					<h3>Members</h3>						
                        <ul id="isoft" class="tabs">
    						<li >
        						<a href="<?php echo site_url('/admin/manage_members/');?>" id="isoft_group_1" name="group_1" title="Manage Members" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Manage Members
                                    </span>
        						</a>                                
                                <div id="isoft_group_1_content" style="display:none;">
                                	<div class="entry-edit">
                                        <div class="entry-edit-head">
                                            <h4 class="icon-head head-edit-form fieldset-legend">Edit Member</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">
                                            	<?php echo "<div id='error'>".validation_errors()."</div>" ?>
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Member ID </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->USERID;?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Gender </label></td>
                                                        <td class="value">
                                                        	<select name="gender" id="gender">
                                                            <option value="male" <?php if($results[0]->gender == "male"):?>selected<?php endif;?>>Male</option>
                                                            <option value="female" <?php if($results[0]->gender == "female"):?>selected<?php endif;?>>Female</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[MEMBER GENDER]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">First Name </label></td>
                                                        <td class="value">
                                                        	<input id="firstname" name="firstname" value="<?php echo $results[0]->firstname;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[FIRST NAME OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Last Name </label></td>
                                                        <td class="value">
                                                        	<input id="lastname" name="lastname" value="<?php echo $results[0]->lastname;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[LAST NAME OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Organization Name </label></td>
                                                        <td class="value">
                                                        	<input id="organization_name" name="organization_name" value="<?php echo $results[0]->organization_name;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[ORGANIZATION NAME OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                     <tr class="hidden">
                                                        <td class="label"><label for="name">Group Type</label></td>
                                                        <td class="value">
                                                        	<select name="group_type" id="group_type">                                                            	
                                                            <?php foreach($group_types as $row ){?>
                                                            	<option value="<?php echo $row['group_id'];?>" <?php if($results[0]->group_type == $row['group_id']):?>selected<?php endif;?>><?php echo $row['group_name'];?></option>
                                                            <?php }?>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ORGANIZATION GROUP TYPE OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr>   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">E-Mail </label></td>
                                                        <td class="value">
                                                        	<input id="email" name="email" value="<?php echo $results[0]->email;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[EMAIL ADDRESS OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                     <tr class="hidden">
                                                        <td class="label"><label for="name">Birth Day</label></td>
                                                        <td class="value">
                                                        	<input id="dob" name="dob" value="<?php echo $results[0]->birthday;?>" class="tcal required-entry required-entry input-text" type="text" readonly="readonly"/>
                                                        </td>
                                                        <td class="scope-label">[BIRTH DAY OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Address</label></td>
                                                        <td class="value">
                                                        	<textarea id="address" name="address" class=" textarea" type="textarea"><?php echo $results[0]->address;?></textarea>
                                                        </td>
                                                        <td class="scope-label">[Address OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">City</label></td>
                                                        <td class="value">
                                                        	<input id="city" name="city" value="<?php echo $results[0]->city;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[City OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Postal Code</label></td>
                                                        <td class="value">
                                                        	<input id="postalcode" name="postalcode" value="<?php echo $results[0]->postal_code;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[POSTAL CODE OF THE MEMBER]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    
                                                     
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Username </label></td>
                                                        <td class="value">
                                                        	<input id="username" name="username" value="<?php echo $results[0]->username;?>" class=" required-entry required-entry input-text" type="text"/>
                                                        </td>
                                                        <td class="scope-label">[USERNAME OF THE MEMBER]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Member Photo</label></td>
                                                        <td class="value">
                                                        	<img src="<?php echo base_url().'uploads/images/thumb_'.$results[0]->photo;?>" />
                                                        </td>
                                                        <td class="scope-label">[MEMBER ACCOUNT PHOTO]</td>
                                                        <td><small></small></td>
                                                    </tr>                                                     
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Date Joined </label></td>
                                                        <td class="value">
                                                        	<?php echo date("F j, Y",strtotime($results[0]->addtime));?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Last Login </label></td>
                                                        <td class="value">
                                                        	<?php 
																if($results[0]->lastlogin == '0000-00-00 00:00:00'){
																	echo "Not logged in yet.";
																}
																else{
																	echo date("F j, Y",strtotime($results[0]->lastlogin));
																}
															?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>                                                    
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Active </label></td>
                                                        <td class="value">
                                                        	<select name="status" id="status">
                                                            <option value="1" <?php if($results[0]->status == "1"):?>selected<?php endif;?>>Yes</option>
                                                            <option value="0" <?php if($results[0]->status == "0"):?>selected<?php endif;?>>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[ACTIVE MEMBER ACCOUNT]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Directory Listing Approval </label></td>
                                                        <td class="value">
                                                        	<select name="directory_listing_approval" id="directory_listing_approval">
                                                            <option value="1" <?php if($results[0]->directory_listing_approval == "1"):?>selected<?php endif;?>>Yes</option>
                                                            <option value="0" <?php if($results[0]->directory_listing_approval == "0"):?>selected<?php endif;?>>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[DIRECTORY LISTING APPROVAL]</td>
                                                        <td><small></small></td>
                                                    </tr> 
                                                    <tr class="hidden">
                                                        <td class="label"><label for="status">Submit Request Approval </label></td>
                                                        <td class="value">
                                                        	<select name="submit_request_approval" id="submit_request_approval">
                                                            <option value="1" <?php if($results[0]->submit_request_approval == "1"):?>selected<?php endif;?>>Yes</option>
                                                            <option value="0" <?php if($results[0]->submit_request_approval == "0"):?>selected<?php endif;?>>No</option>
                                                            </select>
                                                        </td>
                                                        <td class="scope-label">[SUBMIT REQUEST APPROVAL]</td>
                                                        <td><small></small></td>
                                                    </tr>                                                   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">New Password </label></td>
                                                        <td class="value">
                                                        	<input id="newpass2" name="newpass2" value="" class=" required-entry required-entry input-text" type="password"/>
                                                        </td>
                                                        <td class="scope-label">[ONLY FILL THIS OUT IF YOU WISH TO CHANGE THE MEMBER'S CURRENT PASSWORD]</td>
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
                               <h3 class="icon-head head-products">Members - Edit Member</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable save" onclick="document.main_form.submit();" style=""><span>Save Changes</span></button>			
                                </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/manage_members/update_member/');?>?USERID=<?php echo $this->input->get('USERID');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
			 </div>
        </div>