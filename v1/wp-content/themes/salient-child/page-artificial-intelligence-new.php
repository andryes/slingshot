<?php
/*
Template Name: Artificial Intelligence New
*/

add_filter( 'nectar_activate_transparent_header', '__return_true' );
wp_enqueue_style( 'ai-style', get_stylesheet_directory_uri() . '/css/updated.css' );
get_header();

$args_news = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => '10',
	'order' => 'desc',
	'orderby' => 'date',
	'category_name'  => 'artificial-intelligence',
);

$blog_news = new WP_Query( $args_news );

?>
<style id="dynamic-css-inline-css" type="text/css">
    body{overflow:visible}.no-rgba #header-space{display:none;}@media only screen and (max-width:999px){body #header-space[data-header-mobile-fixed="1"]{display:none;}#header-outer[data-mobile-fixed="false"]{position:absolute;}}@media only screen and (max-width:999px){body:not(.nectar-no-flex-height) #header-space[data-secondary-header-display="full"]:not([data-header-mobile-fixed="false"]){display:block!important;margin-bottom:-66px;}#header-space[data-secondary-header-display="full"][data-header-mobile-fixed="false"]{display:none;}}@media only screen and (min-width:1000px){#header-space{display:none;}.nectar-slider-wrap.first-section,.parallax_slider_outer.first-section,.full-width-content.first-section,.parallax_slider_outer.first-section .swiper-slide .content,.nectar-slider-wrap.first-section .swiper-slide .content,#page-header-bg,.nder-page-header,#page-header-wrap,.full-width-section.first-section{margin-top:0!important;}body #page-header-bg,body #page-header-wrap{height:142px;}body #search-outer{z-index:100000;}}@media only screen and (min-width:1000px){#page-header-wrap.fullscreen-header,#page-header-wrap.fullscreen-header #page-header-bg,html:not(.nectar-box-roll-loaded) .nectar-box-roll > #page-header-bg.fullscreen-header,.nectar_fullscreen_zoom_recent_projects,#nectar_fullscreen_rows:not(.afterLoaded) > div{height:100vh;}.wpb_row.vc_row-o-full-height.top-level,.wpb_row.vc_row-o-full-height.top-level > .col.span_12{min-height:100vh;}#page-header-bg[data-alignment-v="middle"] .span_6 .inner-wrap,#page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap,.blog-archive-header.color-bg .container{padding-top:100px;}#page-header-wrap.container #page-header-bg .span_6 .inner-wrap{padding-top:0;}.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded),.nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container{height:calc(100vh + 2px)!important;}.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded),.admin-bar .nectar-slider-wrap[data-fullscreen="true"]:not(.loaded) .swiper-container{height:calc(100vh - 30px)!important;}}@media only screen and (max-width:999px){#page-header-bg[data-alignment-v="middle"]:not(.fullscreen-header) .span_6 .inner-wrap,#page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap,.blog-archive-header.color-bg .container{padding-top:70px;}.vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12,#page-header-bg[data-alignment-v="bottom"] .span_6 .inner-wrap{padding-top:40px;}}@media only screen and (max-width:690px){.vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12{padding-top:70px;}.vc_row.top-level.full-width-content .nectar-recent-posts-single_featured .recent-post-container > .inner-wrap{padding-top:40px;}}@media only screen and (max-width:999px) and (min-width:691px){#page-header-bg[data-alignment-v="middle"]:not(.fullscreen-header) .span_6 .inner-wrap,#page-header-bg[data-alignment-v="top"] .span_6 .inner-wrap,.vc_row.top-level.full-width-section:not(.full-width-ns) > .span_12{padding-top:110px;}}
    .why-slingshot-items { margin-top: 24px; display: flex; flex-direction: column; gap: 20px; }
    .why-slingshot-item strong { display: block; font-size: 16px; font-weight: 700; margin-bottom: 6px; }
    .why-slingshot-item p { margin: 0; font-size: 15px; line-height: 1.6; }
    .block-step-badge-new { display: inline-block; font-size: 11px; font-weight: 700; color: #4B7AEC; border: 1px solid #4B7AEC; border-radius: 4px; padding: 2px 7px; margin-left: 8px; vertical-align: middle; text-transform: uppercase; letter-spacing: .5px; }
    .proof-block-bg { background: #f8f7ff; padding: 80px 0; }
    .proof-block { max-width: 1140px; margin: 0 auto; padding: 0 24px; }
    .proof-block-header { margin-bottom: 40px; }
    .proof-block-header h2 { font-size: 36px; font-weight: 700; margin-bottom: 12px; }
    .proof-block-header p { font-size: 16px; line-height: 1.7; max-width: 680px; margin: 0; }
    .proof-items { display: grid; grid-template-columns: 1fr 1fr; gap: 32px; }
    @media (max-width: 768px) { .proof-items { grid-template-columns: 1fr; } }
    .proof-item { background: #fff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 12px rgba(0,0,0,.07); }
    .proof-item h3 { font-size: 20px; font-weight: 700; margin-bottom: 12px; }
    .proof-item p { font-size: 15px; line-height: 1.7; margin-bottom: 20px; }
    .proof-item a { font-weight: 600; color: #7b2cbf; text-decoration: none; }
    .proof-item a:hover { text-decoration: underline; }
    .tools-block-subtext { font-size: 16px; color: #555; margin-top: 8px; }
    .hero-cta-btn { display: inline-block; margin-top: 24px; padding: 14px 28px; background: #ffffff; color: #000000; font-weight: 700; font-size: 16px; border-radius: 6px; text-decoration: none; }
    .hero-cta-btn:hover { background: #f0f0f0; }
    /* Why Slingshot standalone block */
    .why-slingshot-block-bg { background: #f8f7ff; padding: 80px 0; }
    .why-slingshot-block { max-width: 1250px; margin: 0 auto; padding: 0 24px; }
    .why-slingshot-block-header { margin-bottom: 20px; }
    .why-slingshot-block-header h2 { font-family: Poppins; font-weight: 600; font-size: 40px; line-height: 120%; margin-bottom: 12px; }
    .why-slingshot-block-header p { font-size: 16px; line-height: 1.7; max-width: 900px; margin: 0; }
    .why-slingshot-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; }
    @media (max-width: 768px) { .why-slingshot-grid { grid-template-columns: 1fr; } }
    .why-slingshot-block .why-slingshot-item { background: #fff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 12px rgba(0,0,0,.06); }
    .why-slingshot-block .why-slingshot-item strong { display: block; font-size: 18px; font-weight: 700; margin-bottom: 8px; color: #222; }
    .why-slingshot-block .why-slingshot-item p { margin: 0; font-size: 15px; line-height: 1.6; color: #555; }
    /* Capability icons */
    .capabilitie-item img { width: 60px; height: 60px; object-fit: contain; }
    /* Proof icons */
    .proof-item-icon { width: 52px; height: 52px; object-fit: contain; margin-bottom: 16px; display: block; }
    /* Step label in price row */
    .block-step-label { font-family: Proxima Nova; font-weight: 600; font-size: 14px; line-height: 150%; color: rgba(0,0,0,1); padding: 0 10px 0 4px; }
    /* Fix shape divider positioning (missing from dynamic CSS) */
    .nectar-shape-divider-wrap { position: absolute !important; top: auto !important; bottom: 0 !important; left: 0; right: 0; width: 100%; z-index: 3; transform: translateZ(0); }
    .nectar-shape-divider { width: 100%; left: 0; bottom: -1px; height: 100%; position: absolute; }
    /* Prevent Salient JS from forcing full-viewport-height on hero */
    #fws_689b886c1100f { position: relative; height: auto !important; min-height: 0 !important; padding-bottom: 0 !important; }
    /* Remove empty space below arrow that creates dark corner at bottom-left */
    #fws_689b886c1518b { padding-bottom: 0 !important; }
    #fws_689b886c1518b .vc_col-sm-12 { margin-bottom: 0 !important; }
    /* why-slingshot: decoration overlaps bottom of hero (mirrors hero-block-bg on old page) */
    .why-slingshot-block-bg { position: relative; z-index: 9999; overflow: visible; }
    @media (min-width: 768px) {
        .why-slingshot-block-bg::before {
            content: '';
            display: block;
            position: absolute;
            height: 455px;
            width: 100%;
            background-repeat: no-repeat;
            background-position: center top;
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/bg-tools-block.png');
            left: 50%;
            transform: translate(-50%, 0);
            top: -250px;
            background-size: contain;
            z-index: 10;
            clip-path: polygon(0 53%, 100% 0, 100% 100%, 0% 100%);
            opacity: 0.5;
            pointer-events: none;
        }
    }
    /* Arrow: make it visible against the light tilt area */
    .nectar-next-section-wrap.minimal-arrow a { filter: drop-shadow(0 2px 8px rgba(0,0,0,0.75)); }
    /* Tool logos: uniform height, grayscale, transparent bg */
    .tools-item { padding: 0 28px; height: 108px; display: flex; align-items: center; justify-content: center; background: transparent; flex-shrink: 0; }
    .tools-item img, .tools-item img.lazyloading, .tools-item img.lazyloaded {
        height: 34px !important;
        width: auto !important;
        max-width: 160px !important;
        min-width: unset !important;
        object-fit: contain !important;
        aspect-ratio: auto !important;
        display: block !important;
        filter: grayscale(100%);
        mix-blend-mode: multiply;
        opacity: 0.75;
    }
</style>
<div class="bg-color-stripe"></div>
<div id="ajax-content-wrap">
	<div class="container-wrap" style="padding-top: 0px; padding-bottom: 0px;">
		<div class="container main-content" role="main" style="--nectar-sticky-top-distance: 192px;">
			<div class="row">
				<div id="fws_689b886c1100f" data-column-margin="default" data-midnight="light" data-top-percent="7%" data-bottom-percent="1%" class="wpb_row vc_row-fluid vc_row top-level full-width-section vc_row-o-equal-height vc_row-flex vc_row-o-content-top bottom_padding_tablet_100px bottom_padding_phone_50px first-section loaded" style="padding-top: calc(7vw); padding-bottom: calc(1vw); z-index: 110;">
					<div class="row-bg-wrap" data-bg-animation="none" data-bg-animation-delay="" data-bg-overlay="true">
						<div class="inner-wrap row-bg-layer using-image">
							<div class="row-bg viewport-desktop using-image" style="background-image: url('<?php echo get_stylesheet_directory_uri().'/img/bg-first-block.png'; ?>'); background-position: top center; background-repeat: no-repeat; background-size: auto;" data-bg-image="url(https://b2168432.smushcdn.com/2168432/wp-content/uploads/2023/07/circuit-gb39378865_1280.png?lossy=2&amp;strip=1&amp;webp=1)"></div>
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
									<div class="divider-wrap height_tablet_0px height_phone_0px " data-alignment="default"><div style="height: 10px;" class="divider"></div></div>
									<div class="wpb_text_column wpb_content_element ">
										<div class="wpb_wrapper">
											<h1>Artificial Intelligence</h1>
										</div>
									</div>
									<div class="wpb_text_column wpb_content_element " style=" max-width: 500px; display: inline-block;">
										<div class="wpb_wrapper">
											<p style="font-size: 24px; line-height: 34px;">Ship AI that moves the business.</p>
											<p style="font-size: 17px; line-height: 28px; margin-top: 12px;">Slingshot develops AI-driven software. We've optimized our operations with AI and bring that efficiency to every client engagement.</p>
										</div>
									</div>
									<div class="divider-wrap height_tablet_0px height_phone_0px " data-alignment="default"><div style="height: 20px;" class="divider"></div></div>
									<a href="/contact/?looking=Artificial+Intelligence&ai-service=AI+Discovery+Discussion" class="hero-cta-btn">Book a free Discovery Discussion &#8594;</a>
									<div class="divider-wrap height_tablet_0px height_phone_0px " data-alignment="default"><div style="height: 10px;" class="divider"></div></div><div id="fws_689b886c1518b" data-midnight="" data-column-margin="default" class="wpb_row vc_row-fluid vc_row inner_row" style="padding-bottom: 5%; "><div class="row-bg-wrap"> <div class="row-bg"></div> </div><div class="row_col_wrap_12_inner col span_12  left">
										<div style="margin-bottom: 50px; " class="vc_col-sm-12 vc_hidden-sm vc_hidden-xs wpb_column column_container vc_column_container col child_column no-extra-padding inherit_tablet inherit_phone " data-padding-pos="all" data-has-bg-color="false" data-bg-color="" data-bg-opacity="1" data-animation="" data-delay="0">
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
													<div class="divider-wrap height_tablet_0px height_phone_0px" data-alignment="default"><div style="height: 25px;" class="divider"></div></div>
													<div class="wpb_raw_code wpb_raw_html wpb_content_element">
														<div class="wpb_wrapper">
															<div class="nectar-next-section-wrap minimal-arrow" data-custom-color="false"> <a href="#why-slingshot-anchor" class="next-arrow-ai skip-hash"> <svg class="next-arrow-ai-svg" width="40px" height="68px" viewBox="0 0 40 50" xml:space="preserve"> <path stroke="#ffffff" stroke-width="2" fill="none" d="M 20 0 L 20 51"></path> <polyline stroke="#ffffff" stroke-width="2" fill="none" points="12, 44 20, 52 28, 44"></polyline> </svg> </a> </div>
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

	<div class="why-slingshot-block-bg" id="why-slingshot-anchor">
		<div class="why-slingshot-block">
			<div class="why-slingshot-block-header">
				<h2>Why Slingshot</h2>
				<p>These aren't differentiators we invented for a website. They're how we've operated since we restructured around AI in 2023.</p>
			</div>
			<div class="why-slingshot-grid">
				<div class="why-slingshot-item">
					<strong>We've done this in our own house first</strong>
					<p>Our team uses Claude Code, Cursor, and Copilot daily. When we talk about AI-augmented development velocity, we're speaking from production experience, not a vendor briefing.</p>
				</div>
				<div class="why-slingshot-item">
					<strong>Prototypes become products</strong>
					<p>We don't hand off a prototype and disappear. The Innovation Retainer keeps a dedicated AI team on your pipeline every month from first concept to cloud deployment.</p>
				</div>
				<div class="why-slingshot-item">
					<strong>Security-conscious by default</strong>
					<p>Tool-agnostic and privacy-aware. We evaluate every AI solution against your data governance requirements before recommending it, and we document that rationale for your team.</p>
				</div>
				<div class="why-slingshot-item">
					<strong>Rooted in this region</strong>
					<p>We host the Louisville AI Exchange monthly and speak across Kentucky and Indiana. We're not a remote vendor; we're invested in the AI ecosystem here because we operate in it.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="hero-block">
		<div class="hero-block-bg-bottom row-bg-wrap" data-bg-animation="none" data-bg-animation-delay="" data-bg-overlay="false"></div>
		<div class="hero-block-step">
			<div class="main-block-step">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/main-block-article.png" alt="How we engage"/>
				<div class="main-block-step-content">
					<h2>How we engage</h2>
					<span>Every engagement starts with a conversation. Here's where it goes from there.</span>
					<a href="/contact/">Get Started Now <i class="icon-button-arrow see-more"></i></a>
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
						<span></span>
						<div class="">
							<strong>What you get:</strong>
							<ul>
								<li>1:1 with Slingshot AI experts</li>
								<li>Review of your tools, teams, and goals</li>
								<li>Actionable next steps, not a sales deck</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="block-step">
					<div class="block-step-title">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/step-2.png" alt="2"/>
						<div class="block-step-content">
							<h4>AI Consulting</h4>
							<div class="block-step-price">
								<span class="block-step-label">Flexible engagement</span>
							</div>
						</div>
					</div>
					<div class="block-step-text">
						<span></span>
						<div class="">
							<strong>What you get:</strong>
							<ul>
								<li>AI readiness assessments and roadmapping</li>
								<li>Workflow transformation and team training</li>
								<li>Vendor evaluation and tool strategy</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="block-step">
					<div class="block-step-title">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/step-3.png" alt="3"/>
						<div class="block-step-content">
							<h4>AI Rapid Prototyping</h4>
							<div class="block-step-price">
								<img src="<?php echo get_stylesheet_directory_uri();?>/img/coin.png" alt="coin"/>
								<p>$25,000</p>
								<span class="separator"></span>
								<img src="<?php echo get_stylesheet_directory_uri();?>/img/time.png" alt="time"/>
								<p>1–2 weeks</p>
							</div>
						</div>
					</div>
					<div class="block-step-text">
						<span></span>
						<div class="">
							<strong>What you get:</strong>
							<ul>
								<li>Working prototype of core user flows</li>
								<li>Stakeholder-ready POC and architecture</li>
								<li>Concrete build-or-pivot recommendation</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="block-step">
					<div class="block-step-title">
						<img src="<?php echo get_stylesheet_directory_uri();?>/img/step-4.png" alt="4"/>
						<div class="block-step-content">
							<h4>Innovation Retainer <span class="block-step-badge-new">New</span></h4>
							<div class="block-step-price">
								<span class="block-step-label">Monthly engagement</span>
							</div>
						</div>
					</div>
					<div class="block-step-text">
						<span></span>
						<div class="">
							<strong>What you get:</strong>
							<ul>
								<li>Dedicated AI product team on your roadmap</li>
								<li>Continuous prototype-to-production cycle</li>
								<li>Monthly delivery milestones, not quarterly reviews</li>
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
				<h2>What we build</h2>
			</div>
			<div class="capabilities-content">
				<div class="capabilitie-item">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/icon-ai-agents.png" alt="AI agents">
					<h4>AI agents</h4>
					<p>Autonomous workflows with secure, custom-built agents that connect your systems and act on your data.</p>
				</div>
				<div class="capabilitie-item">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/icon-intelligent-automation.png" alt="Intelligent automation">
					<h4>Intelligent automation</h4>
					<p>Target your highest-friction processes and build production-ready automation that eliminates manual work.</p>
				</div>
				<div class="capabilitie-item">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/icon-document-intelligence.png" alt="Document intelligence">
					<h4>Document intelligence</h4>
					<p>Extract from PDFs, forms, and unstructured sources integrated directly into your existing systems.</p>
				</div>
				<div class="capabilitie-item">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/icon-llm-integration.png" alt="LLM integration">
					<h4>LLM integration</h4>
					<p>Custom model integrations across your preferred model and deployed inside your process, not bolted on.</p>
				</div>
				<div class="capabilitie-item">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/icon-ai-powered-apps.png" alt="AI-powered apps">
					<h4>AI-powered apps</h4>
					<p>Full-cycle development with AI at the core. Faster delivery, higher quality, and an architecture that scales.</p>
				</div>
				<div class="capabilitie-item">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/icon-cloud-deployment.png" alt="Cloud deployment">
					<h4>Cloud deployment</h4>
					<p>AWS and Azure. Enterprise-grade reliability. We don't prototype and walk — we ship what we build.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="tools-block-bg">
		<div class="tools-block">
			<div class="tools-title">
				<h2>Trusted tools &amp; platforms</h2>
			</div>
		</div>
		<div class="tools-content marquee">
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/claude-code.png" alt="Claude Code">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/openai.png" alt="OpenAI">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/gemini.png" alt="Gemini">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/aws.png" alt="AWS">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/azure.png" alt="Microsoft Azure">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/amazon-bedrock.png" alt="Amazon Bedrock">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/azure-cognitive-search.png" alt="Azure Cognitive Search">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/azure-speech.webp" alt="Azure Speech">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/amazon-sagemaker.png" alt="Amazon SageMaker">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/cursor.png" alt="Cursor">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/github-copilot.png" alt="GitHub Copilot">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/semantic-kernel.png" alt="Semantic Kernel">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/langchain.png" alt="LangChain">
			</div>
			<div class="tools-item">
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/tools-platforms/google-adk.png" alt="Google ADK">
			</div>
		</div>
	</div>

	<div class="proof-block-bg">
		<div class="proof-block">
			<div class="proof-block-header">
				<h2>Proof &amp; Credibility</h2>
				<p>Built here. Proven here.<br>We're not theorizing about AI. We're building with it every week, for businesses across this region and beyond.</p>
			</div>
			<div class="proof-items">
				<div class="proof-item">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-louisville.png" alt="Louisville AI Exchange" class="proof-item-icon">
					<h3>Louisville AI Exchange</h3>
					<p>We host a monthly meetup for business and technology leaders navigating AI. Come learn what's working, what's not, and what's coming next.</p>
					<a href="/louisville-ai-exchange/">Learn More &amp; RSVP &#8594;</a>
				</div>
				<div class="proof-item">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-rocket.png" alt="Apps in Production" class="proof-item-icon">
					<h3>Apps in Production</h3>
					<p>We've shipped AI-powered customer portals, LLM-enhanced workflows, and intelligent automation for ops teams. Real work. Real results.</p>
					<a href="/our-work/?_portfolio_categories=artificial-intelligence">Explore Our Work &#8594;</a>
				</div>
			</div>
		</div>
	</div>

	<div class="innovations-block-bg">
		<div class="innovations-block">
			<div class="innovations-title">
				<h2>Insights &amp; Innovations</h2>
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

wp_enqueue_script( 'ai-script', get_stylesheet_directory_uri() . '/js/updated.js' );
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var arrowLink = document.querySelector('a.next-arrow-ai');
  var target    = document.getElementById('why-slingshot-anchor');
  if (arrowLink && target) {
    arrowLink.addEventListener('click', function (e) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  }
});
</script>
<?php
get_footer();
