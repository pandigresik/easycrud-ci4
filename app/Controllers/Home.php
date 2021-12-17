<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * Displays the initial page that visitors
     * see at the root of the site.
     *
     * @return string
     */
    public function index()
    {
        // $db = db_connect();
        // $fields = $db->getFieldData('pengurus');
        // $fk = $db->getForeignKeyData('pengurus');
        //dd($fk);
        // foreach($fields as $field){
        //     var_dump($field);
        // }
        return $this->render('welcome_message');
    }    
}
