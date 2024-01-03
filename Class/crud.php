<?php

namespace crudClass;

use mysqli;

class crud
{
    private $db_host="localhost",$db_user="root",$db_password="",$db_name="e_commerce";
    private $conn,$isConnect=false;
    public $stored_data=[];
    public function __construct(){
        if (!$this->isConnect){
            $this->conn=new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
            $this->isConnect=true;
            if ($this->conn->connect_error){
                $this->stored_data[] = $this->conn->connect_error;
                return false;
            }
        }else{
            return true;
        }
    }
    public function insert($table,$parameter=[]){
        if ($this->tableExists($table)){
            $table_column=implode(", ",array_keys($parameter));
            $table_values=implode("','",$parameter);
            $sql="INSERT INTO $table($table_column)VALUES('$table_values')";
            if ($this->conn->query($sql)){
                $this->stored_data[] = $this->conn->insert_id;
            }else{
                $this->stored_data[] = $this->conn->error;
                return false;
            }
        }
    }
    public function update($table,$parameter,$where){
        if ($this->tableExists($table)){
            $values=[];
            foreach ($parameter as $key=>$value){
                $values[]="$key = '$value'";
            }
            $parms=implode(', ',$values);
            $sql="UPDATE $table SET $parms WHERE $where";
            if($this->conn->query($sql)){
                $this->stored_data[] = $this->conn->insert_id;
                return true;
            }else{
                $this->stored_data[] = $this->conn->error;
                return false;
            }
        }
    }
    public function delete($table,$where){
        if ($this->tableExists($table)){
            $sql="DELETE FROM $table WHERE $where";
            if($this->conn->query($sql)){
                $this->stored_data[] = $this->conn->insert_id;
                return true;
            }else{
                $this->stored_data[] = $this->conn->error;
                return false;
            }
        }
    }
    public function select($table,$column,$join,$on=null,$where=null,$order=null,$limit=null,$limitNum){
        if ($this->tableExists($table)){
            $sql="SELECT $column FROM $table";
            if ($join!=null){
                $sql.=" INNER JOIN $join ON $on";
            }if ($where!=null){
                $sql.=" WHERE $where";
            }
            if ($order!=null){
                $sql.=" ORDER BY $order";
            }if ($limit!=null){
                if ($limitNum!=null){
                    $page=$limitNum;
                }else{
                    $page=1;
                }
                $start=($page-1) * $limit;
                $sql.=" LIMIT $start,$limit";
            }
//        echo $sql;
            $result=$this->conn->query($sql);
            if($result){
                $this->stored_data=$result->fetch_all(MYSQLI_ASSOC);
                return true;
            }else{
                $this->stored_data[] = $this->conn->error;
                return false;
            }
        }
    }
    public function advancePagination($table,$joinTable=null,$on=null,$where=null,$limit=null,$limitNum=null){
        if ($this->tableExists($table)){
            if ($limit!=null){
                $sql="SELECT * FROM $table";
                if ($joinTable!=null) $sql.=" INNER JOIN $joinTable $on";
                if ($where!=null) $sql.=" WHERE $where";
                $result= $this->conn->query($sql);
                $total_records=$result->num_rows;
                $total_pages=ceil($total_records/$limit);
                $url=basename($_SERVER['PHP_SELF']);
                if ($limitNum!=null){
                    $page=$limitNum;
                }else{ $page=1;}
                $previous_link = '';
                $next_link = '';
                $page_link = '';
                $output='';
                $page_array=[];
                if($total_pages > 4)
                {
                    if($page < 5)
                    {
                        for($count = 1; $count <= 5; $count++)
                        {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                    else
                    {
                        $end_limit = $total_pages - 5;
                        if($page > $end_limit)
                        {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $end_limit; $count <= $total_pages; $count++)
                            {
                                $page_array[] = $count;
                            }
                        }
                        else
                        {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $page - 1; $count <= $page + 1; $count++)
                            {
                                $page_array[] = $count;
                            }
                            $page_array[] = '...';
                            $page_array[] = $total_pages;
                        }
                    }
                }
                else
                {
                    for($count = 1; $count <= $total_pages; $count++)
                    {
                        $page_array[] = $count;
                    }
                }

                for($count = 0; $count < count($page_array); $count++)
                {
                    if($page == $page_array[$count])
                    {
                        $page_link .= "
                                <li class=\"advancePagination_li active\">
                                  <a class=\"advancePagination_anchor\" href='#'>$page_array[$count]</a>
                                </li>
                                ";
                        $previous_id = $page_array[$count] - 1;
                        if($previous_id > 0)
                        {
                            $previous_link = "<li class=\"advancePagination_li previousPagination_li \"><a class=\"advancePagination_anchor\" href='$url?page=$previous_id'>Previous</a></li>";
                        }
                        else
                        {
                            $previous_link = '
                    <li class="advancePagination_li disabled previousPagination_li">
                    <a class="advancePagination_anchor" href="#">Previous</a>
                      </li>
                      ';
                        }
                        $next_id = $page_array[$count] + 1;
                        if($next_id > $total_pages)
                        {
                            $next_link = '
                          <li class="advancePagination_li disabled nextPagination_li">
                            <a class="advancePagination_anchor" href="#">Next</a>
                          </li>
                            ';
                        }
                        else
                        {
                            $next_link = "<li class=\"advancePagination_li nextPagination_li\"><a class=\"advancePagination_anchor\" href='$url?page=$next_id'>Next</a></li>";
                        }
                    }
                    else
                    {
                        if($page_array[$count] == '...')
                        {
                            $page_link .= '
                        <li class="advancePagination_li disabled">
                          <a class="advancePagination_anchor" href="#">...</a>
                      </li>
                      ';
                        }
                        else
                        {

                            $page_link .= "
                          <li class='advancePagination_li'><a class=\"advancePagination_anchor\" href='$url?page=$page_array[$count]'>$page_array[$count]</a></li>
                          ";
                        }
                    }
                }

                $output .="<ul class='advancePagination'>" .$previous_link . $page_link . $next_link ."</ul>";
                echo $output;
            }
        }
    }
    public function advancePaginationJS($table,$joinTable=null,$on=null,$where=null,$limit=null,$limitNum=null){
        if ($this->tableExists($table)){
            if ($limit!=null){
                $sql="SELECT * FROM $table";
                if ($joinTable!=null) $sql.=" INNER JOIN $joinTable $on";
                if ($where!=null) $sql.=" WHERE $where";
                $result= $this->conn->query($sql);
                $total_records=$result->num_rows;
                $total_pages=ceil($total_records/$limit);
                $url=basename($_SERVER['PHP_SELF']);
                if ($limitNum!=null){
                    $page=$limitNum;
                }else{ $page=1;}
                $previous_link = '';
                $next_link = '';
                $page_link = '';
                $output='';
                $page_array=[];
                if($total_pages > 4)
                {
                    if($page < 5)
                    {
                        for($count = 1; $count <= 5; $count++)
                        {
                            $page_array[] = $count;
                        }
                        $page_array[] = '...';
                        $page_array[] = $total_pages;
                    }
                    else
                    {
                        $end_limit = $total_pages - 5;
                        if($page > $end_limit)
                        {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $end_limit; $count <= $total_pages; $count++)
                            {
                                $page_array[] = $count;
                            }
                        }
                        else
                        {
                            $page_array[] = 1;
                            $page_array[] = '...';
                            for($count = $page - 1; $count <= $page + 1; $count++)
                            {
                                $page_array[] = $count;
                            }
                            $page_array[] = '...';
                            $page_array[] = $total_pages;
                        }
                    }
                }
                else
                {
                    for($count = 1; $count <= $total_pages; $count++)
                    {
                        $page_array[] = $count;
                    }
                }

                for($count = 0; $count < count($page_array); $count++)
                {
                    if($page == $page_array[$count])
                    {
                        $page_link .= "
                                <li class=\"advancePagination_li active\">
                                  <a class=\"advancePagination_anchor\" href='#'>$page_array[$count]</a>
                                </li>
                                ";
                        $previous_id = $page_array[$count] - 1;
                        if($previous_id > 0)
                        {
                            $previous_link = "<li class=\"advancePagination_li previousPagination_li \"><a class=\"advancePagination_anchor\" href='$url?page=$previous_id' data-pagination='$previous_id'>Previous</a></li>";
                        }
                        else
                        {
                            $previous_link = '
                    <li class="advancePagination_li disabled previousPagination_li">
                    <a class="advancePagination_anchor" href="#">Previous</a>
                      </li>
                      ';
                        }
                        $next_id = $page_array[$count] + 1;
                        if($next_id > $total_pages)
                        {
                            $next_link = '
                          <li class="advancePagination_li disabled nextPagination_li">
                            <a class="advancePagination_anchor" href="#">Next</a>
                          </li>
                            ';
                        }
                        else
                        {
                            $next_link = "<li class=\"advancePagination_li nextPagination_li\"><a class=\"advancePagination_anchor\" href='$url?page=$next_id' data-pagination='$next_id'>Next</a></li>";
                        }
                    }
                    else
                    {
                        if($page_array[$count] == '...')
                        {
                            $page_link .= '
                        <li class="advancePagination_li disabled">
                          <a class="advancePagination_anchor" href="#">...</a>
                      </li>
                      ';
                        }
                        else
                        {

                            $page_link .= "
                          <li class='advancePagination_li'><a class=\"advancePagination_anchor\" href='$url?page=$page_array[$count]' data-pagination='$page_array[$count]'>$page_array[$count]</a></li>
                          ";
                        }
                    }
                }

                $output .="<ul class='advancePagination'>" .$previous_link . $page_link . $next_link ."</ul>";
                echo $output;
            }
        }
    }
    public function paginationJS($table,$join=null,$on=null,$where=null,$limit=null,$limitNum=null){
        if ($this->tableExists($table)){
            if ($limit!=null){
                $sql="SELECT COUNT(*) FROM $table";
                if ($join!=null)$sql.=" INNER JOIN $join $on";
                if ($where!=null)$sql.=" $where";
                $result=$this->conn->query($sql);
                $total_records=$result->fetch_array()[0];
                $total_pages=ceil($total_records/$limit);
                if ($limitNum!=null){
                    $page=$limitNum;
                }else{
                    $page=1;
                }
                $output="<ul class='pagination'> ";
                if ($page>1){
                    $output.='<li data-pagination="'.($page - 1).'"><a><</a></li>';
                }
                if ($total_records>$limit){
                    for ($i=1;$i<=$total_pages;$i++){
                        if ($page==$i){
                            $class="active";
                        }
                        else{
                            $class='';
                        }
                        $output.="<li><a class='$class' data-pagination='$i'>$i</a></li>";
                    }
                }
                if ($total_pages>$page){
                    $output.="<li><a data-pagination='".($page + 1)."'> > </a></li>";
                }
                $output.='</ul>';
            }
        }
    }
    public function pagination($table,$join=null,$on=null,$where=null,$limit=null,$limitNum=null)
    {
        if ($this->tableExists($table)) {
            if ($limit!=null){
                $sql="SELECT COUNT(*) FROM $table";
                if ($join!=null){
                    $sql.=" INNER JOIN $join $on";
                }if ($where!=null){
                    $sql.=" WHERE $where";
                }
                $query=$this->conn->query($sql);
                $total_records=$query->fetch_array()[0];
                $total_pages=ceil($total_records/$limit);
                $url=basename($_SERVER['PHP_SELF']);
                if ($limitNum!=null){
                    $page=$limitNum;
                }
                else{
                    $page=1;
                }
                $output="<ul class='pagination'>";
                if ($page>1){
                    $output.="<li><a href='?page=".($page-1)."'>←</a></li>";
                }
                if ($total_records>$limit){
                    for ($i=1;$i<=$total_pages;$i++){
                        if ($page==$i){
                            $class="active";
                        }
                        else{
                            $class='';
                        }
                        $output.="<li><a href='$url?page=$i' class='$class'>$i</a></li>";
                    }
                }
                if ($total_pages>$page){
                    $output.="<li><a href='?page=".($page+1)."'>→</a></li>";
                }
                $output.="</ul>";
                echo $output;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function sql($query){
        $result= $this->conn->query($query);
        if($result){
            $this->stored_data=$result->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            $this->stored_data[] = 'Query Failed'.$this->conn->error;
            return false;
        }
    }
    public function search($table,$isCompact=false,$columns=[],$column=null,$search){
        if ($this->tableExists($table)){
                $sql="select * from $table ";
            if ($isCompact){
                $columnNames=implode(", ",$columns);
                $sql.="compact($columnNames) where like '%{$search}%'";
            }else{
            $sql.="where $column like '%{$search}%' ";
            }
            $result=$this->conn->query($sql);
            if ($result){
                $this->stored_data=$result->fetch_all(MYSQLI_ASSOC);
            }else{
                $this->stored_data[]="Query Failed ".$this->conn->error;
            }
        }
    }
    public function show_data(){
        $val=$this->stored_data;
        $this->stored_data=[];
        return $val;
    }
    private function tableExists($table){
        $sql="SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb=$this->conn->query($sql);
        if ($tableInDb){
            if ($tableInDb->num_rows==1){
                return true;
            }else{
                $this->stored_data[] = $table . "Does not exist in this database";
                return false;
            }
        }
    }
//Close Database;
    public function __destruct(){
        if ($this->isConnect){
            if($this->conn->close()){
                $this->isConnect=false;
                return true;
            }
        }else{
            return false;
        }
    }
}