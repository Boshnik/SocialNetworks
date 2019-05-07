<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var SocialNetworks $SocialNetworks */
$SocialNetworks = $modx->getService('SocialNetworks', 'SocialNetworks', MODX_CORE_PATH . 'components/socialnetworks/model/', $scriptProperties);
if (!$SocialNetworks) {
    return 'Could not load SocialNetworks class!';
}

$tplOuter = $modx->getOption('tplOuter', $scriptProperties, '@INLINE <ul {$classes}>{$wrapper}</ul>', true);
$tpl = $modx->getOption('tpl', $scriptProperties, '@INLINE <li {$classes}><a href="{$link}" target="_blank" title="{$name}"><i class="fab fa-{$name}"></i></a></li>', true);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);
$fontawesome = $modx->getOption('fontawesome', $scriptProperties, 'WebFont', true);
$outerClass = $modx->getOption('outerClass', $scriptProperties, 'list-inline', false);
$rowClass = $modx->getOption('rowClass', $scriptProperties, 'list-inline-item', false);

// Поключаем fontawesome
$SocialNetworks->loadJsCss($fontawesome);

// Получаем сервисы
$items = $SocialNetworks->getServices($scriptProperties);

// pdoTools
$pdo = $modx->getService('pdoTools');

// Iterate through items
$list = [];
/** @var SocialNetworksItem $item */
if(!empty($rowClass)) {
    $rowClass = 'class="'.$rowClass.'"';
}
foreach ($items as $item) {
    $list[] = $pdo->parseChunk($tpl, array_merge(array(
        'classes' => $rowClass
    ),$item));
}

// Output
$output = implode($outputSeparator, $list);
if(!empty($outerClass)) {
    $outerClass = 'class="'.$outerClass.'"';
}
if(!empty($tplOuter)) {
    $output = $pdo->parseChunk($tplOuter, array(
        'classes' => $outerClass,
        'wrapper' => $output
    ));    
}
if (!empty($toPlaceholder)) {
    // If using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);

    return '';
}
// By default just return output
return $output;