<!-- Start: Content Part -->
    <div id="content">
    	<div class="lsize">
        	<h2 class="blue">Directory <b>Page</b></h2>
            <div class="center pad_b01 btn_01">new organizations? &nbsp; 
            <span class="btn_01">
            	<?php 
					if($this->session->userdata('dir_approval')==1):?>
                	<a href="<?php echo site_url('/directory_page/submit_details/');?>">submit your details</a>
                    <?php endif;?>
            </span></div>
            <div class="search">             
            <form class="form" id="frmOrganization" action="" method="post">
            <span class="text">Search by </span>
            <select name="selGroup" id="selGroup" class="required">
				<?php foreach($organisation_groups as $row ){?>
                <option value="<?php echo $row['group_id'];?>" <?php if($row['group_id']==set_value('selGroup')):?>selected<?php endif;?>><?php echo $row['group_name'];?></option>
                <?php }?>                
            </select>
            <input type="text" onblur="clickrecall(this,'Organization Name')" onclick="clickclear(this, 'Organization Name')" value="Organization Name" class="input" id="organization_name" name="organization_name"/>
            <input name="" type="submit" class="btn" />
            <div class="clear"></div>
            </form>
            </div>
            <?php if($message<>''):?>
            <div class="clear"></div><br/>
                <ul class="messages">
                    <li class="success-msg"><?php echo $message;?></li>
                </ul>
            <?php endif;?>
            <div class="f_01"><?php echo $this->pagination->total_rows;?> Result found</div>
            <ul class="dir_listing">                
                <?php 
				if(!empty($results)):
					$cnt=0;
					foreach($results as $row):
					if($cnt%2==0):
						$class="even";
					else:
						$class="odd";
					endif;
				?>
                
                <li class="<?php echo $class;?>">
                <div class="img"><a href="<?php echo site_url('/directory_detail/');?>?ID=<?php echo $row->DIRECTORY_ID?>"><img src="<?php echo base_url();?>uploads/images/thumb_<?php echo $row->organization_logo;?>" alt="" class="bor_01" width="110" height="110"/></a></div>
              	<div class="details">
                    <h5><a href="<?php echo site_url('/directory_detail/');?>?ID=<?php echo $row->DIRECTORY_ID?>"><?php echo $row->organization_name;?></a></h5><div class="view_more"><a href="<?php echo site_url('/directory_detail/');?>?ID=<?php echo $row->DIRECTORY_ID?>">View details</a></div>
                    <div class="clear"></div>
                  	<div class="col_01">
                    <table width="100%" border="0" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="70" valign="top"><b class="blue">Address</b></td>
                        <td width="5" valign="top"><b class="blue">:</b></td>
                        <td valign="top"><?php echo $row->address;?></td>
                      </tr>
                    </table>
               	  	</div>
                    <div class="col_01">
                      <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="70"><b class="blue">City</b></td>
                          <td width="5"><b class="blue">:</b></td>
                          <td><?php echo $row->city;?></td>
                        </tr>
                        <tr>
                          <td><b class="blue">Post Code</b></td>
                          <td><b class="blue">:</b></td>
                          <td><?php echo $row->postalcode;?></td>
                        </tr>
                        <tr>
                          <td><b class="blue">Phone</b></td>
                          <td><b class="blue">:</b></td>
                          <td><?php echo $row->telephone;?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col_01">
                      <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="70"><b class="blue">Email</b></td>
                          <td width="5"><b class="blue">:</b></td>
                          <td><a href="mailto:<?php echo $row->email;?>"><?php echo $row->email;?></a></td>
                        </tr>
                        <tr>
                          <td><b class="blue">Website</b></td>
                          <td><b class="blue">:</b></td>
                          <td><a href="<?php echo $row->website;?>"><?php echo $row->website;?></a></td>
                        </tr>
                      </table>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                </li>
                <?php 
					$cnt++; endforeach;
					else:?>
                    <li class="odd">Sorry! no record found.</li>
				<?php endif;?>       
            </ul>
            <?php 
				if($this->pagination->total_rows > 10):?>
                    <div class="pagination">
                        <?php echo $links; ?>
                    </div>
            <?php endif;?>
            <div id="social_media">
           	<ul>
            	<li class="facebook"><a href="<?php echo get_setting('facebook_social_link');?>" target="_blank">Facebook</a></li>
            	<li class="twitter"><a href="<?php echo get_setting('twitter_social_link');?>" target="_blank">Twitter</a></li>
            	<li class="g_plus"><a href="<?php echo get_setting('google_social_link');?>" target="_blank">Google Plus</a></li>
            	<li class="you_tube"><a href="<?php echo get_setting('youtube_social_link');?>" target="_blank">You Tube</a></li>
            </ul>
             <div class="clear"></div>
             </div>            	
        </div>
    </div>
<!-- End: Content Part -->