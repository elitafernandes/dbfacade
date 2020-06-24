<?php

namespace core\database;

/**
 * interface IDb
 * 
 * It manages the queries similar to active record
 * using chained method system
 */
interface IQuery
{

	/**
	 * Executes raw sql using placeholders or named parameters
	 * e.g. named parameters
	 * 'SELECT name, colour, calories FROM fruit WHERE calories < :calories AND colour = :colour'
	 * 
	 * e.g. placeholders
	 * 'SELECT name, colour, calories FROM fruit WHERE calories < ? AND colour = ?'
	 * 
	 * @param string raw sql query
	 */
	public function rawSql($sql, $params = []);

	/**
	 * Set table name
	 * 
	 * @param string $table
	 */
	public function table($table);

	/**
	 * Inserts a new record into the table
	 * 
	 * @param array $values - key => value pairs of values. key - column name, value - value
	 * @return bool|int - row id or false
	 */
	public function insert($values = []);

	/**
	 * Update records of a table
	 * 
	 * @param array $values - key => value pairs of values. key - column name, value - value
	 */
	public function update($values = []);

	/**
	 * Delete records from a table
	 */
	public function delete();

	/**
	 * Select fields from a table
	 * 
	 * @param string $columns
	 */
	public function select($columns);

	/**
	 * Join clause for the query
	 * 
	 * @param string $tablename
	 * @param string $leftField
	 * @param string $operator
	 * @param string $rightField
	 */
    public function join($tablename, $leftField, $operator, $rightField);
	
	/**
	 * leftJoin clause for the query
	 * 
	 * @param string $tablename
	 * @param string $leftField
	 * @param string $operator
	 * @param string $rightField
	 */
	public function leftJoin($tablename, $leftField, $operator, $rightField);

	/**
	 * rightJoin clause for the query
	 * 
	 * @param string $tablename
	 * @param string $leftField
	 * @param string $operator
	 * @param string $rightField
	 */
	public function rightJoin($tablename, $leftField, $operator, $rightField);

	/**
	 * Where condition
	 * 
	 * @param string|array $param1
	 * @param string|int $param2
	 * @param string|int|null $param3
	 */
	public function where($param1, $param2 = null, $param3 = null);

	/**
	 * Where condition
	 * 
	 * @param string|array $param1
	 * @param string|int $param2
	 * @param string|int|null $param3
	 */
	public function orWhere($param1, $param2, $param3);

	/**
	 * Orderby clause
	 * 
	 * @param array $order - [fieldname => ASC, fieldname => DESC]
	 */
	public function orderBy($order);

	/**
	 * Orderby clause
	 * 
	 * @param string $group - [fieldname => ASC, fieldname => DESC]
	 */
	public function groupBy();

	// public function limit();

	// public function offset();

	// public function count();

	/**
	 * Returns single row from result
	 * 
	 * @return array
	 */
	public function one();

	/**
	 * Returns all rows fromresult
	 * 
	 * @return array
	 */
	public function get();
}