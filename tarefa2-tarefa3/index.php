<?php
/**
 * Created by PhpStorm.
 * User: kaleb
 * Date: 15/11/18
 * Time: 12:57
 */
require 'config.php';
require 'vendor/autoload.php';
use Models\Database;
new Database();

require 'helpers.php';

//valida existencia das datas
if( (empty($startDate = request_var("start_date"))  or empty($endDate = request_var("end_date")))
    or !(valida_data_yyyy_mm_dd($startDate) and valida_data_yyyy_mm_dd($endDate))){

    exit(json_encode([
        'ok'=>false,
        'message'=>'incorrect dates: the dates must be in the format yyyy-mm-dd and 
        the start date must be less than the end date',
    ]));
}

if(strtotime($startDate) > strtotime($endDate)){
    exit(json_encode([
        'ok'=>false,
        'message'=>'date start incorrect'
    ]));
}
$startDate = date("Y-m-d", strtotime($startDate));
$endDate = date("Y-m-d", strtotime($endDate));

$apiPmweb = new \Api\Pmweb_Orders_Stats();
$apiPmweb->setStartDate($startDate);
$apiPmweb->setEndDate($endDate);

exit(json_encode(["orders"=>[
            'count'=>$apiPmweb->getOrdersCount(),
            'revenue'=>$apiPmweb->getOrdersRevenue(),
            'quantity'=>$apiPmweb->getOrdersQuantity(),
            'averageRetailPrice'=>$apiPmweb->getOrdersRetailPrice(),
            'AverageOrderValue'=>$apiPmweb->getOrdersAverageOrderValue()]
    ]));
