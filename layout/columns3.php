<?php
// Get the HTML for the settings bits.
$html = theme_tikli_get_html_for_settings($OUTPUT, $PAGE);
// Set default (LTR) layout mark-up for a three column page.

$regionmainbox = 'span9 regionblock';
$regionmain = 'span9 pull-right';
$sidepre = 'span3 desktop-first-column preblock left-menu-close';
$sidepost = 'span3 pull-right postblock';
// Reset layout mark-up for RTL languages.
if (right_to_left()) {
    $regionmainbox = 'span9 pull-right';
    $regionmain = 'span8';
    $sidepre = 'span4 pull-right left-menu-close';
    $sidepost = 'span3 desktop-first-column';
}
echo $OUTPUT->doctype() ?>
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
    <div id="page-content" class="row-fluid">
        <div id="region-main-box" class="<?php echo $regionmainbox; ?>">
            <div class="row-fluid">
                <section id="region-main" class="<?php echo $regionmain; ?>">
                    <?php
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?>
                </section>
                <?php echo $OUTPUT->blocks('side-pre', $sidepre); ?>
            </div>
        </div>
        <?php echo $OUTPUT->blocks('side-post', $sidepost); ?>
    </div>

    <?php 
        include('footer.php');
        echo $OUTPUT->standard_end_of_body_html() 
    ?>

</div>

</body>
</html>
