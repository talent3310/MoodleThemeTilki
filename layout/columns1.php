<?php
// Get the HTML for the settings bits.
$html = theme_tikli_get_html_for_settings($OUTPUT, $PAGE);
require('columns1header.php');
if (!isloggedin() && $isregistration->value == 'email') { ?>
    <input type="hidden" name="custommenu" value="nologinselfreg" id="custommenu">
<?php } ?>
<div id="page" class="container-fluid">

    <?php if ($CFG->version >= 2015051100) {
        //echo $OUTPUT->full_header();
    } else { ?>
   <!--  <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <div class = "container">
                <div class="row">
                    <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
                    <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
                </div>
            </div>
        </div>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header> -->
    <?php } ?>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span12">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
    </div>

    <?php 
        include('footer.php');
        echo $OUTPUT->standard_end_of_body_html() 
    ?>

</div>
</body>
</html>
