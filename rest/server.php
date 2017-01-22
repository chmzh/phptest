<?php
include 'RestUtils.php';
$data = RestUtils::processRequest();

switch($data->getMethod()){
    case 'get':
        // retrieve a list of users
        break;
    case 'post':
//         $user = new User();
//         $user->setFirstName($data->getData()->first_name);  // just for example, this should be done cleaner
//         // and so on...
//         $user->save();
        break;
        // etc, etc, etc...
}
