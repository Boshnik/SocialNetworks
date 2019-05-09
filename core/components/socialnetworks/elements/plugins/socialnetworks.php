<?php
/** @var modX $modx */
if ($modx->event->name == 'OnManagerPageInit') {
    $fontawesome_js = $modx->getOption('socialnetworks_fontawesome_js');
    if(!empty($fontawesome_js)) {
        $fontawesome = '<script src="'.$fontawesome_js.'" defer></script>';
        $modx->regClientStartupScript($fontawesome);    
    }
}