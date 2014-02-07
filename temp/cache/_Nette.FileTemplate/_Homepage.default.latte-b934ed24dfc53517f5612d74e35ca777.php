<?php //netteCache[01]000432a:2:{s:4:"time";s:21:"0.44751700 1391766411";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:117:"C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\FrontModule\templates\Homepage\default.latte";i:2;i:1391763998;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\FrontModule\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'uohdmoy307')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbdfe9311889_content')) { function _lbdfe9311889_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><H1>Vitajte na stránke Internetového atlasu</H1>
<br>
<UL>
    <li>Portál bol vytvorený pre potreby žiakov našej školy, geologického krúžku a širokú verejnosť, ako práca SOČ.</li>
    <LI><B>Autori:</B><BR>Kivader Jozef, Janiga Jakub</LI>
    <LI><B>Konzultant:</B><BR> Ing. Vladimír MAŇKOŠ</LI>
    <LI><B>Cieľ portálu:</B><BR>základné informácie o horninách, ich vlastnostiach a znakoch a náleziskách v rámci Slovenska. Súčasťou portálu je aj jednoduchý kľúč na určovanie. </LI>
</UL><?php
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