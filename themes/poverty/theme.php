<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="<?php echo $meta_desc;?>">
<meta name="keywords" content="<?php echo $meta_keyword;?>">
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="<?php echo base_url();?>themes/poverty/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/poverty/css/responsive.css" rel="stylesheet" type="text/css" />
<!-- FlexSlider pieces -->
<link rel="stylesheet" href="<?php echo base_url();?>themes/poverty/css/flexslider.css" type="text/css" media="screen" />
<script src="<?php echo base_url();?>themes/poverty/js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/poverty/js/jquery-migrate-1.2.1.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>themes/poverty/js/jquery.flexslider-min.js" type="text/javascript"></script>
<!-- Hook up the FlexSlider -->
<script type="text/javascript">
$(window).load(function() {
	$('.flexslider').flexslider();
});
</script>
<script src="<?php echo base_url();?>themes/poverty/js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function(){
	$("input, textarea, select, button").uniform();	
});
</script>  
<link rel="stylesheet" href="<?php echo base_url();?>themes/poverty/css/uniform.default.css" type="text/css" media="screen" />
</head>
<body>
<div class="wrapper">
	<!-- Start: Header Part -->
	<div id="header">
    	<div class="lsize">
            <div class="login_area">
            	<div class="right">
                    <ul>                    
                    <?php if($this->session->userdata('validated') && $this->session->userdata('member')):?>
                    <li class="user">Welcome <?php echo $this->session->userdata('firstname');?> <?php echo $this->session->userdata('lastname');?></li>
                    <li class="notification"><a href="<?php echo site_url('/notifications/');?>"><b>&nbsp;</b></a></li>
                    <li class="setting"><a href="javascript://" id="menu"><b>&nbsp;</b></a></li>                    
                    <?php else:?>
                    <form method="post" action="<?php echo site_url('/login/login_user/');?>" id="frmLogin">
                    <li class="user"> &nbsp;<input name="txtUsername" type="text" class="input required" id="txtUsername" placeholder="User Name" value=""/></li><li><input name="txtPassword" type="password" class="input required password" id="txtPassword" placeholder="Password" value=""/></li><li><input type="hidden" name="global" value="1" /><input type="submit" class="btn" value="Login" /></li><li class="register"><a href="<?php echo site_url('/register');?>">Register</a></li>
                    </form>
                    <?php endif;?>
                    </ul>
                    <div class="dropdown">
                		<div class="anylinkmenu">
                            <ul>
                            	<?php 
								if($this->session->userdata('post_request_approval')==1):?>
                                <li><a target="" href="<?php echo site_url('/post_a_request/');?>">Post a Request</a></li>
                                <li><a target="" href="<?php echo site_url('/request_published/');?>">Request Published</a></li>
                                <?php endif;?>
                                <?php if($this->session->userdata('dir_approval')==1):?>
                                <li><a href="<?php echo site_url('/directory_page/submit_details/');?>">Submit Directory Listing</a></li>
                                <li><a href="<?php echo site_url('/directory_page/manage_listing/');?>">Manage Directory LIsting </a></li>
                                <?php endif;?>
                                <li><a target="" href="<?php echo site_url('/manage_account/');?>">Manage Account</a></li>
                                <li><a target="" href="<?php echo site_url('/notifications/');?>">Notifications</a></li>
                                <li><a target="" href="<?php echo site_url('/logout/');?>">Logout</a></li>
                            </ul>
                    	</div>
                	</div>
                </div>
            </div>
        	<h1><a href="<?php echo base_url();?>"><img src="<?php echo base_url().$this->config->item('imageurl');?>/logo.png" alt="" /></a></h1>
            <div class="clear"></div>
        </div>
    </div>
    <!-- End: Header Part -->
    <!-- Start: Menu and Slider Part -->
    <div class="menu_curve">
        <div class="lsize">
            <div id="menu">
            	<ul>
                <li class="<?php if($mainmenu == "" || $mainmenu == "1"):?>active<?php endif;?>"><a href="<?php echo base_url();?>"><span>Home</span></a></li>
                <li class="<?php if($mainmenu == "2"):?>active<?php endif;?>"><a href="<?php echo site_url('/directory_page/');?>"><span>Directory </span></a></li>
                <li class="<?php if($mainmenu == "3"):?>active<?php endif;?>"><a href="<?php echo site_url('/article/');?>"><span>Poverty Busters</span></a></li>
                <li class="<?php if($mainmenu == "4"):?>active<?php endif;?>"><a href="<?php echo site_url('/media/');?>"><span>Media</span></a></li>
                <li class="<?php if($mainmenu == "5"):?>active<?php endif;?>"><a href="<?php echo site_url('/reviews/');?>"><span>Testimonials</span></a></li>
              </ul>
                 <div class="donate"><a href="<?php echo site_url('/requests_and_donations/');?>">Donate Now</a></div>
                 <div class="clear"></div>
            </div>
            <div class="select_menu">
            	<div class="form">
                <select id="selPage" onchange="javascript:window.location.href=this.value">
                    <option selected="selected" value="">Go to page:</option>
                    <option value="<?php echo base_url();?>">Home</option>
                    <option value="<?php echo site_url('/directory_page/');?>">Directory</option>
                    <option value="<?php echo site_url('/article/');?>">Poverty Busters</option>
                    <option value="<?php echo site_url('/media/');?>">Media</option>                    
                    <option value="<?php echo site_url('/reviews/');?>">Reviews</option>                    
                </select>
          	</div>
            </div>
            <!-- Start: Slider Part -->
            <div id="slider">
               <div class="flexslider">               		
                    <ul class="slides">
                    	<?php foreach($slider_images as $row=>$val):?>               
                        <li><img src="<?php echo $val;?>" alt="" /></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        	<!-- <div id="slider"><img src="images/slider_01.jpg" alt="" /></div> -->
            <!-- End: Slider Part -->
        </div>
    </div>    
    <!-- End: Menu and Slider Part -->  
    <?php echo $content; ?>
    <!-- Start: Footer Part -->    
    <div id="footer">
    	<div class="menu">
        	<div class="lsize">
            <div class="left"><a href="<?php echo base_url();?>">Home</a> | <a href="<?php echo site_url('/page/'.page_hperlink(1));?>">About Us</a> | <a href="<?php echo site_url('/news/');?>">News</a> | <a href="<?php echo site_url('/media/');?>">Media</a> | <a href="<?php echo site_url('/reviews/');?>">Testimonials</a> | <a href="<?php echo site_url('/page/'.page_hperlink(2));?>">Contact us</a></div>
            <div class="right"><a href="<?php echo site_url('/page/'.page_hperlink(3));?>">Privacy Policy</a>  |  <a href="<?php echo site_url('/page/'.page_hperlink(4));?>">Terms &amp; Conditions</a></div>
            <div class="clear"></div>
            </div>
        </div>
        <div class="lsize">
        	<div class="links">
                <div class="col_01">
                    <?php echo get_setting('footer_links_block_1');?>
                </div>
                <div class="col_01">
                    <?php echo get_setting('footer_links_block_2');?>
                </div>
                <div class="col_01">
                    <?php echo get_setting('footer_links_block_3');?>
                </div>
                <div class="col_01">
                    <?php echo get_setting('footer_links_block_4');?>
                </div>
                <div class="col_02">
                    <a href="#"><img src="<?php echo base_url();?>themes/poverty/images/banner_bringing_people.gif" alt="" /></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bottom">
              <div class="copyright"><?php echo get_setting('footer_left');?></div>
                <div class="address">
                    <?php echo get_setting('footer_right');?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- End: Footer Part -->
</div>
<input type="hidden" id="baseurl" value="<?php echo base_url();?>" />
<script type="text/javascript" src="<?php echo base_url();?>themes/poverty/js/load.js"></script>
<?php if($this->session->userdata('validated') && $this->session->userdata('member')):?>
<script language="javascript">
$("#menu" ).click(function() {
	$( ".dropdown" ).fadeToggle( "fast", 'linear');
});	
</script>
<?php endif;?>
</body>
</html>