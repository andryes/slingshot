<?php
/*
Template Name: Artificial Intelligence
*/
wp_enqueue_style( 'ai-style', get_stylesheet_directory_uri() . '/css/updated.css');
get_header();

$args_news = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => '10',
	'order' => 'desc',
	'orderby' => 'date',
	'category_name'  => 'artificial-intelligence',
);
$blog_news = new WP_Query($args_news);

?>
	<style id="dynamic-css-inline-css" type="text/css">
        body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (max-width:999px){body:not(.nectar-no-flex-height) #header-space[data-secondary-header-display="full"]:not([data-header-mobile-fixed="false"]){display:block!important;margin-bottom:-66px;}#header-space[data-secondary-header-display="full"][data-header-mobile-fixed="false"]{display:none;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section,.parallax_slider_outer.first-section .swiper-slide .content,.nectar-slider-wrap.first-section .swiper-slide .content,#page-header-bg,.nder-page-header,#page-header-wrap,.full-width-section.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}@media only screen and (min-width:1000px){#page-header-wrap.fullscreen-header,#page-header-wrap.fullscreen-header #page-header-bg,html:not(.nectar-box-roll-loaded) .nectar-box-roll > #page-header-bg.fullscreen-header,.nectar_fullscreen_zoom_recent_projects,#nectar_fullscreen_rows:not(.afterLoaded) > div{height:100vh;}.wpb_row.vc_row-o-full-height.top-level,.wpb_row.vc_row-o-full-height.top-level > .col.span_12{min-height:100vh;}#page-header-bg[data-alignment-v="middle"] .span_6 .inner-wrap,#page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap,.blog-archive-header.color-bg .container{padding-top:100px;}#page-header-wrap.container #page-header-bg .span_6 .inner-wrap{padding-top:0;}.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded),.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container{height:calc(100vh + 2px)!important;}.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded),.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container{height:calc(100vh - 30px)!important;}}@media only screen and (max-width:999px){#page-header-bg[data-alignment-v="middle"]:not(.fullscreen-header) .span_6 .inner-wrap,#page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap,.blog-archive-header.color-bg .container{padding-top:70px;}.vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12,#page-header-bg[data-alignment-v="bottom"] .span_6 .inner-wrap{padding-top:40px;}}@media only screen and (max-width:690px){.vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12{padding-top:70px;}.vc_row.top-level.full-width-content .nectar-recent-posts-single_featured .recent-post-container > .inner-wrap{padding-top:40px;}}@media only screen and (max-width:999px) and (min-width:691px){#page-header-bg[data-alignment-v="middle"]:not(.fullscreen-header) .span_6 .inner-wrap,#page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap,.vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12{padding-top:110px;}}@media only screen and (max-width:999px){.full-width-ns .nectar-slider-wrap .swiper-slide[data-y-pos="middle"] .content,.full-width-ns .nectar-slider-wrap .swiper-slide[data-y-pos="top"] .content{padding-top:30px;}}@media only screen and (max-width:999px){.using-mobile-browser #nectar_fullscreen_rows:not(.afterLoaded):not([data-mobile-disable="on"]) > div{height:calc(100vh - 76px);}.using-mobile-browser .wpb_row.vc_row-o-full-height.top-level,.using-mobile-browser .wpb_row.vc_row-o-full-height.top-level > .col.span_12,[data-permanent-transparent="1"].using-mobile-browser .wpb_row.vc_row-o-full-height.top-level,[data-permanent-transparent="1"].using-mobile-browser .wpb_row.vc_row-o-full-height.top-level > .col.span_12{min-height:calc(100vh - 76px);}html:not(.nectar-box-roll-loaded) .nectar-box-roll > #page-header-bg.fullscreen-header,.nectar_fullscreen_zoom_recent_projects,.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded),.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container,#nectar_fullscreen_rows:not(.afterLoaded):not([data-mobile-disable="on"]) > div{height:calc(100vh - 1px);}.wpb_row.vc_row-o-full-height.top-level,.wpb_row.vc_row-o-full-height.top-level > .col.span_12{min-height:calc(100vh - 1px);}body[data-transparent-header="false"] #ajax-content-wrap.no-scroll{min-height:calc(100vh - 1px);height:calc(100vh - 1px);}}#nectar_fullscreen_rows{background-color:transparent;}.nectar-shape-divider-wrap{position:absolute;top:auto;bottom:0;left:0;right:0;width:100%;height:150px;z-index:3;transform:translateZ(0);}.post-area.span_9 .nectar-shape-divider-wrap{overflow:hidden;}.nectar-shape-divider-wrap[data-front="true"]{z-index:50;}.nectar-shape-divider-wrap[data-style="waves_opacity"] svg path:first-child{opacity:0.6;}.nectar-shape-divider-wrap[data-style="curve_opacity"] svg path:nth-child(1),.nectar-shape-divider-wrap[data-style="waves_opacity_alt"] svg path:nth-child(1){opacity:0.15;}.nectar-shape-divider-wrap[data-style="curve_opacity"] svg path:nth-child(2),.nectar-shape-divider-wrap[data-style="waves_opacity_alt"] svg path:nth-child(2){opacity:0.3;}.nectar-shape-divider{width:100%;left:0;bottom:-1px;height:100%;position:absolute;}.nectar-shape-divider-wrap.no-color .nectar-shape-divider{fill:#fff;}@media only screen and (max-width:999px){.nectar-shape-divider-wrap:not([data-using-percent-val="true"]) .nectar-shape-divider{height:75%;}.nectar-shape-divider-wrap[data-style="clouds"]:not([data-using-percent-val="true"]) .nectar-shape-divider{height:55%;}}@media only screen and (max-width:690px){.nectar-shape-divider-wrap:not([data-using-percent-val="true"]) .nectar-shape-divider{height:33%;}.nectar-shape-divider-wrap[data-style="clouds"]:not([data-using-percent-val="true"]) .nectar-shape-divider{height:33%;}}#ajax-content-wrap .nectar-shape-divider-wrap[data-height="1"] .nectar-shape-divider,#ajax-content-wrap .nectar-shape-divider-wrap[data-height="1px"] .nectar-shape-divider{height:1px;}.wpb_row[data-br="5px"][data-br-applies="both"] .row_col_wrap_12{border-radius:5px;}.wpb_row[data-br="5px"][data-br-applies="both"] > .row-bg-wrap,.wpb_row[data-br="5px"][data-br-applies="both"] > .nectar-video-wrap,.wpb_row[data-br="5px"][data-br-applies="both"] > .nectar-parallax-scene{border-radius:5px;}body .container-wrap .wpb_row[data-column-margin="none"]:not(.full-width-section):not(.full-width-content),html body .wpb_row[data-column-margin="none"]:not(.full-width-section):not(.full-width-content){margin-bottom:0;}body .container-wrap .vc_row-fluid[data-column-margin="none"] > .span_12,html body .vc_row-fluid[data-column-margin="none"] > .span_12,body .container-wrap .vc_row-fluid[data-column-margin="none"] .full-page-inner > .container > .span_12,body .container-wrap .vc_row-fluid[data-column-margin="none"] .full-page-inner > .span_12{margin-left:0;margin-right:0;}body .container-wrap .vc_row-fluid[data-column-margin="none"] .wpb_column:not(.child_column),body .container-wrap .inner_row[data-column-margin="none"] .child_column,html body .vc_row-fluid[data-column-margin="none"] .wpb_column:not(.child_column),html body .inner_row[data-column-margin="none"] .child_column{padding-left:0;padding-right:0;}.nectar-shape-divider-wrap[data-position="top"]{top:-1px;bottom:auto;}.nectar-shape-divider-wrap[data-position="top"]{transform:rotate(180deg)}.wpb_row[data-using-ctc="true"] h1,.wpb_row[data-using-ctc="true"] h2,.wpb_row[data-using-ctc="true"] h3,.wpb_row[data-using-ctc="true"] h4,.wpb_row[data-using-ctc="true"] h5,.wpb_row[data-using-ctc="true"] h6{color:inherit}body[data-aie] .col[data-padding-pos="bottom"] > .vc_column-inner,body #ajax-content-wrap .col[data-padding-pos="bottom"] > .vc_column-inner,#ajax-content-wrap .col[data-padding-pos="bottom"] > .n-sticky > .vc_column-inner{padding-right:0;padding-top:0;padding-left:0}.wpb_column.el_spacing_0px > .vc_column-inner > .wpb_wrapper > div:not(:last-child),.wpb_column.el_spacing_0px > .n-sticky > .vc_column-inner > .wpb_wrapper > div:not(:last-child){margin-bottom:0;}#ajax-content-wrap .col[data-padding-pos="top-bottom"]> .vc_column-inner,#ajax-content-wrap .col[data-padding-pos="top-bottom"] > .n-sticky > .vc_column-inner{padding-left:0;padding-right:0}.col.padding-4-percent > .vc_column-inner,.col.padding-4-percent > .n-sticky > .vc_column-inner{padding:calc(600px * 0.06);}@media only screen and (max-width:690px){.col.padding-4-percent > .vc_column-inner,.col.padding-4-percent > .n-sticky > .vc_column-inner{padding:calc(100vw * 0.06);}}@media only screen and (min-width:1000px){.col.padding-4-percent > .vc_column-inner,.col.padding-4-percent > .n-sticky > .vc_column-inner{padding:calc((100vw - 180px) * 0.04);}.column_container:not(.vc_col-sm-12) .col.padding-4-percent > .vc_column-inner{padding:calc((100vw - 180px) * 0.02);}}@media only screen and (min-width:1425px){.col.padding-4-percent > .vc_column-inner{padding:calc(1245px * 0.04);}.column_container:not(.vc_col-sm-12) .col.padding-4-percent > .vc_column-inner{padding:calc(1245px * 0.02);}}.full-width-content .col.padding-4-percent > .vc_column-inner{padding:calc(100vw * 0.04);}@media only screen and (max-width:999px){.full-width-content .col.padding-4-percent > .vc_column-inner{padding:calc(100vw * 0.06);}}@media only screen and (min-width:1000px){.full-width-content .column_container:not(.vc_col-sm-12) .col.padding-4-percent > .vc_column-inner{padding:calc(100vw * 0.02);}}.wpb_column.right_margin_1pct{margin-right:1%!important;}.wpb_column[data-border-radius="10px"],.wpb_column[data-border-radius="10px"] > .vc_column-inner,.wpb_column[data-border-radius="10px"] > .vc_column-inner > .column-link,.wpb_column[data-border-radius="10px"] > .vc_column-inner > .column-bg-overlay-wrap,.wpb_column[data-border-radius="10px"] > .vc_column-inner > .column-image-bg-wrap[data-bg-animation="zoom-out-reveal"],.wpb_column[data-border-radius="10px"] > .vc_column-inner > .column-image-bg-wrap .column-image-bg,.wpb_column[data-border-radius="10px"] > .vc_column-inner > .column-image-bg-wrap[data-n-parallax-bg="true"],.wpb_column[data-border-radius="10px"] > .n-sticky > .vc_column-inner,.wpb_column[data-border-radius="10px"] > .n-sticky > .vc_column-inner > .column-bg-overlay-wrap{border-radius:10px;}.col.padding-5-percent > .vc_column-inner,.col.padding-5-percent > .n-sticky > .vc_column-inner{padding:calc(600px * 0.06);}@media only screen and (max-width:690px){.col.padding-5-percent > .vc_column-inner,.col.padding-5-percent > .n-sticky > .vc_column-inner{padding:calc(100vw * 0.06);}}@media only screen and (min-width:1000px){.col.padding-5-percent > .vc_column-inner,.col.padding-5-percent > .n-sticky > .vc_column-inner{padding:calc((100vw - 180px) * 0.05);}.column_container:not(.vc_col-sm-12) .col.padding-5-percent > .vc_column-inner{padding:calc((100vw - 180px) * 0.025);}}@media only screen and (min-width:1425px){.col.padding-5-percent > .vc_column-inner{padding:calc(1245px * 0.05);}.column_container:not(.vc_col-sm-12) .col.padding-5-percent > .vc_column-inner{padding:calc(1245px * 0.025);}}.full-width-content .col.padding-5-percent > .vc_column-inner{padding:calc(100vw * 0.05);}@media only screen and (max-width:999px){.full-width-content .col.padding-5-percent > .vc_column-inner{padding:calc(100vw * 0.06);}}@media only screen and (min-width:1000px){.full-width-content .column_container:not(.vc_col-sm-12) .col.padding-5-percent > .vc_column-inner{padding:calc(100vw * 0.025);}}.wpb_column[data-border-radius="3px"],.wpb_column[data-border-radius="3px"] > .vc_column-inner,.wpb_column[data-border-radius="3px"] > .vc_column-inner > .column-link,.wpb_column[data-border-radius="3px"] > .vc_column-inner > .column-bg-overlay-wrap,.wpb_column[data-border-radius="3px"] > .vc_column-inner > .column-image-bg-wrap[data-bg-animation="zoom-out-reveal"],.wpb_column[data-border-radius="3px"] > .vc_column-inner > .column-image-bg-wrap .column-image-bg,.wpb_column[data-border-radius="3px"] > .vc_column-inner > .column-image-bg-wrap[data-n-parallax-bg="true"],.wpb_column[data-border-radius="3px"] > .n-sticky > .vc_column-inner,.wpb_column[data-border-radius="3px"] > .n-sticky > .vc_column-inner > .column-bg-overlay-wrap{border-radius:3px;}.column-image-bg-wrap[data-bg-pos="center center"] .column-image-bg,.container-wrap .main-content .column-image-bg-wrap[data-bg-pos="center center"] .column-image-bg{background-position:center center;}.wpb_column > .vc_column-inner > .border-wrap{position:static;pointer-events:none}.wpb_column > .vc_column-inner > .border-wrap >span{position:absolute;z-index:100;}.wpb_column[data-border-style="solid"] > .vc_column-inner > .border-wrap >span{border-style:solid}.wpb_column[data-border-style="dotted"] > .vc_column-inner > .border-wrap >span{border-style:dotted}.wpb_column[data-border-style="dashed"] > .vc_column-inner > .border-wrap >span{border-style:dashed}.wpb_column > .vc_column-inner > .border-wrap >.border-top,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-top:after{width:100%;top:0;left:0;border-color:inherit;}.wpb_column > .vc_column-inner > .border-wrap >.border-bottom,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-bottom:after{width:100%;bottom:0;left:0;border-color:inherit;}.wpb_column > .vc_column-inner > .border-wrap >.border-left,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-left:after{height:100%;top:0;left:0;border-color:inherit;}.wpb_column > .vc_column-inner > .border-wrap >.border-right,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-right:after{height:100%;top:0;right:0;border-color:inherit;}.wpb_column > .vc_column-inner > .border-wrap >.border-right,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-right:after,.wpb_column > .vc_column-inner > .border-wrap >.border-left,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-left:after,.wpb_column > .vc_column-inner > .border-wrap >.border-bottom,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-bottom:after{border-top:none!important}.wpb_column > .vc_column-inner > .border-wrap >.border-left,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-left:after,.wpb_column > .vc_column-inner > .border-wrap >.border-bottom,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-bottom:after,.wpb_column > .vc_column-inner > .border-wrap >.border-top,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-top:after{border-right:none!important}.wpb_column > .vc_column-inner > .border-wrap >.border-right,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-right:after,.wpb_column > .vc_column-inner > .border-wrap >.border-left,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-left:after,.wpb_column > .vc_column-inner > .border-wrap >.border-top,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-top:after{border-bottom:none!important}.wpb_column > .vc_column-inner > .border-wrap >.border-right,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-right:after,.wpb_column > .vc_column-inner > .border-wrap >.border-bottom,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-bottom:after,.wpb_column > .vc_column-inner > .border-wrap >.border-top,.wpb_column[data-border-style*="double"] > .vc_column-inner > .border-wrap >.border-top:after{border-left:none!important}.column-image-bg-wrap[data-bg-pos="center bottom"] .column-image-bg,.container-wrap .main-content .column-image-bg-wrap[data-bg-pos="center bottom"] .column-image-bg{background-position:center bottom;}.col.padding-2-percent > .vc_column-inner,.col.padding-2-percent > .n-sticky > .vc_column-inner{padding:calc(600px * 0.03);}@media only screen and (max-width:690px){.col.padding-2-percent > .vc_column-inner,.col.padding-2-percent > .n-sticky > .vc_column-inner{padding:calc(100vw * 0.03);}}@media only screen and (min-width:1000px){.col.padding-2-percent > .vc_column-inner,.col.padding-2-percent > .n-sticky > .vc_column-inner{padding:calc((100vw - 180px) * 0.02);}.column_container:not(.vc_col-sm-12) .col.padding-2-percent > .vc_column-inner{padding:calc((100vw - 180px) * 0.01);}}@media only screen and (min-width:1425px){.col.padding-2-percent > .vc_column-inner{padding:calc(1245px * 0.02);}.column_container:not(.vc_col-sm-12) .col.padding-2-percent > .vc_column-inner{padding:calc(1245px * 0.01);}}.full-width-content .col.padding-2-percent > .vc_column-inner{padding:calc(100vw * 0.02);}@media only screen and (max-width:999px){.full-width-content .col.padding-2-percent > .vc_column-inner{padding:calc(100vw * 0.03);}}@media only screen and (min-width:1000px){.full-width-content .column_container:not(.vc_col-sm-12) .col.padding-2-percent > .vc_column-inner{padding:calc(100vw * 0.01);}}body[data-aie] .col[data-padding-pos="right"] > .vc_column-inner,body #ajax-content-wrap .col[data-padding-pos="right"] > .vc_column-inner,#ajax-content-wrap .col[data-padding-pos="right"] > .n-sticky > .vc_column-inner{padding-left:0;padding-top:0;padding-bottom:0}body[data-aie] .col[data-padding-pos="left"] > .vc_column-inner,body #ajax-content-wrap .col[data-padding-pos="left"] > .vc_column-inner,#ajax-content-wrap .col[data-padding-pos="left"] > .n-sticky > .vc_column-inner{padding-right:0;padding-top:0;padding-bottom:0}.wpb_column[data-cfc="true"] h1,.wpb_column[data-cfc="true"] h2,.wpb_column[data-cfc="true"] h3,.wpb_column[data-cfc="true"] h4,.wpb_column[data-cfc="true"] h5,.wpb_column[data-cfc="true"] h6,.wpb_column[data-cfc="true"] p{color:inherit}@media only screen,print{.wpb_column.top_padding_desktop_2pct > .vc_column-inner{padding-top:2%;}.wpb_column.right_padding_desktop_4pct > .vc_column-inner{padding-right:4%;}.wpb_column.bottom_padding_desktop_2pct > .vc_column-inner{padding-bottom:2%;}.wpb_column.left_padding_desktop_2pct > .vc_column-inner{padding-left:2%;}}@media only screen,print{.wpb_column.top_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-top:2%;}.wpb_column.right_padding_desktop_4pct > .n-sticky > .vc_column-inner{padding-right:4%;}.wpb_column.bottom_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-bottom:2%;}.wpb_column.left_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-left:2%;}}@media only screen,print{.wpb_column.top_padding_desktop_3pct > .vc_column-inner{padding-top:3%;}.wpb_column.right_padding_desktop_3pct > .vc_column-inner{padding-right:3%;}.wpb_column.bottom_padding_desktop_3pct > .vc_column-inner{padding-bottom:3%;}.wpb_column.left_padding_desktop_3pct > .vc_column-inner{padding-left:3%;}}@media only screen,print{.wpb_column.top_padding_desktop_3pct > .n-sticky > .vc_column-inner{padding-top:3%;}.wpb_column.right_padding_desktop_3pct > .n-sticky > .vc_column-inner{padding-right:3%;}.wpb_column.bottom_padding_desktop_3pct > .n-sticky > .vc_column-inner{padding-bottom:3%;}.wpb_column.left_padding_desktop_3pct > .n-sticky > .vc_column-inner{padding-left:3%;}}@media only screen,print{.wpb_column.top_padding_desktop_2pct > .vc_column-inner{padding-top:2%;}.wpb_column.right_padding_desktop_2pct > .vc_column-inner{padding-right:2%;}.wpb_column.bottom_padding_desktop_2pct > .vc_column-inner{padding-bottom:2%;}.wpb_column.left_padding_desktop_2pct > .vc_column-inner{padding-left:2%;}}@media only screen,print{.wpb_column.top_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-top:2%;}.wpb_column.right_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-right:2%;}.wpb_column.bottom_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-bottom:2%;}.wpb_column.left_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-left:2%;}}@media only screen,print{.wpb_column.right_padding_desktop_1pct > .vc_column-inner{padding-right:1%;}.wpb_column.bottom_padding_desktop_2pct > .vc_column-inner{padding-bottom:2%;}}@media only screen,print{.wpb_column.right_padding_desktop_1pct > .n-sticky > .vc_column-inner{padding-right:1%;}.wpb_column.bottom_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-bottom:2%;}}@media only screen,print{.wpb_column.top_padding_desktop_2pct > .vc_column-inner{padding-top:2%;}.wpb_column.right_padding_desktop_2pct > .vc_column-inner{padding-right:2%;}.wpb_column.bottom_padding_desktop_2pct > .vc_column-inner{padding-bottom:2%;}.wpb_column.left_padding_desktop_3pct > .vc_column-inner{padding-left:3%;}}@media only screen,print{.wpb_column.top_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-top:2%;}.wpb_column.right_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-right:2%;}.wpb_column.bottom_padding_desktop_2pct > .n-sticky > .vc_column-inner{padding-bottom:2%;}.wpb_column.left_padding_desktop_3pct > .n-sticky > .vc_column-inner{padding-left:3%;}}.img-with-aniamtion-wrap.custom-width-90pct .inner{max-width:90%;}@media only screen and (max-width :999px){body .img-with-aniamtion-wrap[data-max-width-mobile="100%"] .inner{width:100%;}}.img-with-aniamtion-wrap[data-max-width="125%"] .inner{width:125%;display:block;}.img-with-aniamtion-wrap[data-max-width="125%"] img{max-width:100%;width:auto;}.img-with-aniamtion-wrap[data-max-width="125%"][data-shadow*="depth"] img{max-width:none;width:100%;}.right.img-with-aniamtion-wrap[data-max-width="125%"] img{display:block;}.right.img-with-aniamtion-wrap[data-max-width="125%"] img:not([srcset]){width:100%;}.img-with-aniamtion-wrap.right[data-max-width="125%"] .inner{margin-left:-25%;}@media only screen and (max-width :999px){.img-with-aniamtion-wrap[data-max-width="125%"] .inner{max-width:100%;}.img-with-animation[data-max-width="125%"]{max-width:100%;margin-left:0;}}.img-with-aniamtion-wrap[data-border-radius="5px"] .img-with-animation,.img-with-aniamtion-wrap[data-border-radius="5px"] .inner,.img-with-aniamtion-wrap[data-border-radius="5px"] .hover-wrap{border-radius:5px;}.img-with-aniamtion-wrap[data-max-width="110%"] .inner{width:110%;display:block;}.img-with-aniamtion-wrap[data-max-width="110%"] img{max-width:100%;width:auto;}.img-with-aniamtion-wrap[data-max-width="110%"][data-shadow*="depth"] img{max-width:none;width:100%;}.right.img-with-aniamtion-wrap[data-max-width="110%"] img{display:block;}.right.img-with-aniamtion-wrap[data-max-width="110%"] img:not([srcset]){width:100%;}.img-with-aniamtion-wrap.right[data-max-width="110%"] .inner{margin-left:-10%;}@media only screen and (max-width :999px){.img-with-aniamtion-wrap[data-max-width="110%"] .inner{max-width:100%;}.img-with-animation[data-max-width="110%"]{max-width:100%;margin-left:0;}}.nectar-highlighted-text[data-color="#ffdb00"]:not([data-style="text_outline"]) em{background-image:linear-gradient(to right,#ffdb00 0,#ffdb00 100%);}.nectar-highlighted-text[data-color="#ffdb00"]:not([data-style="text_outline"]) em.has-link,.nectar-highlighted-text[data-color="#ffdb00"]:not([data-style="text_outline"]) a em{background-image:linear-gradient(to right,#ffdb00 0,#ffdb00 100%),linear-gradient(to right,#ffdb00 0,#ffdb00 100%);}@keyframes nectarStrokeAnimation{0%{stroke-dashoffset:1;opacity:0;}1%{opacity:1;}100%{stroke-dashoffset:0;}}.nectar-highlighted-text .nectar-scribble{position:absolute;left:0;top:0;z-index:-1;}.nectar-highlighted-text .nectar-scribble path{stroke-dasharray:1;stroke-dashoffset:1;opacity:0;}.nectar-highlighted-text em.animated .nectar-scribble path{stroke-linecap:round;opacity:1;animation:nectarStrokeAnimation 1.3s cubic-bezier(0.65,0,0.35,1) forwards;}.nectar-highlighted-text[data-style="scribble"] em{background-image:none!important;}body .nectar-scribble.basic-underline{width:100%;height:30%;top:auto;bottom:-20%;}@media only screen and (min-width:1000px){.nectar-highlighted-text.font_size_30px h1,.nectar-highlighted-text.font_size_30px h2,.nectar-highlighted-text.font_size_30px h3,.nectar-highlighted-text.font_size_30px h4,.nectar-highlighted-text.font_size_30px h5,.nectar-highlighted-text.font_size_30px h6,.nectar-highlighted-text.font_size_30px p{font-size:30px;line-height:1.1em;}}.nectar-highlighted-text[data-style="regular_underline"].font_size_30px em:before,.nectar-highlighted-text[data-style="half_text"].font_size_30px em:before{bottom:.07em;}@media only screen and (max-width:690px){.nectar-flickity[data-phone-columns="2"]:not(.masonry) .flickity-slider .cell{width:calc(100% / 2);}}@media only screen and (min-width:1300px){.nectar-flickity.nectar-carousel[data-desktop-columns="5"][data-spacing="5px"][data-format="default"] .cell{width:calc((100% - 40px) / 5);}}@media only screen and (min-width:1000px) and (max-width:1299px){.nectar-flickity.nectar-carousel[data-small-desktop-columns="4"][data-spacing="5px"][data-format="default"] .cell{width:calc((100% - 30px) / 4);}}@media only screen and (max-width:999px) and (min-width:690px){.nectar-flickity.nectar-carousel[data-tablet-columns="3"][data-spacing="5px"][data-format="default"] .cell{width:calc((100% - 20px) / 3);}}.nectar-flickity.nectar-carousel[data-format="fixed_text_content_fullwidth"] .flickity-slider .cell .inner-wrap-outer{transform-style:preserve-3d;}.nectar-flickity.nectar-carousel[data-format="fixed_text_content_fullwidth"] .flickity-slider .cell{overflow:visible;}.nectar-flickity.nectar-carousel[data-format="fixed_text_content_fullwidth"] .flickity-slider .cell{margin-right:30px;padding:2px;}.nectar-flickity.nectar-carousel[data-format="fixed_text_content_fullwidth"] .flickity-slider{left:1px!important;}.nectar-carousel-flickity-fixed-content .nectar-carousel-fixed-content p{opacity:0.75;}.nectar-carousel-flickity-fixed-content .nectar-carousel-fixed-content{width:33%;top:50%;position:absolute;-webkit-transform:translateY(-50%);transform:translateY(-50%);padding-right:65px;z-index:50;}.nectar-carousel-flickity-fixed-content .nectar-flickity{margin-left:34%;width:100%;}@media only screen and (min-width:1000px){.nectar-carousel-flickity-fixed-content[data-alignment="right"] .nectar-flickity{margin-left:-34%;}.nectar-carousel-flickity-fixed-content[data-alignment="right"] .nectar-carousel-fixed-content{right:0;left:auto;padding-right:0;padding-left:65px;}.nectar-carousel-flickity-fixed-content[data-alignment="right"] .nectar-carousel[data-format="fixed_text_content_fullwidth"] .flickity-page-dots{text-align:right;}}@media only screen and (min-width:2000px){.nectar-carousel-flickity-fixed-content[data-alignment="right"] .nectar-flickity{margin-left:-50%;}}.nectar-carousel-flickity-fixed-content .nectar-flickity:not(.flickity-enabled){opacity:0;}@media only screen and (min-width:2000px){.nectar-carousel-flickity-fixed-content .nectar-flickity{width:115%;}}.nectar-flickity.nectar-carousel[data-format="fixed_text_content_fullwidth"] .flickity-page-dots{text-align:left;}@media only screen and (min-width :1px) and (max-width :1000px){body .nectar-carousel-flickity-fixed-content .nectar-carousel-fixed-content{position:relative;width:100%;margin-right:0;transform:none;top:0;}body .nectar-carousel-flickity-fixed-content .nectar-flickity{margin-left:0;}}@media only screen and (min-width:1300px){.nectar-flickity.nectar-carousel[data-desktop-columns="6"][data-format="fixed_text_content_fullwidth"] .cell{width:15%;}.nectar-flickity.nectar-carousel[data-desktop-columns="5"][data-format="fixed_text_content_fullwidth"] .cell{width:15%;}.nectar-flickity.nectar-carousel[data-desktop-columns="4"][data-format="fixed_text_content_fullwidth"] .cell{width:22.5%;}.nectar-flickity.nectar-carousel[data-desktop-columns="3"][data-format="fixed_text_content_fullwidth"] .cell{width:31.9%;}.nectar-flickity.nectar-carousel[data-desktop-columns="2"][data-format="fixed_text_content_fullwidth"] .cell{width:55%;}.nectar-flickity.nectar-carousel[data-desktop-columns="1"][data-format="fixed_text_content_fullwidth"] .cell{width:85%;}}@media only screen and (min-width:1000px) and (max-width:1300px){.nectar-flickity.nectar-carousel[data-small-desktop-columns="6"][data-format="fixed_text_content_fullwidth"] .cell{width:15%;}.nectar-flickity.nectar-carousel[data-small-desktop-columns="5"][data-format="fixed_text_content_fullwidth"] .cell{width:15%;}.nectar-flickity.nectar-carousel[data-small-desktop-columns="4"][data-format="fixed_text_content_fullwidth"] .cell{width:22.5%;}.nectar-flickity.nectar-carousel[data-small-desktop-columns="3"][data-format="fixed_text_content_fullwidth"] .cell{width:33%;}.nectar-flickity.nectar-carousel[data-small-desktop-columns="2"][data-format="fixed_text_content_fullwidth"] .cell{width:55%;}.nectar-flickity.nectar-carousel[data-small-desktop-columns="1"][data-format="fixed_text_content_fullwidth"] .cell{width:85%;}}@media only screen and (max-width:1000px) and (min-width:690px){.nectar-flickity.nectar-carousel[data-tablet-columns="4"][data-format="fixed_text_content_fullwidth"] .cell{width:22.5%;}.nectar-flickity.nectar-carousel[data-tablet-columns="3"][data-format="fixed_text_content_fullwidth"] .cell{width:33%;}.nectar-flickity.nectar-carousel[data-tablet-columns="2"][data-format="fixed_text_content_fullwidth"] .cell{width:55%;}.nectar-flickity.nectar-carousel[data-tablet-columns="1"][data-format="fixed_text_content_fullwidth"] .cell{width:85%;}}.nectar-simple-slider .cell.color-overlay-1-transparent > .bg-layer-wrap > .color-overlay{background-color:transparent;}@media only screen and (max-width:999px){.vc_row.bottom_padding_tablet_100px{padding-bottom:100px!important;}}@media only screen and (max-width:999px){.vc_row.top_padding_tablet_40px{padding-top:40px!important;}}@media only screen and (max-width:999px){.vc_row.bottom_padding_tablet_40px{padding-bottom:40px!important;}}@media only screen and (max-width:999px){body .img-with-aniamtion-wrap.custom-width-tablet-100pct .inner{max-width:100%;}}@media only screen and (max-width:999px){body .wpb_row .wpb_column.padding-4-percent_tablet > .vc_column-inner,body .wpb_row .wpb_column.padding-4-percent_tablet > .n-sticky > .vc_column-inner{padding:calc(999px * 0.04);}}@media only screen and (max-width:999px){.wpb_column.child_column.mobile-disable-entrance-animation,.wpb_column.child_column.mobile-disable-entrance-animation:not([data-scroll-animation-mobile="true"]) > .vc_column-inner{transform:none!important;opacity:1!important;}.nectar-mask-reveal.mobile-disable-entrance-animation,[data-animation="mask-reveal"].mobile-disable-entrance-animation > .vc_column-inner{clip-path:none!important;}}@media only screen and (max-width:999px){body .wpb_column.force-tablet-text-align-left,body .wpb_column.force-tablet-text-align-left .col{text-align:left!important;}body .wpb_column.force-tablet-text-align-right,body .wpb_column.force-tablet-text-align-right .col{text-align:right!important;}body .wpb_column.force-tablet-text-align-center,body .wpb_column.force-tablet-text-align-center .col,body .wpb_column.force-tablet-text-align-center .vc_custom_heading,body .wpb_column.force-tablet-text-align-center .nectar-cta{text-align:center!important;}.wpb_column.force-tablet-text-align-center .img-with-aniamtion-wrap img{display:inline-block;}}@media only screen and (max-width:999px){body .wpb_row .wpb_column.padding-0-percent_tablet > .vc_column-inner,body .wpb_row .wpb_column.padding-0-percent_tablet > .n-sticky > .vc_column-inner{padding:calc(999px * 0.00);}}@media only screen and (max-width:999px){.vc_row.top_padding_tablet_2pct{padding-top:2%!important;}}@media only screen and (max-width:999px){.vc_row.top_padding_tablet_-3pct{padding-top:-3%!important;}}@media only screen and (max-width:999px){body #ajax-content-wrap .vc_row.top_margin_tablet_-5pct{margin-top:-5%;}}@media only screen and (max-width:999px){.vc_row.bottom_padding_tablet_-3pct{padding-bottom:-3%!important;}}@media only screen and (max-width:999px){.vc_row.bottom_padding_tablet_1pct{padding-bottom:1%!important;}}@media only screen and (max-width:999px){.divider-wrap.height_tablet_0px > .divider{height:0!important;}}@media only screen and (max-width:999px){body .vc_row-fluid:not(.full-width-content) > .span_12 .vc_col-sm-2:not(:last-child):not([class*="vc_col-xs-"]){margin-bottom:25px;}}@media only screen and (min-width :691px) and (max-width :999px){body .vc_col-sm-2{width:31.2%;margin-left:3.1%;}body .full-width-content .vc_col-sm-2{width:33.3%;margin-left:0;}.vc_row-fluid .vc_col-sm-2[class*="vc_col-sm-"]:first-child:not([class*="offset"]),.vc_row-fluid .vc_col-sm-2[class*="vc_col-sm-"]:nth-child(3n+4):not([class*="offset"]){margin-left:0;}}@media only screen and (max-width :690px){body .vc_row-fluid .vc_col-sm-2:not([class*="vc_col-xs"]),body .vc_row-fluid.full-width-content .vc_col-sm-2:not([class*="vc_col-xs"]){width:50%;}.vc_row-fluid .vc_col-sm-2[class*="vc_col-sm-"]:first-child:not([class*="offset"]),.vc_row-fluid .vc_col-sm-2[class*="vc_col-sm-"]:nth-child(2n+3):not([class*="offset"]){margin-left:0;}}@media only screen and (max-width:690px){html body .wpb_column.force-phone-text-align-left,html body .wpb_column.force-phone-text-align-left .col{text-align:left!important;}html body .wpb_column.force-phone-text-align-right,html body .wpb_column.force-phone-text-align-right .col{text-align:right!important;}html body .wpb_column.force-phone-text-align-center,html body .wpb_column.force-phone-text-align-center .col,html body .wpb_column.force-phone-text-align-center .vc_custom_heading,html body .wpb_column.force-phone-text-align-center .nectar-cta{text-align:center!important;}.wpb_column.force-phone-text-align-center .img-with-aniamtion-wrap img{display:inline-block;}}@media only screen and (max-width:690px){body .wpb_row .wpb_column.padding-0-percent_phone > .vc_column-inner,body .wpb_row .wpb_column.padding-0-percent_phone > .n-sticky > .vc_column-inner{padding:calc(690px * 0.00);}}@media only screen and (max-width:690px){body .vc_row.bottom_padding_phone_5pct{padding-bottom:5%!important;}}@media only screen and (max-width:690px){body .vc_row.top_padding_phone_2pct{padding-top:2%!important;}}@media only screen and (max-width:690px){body .vc_row.bottom_padding_phone_-3pct{padding-bottom:-3%!important;}}@media only screen and (max-width:690px){body .vc_row.top_padding_phone_-3pct{padding-top:-3%!important;}}@media only screen and (max-width:690px){.wpb_column.top_margin_phone_-2pct{margin-top:-2%!important;}}@media only screen and (max-width:690px){.divider-wrap.height_phone_0px > .divider{height:0!important;}}@media only screen and (max-width:690px){body .wpb_row .wpb_column.padding-5-percent_phone > .vc_column-inner,body .wpb_row .wpb_column.padding-5-percent_phone > .n-sticky > .vc_column-inner{padding:calc(690px * 0.05);}}@media only screen and (max-width:690px){body .vc_row.bottom_padding_phone_40px{padding-bottom:40px!important;}}@media only screen and (max-width:690px){body .img-with-aniamtion-wrap.custom-width-phone-100pct .inner{max-width:100%;}}@media only screen and (max-width:690px){body .vc_row.bottom_padding_phone_1pct{padding-bottom:1%!important;}}@media only screen and (max-width:690px){body .vc_row.bottom_padding_phone_50px{padding-bottom:50px!important;}}@media only screen and (max-width:690px){body #ajax-content-wrap .vc_row.top_margin_phone_-5pct{margin-top:-5%;}}@media only screen and (max-width:690px){body .vc_row.top_padding_phone_40px{padding-top:40px!important;}}.screen-reader-text,.nectar-skip-to-content:not(:focus){border:0;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute!important;width:1px;word-wrap:normal!important;}.row .col img:not([srcset]){width:auto;}.row .col img.img-with-animation.nectar-lazy:not([srcset]){width:100%;}
	</style>
        <div class="bg-color-stripe"></div>
		<div id="ajax-content-wrap">
			<div class="container-wrap" style="padding-top: 0px; padding-bottom: 0px;">
				<div class="container main-content" role="main" style="--nectar-sticky-top-distance: 192px;">
					<div class="row">
						<div id="fws_689b886c1100f" data-column-margin="default" data-midnight="light" data-top-percent="7%" data-bottom-percent="1%" class="wpb_row vc_row-fluid vc_row top-level full-width-section vc_row-o-equal-height vc_row-flex vc_row-o-content-top bottom_padding_tablet_100px bottom_padding_phone_50px first-section loaded" style="padding-top: calc(7vw); padding-bottom: calc(1vw); z-index: 110;">
							<div class="row-bg-wrap" data-bg-animation="none" data-bg-animation-delay="" data-bg-overlay="true">
								<div class="inner-wrap row-bg-layer using-image">
									<div class="row-bg viewport-desktop using-image" style="background-image: url('<?php echo get_stylesheet_directory_uri().'/img/bg-first-block.png'; ?>'); background-position: top center; background-repeat: no-repeat;" data-bg-image="url(https://b2168432.smushcdn.com/2168432/wp-content/uploads/2023/07/circuit-gb39378865_1280.png?lossy=2&amp;strip=1&amp;webp=1)"></div>
								</div>
								<div class="row-bg-overlay row-bg-layer" style="background: #595959; background: linear-gradient(135deg,#595959 0%,#000000 100%);  opacity: 0.8; "></div>
							</div>
							<div class="nectar-shape-divider-wrap " style=" height:250px;" data-height="250" data-front="" data-style="tilt_alt" data-position="bottom">
								<svg class="nectar-shape-divider" aria-hidden="true" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
									<polygon fill="#fbfbfc" points="100 10 100 0 -4 10"></polygon>
								</svg>
							</div>
							<div class="row_col_wrap_12 col span_12 light left">
								<div class="vc_col-sm-6 wpb_column column_container vc_column_container col no-extra-padding force-tablet-text-align-center force-phone-text-align-center padding-4-percent_tablet inherit_phone " data-padding-pos="bottom" data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-animation="" data-delay="0">
									<div class="vc_column-inner">
										<div class="wpb_wrapper">
											<div class="divider-wrap height_tablet_0px height_phone_0px " data-alignment="default"><div style="height: 50px;" class="divider"></div></div>
											<div class="wpb_text_column wpb_content_element ">
												<div class="wpb_wrapper">
													<h1>Artificial Intelligence</h1>
												</div>
											</div>
											<div class="wpb_text_column wpb_content_element " style=" max-width: 500px; display: inline-block;">
												<div class="wpb_wrapper">
													<p style="font-size: 24px; line-height: 34px;">Streamline decisions, spark innovation, and scale faster with AI made for your business.</p>
												</div>
											</div>
											<div class="divider-wrap height_tablet_0px height_phone_0px " data-alignment="default"><div style="height: 25px;" class="divider"></div></div><div id="fws_689b886c1518b" data-midnight="" data-column-margin="default" class="wpb_row vc_row-fluid vc_row inner_row" style="padding-bottom: 5%; "><div class="row-bg-wrap"> <div class="row-bg"></div> </div><div class="row_col_wrap_12_inner col span_12  left">
													<div style="margin-bottom: 50px; " class="vc_col-sm-12 vc_hidden-sm vc_hidden-xs wpb_column column_container vc_column_container col child_column no-extra-padding inherit_tablet inherit_phone " data-padding-pos="all" data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-animation="" data-delay="0">
														<div class="vc_column-inner">
															<div class="wpb_wrapper">
																<div class="divider-wrap height_tablet_0px height_phone_0px" data-alignment="default"><div style="height: 25px;" class="divider"></div></div>
																<div class="wpb_raw_code wpb_raw_html wpb_content_element">
																	<div class="wpb_wrapper">
																		<div class="nectar-next-section-wrap minimal-arrow" data-custom-color="false"> <a href="#next" class="nectar-next-section skip-hash"> <svg class="next-arrow" width="40px" height="68px" viewBox="0 0 40 50" xml:space="preserve"> <path stroke="#ffffff" stroke-width="2" fill="none" d="M 20 0 L 20 51"></path> <polyline stroke="#ffffff" stroke-width="2" fill="none" points="12, 44 20, 52 28, 44"></polyline> </svg> </a> </div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="hero-block">
				<div class="hero-block-bg row-bg-wrap" data-bg-animation="none" data-bg-animation-delay="" data-bg-overlay="false"></div>
				<div class="hero-block-bg-bottom row-bg-wrap" data-bg-animation="none" data-bg-animation-delay="" data-bg-overlay="false"></div>
				<div class="hero-block-step">
					<div class="main-block-step">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/main-block-article.png" alt="main-block-step-img"/>
						<div class="main-block-step-content">
							<h2>Where AI makes <br> an impact</h2>
							<span>Harness the power of artificial intelligence to revolutionize your business, elevate your team, and drive bold, measurable impact.</span>
							<a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence'; ?>">Get Started Now <i class="icon-button-arrow see-more"></i></a>
						</div>
					</div>
					<div class="block-steps">
						<div class="block-step">
							<div class="block-step-title">
								<img src="<?php echo get_stylesheet_directory_uri();?>/img/step-1.png" alt="1"/>
								<div class="block-step-content">
									<h4>AI Discovery Discussion</h4>
									<div class="block-step-price">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/coin.png" alt="coin"/>
										<p>Free</p>
										<span class="separator"></span>
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/time.png" alt="time"/>
										<p>60 minutes</p>
									</div>
								</div>
							</div>
							<div class="block-step-text">
								<span>For leaders and teams exploring where AI fits in. You're curious about AI but unsure where to start; this session brings clarity without commitment.</span>
								<div class="">
									<strong>What you get:</strong>
									<ul>
										<li>1:1 session with Slingshot AI experts</li>
										<li>Review of your tools, teams, and goals</li>
										<li>Brainstorming of real-world use cases</li>
										<li>Live Q&A with actionable next steps</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="block-step">
							<div class="block-step-title">
								<img src="<?php echo get_stylesheet_directory_uri();?>/img/step-2.png" alt="2"/>
								<div class="block-step-content">
									<h4>AI Opportunity Assessment</h4>
									<div class="block-step-price">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/coin.png" alt="coin"/>
										<p>$ 5.000</p>
										<span class="separator"></span>
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/time.png" alt="time"/>
										<p>1 week</p>
									</div>
								</div>
							</div>
							<div class="block-step-text">
								<span>For organizations with AI ideas needing focus, prioritization, and a clear plan. You’ll quickly move from “ideas” to concrete, high-impact plans ready for execution — accelerating your AI initiatives with confidence.</span>
								<div class="">
									<strong>What you get:</strong>
									<ul>
										<li>Executive & team alignment</li>
										<li>AI opportunity mapping (ops, product, CX)</li>
										<li>Risk & feasibility assessment</li>
										<li>Prioritized use case shortlist</li>
										<li>Concrete Build/Buy/Integrate recommendations, ready for execution</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="block-step">
							<div class="block-step-title">
								<img src="<?php echo get_stylesheet_directory_uri();?>/img/step-3.png" alt="1"/>
								<div class="block-step-content">
									<h4>AI Rapid Prototyping</h4>
									<div class="block-step-price">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/coin.png" alt="coin"/>
										<p>$ 25.000</p>
										<span class="separator"></span>
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/time.png" alt="time"/>
										<p>1-2 weeks</p>
									</div>
								</div>
							</div>
							<div class="block-step-text">
								<span>For teams with AI concepts who need quick validation and stakeholder buy-in. De-risk big investments by testing concepts quickly — get a functional prototype in weeks to refine direction and accelerate decision-making.</span>
								<div class="">
									<strong>What you get:</strong>
									<ul>
										<li>Ideation & use case framing workshop</li>
										<li>POC architecture with high-level AI and data flow</li>
										<li>Clickable interface of core user flows</li>
										<li>Polished prototype to spark buy-in and speed decisions</li>
										<li>Build plan with strategic recs: build, buy, or pivot</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="block-step">
							<div class="block-step-title">
								<img src="<?php echo get_stylesheet_directory_uri();?>/img/step-4.png" alt="1"/>
								<div class="block-step-content">
									<h4>Full AI Implementation</h4>
								</div>
							</div>
							<div class="block-step-text">
								<span>Organizations ready to implement AI tools, features, or workflows that drive measurable business value. We help design, build, and deploy AI solutions while enabling your team for long-term success.</span>
								<div class="">
									<strong>What you get:</strong>
									<ul>
										<li>Deep-dive technical discovery</li>
										<li>Model and tooling selection</li>
										<li>UX & integration planning</li>
										<li>Build & deployment of early-stage pilots</li>
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="capabilities-block-bg">
				<div class="capabilities-block">
					<div class="capabilities-title">
						<h2>Capabilities</h2>
					</div>
					<div class="capabilities-content">
						<div class="capabilitie-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/capabilities-1.png" alt="1">
							<h4>Operational Efficiency
								& Automation</h4>
							<p>Cut manual work, reduce costs, and free your team for high-impact tasks</p>
						</div>
						<div class="capabilitie-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/capabilities-2.png" alt="1">
							<h4>Intelligent Document Processing</h4>
							<p>Extract and process data from PDFs, forms, and images automatically.</p>
						</div>
						<div class="capabilitie-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/capabilities-3.png" alt="1">
							<h4>Language, Search
								& Understanding</h4>
							<p>Bridge gaps across communication, systems, and user needs.</p>
						</div>
						<div class="capabilitie-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/capabilities-4.png" alt="1">
							<h4>Process Intelligence</h4>
							<p>Detect inefficiencies with AI-driven pattern recognition and reporting.</p>
						</div>
						<div class="capabilitie-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/capabilities-5.png" alt="1">
							<h4>Automated Workflows</h4>
							<p>Trigger real-time actions based on live system inputs, no humans needed.</p>
						</div>
						<div class="capabilitie-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/capabilities-6.png" alt="1">
							<h4>Sentiment & Intent Analysis</h4>
							<p>Know what users mean, not just what
								they say</p>
						</div>
					</div>
				</div>
			</div>
			<div class="tools-block-bg">
				<div class="tools-block">
					<div class="tools-title">
						<h2>Trusted tools & platforms</h2>
					</div>
				</div>
				<div class="tools-content marquee">
					<div class="tools-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-1.png" alt="logo">
						</div>
					<div class="tools-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-2.png" alt="logo">
						</div>
					<div class="tools-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-3.png" alt="logo">
						</div>
					<div class="tools-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-4.png" alt="logo">
						</div>
					<div class="tools-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-5.png" alt="logo">
						</div>
					<div class="tools-item">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-6.png" alt="logo">
						</div>
					<div class="tools-item">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-7.png" alt="logo">
					</div>
					<div class="tools-item">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-8.png" alt="logo">
					</div>
					<div class="tools-item">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-9.png" alt="logo">
					</div>
					<div class="tools-item">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-10.png" alt="logo">
					</div>
					<div class="tools-item">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-11.png" alt="logo">
					</div>
				</div>
			</div>
			<div class="innovations-block-bg">
				<div class="innovations-block">
					<div class="innovations-title">
						<h2>Insights & innovations</h2>
						<a class="contact-block-button" role="button" href="<?php echo get_bloginfo('url'); ?>/blog/" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">
							See more
							<i class="icon-button-arrow see-more"></i>
						</a>
					</div>
					<div class="innovations-content">
						<?php if ( $blog_news->have_posts() ) : while ( $blog_news->have_posts() ) : $blog_news->the_post(); ?>
							<?php
							$excerpt = get_the_excerpt();
							if ( empty( $excerpt ) ) {
								$excerpt = wp_strip_all_tags( get_the_content() );
							}
							?>
							<a href="<?php the_permalink(); ?>">
								<div class="innovations-item">
									<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>"/>
									<div class="innovation-content">
										<h4><?php the_title(); ?></h4>
										<span><?php echo wp_trim_words( $excerpt, 20, '...' ); ?></span>
									</div>
								</div>
							</a>	
						<?php endwhile; endif; ?>
					</div>
					<div class="slider-arrows">
						<button class="prev">‹</button>
						<button class="next">›</button>
					</div>
					<a class="contact-block-button-mobile" role="button" href="<?php echo get_bloginfo('url'); ?>/blog/" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">
						See more
						<i class="icon-button-arrow see-more"></i>
					</a>
				</div>

			</div>
			<div class="answers-block-bg">
				<div class="answers-block">
					<div class="answers-title">
					<h2>Still wondering about AI? We’ve got answers</h2>
				</div>
					<div class="answers-content">
					<div class="item-answer">
						<div class="row">
							<h3>How do I get started with AI?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>The right starting point depends on your team’s clarity and urgency.</p>
							<p>If you're exploring where AI fits in your organization, our free 60-minute <a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence&ai-service=AI+Discovery+Discussion'; ?>">AI Discovery Discussion</a> is the fastest way to uncover possibilities and get expert guidance, with no commitment. We’ll review your tools, goals, and brainstorm practical use cases.</p>
							<p>If you already have ideas but need focus and prioritization, the <a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence&ai-service=AI+Opportunity+Assessment'; ?>">AI Opportunity Assessment</a> turns concepts into an actionable strategy in just one week. You’ll walk away with executive alignment, a prioritized shortlist of use cases, and clear recommendations to move forward.</p>
							<p>If you're ready to bring a specific AI idea to life, our <a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence&ai-service=AI+Rapid+Prototyping'; ?>">AI Rapid Prototyping</a> service transforms your idea into a tangible prototype in just 1 to 2 weeks. We frame the concept, shape the user experience, and deliver an interactive prototype that fosters buy-in and builds momentum quickly.</p>
						</div>

					</div>
					<div class="item-answer">
						<div class="row">
							<h3>How do I know if AI will work for my business?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>You don’t need perfect data to start. In many cases, valid results can come from documents, PDFs, or existing records using retrieval-based methods or lightweight models. </p>
							<p>We can help assess where AI can move the needle and where it won’t. If there's no fit, we’ll say so directly.</p>
						</div>
					</div>
					<div class="item-answer">
						<div class="row">
							<h3>How do I know if my data is “good enough”?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>AI works when the problem is clear, the data is usable, and the value is real. It’s not about checking a tech box but identifying opportunities where automation, prediction, or insight can drive results. </p>
							<p>It’s essential to start by assessing what you have and flagging gaps. Then you can determine if your data is ready to support your desired outcomes. We can make that part of the roadmap if cleanup or enrichment is needed.</p>
						</div>
					</div>
					<div class="item-answer">
						<div class="row">
							<h3>How does Slingshot handle data security in AI projects?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>Security is at the core of every AI project we deliver. We know that using AI means entrusting tools with sensitive data, and not all tools treat that data equally. That is why we help you navigate the privacy landscape from day one.</p>
							<p>When evaluating AI solutions, we look closely at how each tool stores and processes your data, what information (if any) is shared or retained, and how it aligns with your privacy and compliance requirements. We provide clear, expert recommendations on which tools meet your standards, giving you full transparency and control over how your data is managed at every step.</p>
						</div>
					</div>
					<div class="item-answer">
						<div class="row">
							<h3>How do I know if my organization is ready for AI?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>AI readiness depends on leadership alignment, access to usable data and a clear problem to solve. We can help assess your organization and provide a structured view of your current state. You’ll get clarity on what’s viable now, what needs to change, and how to move forward. If you're not ready, we’ll tell you and outline how you can get there.</p>
						</div>
					</div>
					<div class="item-answer">
						<div class="row">
							<h3>How do I best leverage AI in my organization if I don’t have a specific idea yet?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>Start with a conversation. Our <a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence&ai-service=AI+Discovery+Discussion'; ?>">AI Discovery Discussion</a> is designed for leaders who are curious about AI but unsure where it fits. In just 60 minutes, we’ll explore your goals, tools, and team structure to identify real opportunities.</p>
							<p>If you're looking to go deeper, the <a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence&ai-service=AI+Opportunity+Assessment'; ?>">AI Opportunity Assessment</a> helps turn early ideas into a clear, prioritized roadmap tailored to your organization. Both offerings are built to bring clarity and momentum, even if you’re starting from zero.</p>
						</div>
					</div>
					<div class="item-answer">
						<div class="row">
							<h3>How can I quickly validate an AI idea before making a larger investment?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>If you’re ready to move beyond theory and see your idea in action, our <a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence&ai-service=AI+Rapid+Prototyping'; ?>">AI Rapid Prototyping</a> service helps turn concepts into something tangible, fast. In just 1 to 2 weeks, we’ll help frame your idea, shape a user experience, and deliver a wokring prototype that shows what the solution could be.</p>
							<p>You’ll walk away with a functional, interactive model that brings the concept to life and helps you communicate it clearly to stakeholders. Whether you’re building buy-in or making key decisions, it’s the fastest way to go from vision to momentum.</p>
						</div>
					</div>
					<div class="item-answer">
						<div class="row">
							<h3>What if I’m ready to fully implement an AI solution in my business?</h3>
							<div class="circle-plus"></div>
						</div>
						<div class="answer-text">
							<p>If you're ready to move from strategy to execution, our <a href="<?php echo get_bloginfo('url') . '/contact/?looking=Artificial+Intelligence&ai-service=Full+AI+Implementation'; ?>">Full AI Implementation</a> offering is built to take your AI vision all the way to launch. We help you design, build, and deploy real solutions that deliver measurable business impact. This could include automating workflows, enhancing customer experience, or embedding AI into your product.</p>
							<p>Beyond just building, we help you make the right foundational decisions. We recommend tools and models based on your specific needs, and we guide you through critical decisions like build versus buy versus integrate. From technical architecture to user experience, we cover every angle to ensure a successful launch.</p>
						</div>
					</div>
				</div>
				</div>
			</div>


			<div class="contact-block-bg">
				<div class="contact-block-content">
					<h2 style="color: #ffffff;text-align: center" class="vc_custom_heading vc_do_custom_heading">Ready to Get Started?</h2>
					<a class="contact-block-button" role="button" href="/contact/" data-color-override="false" data-hover-color-override="false" data-hover-text-color-override="#fff">
						<span>Let's Go!</span>
						<i style="color: #FFFFFF;" class="icon-button-arrow"></i>
					</a>
				</div>
			</div>
		</div>

<?php

wp_enqueue_script( 'ai-script', get_stylesheet_directory_uri() . '/js/updated.js');
get_footer();

?>
