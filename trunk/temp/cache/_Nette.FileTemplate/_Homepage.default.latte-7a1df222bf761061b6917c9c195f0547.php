<?php //netteCache[01]000443a:2:{s:4:"time";s:21:"0.51287400 1386837547";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:122:"C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\zverejnovanienew\app\AdminModule\templates\Homepage\default.latte";i:2;i:1386588603;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\zverejnovanienew\app\AdminModule\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'vwaely1dec')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6dba699825_content')) { function _lb6dba699825_content($_l, $_args) { extract($_args)
?><div id="banner">
<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>
</div>

<div id="content">
	<h2>admin</h2>
<?php $_ctrl = $_control->getComponent("hlavneMenu"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->renderSingle() ?>

<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb6f57f2b32c_title')) { function _lb6f57f2b32c_title($_l, $_args) { extract($_args)
?>	<h1>Congratulations!</h1>
<?php
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb9724f52bcc_scripts')) { function _lb9724f52bcc_scripts($_l, $_args) { extract($_args)
;Nette\Latte\Macros\UIMacros::callBlockParent($_l, 'scripts', get_defined_vars()) ?>
<script src="http://jush.sourceforge.net/jush.js"></script>
<script>
	jush.create_links = false;
	jush.highlight_tag('code');
	$('code.jush').each(function(){ $(this).html($(this).html().replace(/\x7B[/$\w].*?\}/g, '<span class="jush-latte">$&</span>')) });

	$('a[href^=#]').click(function(){
		$('html,body').animate({ scrollTop: $($(this).attr('href')).show().offset().top - 5 }, 'fast');
		return false;
	});
</script>
<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb308eae2092_head')) { function _lb308eae2092_head($_l, $_args) { extract($_args)
?><style>
html { overflow-y: scroll; }
body { font: 14px/1.65 Verdana, "Geneva CE", lucida, sans-serif; background: #3484d2; color: #333; margin: 38px auto; max-width: 940px; min-width: 770px; }

h1, h2 { font: normal 150%/1.3 Georgia, "New York CE", utopia, serif; color: #1e5eb6; -webkit-text-stroke: 1px rgba(0,0,0,0); }

img { border: none; }

a { color: #006aeb; padding: 3px 1px; }

a:hover, a:active, a:focus { background-color: #006aeb; text-decoration: none; color: white; }

#banner { border-radius: 12px 12px 0 0; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAB5CAMAAADPursXAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAGBQTFRFD1CRDkqFDTlmDkF1D06NDT1tDTNZDk2KEFWaDTZgDkiCDTtpDT5wDkZ/DTBVEFacEFOWD1KUDTRcDTFWDkV9DkR7DkN4DkByDTVeDC9TDThjDTxrDkeADkuIDTRbDC9SbsUaggAAAEdJREFUeNqkwYURgAAQA7DH3d3335LSKyxAYpf9vWCpnYbf01qcOdFVXc14w4BznNTjkQfsscAdU3b4wIh9fDVYc4zV8xZgAAYaCMI6vPgLAAAAAElFTkSuQmCC); }
#banner h1 { color: white; font-size: 50px; line-height: 121px; margin: 0; padding-left: 40px; background: url(http://files.nette.org/sandbox/logo.png) no-repeat 95%; text-shadow: 1px 1px 0 rgba(0, 0, 0, .9); }

#content { background: white; border: 1px solid #eff4f7; border-radius: 0 0 12px 12px; padding: 10px 40px; }
#content > h2 { font-size: 130%; color: #666; clear: both; padding: 1.2em 0; margin: 0; }

h2 span { color: #87A7D5; }
h2 a { text-decoration: none; background: transparent; }

.box { width: 24%; float: left; background: #f0f0f0; margin-right: 4%; min-height: 230px; padding: 3%; border: 1px solid #e6e6e6; border-radius: 5px; }
.box h2 { text-align: right; margin: 0; }
.box img { float: left; }
.box p { clear: both; }
.box:nth-child(4n - 2) h2 { color: #00a6e5; }
.box:nth-child(4n - 2) img { margin: -24px 0 0 -24px; }
.box:nth-child(4n - 1) h2 a { color: #db8e34; background: transparent; }
.box:nth-child(4n) { margin: 0; }
.box:nth-child(4n) h2 a { color: #578404; background: transparent; }

html.js section { display: none; }

pre { font-size: 12px; line-height: 1.4; padding: 10px; margin: 1.3em 0; overflow: auto; max-height: 500px; background: #F1F5FB; border-radius: 5px; box-shadow: 0 1px 1px rgba(0, 0, 0, .1); }

footer { font-size: 70%; padding: 1em 0; color: gray; }

.jush-com, .jush-php_doc { color: #929292; }
.jush-tag, .jush-tag_js { color: #6A8527; font-weight: bold; }
.jush-att { color: #8CA315 }
.jush-att_quo { color: #448CCB; font-weight: bold; }
.jush-php_var { color: #d59401; font-weight: bold; }
.jush-php_apo { color: green; }
.jush-php_new { font-weight: bold; }
.jush-php_fun { color: #254DB3; }
.jush-js, .jush-css { color: #333333; }
.jush-css_val { color: #448CCB; }
.jush-clr { color: #007800; }
.jush a { color: inherit; background: transparent; }
.jush-latte { color: #D59401; font-weight: bold }
</style>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>


<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()) ; 