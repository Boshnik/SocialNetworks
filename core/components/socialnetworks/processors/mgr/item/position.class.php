<?php

class SocialNetworksItemEnableProcessor extends modObjectProcessor
{
    public $objectType = 'SocialNetworksItem';
    public $classKey = 'SocialNetworksItem';
    public $languageTopics = ['socialnetworks'];
    //public $permission = 'save';


    /**
     * @return array|string
     */
    public function process() {
        
        $values = (!empty($_POST['values'])) ? $_POST['values'] : '[]';
        $values = json_decode($values, true);
        if (!is_array($values)) {
            return $this->failure('Invalid JSON provided');
        }
        
        // print_r($values);
        foreach ($values as $key => $value) {
            if($field = $this->modx->getObject($this->classKey, $value)) {
                $field->set('position', $key+1);
                $field->save();   
            }
        }
        // Return a response
        if ($this->hasErrors()) {
            $errors = $this->modx->error->getFields();
            return $this->failure(implode('<br>', $errors));
        } else {
            return $this->success();
        }
    }

}

return 'SocialNetworksItemEnableProcessor';