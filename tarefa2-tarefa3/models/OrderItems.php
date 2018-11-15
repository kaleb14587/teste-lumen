<?php
/**
 * Created by PhpStorm.
 * User: kaleb
 * Date: 15/11/18
 * Time: 13:17
 */

namespace Models;


use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table ="order_items";
    public $timestamps = false;
}