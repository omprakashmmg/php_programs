<?php
//this is query connection file 
include __DIR__.'/DB.php';
class Query extends DB{
	public $sql;
	public function insert($tablename,$formdata=[]){
		$columns=implode(",",array_keys($formdata));
		$values=implode(",",array_values($formdata));
	$SQL="INSERT INTO {$tablename}($columns)values($values);";
$this->sql=$SQL;
return $this;	
	}
	public function getquery(){
		return $this->sql;
        
	}
    public function select($columns='*'){
        $sql="SELECT $columns FROM";
        $this->sql=$sql;
        return $this;
    }
    public function table($tablename){
        $this->sql=$this->sql."$tablename";
        return $this;
    }
    //--------------------------------using where in select--------------------
      public function where($column='',$operator'=',$value=''){
          $count=func_num_args();
          if($count==2){
              $value=$operator;
              
          $column=$column;
          $this->sql=$this->sql. "where $column='$value'";
          }
      }  
    
}
//--------------------------insert-----------------------
$query=new Query();
echo $query->insert('emp',[
'name'=>"omprakash",
'email'=>"omprakashyadav5257@gmail.com",
'password'=>"opyadav@5",
'dob'=>"10-oct-2002"
])->getquery();
//----------------------------------select query----->
echo PHP_EOL;
 echo $query->select('name,email,password,dob')->table('emp')->getquery();
echo PHP_EOL;
 echo $query->select()->table('emp')->getquery();
echo PHP_EOL;
 echo $query->select('name as n,email as c,password as p,dob count(*) as cnt,distinct')->table('emp')->getquery();
//<----------------------end select-------------------------->
echo PHP_EOL;
echo select('name,email,password,dob')->table('emp')->where('email','=','omprakash@gamil.com')->getquery();
?>
	