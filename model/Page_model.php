<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model {
	public function getlist($start,$limit)//정보목록보기
	{
		$sql="select * from pagemake order by no DESC limit $start,$limit";    
		return $this->db->query($sql)->result();// 쿼리실행, 결과 리턴
	}
	public function rowcount(){ // 해당하는 라인수 가져오기
		$sql="select * from pagemake"; // 쿼리실행
		return $this->db->query($sql)->num_rows(); // 해당하는 행의 갯수를 리턴
	}
}
?>
