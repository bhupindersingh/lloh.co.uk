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
                                            <h4 class="icon-head head-edit-form fieldset-legend">Administrators</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <div>
        			<div id="customerGrid">
        				<table cellspacing="0" class="actions">
        				<tr>
                    		<td class="pager">&nbsp;</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='<?php echo site_url('/admin/admins_manage/');?>'" style=""><span>Reset Filter</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Search</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col  width="50"  width="100px"  />
                                <col   />
                                <col  width="150"  />
                                <col  width="100"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                        <th ><span class="nobr"><a href="#" name="id" class="desc"><span class="sort-title">ID</span></a></span></th>
                                        <th ><span class="nobr"><a href="#" name="email" class="desc"><span class="sort-title">E-Mail Address</span></a></span></th>
                                        <th ><span class="nobr"><a href="#" name="username" class="desc"><span class="sort-title">Username</span></a></span></th>
                                        <th  class=" no-link last"><span class="nobr">Action</span></th>
	                	            </tr>
	            	            	<tr class="filter">
                                        <th >
                                            <div class="range">
                                                <div class="range-line">
                                                    <span class="label">From:</span> 
                                                    <input type="text" name="fromid" id="fromid" value="<?php echo set_value('fromid'); ?>" class="input-text no-changes"/>
                                                </div>
                                                <div class="range-line">
                                                    <span class="label">To : </span>
                                                    <input type="text" name="toid" id="toid" value="<?php echo set_value('toid'); ?>" class="input-text no-changes"/>
                                                </div>
                                            </div>
                                        </th>
                                        <th ><input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" class="input-text no-changes"/></th>
                                        <th ><input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="input-text no-changes"/></th>
                                        <th  class=" no-link last">
                                            <div style="width: 100%;">&nbsp;</div>
                                        </th>
	                	            </tr>
	            	        	</thead>
	    	    	    		<tbody>
                                	<?php
									if(!empty($results)):
                                    foreach($results as $data):?> 
                                    <tr id="" >
                                        <td align="center"><?php echo $data->ADMINID;?></td>
                                        <td class=" "><?php echo $data->email;?></td>
                                        <td class=" "><?php echo $data->username;?></td>
                                        <td class=" last">
                                        	<a href="<?php echo site_url('/admin/admins_manage/edit/');?>?ADMINID=<?php echo $data->ADMINID;?>">Edit</a>&nbsp;|&nbsp;
                                            <form name="d<?php echo $data->ADMINID;?>" id="d<?php echo $data->ADMINID;?>" action="" method="post">
                                            <input type="hidden" name="AUSERID" value="<?php echo $data->ADMINID;?>" />                                             
                                            <input type="hidden" name="action" value="delete" />                                        
                                            </form><a href="javascript: document.d<?php echo $data->ADMINID;?>.submit();">Delete</a>
                                        </td>
                                	</tr>
                                    <?php endforeach;?>
                                    <?php else:?>
                                    <tr id="" ><td colspan="4">Sorry! no record found.</td></tr>
                                    <?php endif;?>                            
                                    <?php if($record_count > 0):?>
                                    <tr>
                                    	<td colspan="4">
                                        <?php echo $links; ?>
                                        </td>
                                    </tr>
                                    <?php endif;?>                                    
	    	    	    		</tbody>
								</table>
                            </div>
                        </div>
					</div>
				</div>
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
                                <div id="isoft_group_2_content" style="display:none;"></div>
                            </li>    
						</ul>                        
						<script type="text/javascript">
                            isoftJsTabs = new varienTabs('isoft', 'main_form', 'isoft_group_1', []);
                        </script>                        
					</div>                    
					<div class="main-col" id="content">
						<div class="main-col-inner">
							<div id="messages">
                            	<?php if($record_count == 0):?>
                                <ul class="messages">
                                    <li class="error-msg">
                                    	<ul><li>Sorry, no members were found.</li></ul>
                                    </li>
                                </ul>
								<?php endif;?>
								<?php if($message !=''):?>
                                <ul class="messages">
                                	<li class="success-msg">
                                    	<ul><li><?php echo $message;?></li></ul>
                                    </li>
                                </ul>
                                <?php endif;?>
                            </div>

                            <div class="content-header">
                               <h3 class="icon-head head-products">Administrators - Manage Administrators</h3>
                               <p class="content-buttons form-buttons">
                                    <button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable add" onclick="document.location.href='<?php echo site_url('/admin/admins_manage/create_admin/');?>'" style=""><span>Create Administrator</span></button>			
                               </p>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/admins_manage/');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
             </div>
        </div>