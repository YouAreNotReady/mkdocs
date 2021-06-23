<?php 

        // variables
        $str = "string";
        $num = 16;
        $bool = true;

        // arrays

        $arr = array(1, 2, 3);

        $obj = array("foo" => "my");

        // conditions

        if ($num == 16) $str = "true"; else $str = "false";
        ($num == 16) ? $str = "false" : $str = true;

        // loops

        for ($i = 0; $i < count($arr); $i++) {
            echo "<p>" . $arr[$i] . "</p>";
        }

        foreach ($arr as $elem) {
            echo "<p>" . $elem . "</p>";
        }

        // functions

        function func() {
            $number = 777;
            return $number;
        }

        echo func();

        // sessions

        session_start();
        if (!isset($_SESSION['time'])) {
            $_SESSION['time'] = date("H:i:s");
        }
        echo "<br/>" . $_SESSION['time'];

    ?>
<