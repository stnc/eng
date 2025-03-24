<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

/**
 * STNC FRAMEWORK
 *
 * Author(s): Selman TUNÇ www.selmantunc.com <selmantunc@gmail.com>
 *
 * Licensed under the MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Selman TUNÇ <selmantunc@gmail.com>
 * @copyright Copyright (c) 2017
 * @link http://github.com/stnc
 * @version 3.0.0.0
 * @date 26.03.2017
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 */

// TODO : urunler kategorisinde yan bar daki alana her alanın adetini yazacak
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    echo "<h1>Lütfen composer.json ı yükleyin </h1>";
    echo "<p>Örnekler <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
    echo "<p> terminal yada cmd yi açarak  'composer install' yazınız</p>";
    echo "<p> eğer yuklü ise terminal yada cmd yi açarak  'composer update' yazınız</p>";
    exit();
}

// if (! is_readable('vendor/stnc/framework/src/Core/Config.php')) {
//     die('config.php bulunamadı, config.example.php dosyasının ismini değiştirip config.php yapınız ve  app/core. içine atınız ');
// }

use Nette\Utils\Arrays;
use Nette\Utils\Strings;


$eng = $_POST['eng'];
$tr = $_POST['tr'];

echo "<pre>";
print_r($eng);
echo "<br>";
print_r($tr);

// $piecesENG = explode(" ", $eng);
// $piecesTR = explode(" ", $tr);


$piecesENG =  Strings::split($eng, '~ \s*~');
echo "<br>";
print_r($piecesENG);


foreach ($piecesENG as $key => $value) {
    $value = Strings::trim($value);
    $value = Strings::lower($value);
    $value = modal_verbs($value);
    $value = conjunctions($value);
    $value = prepositions($value);
    $value = ComplexPrepositions($value);
    $value = prepositionsOfTime($value);
    html($value);
}

echo "<pre>";
print_r($piecesENG);






$piecesTR =  Strings::split($tr, '~ \s*~');
echo "<br>";
print_r($piecesTR);

function modal_verbs($value)
{
    $arr = array(
        "can",
        "can not",
        "cannot",
        "can’t",
        "could",
        "could not",
        "could’ not",
        "will",
        "will not",
        "won't",
        "would",
        "would not",
        "wouldn't",
        "shall",
        "shall not",
        "shan't",
        "may",
        "may not",
        "might",
        "might not",
        "must",
        "must not",
        "ought",
        "ought not",

    );

    if (in_array($value, $arr)) {
        return   "[helix_modalVerbs value='" . $value . "']";
    } else {
        return $value;
    }
}


function prepositions($value)
{
    $arr = array(
        "about",
        "like",
        "above",
        "near",
        "of",
        "with",
        "within",
        "without",
        "into",
        "inside",
        "from",
        "for",
        "upon",
        "except",
        "up",
        "except",
        "down",
        "underneath",
        "despite",
        "by",
        "under",
        "towards",
        "beyond",
        "towards",
        "between",
        "to",
        "through",
        "beneath",
        "than",
        "below",
        "round",
        "behind",
        "before",
        "over",
        "outside",
        "as",
        "out",
        "around",
        "opposite",
        "among",
        "onto",
        "along",
        "against",
        "off",
        "after",
        "of",
        "across"
    );

    if (in_array($value, $arr)) {
        return  "[helix_preposition value='" . $value . "']";
    } else {
        return $value;
    }
}



function ComplexPrepositions($value)
{
    $arr = array(
        "ahead of",
        "inside of",
        "apart from",
        "instead of",
        "as for",
        "near to",
        "as well as",
        "on account of",
        "because of",
        "on top of",
        "due to",
        "out of",
        "except for",
        "outside of",
        "in addition to",
        "owing to",
        "in front of",
        "such as",
        "in place of",
        "thanks to",
        "in spite of",
        "up to",


    );

    if (in_array($value, $arr)) {
        return  "[helix_ComplexPreposition value='" . $value . "']";
    } else {
        return $value;
    }
}




function prepositionsOfTime($value)
{
    $arr = array(
        "at",
        "during",
        "for",
        "in",
        "on",
        "until",
    );

    if (in_array($value, $arr)) {
        return  "[helix_prepositionsOfTime value='" . $value . "']";
    } else {
        return $value;
    }
}

function conjunctions($value)
{
    $arr = array(
        "after",
        "before",
        "since",
        "than",
        "that",
        "though",
        "unless",
        "when",
        "until",
        "where",
        "while",
        "yet",
        "both",
        "either",
        "neither",
    );

    if (in_array($value, $arr)) {
        return  "[helix_conjunction value='" . $value . "']";
    } else {
        return $value;
    }
}



function html($value,$name)
{

?>
    <div class="itemContainer">
        <input type="text" name="'field_name'[]" value="<?php echo  $value ?>"><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"></a>
    </div>
<?php
}
?>