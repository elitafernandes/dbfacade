<?php

namespace core\database\interfaces;

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
	 * table('users')
	 * 
	 * @param string $table - table name
	 */
	public function table($table);

	/**
	 * Inserts a new record into the table
	 * insert(['name' => 'John Smith', 'email' => 'john@gmail.com']);
	 * 
	 * @param array $values - key => value pairs of values. key - column name, value - value
	 * @return bool|int - row id or false
	 */
	public function insert($values = []);

	/**
	 * Update records of a table
	 * update(['name' => 'John Smith', 'email' => 'john@gmail.com'])
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
	 * select('id, name')
	 * 
	 * @param string $columns - comma seperated fieldnames e.g. 'field1, field2, field3'
	 */
	public function select($columns);

	/**
	 * Join clause for the query
	 * join('user_role', 'users.id = user_role.user_id')
	 * 
	 * @param string $tablename
	 * @param string $condition
	 */
    public function join($tablename, $condition);
	
	/**
	 * leftJoin clause for the query
	 * leftJoin('user_role', 'users.id = user_role.user_id')
	 * 
	 * @param string $tablename
	 * @param string $condition
	 */
	public function leftJoin($tablename, $condition);

	/**
	 * RightJoin clause for the query
	 * rightJoin('user_role', 'users.id = user_role.user_id')
	 * 
	 * @param string $tablename
	 * @param string $leftField
	 * @param string $operator
	 * @param string $rightField
	 */
	public function rightJoin($tablename, $leftField, $operator, $rightField);

	/**
	 * Where condition
	 * 1) where('votes', '>', 100)
	 * 2) where('name', 'like', 'T%');
     * 3) where([
     *       ['first_name', '=', 'last_name'],
     *       ['updated_at', '>', 'created_at'],
     *    ]);
     * 4) where('votes', 100); - assumes '='
	 * 
	 * @param string|array $param1
	 * @param string|int $param2
	 * @param string|int|null $param3
	 */
	public function where($param1, $param2, $param3 = null);

	/**
	 * Raw Where condition e.g
	 * whereRaw('votes > 100')
	 * 
	 * @param string $condition
	 */
	public function whereRaw($condition);

	/**
	 * Where condition
	 * 1) where('votes', '>', 100)
	 * 2) where('name', 'like', 'T%');
	 * 3) where([
     *       ['first_name', '=', 'last_name'],
     *       ['updated_at', '>', 'created_at'],
     *    ]);
     * 4) where('votes', 100); - assumes '='
	 * 
	 * @param string|array $param1
	 * @param string|int $param2
	 * @param string|int|null $param3
	 */
	public function orWhere($param1, $param2, $param3);

	/**
	 * Orderby clause e.g
	 * orderBy('fieldname', 'asc');
	 * 
	 * @param string $field
	 * @param string $sort - asc or desc
	 */
	public function orderBy($field, $sort);

	/**
	 * Raw orderby clause e.g
	 * orderByRaw('field1 asc, field2 desc');
	 * 
	 * @param string $clause
	 */
	public function orderByRaw($clause);

	/**
	 * GroupBy clause
	 * groupBy('fieldname');
	 * 
	 * @param string $field
	 */
	public function groupBy($field);

	/**
	 * Raw groupBy clause
	 * groupByRaw('field1, field2');
	 * 
	 * @param string $clause
	 */
	public function groupByRaw($clause);

	/**
	 * Limit clause
	 * limit(10);
	 * 
	 * @param int $limit
	 */
	public function limit($limit);

	/**
	 * Offset clause
	 * offset(10);
	 * 
	 * @param int $offset
	 */
	public function offset($offset);

	/**
	 * Count the number of rowss fetched
	 * 
	 * @return int
	 */
	public function count();

	/**
	 * Returns single row from result
	 * 
	 * @return array an associative array
	 */
	public function one();

	/**
	 * Returns all rows from result
	 * 
	 * @param int $fetchStyle @see $fetch_style PDO
	 * 0 - PDO::FETCH_ASSOC - returns an as associative array
	 * 1 - PDO::FETCH_NUM - returns an array indexed by column number as returned in your result set, starting at column 0
	 * 2 - PDO::FETCH_NAMED - returns an array with the same form as PDO::FETCH_ASSOC, except that if there are multiple columns with the same name, the value referred 
	 * 		to by that key will be an array of all the values in the row that had that column name
	 * 3 - PDO::FETCH_BOTH - returns an array indexed by both column name and 0-indexed column number as returned in your result se
	 * 4 - PDO::FETCH_COLUMN - Fetch all of the values of the first column
	 * 5 - PDO::FETCH_COLUMN|PDO::FETCH_GROUP - Group values by the first column
	 * 
	 * @return array
	 */
	public function get($fetchStyle = 0);
}