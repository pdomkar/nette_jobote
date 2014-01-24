<?php //netteCache[01]000416a:2:{s:4:"time";s:21:"0.06998300 1390556672";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:94:"D:\Dokumenty\Programovani\Nette_framework\nette_jobote\app\templates\MailsView\mailsView.latte";i:2;i:1390556670;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: D:\Dokumenty\Programovani\Nette_framework\nette_jobote\app\templates\MailsView\mailsView.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0066zq8p7d')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb6c066fa900_content')) { function _lb6c066fa900_content($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($daysMails) as $dM): ?>
    <?php if ($iterator->isFirst()): ?><table border="1"><tr><th>datum</th><th>Počet mailu</th><?php endif ?>

        <tr><td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($dM->date, 'j. F Y'), ENT_NOQUOTES) ?>
</td><td><?php echo Nette\Templating\Helpers::escapeHtml($dM->count, ENT_NOQUOTES) ?></td></tr>
    <?php if ($iterator->isLast()): ?></table><?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb43b1709ea2_title')) { function _lb43b1709ea2_title($_l, $_args) { extract($_args)
?><h1>Mails View</h1>
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
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 