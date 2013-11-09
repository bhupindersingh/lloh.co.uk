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
                                            <h4 class="icon-head head-edit-form fieldset-legend">Manage Categories</h4>
                                            <div class="form-buttons">

                                            </div>
                                    	</div>

                                        <div>
        			<div id="customerGrid">
        				<table cellspacing="0" class="actions">
        				<tr>
                    		<td class="pager">&nbsp;
                            	
                    		</td>
                			<td class="export a-right"></td>
            				<td class="filter-actions a-right">
                            	<button  id="id_ffba3971e132ae3d78c160244ea09b39" type="button" class="scalable " onclick="document.location.href='<?php echo site_url('/admin/organization_groups/');?>'" style=""><span>Reset Filter</span></button>
            					<button  id="id_56a0b03bf0b3be131176f3243cc289ff" type="button" class="scalable task" onclick="document.main_form.submit();" style=""><span>Search</span></button>        
                            </td>
        				</tr>
    					</table>
                        
                        <div class="grid">
							<div class="hor-scroll">
								<table cellspacing="0" class="data" id="customerGrid_table">
                                <col   width="100"  />                                
                                <col   />                                
                                <col  width="125"  />
	    	    	        	<thead>
	            	                <tr class="headings">
                                        <th ><span class="nobr"><a href="#"><span class="sort-title">ID</span></a></span></th>
                                        <th ><span class="nobr"><a href="#"><span class="sort-title">Name</span></a></span></th>                                        <th  class=" no-link last"><span class="nobr">Action</span></th>
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
                                       
                                        <th><input type="text" name="organization" id="organization" value="<?php echo set_value('organization'); ?>" class="input-text no-changes" style="width:300px!important;"/></th>
                                        
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
                                        <td align="center"><?php echo $data->GROUPID;?></td>
                                        <td class=" "><?php echo $data->group_name;?></td>                                        
                                        <td class=" last"><a href="<?php echo site_url('/admin/organization_groups/edit/');?>?GROUPID=<?php echo $data->GROUPID;?>">Edit</a>&nbsp;|&nbsp;<form name="c<?php echo $data->GROUPID;?>" id="c<?php echo $data->GROUPID;?>" action="" method="post">
                                            <input type="hidden" name="GROUPID" value="<?php echo $data->GROUPID;?>" />                                             
                                            <input type="hidden" name="action" value="delete" />                                        
                                            </form><a href="javascript: document.c<?php echo $data->GROUPID;?>.submit();">Delete</a></td>
                                	</tr>                                   
                                    <?php endforeach;?>
                                    <?php else:?>
                                    <tr id="" ><td colspan="7">Sorry! no record found.</td></tr>
                                    <?php endif;?>                            
                                    <?php if($this->pagination->total_rows > 20):?>
                                    <tr>
                                    	<td colspan="9">
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
                            <li><a href="<?php echo site_url('/admin/organization_groups/add_category/');?>" id="isoft_group_1" name="group_1" title="Create Category" class="tab-item-link ">
                                    <span>
                                        <span class="changed" title=""></span>
                                        <span class="error" title=""></span>
                                        Create Category
                                    </span>
        						</a>  </li>
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
                                    	<ul><li>Sorry, no category found.</li></ul>
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
                               <h3 class="icon-head head-products">Directory - Manage Organization Groups</h3>
                            </div>
                            
                            <form action="<?php echo site_url('/admin/organization_groups/');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
                            	<input type="hidden" id="submitform" name="submitform" value="1" >
                            	<div style="display:none"></div>
                            </form>
						</div>
					</div>
				</div>
			</div>
        </div>