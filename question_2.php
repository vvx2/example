<?php
if (isset($_POST['string'])) {

    echo '<pre>';
    // $string = "dsa11dw dsAad dasdsad-*/wq hah";
    $string = $_POST['string'];
    var_dump($string);
    echo "<br>";

    $check_char = str_split($string);
    $vowels = 0;
    $consonants = 0;
    $special_char = 0;
    $digit = 0;

    foreach ($check_char as $chara) {
        if (!ctype_alnum($chara)) {
            $special_char++;
        } else {
            if (is_numeric($chara)) {
                $digit++;
            } else {
                if (
                    $chara == "A" || $chara == "E" || $chara == "I" || $chara == "O" || $chara == "U" ||
                    $chara == "a" || $chara == "e" || $chara == "i" || $chara == "o" || $chara == "u"
                ) {
                    $vowels++;
                } else {
                    $consonants++;
                }
            }
        }
    }

    $check_length = explode(" ", $string);
    $longest = "";
    $length = 0;
    foreach ($check_length as $str) {
        $current_lenght = strlen($str);
        if ($current_lenght > $length) {
            $length = $current_lenght;
            $longest = $str;
        }
    }

    echo "Vowels: " . $vowels . "<br>";
    echo "Consonants: " . $consonants . "<br>";
    echo "Numeric: " . $digit . "<br>";
    echo "Other Charaters: " . $special_char . "<br>";
    echo "The longest word: " . $longest . "<br>";
    // print_r($check_length);

    echo "<br> <h3><a href='question_2.php'>Back</a></h3>";

} else {

?>
    <html>

    <body>

        <form action="question_2.php" method="post">
            String : <input type="text" name="string" placeholder="Enter String"><br>
            <input type="submit">
        </form>

    </body>

    </html>
<?php

}
