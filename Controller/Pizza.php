<?php

class Pizza extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
	}
	function index()
	{
		$this->load->model('pizza_model');
		$data=$this->pizza_model->genel();
		$data['orders'] = $this->pizza_model->get_all_orders(); //bütün siparişler tablo halinde hazır geliyor.
		$this->load->view('pizza_view',$data);
	}
	function order($id = 0)
	{
		$this->load->helper('form');

		$this->load->model('pizza_model');

		if($this->input->post('mysubmit'))
		{
			if($this->input->post('id')){//id nin 0 dan farklı olması TRUE kabul edildiği için düzenleme moduna girecek
				$this->pizza_model->order_update();
			}
			else{//eğer id=0 ise yeni sipariş moduna girecek
				$this->pizza_model->insert_new_entry();
			}
		}
		$data=$this->pizza_model->genel();
		if((int)$id > 0){// id sıfırdan büyükse, mevcut siparişi düzenleyeceğimiz anlamına geliyor.

			$query = $this->pizza_model->get_specific_order($id);//model dosyamızdaki fonksiyonumuzu çağırıyoruz.
			$data['temiz_id']['value'] = $query['id'];//tablodan verileri çekip arraya atıyoruz.
			$data['temiz_isim']['value'] = $query['name'];
			$data['temiz_pizza']['value'] = $query['pizza'];
			$data['temiz_tip']['value'] = $query['type'];
			$data['temiz_adet']['value'] = $query['unit'];
			$data['temiz_adres']['value'] = $query['address'];
			if($query['thin_edge']=='yes'){
			$data['temiz_kenar']['checked'] = TRUE;
			}else{
			$data['temiz_kenar']['checked'] = FALSE;
			}

	}


		$this->load->view('pizza_order',$data);
	}
	function del($id){
		$this->load->model('pizza_model');//model dosyamızı yükledik.

		if((int)$id > 0){//eğer id sıfırdan büyükse ilgili datayı silmek için delete fonksiyonunu id ile çağırıyoruz.
			$this->pizza_model->delete($id);
		}

		$data = $this->pizza_model->genel();//sonra kalan siparişleri ekrana yazabilmek için index() fonksiyonunda yaptığımız işlemleri yapıyoruz.
		$data['orders'] = $this->pizza_model->get_all_orders();

		$this->load->view('pizza_view',$data);
	}
}
?>
