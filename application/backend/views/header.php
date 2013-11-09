<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Admin Panel - Povertyproject</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script type="text/javascript">
        var BLANK_URL = '<?php echo base_url();?>themes/admin/js/blank.html';
        var BLANK_IMG = '<?php echo base_url();?>themes/admin/js/spacer.gif';
        var BASE_URL = '<?php echo base_url();?>admin/index.php';
        var SKIN_URL = '<?php echo base_url();?>themes/admin/js/';
    </script>
	<script type="text/javascript" src="<?php echo base_url();?>themes/admin/js/jquery-1.9.0.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url();?>themes/admin/js/jquery.fancybox.pack.js"></script> 
    <script src="<?php echo base_url();?>themes/admin/js/prototype.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/builder.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/effects.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/dragdrop.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/controls.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/slider.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/accordin.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/events.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/loader.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/tabs.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>themes/admin/js/tools.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/admin/css/jquery.fancybox.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/reset.css" media="all"></link>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/boxes.php" media="all"></link>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/menu.php" media="screen, projection"></link>
    <!--[if IE]>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/iestyles.css" media="all"></link>
    <![endif]-->
    <!--[if lt IE 7]>
    <script src="<?php echo base_url();?>themes/admin/js/iehover-fix.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/below_ie7.css" media="all"></link>
    <![endif]-->
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/ie7.php" media="all"></link>
    <![endif]-->
</head>

<body id="html-body">

	<div class="wrapper">
        <div class="header">
        
            <div class="header-top">
    			<a href="<?php echo site_url('/admin/home');?>"><img src="<?php echo base_url();?>themes/admin/images/logo.png" alt="Logo" class="logo"/></a>
    			<div class="header-right">
                    <p class="super">
                        Logged in as <?php echo $this->session->userdata('username');?><span class="separator">|</span><?php echo date('l jS, F Y h:i:s A');?><span class="separator">|</span><a href="<?php echo site_url('/admin/logout');?>" class="link-logout">Log Out</a>
                    </p>
            	</div>
			</div>
            
        	<div class="clear"></div>

            <div class="nav-bar">
            	<ul id="nav">
                	<li  class="<?php if($mainmenu == "" || $mainmenu == "1"):?>active<?php endif;?> level0"> <a href="<?php echo site_url('/admin/home/');?>"><span>Home</span></a></li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "2"):?>active<?php endif;?> parent level0"> <a href="#" onclick="return false" class=""><span>Settings</span></a>
                    	<ul >
                    		<li  class="level1"> <a href="<?php echo site_url('/admin/settings/general/');?>" class=""><span>General Settings</span></a></li>                            
                            <li  class="level1"> <a href="<?php echo site_url('/admin/settings/home/');?>" class=""><span>Home Page Settings</span></a></li>
                    		<li  class="   level1"> <a href="<?php echo site_url('/admin/settings/meta/');?>"   class=""><span>Meta Settings</span></a></li>
                            <li  class="   level1"> <a href="<?php echo site_url('/admin/settings/email/');?>"   class=""><span>Email Templates</span></a></li>
                            <!--li  class="   level1"> <a href="<?php echo site_url('/admin/settings/static_pages/');?>"   class=""><span>Static Pages</span></a></li-->
                            <li  class="   last level1"> <a href="<?php echo site_url('/admin/settings/slider/');?>"   class=""><span>Slider Settings</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "3"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>Media</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="<?php echo site_url('/admin/manage_images');?>"   class=""><span>Manage Images</span></a></li>                           
                            <li  class="   last level1"> <a href="<?php echo site_url('/admin/manage_videos');?>"   class=""><span>Manage Videos</span></a></li>
                        </ul>
                    </li>                    
                                     
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "4"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>Testimonials</span></a>
                    	<ul >                            
                            <li  class="   last level1"> <a href="<?php echo site_url('/admin/manage_comments');?>"   class=""><span>Manage Testimonials</span></a></li>
                        </ul>
                    </li>
                    
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "5"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>Directory</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="<?php echo site_url('/admin/organization_groups');?>"   class=""><span>Organization Groups</span></a></li>
                            <li  class=" last  level1"> <a href="<?php echo site_url('/admin/manage_directory');?>"   class=""><span>Manage Directory</span></a></li>                            
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "6"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>News Section</span></a>
                    	<ul >
                            <li  class=" last  level1"> <a href="<?php echo site_url('/admin/manage_news');?>"   class=""><span>Manage News</span></a></li>                            
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "7"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>Donations</span></a>
                    	<ul >
                            <li  class="  last level1"> <a href="<?php echo site_url('/admin/manage_donations');?>"   class=""><span>Manage Donations</span></a></li>                            
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "8"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>Members</span></a>
                    	<ul >
                            <li  class=" last  level1"> <a href="<?php echo site_url('/admin/manage_members');?>"   class=""><span>Manage Members</span></a></li>
                        </ul>
                    </li>   
					<li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "9"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>Administrators</span></a>
                    	<ul >
                            <li  class="   level1"> <a href="<?php echo site_url('/admin/admins_manage');?>"   class=""><span>Manage Administrators</span></a></li>
                            <li  class="   last level1"> <a href="<?php echo site_url('/admin/admins_manage/create_admin/');?>"   class=""><span>Create Administrator</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "10"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>CMS Pages</span></a>
                    	<ul >
                            <li  class="  last level1"> <a href="<?php echo site_url('/admin/manage_pages/');?>" class=""><span>Manage Pages</span></a></li>
                        </ul>
                    </li>
                    <li onmouseover="Element.addClassName(this,'over')" onmouseout="Element.removeClassName(this,'over')" class="<?php if($mainmenu == "11"):?>active<?php endif;?> parent level0"> <a href="#"  onclick="return false" class=""><span>Poverty Buster</span></a>
                    	<ul >
                            <li  class="  last level1"> <a href="<?php echo site_url('/admin/manage_articles/');?>" class=""><span>Manage Articles</span></a></li>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>