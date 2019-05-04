<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var SocialNetworks $SocialNetworks */
$SocialNetworks = $modx->getService('SocialNetworks', 'SocialNetworks', MODX_CORE_PATH . 'components/socialnetworks/model/');
$modx->lexicon->load('socialnetworks:default');

// handle request
$corePath = $modx->getOption('socialnetworks_core_path', null, $modx->getOption('core_path') . 'components/socialnetworks/');
$path = $modx->getOption('processorsPath', $SocialNetworks->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);