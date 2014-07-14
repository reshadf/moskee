<?php
Class LanguageController extends BaseController {

    public function select($lang)
    {
        Session::put('lang', $lang);
        //dd( Session::get('lang') );
        
        return Redirect::back();
    }

}