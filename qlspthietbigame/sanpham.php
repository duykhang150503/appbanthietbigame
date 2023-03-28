<?php
require 'dbconnect.php';
// $cd =  $_GET['machude'];

class SANPHAM{
    function __construct($masp,$maloai,$tensp,$chitietsp,$danhgiasp,$dongiasp,$hinhsp){
        $this->masp = $masp;
        $this->maloai = $maloai;
        $this->tensp = $tensp;
        $this->chitietsp = $chitietsp;
        $this->danhgiasp = $danhgiasp;
        $this->dongiasp = $dongiasp;
        $this->hinhsp =$hinhsp;
    }
}
// if($cd == null){
$query = "select * from sanpham";
// }
// else
// {
//     $query = "select * from Sach where machude=$cd";
// }
$data = mysqli_query($connect,$query);
$arraylist = array();

while($row=mysqli_fetch_assoc($data))
{
    array_push($arraylist,new SANPHAM($row["masp"],$row["maloai"],$row["tensp"],$row["chitietsp"],$row["danhgiasp"],$row["dongiasp"],$row["hinhsp"]));
}
json_encode($arraylist);

header("Content-type:application/json");
echo json_encode($arraylist,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

?>