<?php

class Circle extends Controller
{
    public function index()
    {
        $this->view('circle/index',$this->model('circle_calculate')->view_data);
    }
}