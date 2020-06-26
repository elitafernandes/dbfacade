<?php

namespace core\database\interfaces;

/**
 * Db interface acts as a proxy to the query class.
 * All the calls made to query will go through this.
 */
interface Db
{
	/**
	 * Get db connection
	 * 
	 * @return core\database\Connection
	 */
   public static function getConnection();

   /**
	 * Get query bulder
	 * 
	 * @return core\database\Query
	 */
	public static function getQuery();
}