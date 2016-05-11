<?php
// Get the HTML for the settings bits.
$html = theme_tikli_get_html_for_settings($OUTPUT, $PAGE);
GLOBAL $DB, $CFG, $cm;
$courseimage = '';
$colorscheme = get_config('theme_tikli', 'colorscheme');
// Set default (LTR) layout mark-up for a three column page.
$regionmainbox = 'span9';
$regionmain = 'span8 pull-right';
$sidepre = 'span4 desktop-first-column';
$sidepost = 'span3 pull-right';
// Reset layout mark-up for RTL languages.
if (right_to_left()) {
    $regionmainbox = 'span9 pull-right';
    $regionmain = 'span8';
    $sidepre = 'span4 pull-right';
    $sidepost = 'span3 desktop-first-column';
}
$course = $DB->get_records_sql('SELECT c.* FROM {course} c where id != ? and visible = ?',array(1, 1));
$coursedetailsarray = array();
foreach ($course as $key => $coursevalue) {   	
	$coursedetailsarray[$key]["courseid"] = $CFG->wwwroot."/course/view.php?id=".$coursevalue->id;
	$coursedetailsarray[$key]["enroledusers"] = $CFG->wwwroot."/enrol/users.php?id=".$coursevalue->id;
	$coursedetailsarray[$key]["coursename"] = $coursevalue->fullname;
	$summarystring = strlen($coursevalue->summary) > 160 ? substr($coursevalue->summary, 0, 160)."..." : $coursevalue->summary;
	$coursedetailsarray[$key]["coursesummary"] = $summarystring;
	$courseteacher = $DB->get_records_sql('SELECT u.*
	FROM {course} c
	JOIN {context} ct ON c.id = ct.instanceid
	JOIN {role_assignments} ra ON ra.contextid = ct.id
	JOIN {user} u ON u.id = ra.userid
	JOIN {role} r ON r.id = ra.roleid Where c.id = ? and r.shortname = ?', array($coursevalue->id, 'editingteacher'));
	if(!empty($courseteacher)) {
		foreach ($courseteacher as $keycourseteacher => $courseteachervalue) {
            $coursedetailsarray[$key]["teachername"][$keycourseteacher] = $courseteachervalue->firstname." ".$courseteachervalue->lastname;
            $coursedetailsarray[$key]["teacherid"][$keycourseteacher] = $CFG->wwwroot."/user/profile.php?id=".$courseteachervalue->id;
        }
	} else {
		$coursedetailsarray[$key]["teachername"] = "Not assigned";
        $coursedetailsarray[$key]["teacherid"] = "";
	}
	$coursecontext = context_course::instance($coursevalue->id);
	$isfile = $DB->get_records_sql("Select * from {files} where contextid = ? and filename != ?", array($coursecontext->id, "."));
	if($isfile) {
		foreach ($isfile as $key1 => $isfilevalue) {
			$courseimage =  $CFG->wwwroot . "/pluginfile.php/" . $isfilevalue->contextid ."/". $isfilevalue->component . "/" . $isfilevalue->filearea . "/" . $isfilevalue->filename;	
		}
	}   
	if(!empty($courseimage)) {
		$coursedetailsarray[$key]["courseimage"] = $courseimage;
	} else {
		$coursedetailsarray[$key]["courseimage"] = $CFG->wwwroot."/theme/tikli/data/nopic.jpg";
	}
	$courseimage = '';
	
}		
$coursecontext = context_course::instance(1);

?>
<?php require('column3homeheader.php'); ?>
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
    <div id="page-content" class="row-fluid background-grey">
        <div id="region-main-box" class="<?php echo $regionmainbox; ?>">
            <div class="row-fluid">
                <section id="region-main" class="<?php echo $regionmain; ?>">
                    <div class="custommain">
                        <div class="region-main-header clearfix">
                            <div class="view-toggle">
                                <a href="javascript:void(0);" class="btn-view-list">List view</a>
                                <a href="javascript:void(0);" class="btn-view-grid active">Grid view</a>
                            </div>
                            <div class="search-wr">
                                <form class="adminsearchform" method="get" action="<?php echo $CFG->wwwroot; ?>/admin/search.php">
                                    <div>
                                        <label for="adminsearchquery" class="accesshide">Search in settings</label>
                                        <input id="adminsearchquery" type="text" name="query" value="">
                                        <input type="submit" value="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="frontpage-course-list">
                            <div class="courses frontpage-course-list-all">
                                <div class="course-items course-items-grid-view">
                                	<?php foreach($coursedetailsarray as $keycoursedetail => $coursedetailsarrayvalue) { ?>
	                                    <div class="course-item">
	                                        <div class="img-wr">
	                                            <a href="<?php echo $coursedetailsarrayvalue['courseid'];?>"><img src="<?php echo $coursedetailsarrayvalue['courseimage'];?>" alt=""></a>
	                                        </div>
	                                        <div class="course-item-cont">
	                                            <a href="javascript:void(0);" class="btn-togle-details">Show Details</a>
	                                            <h5><a href="<?php echo $coursedetailsarrayvalue['courseid'];?>"><?php echo $coursedetailsarrayvalue['coursename'];?></a></h5>
                                                <?php if($coursedetailsarrayvalue['teachername'] != 'Not assigned') { ?>
                                                    <div class="abc">
                                                    <?php foreach ($coursedetailsarrayvalue['teachername'] as $keys => $value) {?>
	                                               <h6><?php echo get_string('defaultcourseteacher');?> : <a href="<?php echo $coursedetailsarrayvalue['teacherid'][$keys];?>"><?php echo $value;?></a></h6>
                                                    <?php } ?>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="abc"><h6><?php echo get_string('defaultcourseteacher');?> : <a href="javascript:void(0);">Not assigned</a></h6></div>
                                                <?php } ?>
	                                            <div class="for-list-view-wr">
	                                                <div class="for-list-view">
	                                                    <div class="img-wr">
	                                                        <a href="<?php echo $coursedetailsarrayvalue['courseid'];?>"><img src="<?php echo $coursedetailsarrayvalue['courseimage'];?>" alt=""></a>
	                                                    </div>
	                                                    <p><?php echo $coursedetailsarrayvalue['coursesummary'];?></p>
	                                                    <a href="<?php echo $coursedetailsarrayvalue['courseid'];?>" class="btn-plus"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-plus.png" height="42" width="42" alt=""></a>
	                                                </div>
	                                            </div>
	                                            <h4>
	                                                <a href="<?php echo $coursedetailsarrayvalue['courseid'];?>" data-toggle="tooltip" title="<?php echo $coursedetailsarrayvalue['coursename'];?>"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-c-1.png" alt=""></a>
	                                                <a href="<?php echo $coursedetailsarrayvalue['enroledusers'];?>" data-toggle="tooltip" title="<?php echo get_string('enrolusers', 'enrol'); ?>"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-c-2.png" alt=""></a>
	                                            </h4>
	                                        </div>
	                                    </div>
	                                <?php } ?>
                                </div><!-- END of .course-items -->
                            </div>
                        </div><!-- END of #frontpage-course-list -->
                    </div>
                    <?php if (has_capability('moodle/course:create', $coursecontext)) { ?>
                    <div class="center">
                     <div class="btn-show-more-wr">
                             <a class="btn-show-more" href="<?php echo $CFG->wwwroot;?>/course/edit.php?category=1&returnto=category"><span><?php echo get_string('addnewcourse'); ?></span></a>
                      </div>
                    </div>
                    <?php } ?>
                    <?php           
                    echo $OUTPUT->main_content();
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
