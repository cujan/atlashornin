<?php //netteCache[01]000439a:2:{s:4:"time";s:21:"0.58626500 1391596506";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:124:"C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\AdminModule\templates\CiselnikSkupina\default.latte";i:2;i:1391593306;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\AdminModule\templates\CiselnikSkupina\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0rdi2tbjb8')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf91157690d_content')) { function _lbf91157690d_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>ciselnik skupina
<h2><a href="<?php echo htmlSpecialChars($_control->link("ciselnikPodskupina:add")) ?>
">Pridaj</a></h2>
<?php $_ctrl = $_control->getComponent("gridCiselnikPodskupina"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render() ;
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