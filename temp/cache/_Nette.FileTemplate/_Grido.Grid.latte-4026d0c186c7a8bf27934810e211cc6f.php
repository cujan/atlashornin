<?php //netteCache[01]000431a:2:{s:4:"time";s:21:"0.30749600 1391452028";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:116:"C:\Program Files (x86)\EasyPHP-DevServer-13.1VC11\data\localweb\projects\atlasHornin\app\components\Grido\Grid.latte";i:2;i:1390476452;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\Program Files (x86)\EasyPHP-DevServer-13.1VC11\data\localweb\projects\atlasHornin\app\components\Grido\Grid.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'rphnbgr025')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block _grid
//
if (!function_exists($_l->blocks['_grid'][] = '_lb392ceb21ce__grid')) { function _lb392ceb21ce__grid($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('grid', FALSE)
;$form->getElementPrototype()->class[] = 'ajax grido';

    $operation = $control->hasOperation();
    $actions = $control->hasActions() ? $control->getComponent(\Grido\Components\Actions\Action::ID)->getComponents() : array();

    $filters = $control->hasFilters() ? $form->getComponent(\Grido\Components\Filters\Filter::ID)->getComponents() : array();
    $filterRenderType = $control->getFilterRenderType();

    $columns = $control->getComponent(Grido\Components\Columns\Column::ID)->getComponents();
    $columnCount = count($columns) + ($operation ? 1 : 0);
    $showActionsColumn = $actions || ($filters && $filterRenderType == Grido\Components\Filters\Filter::RENDER_INNER);

    
    $buttons = $form->getComponent('buttons');
    $buttons->getComponent('search')->getControlPrototype()->class[] = 'btn btn-default btn-sm search';
    $buttons->getComponent('reset')->getControlPrototype()->class[] = 'btn btn-default btn-sm reset';

    $form['count']->controlPrototype->class[] = 'form-control';
    $operation ? $form['operations']['operations']->controlPrototype->class[] = 'form-control' : NULL ?>

<?php $iterations = 0; foreach ($filters as $filter) { $filter->controlPrototype->class[] = 'form-control' ;$iterations++; } ?>

<?php $iterations = 0; foreach ($actions as $action) { $element = $action->getElementPrototype();
            $element->class[] = 'btn btn-default btn-xs btn-mini'; if ($icon = $action->getOption('icon')) { $element->setText(' ' . $action->getLabel());
            $element->insert(0, \Nette\Utils\Html::el('i')->setClass(array("glyphicon glyphicon-$icon icon-$icon"))); } $iterations++; } if ($form->getErrors()) { $iterations = 0; foreach ($form->getErrors() as $error) { ?><ul>
    <li><?php echo Nette\Templating\Helpers::escapeHtml($error, ENT_NOQUOTES) ?></li>
</ul>
<?php $iterations++; } } Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["form"], array()) ;if ($filterRenderType == Grido\Components\Filters\Filter::RENDER_OUTER) { call_user_func(reset($_l->blocks['outerFilter']), $_l, get_defined_vars()) ; } ?>

<?php call_user_func(reset($_l->blocks['table']), $_l, get_defined_vars()) ; Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;
}}

//
// block outerFilter
//
if (!function_exists($_l->blocks['outerFilter'][] = '_lb3c8f70f5de_outerFilter')) { function _lb3c8f70f5de_outerFilter($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div class="filter outer">
        <div class="items">
<?php $iterations = 0; foreach ($filters as $filter) { ?>            <span class="grid-filter-<?php echo htmlSpecialChars($filter->getName()) ?>">
                <?php echo Nette\Templating\Helpers::escapeHtml($filter->getLabel(), ENT_NOQUOTES) ?>

                <?php echo Nette\Templating\Helpers::escapeHtml($filter->getControl(), ENT_NOQUOTES) ?>

            </span>
<?php $iterations++; } ?>
        </div>
        <div class="buttons">
<?php $_formStack[] = $_form; $formContainer = $_form = $_form["buttons"] ;if ($filters) { ?>
                    <?php echo $_form["search"]->getControl() ?>

<?php } ?>
                <?php echo $_form["reset"]->getControl() ?>

<?php $_form = array_pop($_formStack) ?>
        </div>
    </div>
<?php
}}

//
// block table
//
if (!function_exists($_l->blocks['table'][] = '_lb8cf9264b7f_table')) { function _lb8cf9264b7f_table($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;echo $control->getTablePrototype()->startTag() ?>

    <thead>
        <tr class="head">
<?php if ($operation) { ?>            <th class="checker"<?php if ($filters) { ?>
 rowspan="<?php if ($filterRenderType == Grido\Components\Filters\Filter::RENDER_OUTER) { ?>
1<?php } else { ?>2<?php } ?>"<?php } ?>>
                <input type="checkbox" title="<?php echo htmlSpecialChars($template->translate('Invert')) ?>">
            </th>
<?php } $iterations = 0; foreach ($columns as $column) { ?>
                <?php echo $column->getHeaderPrototype()->startTag() ?>

<?php if ($column->isSortable()) { if (!$column->getSort()) { ?>                        <a class="ajax" href="<?php echo htmlSpecialChars($_control->link("sort!", array(array($column->getName() => Grido\Components\Columns\Column::ORDER_ASC)))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate($column->getLabel()), ENT_NOQUOTES) ?></a>
<?php } if ($column->getSort() == Grido\Components\Columns\Column::ORDER_ASC) { ?>
                        <a class="sort ajax" href="<?php echo htmlSpecialChars($_control->link("sort!", array(array($column->getName() => Grido\Components\Columns\Column::ORDER_DESC)))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate($column->getLabel()), ENT_NOQUOTES) ?></a>
<?php } if ($column->getSort() == Grido\Components\Columns\Column::ORDER_DESC) { ?>
                        <a class="sort ajax" href="<?php echo htmlSpecialChars($_control->link("sort!", array(array($column->getName() => Grido\Components\Columns\Column::ORDER_ASC)))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate($column->getLabel()), ENT_NOQUOTES) ?></a>
<?php } ?>
                        <span></span>
<?php } else { ?>
                        <?php echo Nette\Templating\Helpers::escapeHtml($template->translate($column->getLabel()), ENT_NOQUOTES) ?>

<?php } ?>
                <?php echo $column->getHeaderPrototype()->endTag() ?>

<?php $iterations++; } if ($showActionsColumn) { ?>            <th class="actions center">
                <?php echo Nette\Templating\Helpers::escapeHtml($template->translate('Actions'), ENT_NOQUOTES) ?>

            </th>
<?php } ?>
        </tr>
<?php if ($filterRenderType == Grido\Components\Filters\Filter::RENDER_INNER && $filters) { ?>        <tr class="filter inner">
<?php $iterations = 0; foreach ($columns as $column) { if ($column->hasFilter()) { ?>
                    <?php echo $control->getFilter($column->getName())->getWrapperPrototype()->startTag() ?>

<?php $_formStack[] = $_form; $formContainer = $_form = $_form["filters"] ;$_input = is_object($column->getName()) ? $column->getName() : $_form[$column->getName()]; echo $_input->getControl() ;$_form = array_pop($_formStack) ?>
                    <?php echo $control->getFilter($column->getName())->getWrapperPrototype()->endTag() ?>

<?php } elseif ($column->headerPrototype->rowspan != 2) { ?>
                    <th>&nbsp;</th>
<?php } $iterations++; } ?>

<?php if ($filters) { ?>            <th class="buttons">
<?php $_formStack[] = $_form; $formContainer = $_form = $_form["buttons"] ?>
                    <?php echo $_form["search"]->getControl() ?>

                    <?php echo $_form["reset"]->getControl() ?>

<?php $_form = array_pop($_formStack) ?>
            </th>
<?php } ?>
        </tr>
<?php } ?>
    </thead>
    <tfoot>
        <tr>
            <td colspan="<?php echo htmlSpecialChars($showActionsColumn ? $columnCount + 1 : $columnCount) ?>">
<?php call_user_func(reset($_l->blocks['operations']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['paginator']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['count']), $_l, get_defined_vars())  ?>
            </td>
        </tr>
    </tfoot>
    <tbody>
<?php $propertyAccessor = $control->getPropertyAccessor() ;$iterations = 0; foreach ($data as $row) { $checkbox = $operation
                    ? $form[Grido\Components\Operation::ID][$propertyAccessor->getProperty($row, $control->getComponent(Grido\Components\Operation::ID)->getPrimaryKey())]
                    : NULL;
                $tr = $control->getRowPrototype($row);
                $tr->class[] = $checkbox && $checkbox->getValue()
                    ? 'selected'
                    : NULL ?>
            <?php echo $tr->startTag() ?>

<?php if ($checkbox) { ?>                <td class="checker">
                    <?php echo Nette\Templating\Helpers::escapeHtml($checkbox->getControl(), ENT_NOQUOTES) ?>

                </td>
<?php } $iterations = 0; foreach ($columns as $column) { $td = $column->getCellPrototype($row) ?>
                    <?php echo $td->startTag() ?>

<?php if (is_string($column->getCustomRender())) { Nette\Latte\Macros\CoreMacros::includeTemplate($column->getCustomRender(), array('control' => $control, 'presenter' => $control->getPresenter(), 'item' => $row) + $template->getParameters(), $_l->templates['rphnbgr025'])->render() ;} else { ?>
                            <?php echo $column->render($row) ?>

<?php } ?>
                    <?php echo $td->endTag() ?>

<?php $iterations++; } if ($showActionsColumn) { ?>                <td class="actions center">
<?php $iterations = 0; foreach ($actions as $action) { if (is_object($action)) $_ctrl = $action; else $_ctrl = $_control->getComponent($action); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->redrawControl(NULL, FALSE); $_ctrl->render($row) ;$iterations++; } if (!$actions) { ?>
                        &nbsp;
<?php } ?>
                </td>
<?php } ?>
            <?php echo $tr->endTag() ?>

<?php $iterations++; } if (!$control->getCount()) { ?>        <tr><td colspan="<?php echo htmlSpecialChars($showActionsColumn ? $columnCount + 1 : $columnCount) ?>
" class="no-results"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate('No results.'), ENT_NOQUOTES) ?></td></tr>
<?php } ?>
    </tbody>
<?php echo $control->getTablePrototype()->endTag() ?>

<?php
}}

//
// block operations
//
if (!function_exists($_l->blocks['operations'][] = '_lb4162b9de65_operations')) { function _lb4162b9de65_operations($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($operation) { ?>                <span class="operations"  title="<?php echo htmlSpecialChars($template->translate('Select some row')) ?>">
                    <?php echo Nette\Templating\Helpers::escapeHtml($form[Grido\Components\Operation::ID][Grido\Components\Operation::ID]->control, ENT_NOQUOTES) ?>

<?php $form[Grido\Grid::BUTTONS][Grido\Components\Operation::ID]->controlPrototype->class[] = 'hide' ?>
                    <?php echo Nette\Templating\Helpers::escapeHtml($form[Grido\Grid::BUTTONS][Grido\Components\Operation::ID]->control, ENT_NOQUOTES) ?>

                </span>
<?php } 
}}

//
// block paginator
//
if (!function_exists($_l->blocks['paginator'][] = '_lb0161e460cc_paginator')) { function _lb0161e460cc_paginator($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($paginator->steps && $paginator->pageCount > 1) { ?>                <span class="paginator">
<?php if ($control->page == 1) { ?>
                        <span class="btn btn-default btn-xs btn-mini disabled" href="<?php echo htmlSpecialChars($_control->link("page!", array('page' => $paginator->getPage() - 1))) ?>
"><i class="glyphicon glyphicon-arrow-left icon-arrow-left"></i> <?php echo Nette\Templating\Helpers::escapeHtml($template->translate('Previous'), ENT_NOQUOTES) ?></span>
<?php } else { ?>
                        <a class="btn btn-default btn-xs btn-mini ajax" href="<?php echo htmlSpecialChars($_control->link("page!", array('page' => $paginator->getPage() - 1))) ?>
"><i class="glyphicon glyphicon-arrow-left icon-arrow-left"></i> <?php echo Nette\Templating\Helpers::escapeHtml($template->translate('Previous'), ENT_NOQUOTES) ?></a>
<?php } $steps = $paginator->getSteps() ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($steps) as $step) { if ($step == $control->page) { ?>
                            <span class="btn btn-default btn-xs btn-mini disabled"><?php echo Nette\Templating\Helpers::escapeHtml($step, ENT_NOQUOTES) ?></span>
<?php } else { ?>
                            <a class="btn btn-default btn-xs btn-mini ajax" href="<?php echo htmlSpecialChars($_control->link("page!", array('page' => $step))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($step, ENT_NOQUOTES) ?></a>
<?php } if ($iterator->nextValue > $step + 1) { ?>                        <a class="prompt" data-grido-prompt="<?php echo htmlSpecialChars($template->translate('Enter page:')) ?>
" data-grido-link="<?php echo htmlSpecialChars($_control->link("page!", array('page' => 0))) ?>">...</a>
<?php } $prevStep = $step ;$iterations++; } array_pop($_l->its); $iterator = end($_l->its) ;if ($control->page == $paginator->getPageCount()) { ?>
                        <span class="btn btn-default btn-xs btn-mini disabled" href="<?php echo htmlSpecialChars($_control->link("page!", array('page' => $paginator->getPage() + 1))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate('Next'), ENT_NOQUOTES) ?> <i class="glyphicon glyphicon-arrow-right icon-arrow-right"></i></span>
<?php } else { ?>
                        <a class="btn btn-default btn-xs btn-mini ajax" href="<?php echo htmlSpecialChars($_control->link("page!", array('page' => $paginator->getPage() + 1))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($template->translate('Next'), ENT_NOQUOTES) ?> <i class="glyphicon glyphicon-arrow-right icon-arrow-right"></i></a>
<?php } ?>
                </span>
<?php } 
}}

//
// block count
//
if (!function_exists($_l->blocks['count'][] = '_lbb9cc390a47_count')) { function _lbb9cc390a47_count($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>                <span class="count">
                    <?php echo Nette\Templating\Helpers::escapeHtml(sprintf($template->translate('Items %d - %d of %d'), $paginator->getCountBegin(), $paginator->getCountEnd(), $control->getCount()), ENT_NOQUOTES) ?>

                    <?php echo $_form["count"]->getControl() ?>

<?php $_formStack[] = $_form; $formContainer = $_form = $_form["buttons"] ?>
                        <?php echo $_form["perPage"]->getControl()->addAttributes(array('class' => 'hide')) ?>

<?php $_form = array_pop($_formStack) ;if ($control->hasExport()) { ?>                    <a class="btn btn-default btn-xs btn-mini" href="<?php echo htmlSpecialChars($template->safeurl($control->getComponent(Grido\Components\Export::ID)->link('export!'))) ?>
" title="<?php echo htmlSpecialChars($template->translate('Export all items')) ?>"><i class="glyphicon glyphicon-download icon-download"></i></a>
<?php } ?>
                </span>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>
<div id="<?php echo $_control->getSnippetId('grid') ?>"><?php call_user_func(reset($_l->blocks['_grid']), $_l, $template->getParameters()) ?>
</div>