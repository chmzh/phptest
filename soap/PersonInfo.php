<?php
Class PersonInfo
{
    /**
     *    返回姓名
     *    @return string 
     *
     */
    public function getName(){
        $xmlString = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xmlString = "<a>My Name is Chance</a>";
        return $xmlString;
    }
}
?>