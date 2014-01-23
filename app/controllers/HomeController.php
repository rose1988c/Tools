<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.main';

    public function index(){
        $this->layout->content = View::make('index')->with('title', '首页');
    }
    
	public function showWelcome()
	{
		$this->layout->content = View::make('welcome');
	}

}