<?php

//Bài 3  + 4
class ExerciseString
{
    protected $Check1;
    protected $Check2;

    function readFile($file)
    {
        if (file_exists($file) ){
            $file_open = fopen($file,'r');
            $file_path = fread($file_open, filesize($file));
            return $file_path;
        } else {
            echo "file không tồn tại";
        }
    }

    function checkString($file_path)
    {

        $string1 = strpos($file_path, 'book');
        $string2 = strpos($file_path,  'restaurant');

        if($string1 == true && $string2 !== true || $string1 !== true && $string2 == true )
        {
            return true;
        } else {
            return false;
        }

    }

    public function writeFile($file,$file_path)
    {
        $file_open = fopen($file, 'w+');
        fwrite($file_open, $file_path);
        fclose($file_open);

    }

}

    $object1 = new ExerciseString();
    $file_name = 'file1.txt';
    $file = $object1->readFile($file_name);
    $check1 = $object1->checkString($file) ;
    if ($check1 === true){
        unlink('result_file.txt');
        $object1->writeFile('result_file.txt', 'Chuỗi hợp lệ');
    } else {
        $result = substr_count($file,  '.');
        unlink('result_file.txt');
        $object1->writeFile('result_file.txt', 'chuồi không hợp lệ'.'Chuỗi có số câu là'.$result);
    }

    $file_name = 'file2.txt';
    $file = $object1->readFile($file_name);
    $check1 = $object1->checkString($file) ;
    if ($check1 === true){
        unlink('result_file.txt');
        $object1->writeFile('result_file.txt','Chuỗi hợp lệ');
    } else {
    $result = substr_count($file, '.');
        unlink('result_file.txt');
        $object1->writeFile('result_file.txt','chuồi không hợp lệ'.'Chuỗi có số câu là'.$result);
    }
//
