<?php

class Triangle extends Controller
{
    public function index()
    {
        $this->view('triangle/index',$this->model('triangle_calculate')->view_data);
    }
}