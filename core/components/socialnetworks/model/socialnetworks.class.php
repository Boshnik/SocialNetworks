<?php

class SocialNetworks
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/socialnetworks/';
        $assetsUrl = MODX_ASSETS_URL . 'components/socialnetworks/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('socialnetworks', $this->config['modelPath']);
        $this->modx->lexicon->load('socialnetworks:default');
    }
    
    public function loadJsCss($fontawesome)
    {
        if($fontawesome == 'webfont') {
            $fontawesome_css = $this->modx->getOption('socialnetworks_fontawesome_css');
            if(!empty($fontawesome_css)) {
                $this->modx->regClientCss($fontawesome_css);   
            }
        }
        
        if($fontawesome == 'svg') {
            $fontawesome_js = $this->modx->getOption('socialnetworks_fontawesome_js');
            if(!empty($fontawesome_js)) {
                $this->modx->regClientStartupScript($fontawesome_js);    
            }
        }
    }
    
    public function getServices($scriptProperties)
    {
        $sortby = $scriptProperties['sortby'] ?: 'name';
        $sortdir = $scriptProperties['sortdir'] ?: 'ASC';
        $limit = $scriptProperties['limit'] ?: 0;
        $services = $scriptProperties['services'] ?: '';
        
        $query = $this->modx->newQuery('SocialNetworksItem');
        $query->select($this->modx->getSelectColumns('SocialNetworksItem', 'SocialNetworksItem', '', '', false));
        $query->sortby($sortby, $sortdir);
        if(empty($services)) {
            $query->where(['active' => 1]);    
        } else {
            $query->where(['active' => 1, 'name:IN' => explode(',',$services)]);
        }
        if($limit > 0) {
            $query->limit($limit);    
        }
        $query->prepare();
        $query->stmt->execute();
        return $query->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}