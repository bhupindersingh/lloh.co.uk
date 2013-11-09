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
                                            <h4 class="icon-head head-edit-form fieldset-legend">View Donar Details</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <fieldset id="group_fields4">
                                            <div class="hor-scroll">   
                                            	<?php if(!empty($results[0])):?>                                         	
                                                <table cellspacing="0" class="form-list">
                                                <tbody>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">DONER ID </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->DONATE_ID;?>
                                                        </td>
                                                        <td class="scope-label"></td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Post Name: </label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->post_name;?>
                                                        </td>
                                                        <td class="scope-label">[POST NAME]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Firstname:</label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->first_name;?>
                                                        </td>
                                                        <td class="scope-label">[FIRST NAME OF DONAR]</td>
                                                        <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Lastname:</label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->last_name;?>
                                                        </td>
                                                        <td class="scope-label">[LAST NAME OF THE DONAR]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Telephone:</label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->telephone;?>
                                                        </td>
                                                        <td class="scope-label">[TELEPHONE OF THE DONAR]</td>
                                                            <td><small></small></td>
                                                    </tr>
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Mobile:</label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->mobile;?>
                                                        </td>
                                                        <td class="scope-label">[MOBILE OF THE DONAR]</td>
                                                            <td><small></small></td>
                                                    </tr> 
                                                     <tr class="hidden">
                                                        <td class="label"><label for="name">Email:</label></td>
                                                        <td class="value">
                                                        	<?php echo $results[0]->email;?>
                                                        </td>
                                                        <td class="scope-label">[EMAIL FOR THE DONAR]</td>
                                                            <td><small></small></td>
                                                    </tr>   
                                                    <tr class="hidden">
                                                        <td class="label"><label for="name">Date Posted:</label></td>
                                                        <td class="value">
                                                        	<?php echo date("Y-m-d",strtotime($results[0]->date_posted));?>
                                                        </td>
                                                        <td class="scope-label">[DONATION SUBMITTED DATE]</td>
                                                            <td><small></small></td>
                                                    </tr>                                                    
                                                </tbody>
                                                </table>
                                                <?php else:?>
                                                <ul class="messages">
                                                    <li class="error-msg">
                                                        <ul><li>Sorry! there is no donar found for this post.</li></ul>
                                                    </li>
                                                </ul>
                                                <?php endif;?>
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
                               <h3 class="icon-head head-products">Donations - View Donar Details</h3>
                               
                            </div>
                            
                            <form action="#" method="post" id="main_form" name="main_form" enctype="multipart/form-data">                            	
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
			 </div>
        </div>