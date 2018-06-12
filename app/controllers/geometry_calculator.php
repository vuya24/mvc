<?php

class Geometry_Calculator extends Controller
{
    public function index()
    {
        $this->view('geometry_calculator/index',$this->model('geometry_calculate')->view_data);
    }

}