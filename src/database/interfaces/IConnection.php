<?php

namespace core\database;

/**
 * interface IConnection
 * 
 * It manages the database connections
 */
interface IConnection
{
	/**
	 * Get database connection
	 * 
	 * @return PDO Connection Object
	 */
	public function get();

	/**
	 * Connect to database with the credentials provided
	 * 
	 * @param string $dsn
	 * @param string $username
	 * @param string $password
	 * @param array $options
	 */
	public function connect($dsn = null, $username = null, $password = null, $options = []);
}