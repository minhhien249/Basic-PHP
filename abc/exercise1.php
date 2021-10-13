<?php

//Bài 1 +2
function checkStr($string) {
    $a ='book';
    $b = 'restaurant';
    $string1 = strpos($string,$a);
    $string2 = strpos($string,$b);

    if( $string1 == true && $string2 !== true )
    {
        return true;
    } else if( $string1 !== true && $string2 == true )
    {
        return true;
    }else {
        return false;
    }
}

function checkFile($file_path){
    $file_open = @fopen($file_path, 'r');
    $file = fread( $file_open, filesize($file_path));
    if (file_exists($file)) {
        if (checkStr($file) === true) {
            $result = substr_count($file, '.');
            echo "Chuỗi hợp lệ . Chuỗi bao gồm " . $result . "câu";
        } else {
            echo "Chuỗi không hợp lệ";
        }
    }
    else{
        echo 'file không tồn tại';
    }
    fclose($file_open);
}
$file1 = 'file1.txt';
$file2 = 'file2.txt';

//checkFile($file1); Chuỗi hợp lệ . Chuỗi bao gồm 4câu
//checkFile($file2); Chuỗi không hợp lệ
//
