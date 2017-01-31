<?php
/** no direct access **/
defined('_WBMPLEXEC_') or die();

/**
 * Webilia MPL DataBase class.
 * @author Webilia <info@webilia.com>
 */
class WBMPL_db extends WBMPL_base
{
    /**
     * Constructor method
     * @author Webilia <info@webilia.com>
     */
    public function __construct()
    {
    }
    
    /**
     * Runs any query
     * @author Webilia <info@webilia.com>
     * @param string $query
     * @param string $type
     * @return mixed
     */
	public function q($query, $type = '')
	{
		// Apply DB prefix
		$query = $this->_prefix($query);
		
		// Converts query type to lowercase
		$type = strtolower($type);
		
		// Calls select function if query type is select
		if($type == 'select') return $this->select($query);
        
		// Get WordPress DB object
		$database = $this->get_DBO();
		
        // If query type is insert, return the insert id
		if($type == 'insert')
		{
			$database->query($query);
			return $database->insert_id;
		}
		
        // Run the query and return the result
		return $database->query($query);
		
	}
    
    /**
     * Returns records count of a query
     * @author Webilia <info@webilia.com>
     * @param string $query
     * @param string $table
     * @return int
     */
	public function num($query, $table = '')
	{
        // If table is filled, generate the query
		if(trim($table) != '')
		{
			$query = "SELECT COUNT(*) FROM `#__$table`";
		}
		
		// Apply DB prefix
		$query = $this->_prefix($query);
		
		// Get WordPress Db object
		$database = $this->get_DBO();
		return $database->get_var($query);
	}
    
    /**
     * Selects records from Database
     * @author Webilia <info@webilia.com>
     * @param string $query
     * @param string $result
     * @return mixed
     */
	public function select($query, $result = 'loadObjectList')
	{
		// Apply DB prefix
		$query = $this->_prefix($query);
		
		// Get WordPress DB object
		$database = $this->get_DBO();
		
		if($result == 'loadObjectList') return $database->get_results($query, OBJECT_K);
		elseif($result == 'loadObject') return $database->get_row($query, OBJECT);
		elseif($result == 'loadAssocList') return $database->get_results($query, ARRAY_A);
		elseif($result == 'loadAssoc') return $database->get_row($query, ARRAY_A);
		elseif($result == 'loadResult') return $database->get_var($query);
		else return $database->get_results($query, OBJECT_K);
	}
    
    /**
     * Get a record from Database
     * @author Webilia <info@webilia.com>
     * @param string|array $selects
     * @param string $table
     * @param string $field
     * @param string $value
     * @param boolean $return_object
     * @param string $condition
     * @return mixed
     */
	public function get($selects, $table, $field, $value, $return_object = true, $condition = '')
	{
		$fields = '';
		
		if(is_array($selects))
		{
			foreach($selects as $select) $fields .= '`'.$select.'`,';
			$fields = trim($fields, ' ,');
		}
		else
		{
			$fields = $selects;
		}
		
        // Generate the condition
		if(trim($condition) == '') $condition = "`$field`='$value'";
        
        // Generate the query
		$query = "SELECT $fields FROM `#__$table` WHERE $condition";
		
		// Apply DB prefix
		$query = $this->_prefix($query);
		
		// Get WordPress DB object
		$database = $this->get_DBO();
		
		if($selects != '*' and !is_array($selects)) return $database->get_var($query);
		elseif($return_object)
		{
			return $database->get_row($query);
		}
		elseif(!$return_object)
		{
			return $database->get_row($query, ARRAY_A);
		}
		else
		{
			return $database->get_row($query);
		}
	}
	
    /**
     * Apply WordPress table prefix on queries
     * @author Webilia <info@webilia.com>
     * @param string $query
     * @return string
     */
	public function _prefix($query)
	{
        // Get WordPress DB object
		$wpdb = $this->get_DBO();
		return str_replace('#__', $wpdb->prefix, $query);
	}
    
    /**
     * Returns WordPres DB Object
     * @author Webilia <info@webilia.com>
     * @global object $wpdb
     * @return object
     */
	public function get_DBO()
	{
		global $wpdb;
		return $wpdb;
	}
}