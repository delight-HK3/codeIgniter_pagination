<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

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
		$this->list(); // 제일먼저 list()함수를 실행
	}
    public function list(){
		$uri_array=$this->uri->uri_to_assoc(3);
		
		$base_url = "/Page_controller/list/page"; //기본 URL
		$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
		 // 이 코드는 페이지를 url에 표시하기위해 제작, 검색을 안하면 4, 검색하면 6이나옴
        // strpos($base_url,"page")은 어느부분 부터 page가 나오는지 확인하는 부분
        // substr($base_url,0,strpos($base_url,"page"))은 처음부터 시작하여 "page"문자열이 나오는 부분까지 문자열 잘라서 저장하는 부분
        // substr_count("/Page_controller/lists/","/")+1; 정리하면 이렇게 되는데 결국 문자열에서 "/"의 갯수를 구하고 거기에 1을 더하라는의미

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
