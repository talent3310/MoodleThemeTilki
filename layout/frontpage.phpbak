<?php
// Get the HTML for the settings bits.
$html = theme_tikli_get_html_for_settings($OUTPUT, $PAGE);
// Set default (LTR) layout mark-up for a two column page (side-pre-only).
$regionmain = 'span9 pull-right';
$sidepre = 'span3 desktop-first-column left-menu-close';

 ?>
<?php require('header.php'); ?>
<div id="page" class="container-fluid">
    <?php if ($CFG->version >= 2015051100) {
        echo $OUTPUT->full_header();
    } else { ?>
    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
                <div class="row">
                    <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
                    <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
                </div>
        </div>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>
    <?php } ?>
    <div id="page-content" class="row-fluid"><div class="custom-width">
        <section id="region-main" class="<?php echo $regionmain; ?>">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        </div>
        <?php
        echo $OUTPUT->blocks('side-pre', $sidepre);
        ?>
    </div>
    </div>

    <?php 
        include('footer.php');
        echo $OUTPUT->standard_end_of_body_html() 
    ?>

</div>

</body>
</html>
