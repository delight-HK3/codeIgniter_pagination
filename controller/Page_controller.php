<?php
class Page_controller extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->database(); //DB 연결          
        $this->load->model("Page_model"); //모델 main_m 연결
		$this->load->helper(array("url", "date", "form",));
        $this->load->library('pagination'); //pageination 라이브러리 가져오기
        $this->load->library('upload'); //upload 라이브러리 가져오기
    }
	public function index()
	{
		$this->list();
	}
    public function list(){
		$uri_array=$this->uri->uri_to_assoc(3);
		
		$base_url = "/Page_controller/list/page"; //기본 URL
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;

		$config["per_page"] = 5; // 페이지당 표시할 line 수
		$config["total_rows"] = $this->Page_model->rowcount(); // 전체 레코드개수 구하기
		$config["uri_segment"] = $page_segment;	// 페이지가 있는 segment 위치
		$config["base_url"] = $base_url; // 기본 URL

		$this->pagination->initialize($config);//pagination 설정 적용
		
		$data["page"]=$this->uri->segment($page_segment,0); // 시작위치, 없으면 0.
		$data["pagination"] = $this->pagination->create_links(); // 페이지소스 생성

		$start=$data["page"]; // n페이지 : 시작위치
		$limit=$config["per_page"]; // 페이지 당 라인수
		
		$data["list"]=$this->Page_model->getlist($start,$limit);// 해당페이지 자료읽기
       
        $this->load->view("page_view",$data); // 출력
    }
}
