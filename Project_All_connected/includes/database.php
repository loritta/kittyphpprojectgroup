<?php

/*
 * database.php
 * Database class file
 *
 * @version 1.2 2018-04-19
 * @package Smithside Auctions
 * @copyright (c) 2018  Larisa Sabalin
 * @license  GNU General Public License
 * since Realease 1.0
 *
 * @author 1796122
 */

class Database {
    //create properties for the user name, password,
    //database name, and hostname

    /**
     * User Name to contact cats database
     * @var sting $user_name
     */
    //define('USERNAME',
    private static $user_name = "cp4837_larisa";

    /**
     * Password to contact cats database
     * @var sting $user_password
     */
    private static $user_password = 'Eevee34*';

    /**
     * Database name to contact cats database
     * @var sting $database_name
     */
    private static $database_name = 'cp4837_larisaDB';

    /**
     * Hostname to contact cat database
     * @var sting $host_name
     */
    private static $host_name = 'localhost';

    /**
     * Database connection to hold the actual connection
     * @var Mysqli $connection
     */
    private static $connection = null;

    /**
     * Get the database connection
     * getConnection function
     * @return Mysqli
     */
    /*     * because the methode is static method, use self::$property_name
     * construction to refer to the property
     */
    public static function getConnection() {
        if (!self::$connection) {
            self::$connection = new mysqli(self::$host_name, self::$user_name, self::$user_password, self::$database_name);
            //if there ys an errir, print the error and end the 
            if (self::$connection->connect_error) {
                die('Connect error: ' . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
    
    /**
     * Constructor
     */
private function __constructor(){
    
}
}

