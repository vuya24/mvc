<?php
if (!empty($_POST['submit'])) {


        header('Location: /mvc-master/public/geometry_calculator/'.$_POST['r'].'/'.$_POST['a'].'/'.$_POST['b'].'/'.$_POST['c']);
        exit;
}

?>

<form name='calculator' action="" method="POST">
    Circle <br>
    r = <input type="number" name="r" value="" style="width: 50px; margin-bottom: 10px;"/><br>
    Triangle <br>
    a = <input type="number" name="a" value="" style="width: 50px; margin-bottom: 10px;"/><br>
    b = <input type="number" name="b" value="" style="width: 50px; margin-bottom: 10px;"/><br>
    c = <input type="number" name="c" value="" style="width: 50px; margin-bottom: 10px;"/><br>
    <input type="submit" name="submit" />
</form>