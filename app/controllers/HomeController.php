<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.main';

    public function index(){
        $this->layout->content = View::make('index')->with('title', '工具首页');
    }
    
    public function github(){
        return Redirect::to('https://github.com/rose1988c/tools');
    }
}