<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view($view, $view_data = NULL)
    {
        require_once  '../app/views/' . $view . '.php';
    }

}