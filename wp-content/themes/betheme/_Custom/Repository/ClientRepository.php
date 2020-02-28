<?php
namespace Repository;


class ClientRepository
{
    private $db;


    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        global $wpdb;
        $this->db = $wpdb;
    }

    public function insertApplication($table, $post)
    {
        $this->db->insert($table, $post);
    }

    public function updateApplication($table,$post)
    {
    	$this->db->update($table, $post,['id'=>$post['id']]);
    }

    public function getById($table,$id){
        $sql = sprintf(
            "SELECT * FROM %s WHERE `id`='%s'",
            $table,
            $id
        );
        return $this->db->get_results($sql);
    }

    public function checkExistence($key, $value, $table){
        $sql = sprintf(
            "SELECT * FROM %s WHERE `%s`='%s'",
            $table,
            $key,
            $value
        );
        $result = $this->db->get_results($sql);
        return ($result) ? true : false ;
    }
    /**
     * Retrieve customer’s data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public function getElement($table,$per_page = 10, $page_number = 1, $query)
    {
    	if(isset($query['page']) && $query['page']=="ladies_applications"){
		    if(isset($query['querySearch']) && $query['querySearch']!=""){
			    $sql = sprintf(
				    "SELECT * FROM %s WHERE (`id` LIKE '%s' OR `name` LIKE '%s' OR `lname` LIKE '%s' OR `fname` LIKE '%s') AND (`date_of_birth` BETWEEN %d AND %d)",
				    $table,
				    $query['querySearch'],
				    $query['querySearch'],
				    $query['querySearch'],
				    $query['querySearch'],
				    time()-($query['ladiesMaxAge']*31556926),
				    time()-($query['ladiesMinAge']*31556926)
			    );
		    }elseif (isset($query['ladiesMaxAge'])&& $query['ladiesMaxAge']!=""){
			    $sql = sprintf(
				    "SELECT * FROM %s WHERE `date_of_birth` BETWEEN %d AND %d",
				    $table,

				    time()-($query['ladiesMaxAge']*31556926),
				    time()-($query['ladiesMinAge']*31556926)
			    );
		    }else{
			    $sql = sprintf(
				    "SELECT * FROM %s",
				    $table
			    );
		    }
	    }elseif (isset($query['page']) && $query['page']=="men_applications"){
		    if(isset($query['querySearch']) && $query['querySearch']!=""){
			    $sql = sprintf(
				    "SELECT * FROM %s WHERE`id` LIKE '%s' OR `name` LIKE '%s'",
				    $table,
				    $query['querySearch'],
				    $query['querySearch']
			    );
		    }else{
			    $sql = sprintf(
				    "SELECT * FROM %s",
				    $table
			    );
		    }
	    }


        if (!empty($_REQUEST['orderby'])) {
            $sql .= ' ORDER BY ' . esc_sql($_REQUEST['orderby']);
            $sql .= !empty($_REQUEST['order']) ? ' ' . esc_sql($_REQUEST['order']) : ' ASC';
        }
        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;
        $result = $this->db->get_results($sql, 'ARRAY_A');
        return $result;
    }

    /**
     * Retrieve customer’s data from the database
     */
    public function getLadiesForGallery()
    {
        $sql = "SELECT * FROM wp_ladies";
        return $this->db->get_results($sql, 'ARRAY_A');
    }
    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public function deleteElement($table,$id)
    {
        $this->db->delete(
	        $table,
            ['ID' => $id],
            ['%d']
        );
    }

    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public function recordCount($table,$query="")
    {
    	if(isset($query['page']) && $query['page']=="ladies_applications")
	    {
		    if(isset($query['querySearch']) && $query['querySearch']!=""){
			    $sql = sprintf(
				    "SELECT COUNT(*) FROM %s WHERE (`id` LIKE '%s' OR `name` LIKE '%s' OR `lname` LIKE '%s' OR `fname` LIKE '%s') AND (`date_of_birth` BETWEEN %d AND %d)",
				    $table,
				    $query['querySearch'],
				    $query['querySearch'],
				    $query['querySearch'],
				    $query['querySearch'],
				    time()-($query['ladiesMaxAge']*31556926),
				    time()-($query['ladiesMinAge']*31556926)
			    );
		    }elseif (isset($query['ladiesMaxAge'])&& $query['ladiesMaxAge']!=""){
			    $sql = sprintf(
				    "SELECT COUNT(*) FROM %s WHERE `date_of_birth` BETWEEN %d AND %d",
				    $table,
				    time()-($query['ladiesMaxAge']*31556926),
				    time()-($query['ladiesMinAge']*31556926)
			    );
		    }else {
			    $sql = sprintf(
				    "SELECT COUNT(*) FROM %s",
				    $table
			    );
		    }
	    }elseif (isset($query['page']) && $query['page']=="men_applications")
	    {
		    if(isset($query['querySearch']) && $query['querySearch']!=""){
			    $sql = sprintf(
				    "SELECT COUNT(*) FROM %s WHERE `id` LIKE '%s' OR `name` LIKE '%s'",
				    $table,
				    $query['querySearch'],
				    $query['querySearch']
			    );
		    }else {
			    $sql = sprintf(
				    "SELECT COUNT(*) FROM %s",
				    $table
			    );
		    }
	    }


        return $this->db->get_var($sql);
    }

    public function updatePathToPhotos($table, $id, $data){
        $this->db->update($table, $data, ['id'=>$id]);
    }

    public function delete($table, $where, $where_format = null)
    {
        if (!is_array($where)) {
            return false;
        }
        $where = $this->process_fields($table, $where, $where_format);
        if (false === $where) {
            return false;
        }
        $conditions = array();
        $values = array();
        foreach ($where as $field => $value) {
            if (is_null($value['value'])) {
                $conditions[] = "`$field` IS NULL";
                continue;
            }

            $conditions[] = "`$field` = " . $value['format'];
            $values[] = $value['value'];
        }
        $conditions = implode(' AND ', $conditions);
        $sql = "DELETE FROM `$table` WHERE $conditions";
        $this->check_current_query = false;
        return $this->query($this->prepare($sql, $values));
    }

    public function minAge($table)
    {
	    $sql = sprintf(
		    "SELECT `date_of_birth` FROM %s WHERE `date_of_birth` = (SELECT MIN(date_of_birth) FROM %s)",
		    $table,
		    $table
	    );
	    return $this->db->get_results($sql);
    }
	public function maxAge($table)
	{
		$sql = sprintf(
			"SELECT `date_of_birth` FROM %s WHERE `date_of_birth` = (SELECT MAX(date_of_birth) FROM %s)",
			$table,
			$table
		);

		return $this->db->get_results($sql);
	}

}
