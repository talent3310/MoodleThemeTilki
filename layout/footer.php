<?php
	$leftfootnote = get_config('theme_tikli', 'leftfootnote');
?>
<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="span9">
			</div>
			
			<div class="span3 right">
				<div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
		        <?php
		        
		        echo $html->footnote;
		        echo $OUTPUT->login_info();
		        echo $OUTPUT->standard_footer_html();
		        ?>
			</div>
		</div>
	</div><!-- END of .container-fluid -->
</footer><!-- END of footer -->