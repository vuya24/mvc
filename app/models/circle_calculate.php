<?php

class Circle_data
{

    public $type;
    public $radius;
    public $surface;
    public $circumference;

}

class Circle_Calculate
{
    public $view_data;

    public function __construct()
    {
        $this->calculate();
    }

    public function calculate()
    {
        if(isset($_GET['url'])) {

            $circle = new Circle_data();

            $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

            $surface = 0;
            $circumference = 0;

            if($url[1] != NULL)  {
                $surface = M_PI * pow($url[1], 2);
                $circumference = 2 * $url[1] * M_PI;
            }
            $circle->type = $url[0];
            $circle->radius = number_format((float)$url[1],1,".","");
            $circle->surface = number_format((float)$surface,2,".","");
            $circle->circumference = number_format((float)$circumference,2,".","");
        }

        return $this->view_data->circle_data = $circle;

    }
}