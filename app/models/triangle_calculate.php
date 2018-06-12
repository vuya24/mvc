<?php

class Triangle_Calculate
{
    public $view_data;


    public function __construct()
    {
        $this->calculate();
    }

    public function calculate()
    {
        if(isset($_GET['url'])) {


            $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

            if($url[1] != NULL and $url[2] != NULL and $url[3] != NULL)  {

                $sides = array_slice($url,1,3);
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


                if($max < $sum or $count == 2 or $count == 3 and $sides[0] != 0 and $sides[1] != 0 and $sides[2] != 0) {
                    $s = ($sides[0] + $sides[1] + $sides[2]) / 2;

                    if($sides[0] != $s and $sides[1] != $s and $sides[2] != $s)
                    {
                        $surface = sqrt($s*($s-$sides[0])*($s-$sides[1])*($s-$sides[2]));
                    }

                    $circumference = $sides[0] + $sides[1] + $sides[2];

                    $triangle->type = $url[0];
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
}