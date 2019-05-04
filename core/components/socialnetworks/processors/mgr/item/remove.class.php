<?php

class SocialNetworksItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'SocialNetworksItem';
    public $classKey = 'SocialNetworksItem';
    public $languageTopics = ['socialnetworks'];
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('socialnetworks_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var SocialNetworksItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('socialnetworks_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'SocialNetworksItemRemoveProcessor';