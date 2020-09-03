<?php

if (isset($_POST['shape'])) {
    $choice = $_POST['shape'];
    $size = $_POST['size'];
    function circle($radius)
    {
        for ($i = 0; $i <= 2 * $radius; $i++) {
            for ($j = 0; $j <= 2 * $radius; $j++) {
                $distance = sqrt(($i - $radius) *
                    ($i - $radius) +
                    ($j - $radius) *
                    ($j - $radius));

                if (
                    $distance > $radius - 0.5 &&
                    $distance < $radius + 0.5
                )
                    echo "*";

                else
                    echo "&nbsp;&nbsp;&nbsp;";
            }
            echo "<br>";
        }
    }

    // square or a rectangle 
    function rectangle($l, $b)
    {

        for ($i = 1; $i <= $l; $i++) {
            for ($j = 1; $j <= $b; $j++)
                if (
                    $i == 1 || $i == $l ||
                    $j == 1 || $j == $b
                )
                    echo "*";

                else
                    echo "*";
            echo "<br>";
        }
    }

    // Function to print triangle 
    function triangle($side)
    {
        for ($i = 1; $i <= $side; $i++) {
            for ($j = $i; $j < $side; $j++)
                echo " ";

            for (
                $j = 1;
                $j <= (2 * $i - 1);
                $j++
            ) {
                if (
                    $i == $side || $j == 1 ||
                    $j == (2 * $i - 1)
                )
                    echo "*";

                else
                    echo "*";
            }
            echo "<br>";
        }
    }

    // Function to print hexagon 
    function hexagon($length)
    {

        for (
            $i = 1, $k = $length,
            $l = 2 * $length - 1;
            $i < $length;
            $i++, $k--, $l++
        ) {
            for ($j = 0; $j < 3 * $length; $j++)
                if ($j >= $k && $j <= $l)
                    echo "*";

                else
                    echo "&nbsp;&nbsp;";
            echo "<br>";
        }
        for (
            $i = 0, $k = 1, $l = 3 * $length - 2;
            $i < $length;
            $i++, $k++, $l--
        ) {
            for ($j = 0; $j < 3 * $length; $j++)
                if ($j >= $k && $j <= $l)
                    echo "*";
                else
                    echo "&nbsp;&nbsp;";
            echo "<br>";
        }
    }

    // Function takes user choice 
    function printPattern($choice, $size)
    {
        switch ($choice) {

                // For Circle 
            case 1:
                $radius = $size;
                circle($radius);
                break;

                // For rectangle/square 
            case 2:
                $length = $size;
                $breadth = $size;
                rectangle($length, $breadth);
                break;

                // For triangle 
            case 3:
                $side = $size;
                triangle($side);
                break;

                // For hexagon 
            case 4:
                $side = $size;
                hexagon($side);
                break;

            default:
                echo "Wrong choice<br>";
        }
    }

    // Driver Code 
    printPattern($choice, $size);
    echo "<br> <h3><a href='question_3.php'>Back</a></h3>";
} else {
?>
    <html>

    <body>
        1:Circle, 2:rectangle, 3:triangle, 4:hexagon<br>
        <form action="question_3.php" method="post">
            <br>
            Select Shape : <input type="text" name="shape" placeholder="" required><br><br>
            Size of shape : <input type="number" name="size" placeholder="" required><br>
            <input type="submit">
        </form>

    </body>

    </html>
<?php
}
