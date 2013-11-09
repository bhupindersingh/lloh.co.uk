<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/reset.css" media="all"></link>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>themes/admin/css/boxes.php" media="all"></link>
    <style>#body_container{height:250px;}</style>
</head>
<body>
<div id="body_container">
<div class="entry-edit">
<div class="entry-edit-head">
    <h4 class="icon-head head-edit-form fieldset-legend">Image Upload</h4>
    <div class="form-buttons">

    </div>
</div>
<fieldset id="group_fields4">
	<div class="hor-scroll">
    <?php echo "<div id='error'>".$error."</div>" ?>
    <div class="message_container"><u style="color:#F00">NOTE:</u> <i>Please upload slider image of dimension 980 X 280</i></div>
    <form action="<?php echo site_url('/admin/settings/do_upload/');?>" method="post" id="main_form" name="main_form" enctype="multipart/form-data">
    <table cellpadding="2" cellspacing="2" border="0" class="form-list">
    <tbody>
    <tr class="hidden">
        <td class="label">Upload Image:</td>
        <td class="value"><input type="file" name="filePhoto"/></td>
    </tr>
    <tr class="hidden">
        <td class="label">&nbsp;</td>
        <td class="value"><button  id="id_be616be1324d8ae4516f276d17d34b9c" type="button" class="scalable add" onclick="document.main_form.submit();" style=""><span>Upload Image</span></button></td>
    </tr>
    <?php if($message<>''){
		$baseUrl=str_replace("admin/","",base_url());	
	?>
    <tr class="hidden">
        <td class="label" colspan="2">Copy the URL of the image below and paste in the image slider field.</td>        
    </tr>
    <tr class="hidden">
        <td class="value" colspan="2"><input type="text" readonly="readonly" value="<?php echo $baseUrl;?>uploads/images/<?php echo $message;?>" size="70"/></td>        
    </tr>
    <?php }?>
    </tbody>
    </table>
    </form>
    </div>
    </fieldset>
</div>
</div>
</body>
</html>