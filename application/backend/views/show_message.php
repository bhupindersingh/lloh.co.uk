<?php if($error != ""):?>
								<ul class="messages">
                                    <li class="error-msg">
                                    	<ul><li><?php echo $error;?></li></ul>
                                    </li>
                                </ul>
<?php endif;?>
<?php if($message != ""):?>
								<ul class="messages">
                                	<li class="success-msg">
                                    	<ul><li><?php echo $message;?></li></ul>
                                    </li>
                                </ul>
<?php endif;?>
