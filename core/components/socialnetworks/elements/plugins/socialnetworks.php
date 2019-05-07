<?php
/** @var modX $modx */
if ($modx->event->name == 'OnManagerPageInit') {
    $fontawesome_js = $modx->getOption('socialnetworks_fontawesome_js');
    if(!empty($fontawesome_js)) {
        $fontawesome = '<script src="'.$fontawesome_js.'" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous" defer></script>';
        $modx->regClientStartupScript($fontawesome);    
    }
}