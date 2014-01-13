<?php //netteCache[01]000465a:2:{s:4:"time";s:21:"0.30710300 1388083950";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:144:"C:\Program Files (x86)\EasyPHP-DevServer-13.1VC11\data\localweb\projects\zverejnovanienew\app\FrontModule\templates\ZakazkaNad1000\default.latte";i:2;i:1386580899;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: C:\Program Files (x86)\EasyPHP-DevServer-13.1VC11\data\localweb\projects\zverejnovanienew\app\FrontModule\templates\ZakazkaNad1000\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'tltyg6jvst')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb1a143c3132_content')) { function _lb1a143c3132_content($_l, $_args) { extract($_args)
?>Zadávanie zákazky, ktorej predpokladaná hodnota je rovnaká alebo vyššia ako 1000 eur
podľa §9 ods.9 zákona v prechodnom období
<?php $_ctrl = $_control->getComponent("gridZakazkaNad1000"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render() ;
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
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 