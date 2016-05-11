<?php
GLOBAL $CFG;
$color_scheme = get_config('theme_tikli', 'colorscheme');
if ( get_config('theme_tikli', 'logoorsitename') === "sitename" ||  (get_config('theme_tikli', 'logoorsitename') === "iconsitename") ) {
?>
<style type = "text/css">
	.loginpanel h2:before, a.click {
		line-height: 81px !important;
		font-size: 22px !important;
		background-image: none !important;
	}
	#page .loginbox h2 a:hover {
		color: #FFF!important;
	}
</style>
<?php } if ($color_scheme == 'red-orange') {
?>
<style type="text/css">
/*Primary Color Customisation in red-orange section */
/*login*/
#dock .dockedtitle {
	background-color : rgba(231, 76, 60, .8)!important;
}
@media screen and (max-width: 767px) {
.landing-page .logo-wr {
    background: #FF9E57!important;    
}
}
.da-dots span.da-dots-current:after {
	background: #FF9E57;
}
.da-dots span {
	border: solid 2px #FF9E57;
}
@media screen and (max-width: 1199px) {
.news-updates .container:before {
background-size: 100%!important;
}
}
.view-toggle .btn-view-list.active, .view-toggle .btn-view-grid.active {
    background-color: #e74c3c;
}
.landing-page header, .loginpanel {
    background: #e74c3c;
}
/*----*/
header.navbar,
#block-region-side-pre .block .header,
.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	background: #e74c3c;	
}
#block-region-side-post .block .minicalendar th{
	background-color:#e84c3d;
}
.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	background: #e84c3d;
}
.landing-page header {
	background: #E74C3C;
}
#block-region-side-pre .dimmed_text {
	color: #fff;
}
#block-region-side-post .dimmed_text {
    color: #333;
}
.loginbox a:hover, 
.loginbox .error {
	color:#ff9e57!important;
}
.logining-wr a:first-child {
    background: #ee5b4c!important;
    box-shadow: 1px 1px 0 0 #93271c!important;
    color: #ffffff;
}
.logining-wr a:last-child {
	color:#ff6a5b;
}
.navbar-inner .logo-wr,
.landing-page .logo-img {
	background: #FF9E57;
}
#block-region-side-pre .block .content,
#block-region-side-pre .block .content a {
    color: #333;
}
/* Buttons start */
#page button, 
#page input.form-submit, 
#page input[type="button"], 
#page input[type="submit"], 
#page input[type="reset"], 
#page input.form-submit, 
#page input#id_submitbutton, 
#page input#id_submitbutton2, 
#page .path-admin .buttons input[type="submit"], 
#page td.submit input,
#page #notice .singlebutton + .singlebutton input {
	 color: #fff;

}
#page input.form-submit, 
#page input[type="button"], 
#page input[type="submit"], 
#page input[type="reset"],
#block-region-side-post #searchform_button, 
#block-region-side-pre #searchform_button,
#page #livelogs-pause-button,
#page #notice .singlebutton + .singlebutton input {
    background-color: #4f4f4f;    
    border-color: rgba(0, 0, 0, 0.4); 
	box-shadow: 0 2px 0 0 rgba(0, 0, 0, .8);
}

#page input.form-submit, 
#page input#id_submitbutton, 
#page input#id_submitbutton2, 
#page .path-admin .buttons input[type="submit"], 
#page td.submit input,
#page #id_saveanddisplay {
    background-color: #e74c3c;
    border-color: #b33121;
	box-shadow: 0 2px 0 0 #b33121;
}

.loginbox input[type="submit"], 
.loginbox input[type="submit"]:hover {
	background: #2a2424!important;
}

#page .search-wr .adminsearchform input[type="submit"] {
	background-color:#a2a2af;
}

#page .search-wr .adminsearchform input[type="text"] {
	background:#e8e9f3;
}
.adminsearchform input[type="text"] {
	border-color:#a2a2af;
}
/* Buttons ends */

/* Calendar start*/

.block .calendartable .calendar-controls a,
div.minicalendarblock caption a {
	color:#FFF;	
}

#block-region-side-post .block .minicalendar th,
#block-region-side-pre .block .minicalendar th, 
#block-region-side-post .block .minicalendar td {
	color:#FFF;	
}

#block-region-side-pre .block .minicalendar td {
	color:#222;	
}

#block-region-side-post .block .minicalendar td.weekend {
    color: rgba(255, 255, 255, .4);
}

#block-region-side-pre .block .minicalendar td.weekend {
    color: rgba(0, 0, 0, .4);
}

.block .minicalendar td a:hover, .block .minicalendar td a {
	color:#FFF!important;
}

.block .minicalendar td.today {
	background-color:#e74b3c;
}

#block-region-side-post .block .calendartable {
	background-color:rgba(0, 0, 0, .6);
}

#block-region-side-pre .block .calendartable {
	background-color: #e7eaf3;
}

#block-region-side-post .block .calendartable .calendar-controls,
#block-region-side-post div.minicalendarblock caption {
	background-color:rgba(0, 0, 0, .8);
}



.block.block_calendar_month .content h3.eventskey {
	color:#fff; 
}

#block-region-side-post .block .calendartable .weekdays {
	background-color:#e84c3d;
	
}

#block-region-side-post .block .minicalendar td {
	border-right: 1px solid rgba(0, 0, 0, 0.2);
	border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}

#block-region-side-pre .block .minicalendar td {
	border-right: 1px solid rgba(0, 0, 0, 0.1);
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

#block-region-side-post .block .calendar-event-panel .yui3-overlay-content {
    background-color: #fdfdfd;
    border: 1px solid #e3e3e3;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;
	color:#333;
}

#block-region-side-post .block .minicalendar th{
	background-color:#e84c3d;
}

#block-region-side-pre .block .minicalendar th {
	background-color:#4f4f4f;
}

/* Calendar end*/




#block-region-side-post .block .content .footer a,
#block-region-side-post .activityhead a,
#block-region-side-post .newlink a,
#block-region-side-post .searchform a,
#region-main a,
.moodle-dialogue-ft a,
footer a,
footer a:hover,
.btn-see-all, 
body .btn-see-all,
.popular-courses-nav a,
.btn-view-all {
	color: #e74c3c;	
}

#block-region-side-post .calendar_filters.filters a,
#block-region-side-post .block_community a:hover {
	color: #333;
}

.btn-see-all:hover {
	color: #e74c3c;
}


/*Secondary Color Customisation red-orange section*/
#block-region-side-pre {
    background: #e6e6e6;
}
#block-region-side-post {
	background: #c5c5c5;
}
footer {
	background: #242b32;
	color: #bdc3c7;
}


footer span {
	color: #434e58;
}

footer a:active,
footer a:focus,
 {
  color: #e74c3c;	
 }

.popular-courses-nav a:hover {
color: #e74c3c;	
}
.block-links-item .btn-view-all:hover {
color: #e74c3c;	
}
.news-updates .container:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/red-orange/i-notice.png) no-repeat center top;	
}
</style>
<?php } if ($color_scheme == 'green') { ?>
<style type="text/css">
.course-items-grid-view .abc::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #F1C40F;
}
.top-featured-course a:hover .top-featured-course-items-icon {
	background: #e8d070;
    box-shadow: 4px 4px 0 #f1c40f;
}
#dock .dockedtitle {
	background-color : rgba(26, 188, 156, .8)!important;
}
@media screen and (max-width: 767px) {
.landing-page .logo-wr {
    background: #f1c40f!important;    
}
}
.da-dots span.da-dots-current:after {
	background: #f1c40f;
}
.da-dots span {
	border: solid 2px #f1c40f;
}
.news-updates .container:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/green/i-notice.png) no-repeat center top;	
}
@media screen and (max-width: 1199px) {
.news-updates .container:before {
background-size: 100%!important;
}
}
.view-toggle .btn-view-list.active, .view-toggle .btn-view-grid.active {
    background-color: #1abc9c;
}
#block-region-side-post .block .minicalendar th {
    background-color: #f1c40f;
}
.block .minicalendar td.today {
	background-color: #f1c40f;
}
#block-region-side-post .block .content .footer a,
#block-region-side-post .activityhead a,
#block-region-side-post .newlink a,
#block-region-side-post .searchform a,
#region-main a,
.moodle-dialogue-ft a,
footer a,
footer a:hover,
footer a:active,
footer a:focus,
.popular-courses-nav a,
.btn-view-all,
.usermenu .userbutton span span:hover,
.navbar .dropdown-menu li a:hover,
.breadcrumb a:hover,
.popular-courses-nav a:hover,
.block-links-item .btn-view-all:hover,
.btn-see-all:hover,
.btn-see-all:focus,
.breadcrumb a,
.userbutton > span:last-child span,
.usermenu .menu a:hover, .course-item h6 a  {
	color: #1abc9c;	
}

.btn.btn-navbar.active-drop .fa {
	color:#1abc9c!important;	
}


.logining-wr a:last-child {
	color:#1abc9c;	
}

.loginbox .loginform .form-input input {
	border: 1px solid #1abc9c;			
	
}

.logining-wr a:first-child {
    background: #1abc9c!important;										
    box-shadow: 1px 1px 0 0 #0a5948!important;						
}

#page input.form-submit, 
#page input#id_submitbutton, 
#page input#id_submitbutton2, 
#page .path-admin .buttons input[type="submit"], 
#page td.submit input,
#page #id_saveanddisplay,
.mdl-align .btn-primary {
    background-color: #1abc9c;		
    border-color: #118b72;			

	box-shadow: 0 2px 0 0 #118b72;	
}




.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	box-shadow: none!important;
}

.view-toggle .btn-view-list.active {
	background-color: #1abc9c;										
}

header.navbar,
#block-region-side-pre .block .header,
.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	background: #1abc9c;	
}

.landing-page .logo-img {
	background: #f1c40f;		
}

.landing-page header,
.loginpanel
 {
	background: #1abc9c;
}

.navbar-inner
 {
	background: #1abc9c!important;
}

.btn-1 {
    background: #f1c40f none repeat scroll 0 0; 
	
}

.navbar-inner .logo-wr {
	background: #f1c40f;  
}

.landing-page .userbutton > span:last-child span:after {
    background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/green/dwn-arrow-landing.png) no-repeat scroll right 8px;
}

.loginpanel h2:before, a.click {
    background: #f1c40f no-repeat scroll center center; 
}

.rememberpass input + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/green/i-ch-unch-2.png) no-repeat center;			
}

.rememberpass input + label:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/i-ch-unch-2.png) no-repeat center;
}

.rememberpass input:checked + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/green/i-ch-ch-2.png) no-repeat center;	
}

.userbutton > span:last-child span:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/green/dwn-arrow.png) no-repeat center right;	
}

.landing-page .active-drop-user-menu .userbutton > span:last-child span:after {
    background: rgba(0, 0, 0, 0) url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/green/dwn-arrow-landing-hover.png) no-repeat scroll right 8px;
}

.loginbox a:hover, 
.loginbox .error {
	color:rgba(255, 255, 255, .8)!important;
}


#block-region-side-post .calendar_filters.filters a,
#block-region-side-post .block_community a:hover,
#block-region-side-post .moodle-actionmenu .toggle-display, 
#block-region-side-post .moodle-actionmenu .menu-action-text,
#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text,
#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover {
	color: #333; 
}

#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text {
	color: #111; 
}

#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover,
#block-region-side-pre .moodle-actionmenu .toggle-display:hover, 
#block-region-side-pre .moodle-actionmenu .menu-action-text:hover {
	text-decoration:underline;	
}



/*Secondary Color Customisation in green section*/

#block-region-side-pre {
	background: #e6e6e6;
}

#block-region-side-post {
	background: #e6e6e6;
}

footer {
	background: #242b32;
	color: #bdc3c7;
}
footer span {
	color: #434e58;
}
.number-section-content h2 {
	color: #1abc9c;
}
.static-number-section {
	background: #1abc9c;
}
/* ----------------------------------------------------------------------------------- */
</style>
<?php } if ($color_scheme == 'blue') { ?>
<style type="text/css">

.course-items-grid-view .abc::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #f39c11;
}
.top-featured-course a:hover .top-featured-course-items-icon {
	background: #f7b852;
    box-shadow: 4px 4px 0 #f39c11;
}
#dock .dockedtitle {
	background-color : rgba(90, 170, 224, .8)!important;
}
.news-updates .container:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/blue/i-notice.png) no-repeat center top;	
}
@media screen and (max-width: 1199px) {
.news-updates .container:before {
background-size: 100%!important;
}
}
.view-toggle .btn-view-list.active, .view-toggle .btn-view-grid.active {
    background-color: #2e2e2e;
}
#block-region-side-post .block .content .footer a,
#block-region-side-post .activityhead a,
#block-region-side-post .newlink a,
#block-region-side-post .searchform a,
#region-main a,
.moodle-dialogue-ft a,
footer a,
footer a:hover,
footer a:active,
footer a:focus,
.popular-courses-nav a,
.btn-view-all,
.usermenu .userbutton span span:hover,
.navbar .dropdown-menu li a:hover,
.breadcrumb a:hover,
.popular-courses-nav a:hover,
.block-links-item .btn-view-all:hover,
.btn-see-all:hover,
.btn-see-all:focus,
.breadcrumb a,
.userbutton > span:last-child span,
.usermenu .menu a:hover, .course-item h6 a  {
	color: #2e2e2e;	
}

.btn.btn-navbar.active-drop .fa {
	color:#2e2e2e!important;	
}


.logining-wr a:last-child {
	color:#2e2e2e;	
}

.loginbox .loginform .form-input input {
	border: 1px solid #2e2e2e;			
	
}

.logining-wr a:first-child {
    background: #2e2e2e!important;										
    box-shadow: 1px 1px 0 0 #0a5948!important;						
}

#page input.form-submit, 
#page input#id_submitbutton, 
#page input#id_submitbutton2, 
#page .path-admin .buttons input[type="submit"], 
#page td.submit input,
#page #id_saveanddisplay,
.mdl-align .btn-primary {
    background-color: #2e2e2e;		
    border-color: #1f689a;			

	box-shadow: 0 2px 0 0 #1f689a;	
}

#block-region-side-post .block .minicalendar th {
    background-color: #f39c11;
}
.block .minicalendar td.today {
	background-color: #f39c11;
}


.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	box-shadow: none!important;
}

.view-toggle .btn-view-list.active {
	background-color: #2e2e2e;										
}

header.navbar,
#block-region-side-pre .block .header,
.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	background: #2e2e2e;	
}

.landing-page .logo-img {
	background: #f39c11;		
}

.landing-page header,
.loginpanel
 {
	background: #2e2e2e;
}

.navbar-inner
 {
	background: #2e2e2e!important;
}

.btn-1 {
    background: #f39c11 none repeat scroll 0 0; 
	
}

.navbar-inner .logo-wr {
	background: #f39c11;  
}
.news-updates .container:before {
	background: url(theme/tikli/css/img/blue/i-notice.png) no-repeat center top;	
}
.landing-page .userbutton > span:last-child span:after {
    background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/blue/dwn-arrow-landing.png) no-repeat scroll right 8px;
}

.loginpanel h2:before, a.click {
    background: #f39c11 no-repeat scroll center center; 
}

.rememberpass input + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/blue/i-ch-unch-2.png) no-repeat center;			
}

.rememberpass input + label:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/i-ch-unch-2.png) no-repeat center;
}

.rememberpass input:checked + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/blue/i-ch-ch-2.png) no-repeat center;	
}

.userbutton > span:last-child span:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/blue/dwn-arrow.png) no-repeat center right;	
}

.landing-page .active-drop-user-menu .userbutton > span:last-child span:after {
    background: rgba(0, 0, 0, 0) url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/blue/dwn-arrow-landing-hover.png) no-repeat scroll right 8px;
}

.loginbox a:hover, 
.loginbox .error {
	color:rgba(255, 255, 255, .8)!important;
}


#block-region-side-post .calendar_filters.filters a,
#block-region-side-post .block_community a:hover,
#block-region-side-post .moodle-actionmenu .toggle-display, 
#block-region-side-post .moodle-actionmenu .menu-action-text,
#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text,
#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover {
	color: #333; 
}

#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text {
	color: #111; 
}

#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover,
#block-region-side-pre .moodle-actionmenu .toggle-display:hover, 
#block-region-side-pre .moodle-actionmenu .menu-action-text:hover {
	text-decoration:underline;	
}



/*Secondary Color Customisation in blue section*/

#block-region-side-pre {
	background: #e6e6e6;
}

#block-region-side-post {
	background: #e6e6e6;
}

footer {
	background: #242b32;
	color: #bdc3c7;
}
footer span {
	color: #434e58;
}

.da-dots span.da-dots-current:after {
	background: #f39c11;
}
.da-dots span {
	border: solid 2px #f39c11;
}
@media screen and (max-width: 767px) {
.landing-page .logo-wr {
    background: #f39c11!important;    
}
}
.number-section-content h2 {
	color: #2e2e2e;
}
.static-number-section {
	background: #2e2e2e;
}
/* ----------------------------------------------------------------------------------- */
</style>
<?php } if ($color_scheme == 'orange') { ?>
<style type="text/css">
.course-items-grid-view .abc::-webkit-scrollbar-thumb
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #2a80b9;
}
.top-featured-course a:hover .top-featured-course-items-icon {
	background: #70b4e2;
    box-shadow: 4px 4px 0 #2A80B9;
}
#dock .dockedtitle {
	background-color : rgba(233, 149, 76, .8)!important;
}
@media screen and (max-width: 767px) {
.landing-page .logo-wr {
    background: #2a80b9!important;    
}
}
.da-dots span.da-dots-current:after {
	background: #2a80b9;
}
.da-dots span {
	border: solid 2px #2a80b9;
}
.news-updates .container:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/orange/i-notice.png) no-repeat center top;	
}
@media screen and (max-width: 1199px) {
.news-updates .container:before {
background-size: 100%!important;
}
}
.view-toggle .btn-view-list.active, .view-toggle .btn-view-grid.active {
    background-color: #e67e22;
}
#block-region-side-post .block .content .footer a,
#block-region-side-post .activityhead a,
#block-region-side-post .newlink a,
#block-region-side-post .searchform a,
#region-main a,
.moodle-dialogue-ft a,
footer a,
footer a:hover,
footer a:active,
footer a:focus,
.popular-courses-nav a,
.btn-view-all,
.usermenu .userbutton span span:hover,
.navbar .dropdown-menu li a:hover,
.breadcrumb a:hover,
.popular-courses-nav a:hover,
.block-links-item .btn-view-all:hover,
.btn-see-all:hover,
.btn-see-all:focus,
.breadcrumb a,
.userbutton > span:last-child span,
.usermenu .menu a:hover, .course-item h6 a  {
	color: #e67e22;	
}

.btn.btn-navbar.active-drop .fa {
	color:#e67e22!important;	
}


.logining-wr a:last-child {
	color:#e67e22;	
}

.loginbox .loginform .form-input input {
	border: 1px solid #e67e22;			
	
}

.logining-wr a:first-child {
    background: #e67e22!important;										
    box-shadow: 1px 1px 0 0 #0a5948!important;						
}

#page input.form-submit, 
#page input#id_submitbutton, 
#page input#id_submitbutton2, 
#page .path-admin .buttons input[type="submit"], 
#page td.submit input,
#page #id_saveanddisplay,
.mdl-align .btn-primary {
    background-color: #e67e22;		
    border-color: #b05e16;			

	box-shadow: 0 2px 0 0 #b05e16;	
}

#block-region-side-post .block .minicalendar th{
	background-color:#e84c3d; 										
}


.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	box-shadow: none!important;
}

.view-toggle .btn-view-list.active {
	background-color: #e67e22;										
}

header.navbar,
#block-region-side-pre .block .header,
.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	background: #e67e22;	
}

.landing-page .logo-img {
	background: #2a80b9;		
}

.landing-page header,
.loginpanel
 {
	background: #e67e22;
}

.navbar-inner
 {
	background: #e67e22!important;
}

.btn-1 {
    background: #2a80b9 none repeat scroll 0 0; 
	
}

.navbar-inner .logo-wr {
	background: #2a80b9;  
}
.news-updates .container:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/orange/i-notice.png) no-repeat center top;	
}
.landing-page .userbutton > span:last-child span:after {
    background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/orange/dwn-arrow-landing.png) no-repeat scroll right 8px;
}

.loginpanel h2:before, a.click {
    background: #2a80b9 no-repeat scroll center center; 
}

.rememberpass input + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/orange/i-ch-unch-2.png) no-repeat center;			
}

.rememberpass input + label:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/i-ch-unch-2.png) no-repeat center;
}

.rememberpass input:checked + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/orange/i-ch-ch-2.png) no-repeat center;	
}

.userbutton > span:last-child span:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/orange/dwn-arrow.png) no-repeat center right;	
}

.landing-page .active-drop-user-menu .userbutton > span:last-child span:after {
    background: rgba(0, 0, 0, 0) url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/orange/dwn-arrow-landing-hover.png) no-repeat scroll right 8px;
}

.loginbox a:hover, 
.loginbox .error {
	color:rgba(255, 255, 255, .8)!important;
}


#block-region-side-post .calendar_filters.filters a,
#block-region-side-post .block_community a:hover,
#block-region-side-post .moodle-actionmenu .toggle-display, 
#block-region-side-post .moodle-actionmenu .menu-action-text,
#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text,
#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover {
	color: #333; 
}

#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text {
	color: #111; 
}

#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover,
#block-region-side-pre .moodle-actionmenu .toggle-display:hover, 
#block-region-side-pre .moodle-actionmenu .menu-action-text:hover {
	text-decoration:underline;	
}



/*Secondary Color Customisation in orange section*/

#block-region-side-pre {
	background: #e6e6e6;
}

#block-region-side-post {
	background: #e6e6e6;
}

footer {
	background: #242b32;
	color: #bdc3c7;
}
footer span {
	color: #434e58;
}
#block-region-side-post .block .minicalendar th {
    background-color: #2a80b9;
}
.block .minicalendar td.today {
	background-color: #2a80b9;
}
#block-region-side-post .block .minicalendar th {
    background-color: #2a80b9;
}
.block .minicalendar td.today {
	background-color: #2a80b9;
}

.number-section-content h2 {
	color: #e67e22;
}
.static-number-section {
	background: #e67e22;
}
/* ----------------------------------------------------------------------------------- */
</style>
<?php } if ($color_scheme == 'purple') { ?>
<style type="text/css">

.course-items-grid-view .abc::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #f39c11;
}
.top-featured-course a:hover .top-featured-course-items-icon {
	background: #f7b852;
    box-shadow: 4px 4px 0 #f39c11;
}
@media screen and (max-width: 767px) {
.landing-page .logo-wr {
    background: #f39c11!important;    
}
}
#dock .dockedtitle {
	background-color : rgba(173, 120, 194, .8)!important;
}
.da-dots span.da-dots-current:after {
	background: #f39c11;
}
.da-dots span {
	border: solid 2px #f39c11;
}
.news-updates .container:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/purple/i-notice.png) no-repeat center top;	
}
@media screen and (max-width: 1199px) {
.news-updates .container:before {
background-size: 100%!important;
}
}
.view-toggle .btn-view-list.active, .view-toggle .btn-view-grid.active {
    background-color: #9b59b6;
}
#block-region-side-post .block .content .footer a,
#block-region-side-post .activityhead a,
#block-region-side-post .newlink a,
#block-region-side-post .searchform a,
#region-main a,
.moodle-dialogue-ft a,
footer a,
footer a:hover,
footer a:active,
footer a:focus,
.popular-courses-nav a,
.btn-view-all,
.usermenu .userbutton span span:hover,
.navbar .dropdown-menu li a:hover,
.breadcrumb a:hover,
.popular-courses-nav a:hover,
.block-links-item .btn-view-all:hover,
.btn-see-all:hover,
.btn-see-all:focus,
.breadcrumb a,
.userbutton > span:last-child span,
.usermenu .menu a:hover, .course-item h6 a  {
	color: #9b59b6;	
}

.btn.btn-navbar.active-drop .fa {
	color:#9b59b6!important;	
}


.logining-wr a:last-child {
	color:#9b59b6;	
}

.loginbox .loginform .form-input input {
	border: 1px solid #9b59b6;			
	
}

.logining-wr a:first-child {
    background: #9b59b6!important;										
    box-shadow: 1px 1px 0 0 #0a5948!important;						
}

#page input.form-submit, 
#page input#id_submitbutton, 
#page input#id_submitbutton2, 
#page .path-admin .buttons input[type="submit"], 
#page td.submit input,
#page #id_saveanddisplay,
.mdl-align .btn-primary {
    background-color: #9b59b6;		
    border-color: #6c3382;			

	box-shadow: 0 2px 0 0 #6c3382;	
}

#block-region-side-post .block .minicalendar th{
	background-color:#e84c3d; 										
}


.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	box-shadow: none!important;
}

.view-toggle .btn-view-list.active {
	background-color: #9b59b6;										
}

header.navbar,
#block-region-side-pre .block .header,
.navbar-fixed-top .navbar-inner, 
.navbar-static-top .navbar-inner {
	background: #9b59b6;	
}

.landing-page .logo-img {
	background: #f39c11;		
}

.landing-page header,
.loginpanel
 {
	background: #9b59b6;
}

.navbar-inner
 {
	background: #9b59b6!important;
}

.btn-1 {
    background: #f39c11 none repeat scroll 0 0; 
	
}

.navbar-inner .logo-wr {
	background: #f39c11;  
}
.news-updates .container:before {
	background: url(theme/tikli/css/img/purple/i-notice.png) no-repeat center top;	
}
.landing-page .userbutton > span:last-child span:after {
    background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/purple/dwn-arrow-landing.png) no-repeat scroll right 8px;
}

.loginpanel h2:before, a.click {
    background: #f39c11 no-repeat scroll center center; 
}

.rememberpass input + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/purple/i-ch-unch-2.png) no-repeat center;			
}

.rememberpass input + label:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/i-ch-unch-2.png) no-repeat center;
}

.rememberpass input:checked + label:before {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/purple/i-ch-ch-2.png) no-repeat center;	
}

.userbutton > span:last-child span:after {
	background: url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/purple/dwn-arrow.png) no-repeat center right;	
}

.landing-page .active-drop-user-menu .userbutton > span:last-child span:after {
    background: rgba(0, 0, 0, 0) url(<?php echo $CFG->wwwroot ?>/theme/tikli/css/img/purple/dwn-arrow-landing-hover.png) no-repeat scroll right 8px;
}

.loginbox a:hover, 
.loginbox .error {
	color:rgba(255, 255, 255, .8)!important;
}


#block-region-side-post .calendar_filters.filters a,
#block-region-side-post .block_community a:hover,
#block-region-side-post .moodle-actionmenu .toggle-display, 
#block-region-side-post .moodle-actionmenu .menu-action-text,
#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text,
#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover {
	color: #333; 
}

#block-region-side-pre .moodle-actionmenu .toggle-display, 
#block-region-side-pre .moodle-actionmenu .menu-action-text {
	color: #111; 
}

#block-region-side-post .moodle-actionmenu .toggle-display:hover, 
#block-region-side-post .moodle-actionmenu .menu-action-text:hover,
#block-region-side-pre .moodle-actionmenu .toggle-display:hover, 
#block-region-side-pre .moodle-actionmenu .menu-action-text:hover {
	text-decoration:underline;	
}



/*Secondary Color Customisation in purple section*/

#block-region-side-pre {
	background: #e6e6e6;
}

#block-region-side-post {
	background: #e6e6e6;
}

footer {
	background: #242b32;
	color: #bdc3c7;
}
footer span {
	color: #434e58;
}
#block-region-side-post .block .minicalendar th {
    background-color: #f39c11;
}
.block .minicalendar td.today {
	background-color: #f39c11;
}
.number-section-content h2 {
	color: #9b59b6;
}
.static-number-section {
	background: #9b59b6;
}
/* ----------------------------------------------------------------------------------- */
</style>
<?php }
