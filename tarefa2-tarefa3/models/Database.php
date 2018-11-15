<?php
/**
 * Created by PhpStorm.
 * User: kaleb
 * Date: 15/11/18
 * Time: 13:11
 */
namespace Models;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    function __construct() {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => MYSQL_DRIVER,
            'port'      => 3306,
            'host' => MYSQL_HOSTNAME,
            'database' => MYSQL_DATABASE,
            'username' => MYSQL_USERNAME,
            'password' => MYSQL_PASSWORD,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],"default");
        // Setup the Eloquent ORM…

        $capsule->bootEloquent();

    }
}