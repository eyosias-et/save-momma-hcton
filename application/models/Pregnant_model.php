<?php
class Pregnant_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pregnant by ID
     */
    function get_pregnant($ID)
    {
        return $this->db->get_where('pregnant',array('ID'=>$ID))->row_array();
    }
        
    /*
     * Get all pregnant
     */
    function get_all_pregnant()
    {
        $this->db->order_by('ID', 'desc');
        return $this->db->get('pregnant')->result_array();
    }
        
    /*
     * function to add new pregnant
     */
    function add_pregnant($params)
    {
        $this->db->insert('pregnant',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pregnant
     */
    function update_pregnant($ID,$params)
    {
        $this->db->where('ID',$ID);
        return $this->db->update('pregnant',$params);
    }
    
    /*
     * function to delete pregnant
     */
    function delete_pregnant($ID)
    {
        return $this->db->delete('pregnant',array('ID'=>$ID));
    }
}
