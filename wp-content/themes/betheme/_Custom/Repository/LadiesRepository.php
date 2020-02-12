<?php


namespace Repository;


class LadiesRepository
{
    private $db;

    const TABLE_LADIES = 'wp_ladies';

    public function __construct()
    {
        require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");
        global $wpdb;
        $this->db = $wpdb;
    }

    public function insertLadiesApplication($post)
    {
        $this->db->insert(self::TABLE_LADIES, $post);
    }

    public function activateLady($post)
    {
        $updated = $this->db->update($table, $data, $where);
    }

    public function checkExistence($key, $value){
        $sql = sprintf(
            "SELECT * FROM %s WHERE `%s`='%s'",
            self::TABLE_LADIES,
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
    public function getLadies($per_page = 10, $page_number = 1)
    {
        $sql = sprintf(
            "SELECT * FROM %s",
            self::TABLE_LADIES
        );
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
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public function deleteLady($id)
    {
        $this->db->delete(
            self::TABLE_LADIES,
            ['ID' => $id],
            ['%d']
        );
    }

    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public function recordCount()
    {

        $sql = sprintf(
            "SELECT COUNT(*) FROM %s",
            self::TABLE_LADIES
        );

        return $this->db->get_var($sql);
    }

    public function updatePathToPhotos($id, $data){
        $this->db->update(self::TABLE_LADIES, $data, ['id'=>$id]);
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
}
