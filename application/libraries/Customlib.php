<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customlib
{

    private $CI;

    function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->load->database();
    }

    /*
     * Get Enum Value
     */
    function getEnumFieldValues($tableName = null, $field = null)
    {

        // Make a DDL query
        $sql = "SHOW COLUMNS FROM $tableName LIKE " . $this->q($field);
        $query = $this->CI->db->query($sql);
        $data = $query->row();
        if (preg_match("('.*')", $data->Type, $match)) {
            $enumStr = str_replace("'", '', $match[0]);
            $enumValueList = explode(',', $enumStr);
        }

        return $enumValueList;
    }

    function q($str = null)
    {
        return "'" . mysqli_escape_string($this->CI->db->conn_id, $str) . "'";
    }

    function debug($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }

    /*
     * get user info
     */
    function get_users_info($id)
    {
        $this->CI->db->order_by('id', 'desc');
        $this->CI->db->where('id', $id);
        $result = $this->CI->db->get('users')->result_array();
        if (! (array) $result) {
            $fields = $this->CI->db->list_fields('users');
            foreach ($fields as $field) {
                $result[$field] = '';
            }
        }
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /*
     * get user info by email
     */
    function get_users_id_by_email($email)
    {
        $this->CI->db->order_by('id', 'desc');
        $this->CI->db->where('email', $email);
        $result = $this->CI->db->get('users')->result_array();
        if (! (array) $result) {
            $fields = $this->CI->db->list_fields('users');
            foreach ($fields as $field) {
                $result[$field] = '';
            }
        }
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result[0]['id'];
    }

    /**
     * Get all users
     */
    function get_admin_users_id()
    {
        $this->CI->db->order_by('id', 'desc');
        $this->CI->db->where('user_type', 'super');
        $result = $this->CI->db->get('users')->result_array();
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result[0]['id'];
    }

    /*
     * get_currency_id
     */
    function get_currency_id($code)
    {
        $this->CI->db->order_by('id', 'desc');
        $this->CI->db->where('code', $code);
        $result = $this->CI->db->get('currency')->result_array();
        if (! (array) $result) {
            $fields = $this->CI->db->list_fields('currency');
            foreach ($fields as $field) {
                $result[$field] = '';
            }
        }
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result[0]['id'];
    }

    /*
     * get_currency_code
     */
    function get_currency_code($id)
    {
        $this->CI->db->order_by('id', 'desc');
        $this->CI->db->where('id', $id);
        $result = $this->CI->db->get('currency')->result_array();
        if (! (array) $result) {
            $fields = $this->CI->db->list_fields('currency');
            foreach ($fields as $field) {
                $result[$field] = '';
            }
        }
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result[0]['code'];
    }

    /*
     * get_balance
     */
    function get_balance($customer_id)
    {
        if ($customer_id > 0) {
            $this->CI->db->where('customer_id', $customer_id);
        } else if ($customer_id == 'all') {
            $this->CI->db->where(1, 1);
        }
        $this->CI->db->select('sum(transactions.credit-transactions.debit) as total');
        $result = $this->CI->db->get('transactions')->result_array();
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        if (empty($result[0]['total'])) {
            return 0.0;
        }
        return $result[0]['total'];
    }

    /*
     * get_transactions_credit
     */
    function get_transactions_credit($customer_id)
    {
        if ($customer_id > 0) {
            $this->CI->db->where('customer_id', $customer_id);
        } else if ($customer_id == 'all') {
            $this->CI->db->where(1, 1);
        }
        $this->CI->db->select('sum(transactions.credit) as total');
        $result = $this->CI->db->get('transactions')->result_array();
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        if (empty($result[0]['total'])) {
            return 0.0;
        }
        return $result[0]['total'];
    }

    /*
     * get_transactions_debit
     */
    function get_transactions_debit($customer_id)
    {
        if ($customer_id > 0) {
            $this->CI->db->where('customer_id', $customer_id);
        } else if ($customer_id == 'all') {
            $this->CI->db->where(1, 1);
        }
        $this->CI->db->select('sum(transactions.debit) as total');
        $result = $this->CI->db->get('transactions')->result_array();
        $db_error = $this->CI->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        if (empty($result[0]['total'])) {
            return 0.0;
        }
        return $result[0]['total'];
    }

    
}
?>