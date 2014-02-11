<?php //netteCache[01]000428a:2:{s:4:"time";s:21:"0.99451300 1392117518";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:113:"C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\FrontModule\templates\Hornina\edit.latte";i:2;i:1391980735;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Program Files\EasyPHP-DevServer-13.1VC9\data\localweb\atlashornin\app\FrontModule\templates\Hornina\edit.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'rmhmbpzw17')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb40992f2134_content')) { function _lb40992f2134_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Detail</h1>

<table id="detailTab">
    <tr>
	<th>Názov</th>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($hornina->nazov, ENT_NOQUOTES) ?></td>
    </tr>
    <tr>
	<th>Skupina</th>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($hornina->ciselnikskupina->nazov, ENT_NOQUOTES) ?></td>
    </tr>
    <tr>
	<th>Farba</th>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($hornina->ciselnikfarba->nazov, ENT_NOQUOTES) ?></td>
    </tr>
    <tr>
	<th>Podskupina</th>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($hornina->ciselnikpodskupina->nazov, ENT_NOQUOTES) ?></td>
    </tr>

</table>
    



<table id="obrazokPopis">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($obrazky) as $obrazok) { ?>
   <?php if ($iterator->isFirst(4)) { ?><tr><?php } ?>

       
       <td align ="center">
           
            <div id="thumbs">
            <div class="thumb">    
           <image src="/atlasHornin/www/hornina/<?php echo htmlSpecialChars($template->safeurl($obrazok -> nazovSuboru)) ?>
" width="200" height="200" alt="<?php echo htmlSpecialChars($obrazok -> popis) ?>">
            </div>
            </div>
           
           
           <br>
   <?php echo Nette\Templating\Helpers::escapeHtml($obrazok ->popis, ENT_NOQUOTES) ?><br>
   </td>
<?php if ($iterator->isLast(4)) { ?></tr><?php } ?>

<?php if ($iterator->isLast()) { if ((count($obrazky) % 4) != 0) { ?>
                </tr>
<?php } } ?>
  
<?php $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>
</table>
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
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 