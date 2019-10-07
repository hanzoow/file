<?php
class Book
{
    #Begin properties
    var $id;
    var $price;
    var $title;
    var $author;
    var $year;
    #end properties

    #Construct function

    function __construct($id, $title,$price, $author, $year)
    {
        $this->id = $id;
        $this->price = $price;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    #Member function
    function display()
    {
        echo "Id: " . $this->id . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
    #Mock data
    /*
     lay toan bo cac cuon sach co trong csdl
    */
    static function getList(){
        $listBook = array();
        for($i=1;$i<=10;$i++)
        array_push($listBook,new Book(1,"OOP in PHP",5,"Vu",2019));
        array_push($listBook,new Book(1,"OOP in Java",4,"Hoa",2018));
        array_push($listBook,new Book(1,"OOP in C++",8,"Hien",2017));
        array_push($listBook,new Book(1,"OOP in Python",9,"Hoang",2016));
        array_push($listBook,new Book(1,"OOP in Dart",10,"Hack",2015));
        
        return $listBook;
    }
    /*
        lay du lieu tu file
    */
    static function getListFromFile(){
        $arraData = file("data/book.txt");
        $listBook = array();
        foreach ($arraData as $key => $value) {
            $arrItems = explode("#",$value);
            $book = new Book($arrItems[0], $arrItems[1], $arrItems[2], $arrItems[3],$arrItems[4]);
            array_push($listBook,$book);
        };
        return $listBook;
    }
    static function delete($id){
        $data = Book::getList();
        $data_res = [];
        foreach($data as $key => $value){
            if($value->id != $id){
                $data_res[] = $value;
            }
        }
        $text_write = "";
        $myfile = fopen("data/book.txt", "w") or die("Unable to open file!");
        foreach($data_res as $key => $value){
            $text_write.= $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
        }
        fwrite($myfile, $text_write);
        fclose($myfile);
    }
    static function edit($id,$title,$price,$author,$year){
        $data = Book::getList();
        $textWrite = "";
        $file = fopen("data/book.txt","w") or die ("Loi mo file!");
        foreach ($data as $key => $value) {
            if($value->id == $id){
                $textWrite .= $id."#".$title."#".$price."#".$author."#".$year."\n";
            }else{
                $textWrite .= $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
            }
        }
        fwrite($file,$textWrite);
        fclose($file);
    }

}
