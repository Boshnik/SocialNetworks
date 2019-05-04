<?php

/**
 * The home manager controller for SocialNetworks.
 *
 */
class SocialNetworksHomeManagerController extends modExtraManagerController
{
    /** @var SocialNetworks $SocialNetworks */
    public $SocialNetworks;


    /**
     *
     */
    public function initialize()
    {
        $this->SocialNetworks = $this->modx->getService('SocialNetworks', 'SocialNetworks', MODX_CORE_PATH . 'components/socialnetworks/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['socialnetworks:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('socialnetworks');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->SocialNetworks->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->SocialNetworks->config['jsUrl'] . 'mgr/socialnetworks.js');
        $this->addJavascript($this->SocialNetworks->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->SocialNetworks->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->SocialNetworks->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->SocialNetworks->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->SocialNetworks->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->SocialNetworks->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        SocialNetworks.config = ' . json_encode($this->SocialNetworks->config) . ';
        SocialNetworks.config.connector_url = "' . $this->SocialNetworks->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "socialnetworks-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="socialnetworks-panel-home-div"></div>';

        return '';
    }
}