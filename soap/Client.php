<?php

class SoapClientNew extends SoapClient
{
    public function __doRequest($request, $location, $action, $version, $one_way = 0)
    {
        $request = parent::__doRequest($request, $location, $action, $version, $one_way);
         
        $start = strpos($request, '<soap');//根据实际情况做处理。。。，如果是<?xml开头，改成<?xml
        $end = strrpos($request, '>');
        return substr($request, $start, $end-$start+1);
    }
}

  try{
      //wsdl方式调用web service
      //wsdl方式中由于wsdl文件写定了，如果发生添加删除函数等操作改动，不会反应到wsdl，相对non-wsdl方式
      //来说不够灵活
      //$soap = new SoapClient("http://localhost/Test/MyService/PersonInfo.wsdl");
      
      //non-wsdl方式调用web service    
      //在non-wsdl方式中option location系必须提供的,而服务端的location是选择性的，可以不提供
     $soap = new SoapClient(null,array('location'=>"http://localhost/test/soap/Server.php",'uri'=>'abcd','trace'=>true));
     var_dump($soap->__getFunctions());
     //两种调用方式，直接调用方法，和用__soapCall简接调用
     //$result1 = $soap->getName();
     //$result2 = $soap->__soapCall("getName",array());
     //echo $result1."<br/>";
     //echo $result2;
     
 }catch(SoapFault $e){
     echo $e->getMessage();
 }catch(Exception $e){
     echo $e->getMessage();
 }
 
 ?>