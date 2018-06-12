<?php

class Geometry_Calculate
{
    public $view_data;


    public function __construct()
    {
        $this->calculate_circle();
        $this->calculate_triangle();
        $this->surface();
        $this->circumference();
    }

    public function calculate_circle()
    {
        if(isset($_GET['url'])) {

            $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

            $surface = 0;
            $circumference = 0;

            if($url[1] != NULL)  {
                $surface = M_PI * pow($url[1], 2);
                $circumference = 2 * $url[1] * M_PI;
            }

            //Circle object

            $circle->type = 'circle';
            $circle->radius = number_format((float)$url[1],1,".","");
            $circle->surface = number_format((float)$surface,2,".","");
            $circle->circumference = number_format((float)$circumference,2,".","");
        }

        return $this->view_data->circle_data = $circle;

    }

    public function calculate_triangle()
    {
        if(isset($_GET['url'])) {


            $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

            if($url[2] != NULL and $url[3] != NULL and $url[4] != NULL)  {

                //get sides from url, count max values

                $sides = array_slice($url,2,3);
                $count = 0;
                $max = max($sides);
                $sum = 0;

                foreach ($sides as $value)
                {
                    if($value == $max){
                        $count++;
                    }
                }

                if($count == 1)
                {
                    foreach ($sides as $value)
                    {
                        if($value != $max)
                            $sum += $value;
                    }
                }


                //check for valid sides entry

                if($max < $sum or $count == 2 or $count == 3 and $sides[0] != 0 and $sides[1] != 0 and $sides[2] != 0) {
                    $s = ($sides[0] + $sides[1] + $sides[2]) / 2;

                    if($sides[0] != $s and $sides[1] != $s and $sides[2] != $s)
                    {
                        $surface = sqrt($s*($s-$sides[0])*($s-$sides[1])*($s-$sides[2]));
                    }

                    $circumference = $sides[0] + $sides[1] + $sides[2];


                    //Triangle object

                    $triangle->type = 'triangle';
                    $triangle->a = number_format((float)$sides[0],1,".","");
                    $triangle->b = number_format((float)$sides[1],1,".","");
                    $triangle->c = number_format((float)$sides[2],1,".","");
                    $triangle->surface = number_format((float)$surface,1,".","");
                    $triangle->circumference = number_format((float)$circumference,1,".","");

                } else  {
                    $triangle = "Invalid entry!";
                }

            }
        }
        return $this->view_data->triangle_data = $triangle;
    }

    public function surface()
    {
        $this->calculate_circle();
        $this->calculate_triangle();
        return $this->view_data->surface_data->surface_sum = number_format((float)$this->view_data->triangle_data->surface + $this->view_data->circle_data->surface,2,"."," ");
    }

    public function circumference()
    {
        $this->calculate_circle();
        $this->calculate_triangle();
        return $this->view_data->circumference_data->circumference_sum = number_format((float)$this->view_data->triangle_data->circumference + $this->view_data->circle_data->circumference,2,"."," ");
    }
}