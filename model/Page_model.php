<?php
class Page_model extends CI_Model {
	public function getlist($start,$limit)//정보목록보기
	{
		$sql="select * from <테이블 이름> order by no DESC limit $start,$limit";    
		return $this->db->query($sql)->result();// 쿼리실행, 결과 리턴
	}
	public function rowcount(){
		$sql="select * from <테이블 이름>";
		return $this->db->query($sql)->num_rows();
	}
}
?>
