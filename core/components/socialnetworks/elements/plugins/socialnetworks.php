<?php
/** @var modX $modx */
if ($modx->event->name == 'OnManagerPageInit') {
    $fontawesome = '<script defer src="//use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>';
    $modx->regClientStartupScript($fontawesome);
}