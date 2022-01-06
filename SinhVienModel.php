<?php
class SinhVienModel extends DB{
    public function getsv(){
        return "Nguyen Van Teo";
    }
    public function tong($a,$b){
        return $a + $b;
    }
    public function Sinhvien(){
        $sql="select * from sinhvien";
        return mysqli_query($this->con,$sql);
    }
}
?>