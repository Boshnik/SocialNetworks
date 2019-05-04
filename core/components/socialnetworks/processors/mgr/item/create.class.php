<?php

class SocialNetworksItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'SocialNetworksItem';
    public $classKey = 'SocialNetworksItem';
    public $languageTopics = ['socialnetworks'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('socialnetworks_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('socialnetworks_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'SocialNetworksItemCreateProcessor';