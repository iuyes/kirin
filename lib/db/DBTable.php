<?php
class DBTable {
    protected $dao = null;
    protected $tb = '';
    
    public function __construct(){
        $tmp = DB::getInstance();
        $this->dao = $tmp->getMysqli();
    }

    public function query($sql){
        $ret = $this->dao->query($sql);
        if($ret instanceof MySQLi_Result){
            $tmp = array();
            while($row = $ret->fetch_assoc()){
                $tmp[] = $row;
            }
            return $tmp;
        } else {
            return $ret;
        }
    }
    
    public function add($row){
        $tb = $this->tb;
        $row = $this->realEscapeString($row);
        $keys = array_keys($row);
        $values = array_values($row);
    
        $str_keys = implode("`,`", $keys);
        $str_values = implode("','", $values);
    
        $sql = "insert into `{$tb}`(`{$str_keys}`) values('{$str_values}')";
        $re = $this->query($sql);
        return $re;
    }

    public function delete(array $cdt) {
        $tb = $this->tb;  
        $cdt = $this->realEscapeString($cdt);
        $arr_where = array(); 
        foreach ($cdt as $k => $v) {
            $arr_where[] = "`{$k}` = '{$v}'";
        }
        $arr_where = empty($arr_where) ? array('1') : $arr_where;
        $str_where = implode(" and ", $arr_where);
        $sql = "DELETE FROM {$tb} WHERE {$str_where}";
        return $this->query($sql);
    }
    
    /**
     * 获取列表
     * @param array $where
     * @param int $start
     * @param int $length
     * @return Ambigous <MySQLi_Result, multitype:multitype: >
     */
    public function get($where = array(), $start = 0, $length = PHP_INT_MAX, $orderby = false){
        $tb = $this->tb;
        $where = $this->realEscapeString($where);
        $start = $this->realEscapeString($start);
        $length = $this->realEscapeString($length);
        $arr_where = array();
        foreach ($where as $k => $v) {
            $arr_where[] = "`{$k}` = '{$v}'";
        }
        $arr_where = empty($arr_where) ? array('1') : $arr_where;
        $str_where = implode(" and ", $arr_where);
       
        if($orderby != false) {
            $sql = "select * from `{$tb}` where {$str_where} order by {$orderby} limit {$start}, {$length}";
        } else {
            $sql = "select * from `{$tb}` where {$str_where} limit {$start}, {$length}";
        }
        $list = $this->query($sql);
        $sql = "select count(*) as total from `{$tb}` where {$str_where}";
        $re = $this->query($sql);
        $total = $re[0]['total'];
    
        return array('list'=>$list, 'total'=>$total);
    }
    
    public function insertId(){
        return $this->dao->insert_id;
    }
    
    public function simple_delete($key, $value){
        $key = $this->realEscapeString($key);
        $value = $this->realEscapeString($value);
    
        $sql = "delete from {$this->tb} where `{$key}` = '{$value}'";

        return $this->query($sql);
    }
    
    public function update(array $columns, $key, $value){
        $columns = $this->realEscapeString($columns);
        $key = $this->realEscapeString($key);
        $value = $this->realEscapeString($value);
        $tmp = array();
        foreach ($columns as $k => $v) {
            $tmp[] = "`{$k}` = '{$v}'";
        }
        $str_update_columns = implode(' , ', $tmp);
        $sql = "update `{$this->tb}` set {$str_update_columns} where `{$key}` = '{$value}'";
        return $this->query($sql);
    }
    
    /**
     * 调用mysql real_escapte_string方法
     * @param string | array $var
     * @return 传入什么类型，返回什么类型
     */
    protected function realEscapeString($var){
        $tmp = array();
        if(! is_array($var)){
            return $this->dao->real_escape_string($var);
        }
        else{
            foreach ($var as $k => $v) {
                $k = $this->dao->real_escape_string($k);
                $tmp[$k] = $this->realEscapeString($v);
            }
        }
    
        return $tmp;
    }
}
