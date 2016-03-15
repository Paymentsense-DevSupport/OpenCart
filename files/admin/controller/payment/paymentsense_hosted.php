<?php 
class ControllerPaymentPaymentSenseHosted extends Controller {
	private $error = array(); 

	
	public function install() {
       $this->db->query("CREATE TABLE `paymentsense` (
		`cs_id` int(11) NOT NULL AUTO_INCREMENT,
		`cs_order_id` int(11) DEFAULT NULL,
		`cs_trans_gbp` float DEFAULT NULL,
		`cs_message` varchar(45) DEFAULT NULL,
		`cs_cross_ref` varchar(45) DEFAULT NULL,
		`cs_trans_date` datetime DEFAULT NULL,
		PRIMARY KEY (`cs_id`))");
   }
	public function uninstall() {
		$this->db->query("DROP TABLE `paymentsense`");
	}
	
	public function index() {
		$this->load->language('payment/paymentsense_hosted');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {			
			$this->model_setting_setting->editSetting('paymentsense_hosted', $this->request->post);				
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}		

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		
		$data['text_none'] = $this->language->get('text_none');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_sale'] = $this->language->get('text_sale');
		$data['text_preauth'] = $this->language->get('text_preauth');
				
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_failed_order_status'] = $this->language->get('entry_failed_order_status');
		$data['entry_mid'] = $this->language->get('entry_mid');
		$data['entry_pass'] = $this->language->get('entry_pass');
		$data['entry_key'] = $this->language->get('entry_key');
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_type'] = $this->language->get('entry_type');
		
		$data['entry_CV2Mandatory'] = $this->language->get('entry_CV2Mandatory');
		$data['entry_Address1Mandatory'] = $this->language->get('entry_Address1Mandatory');
		$data['entry_CityMandatory'] = $this->language->get('entry_CityMandatory');
		$data['entry_PostCodeMandatory'] = $this->language->get('entry_PostCodeMandatory');
		$data['entry_StateMandatory'] = $this->language->get('entry_StateMandatory');
		$data['entry_CountryMandatory'] = $this->language->get('entry_CountryMandatory');		
		
		$data['help_mid'] = $this->language->get('help_mid');
		$data['help_pass'] = $this->language->get('help_pass');
		$data['help_key'] = $this->language->get('help_key');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');

		if (isset($this->error['warning']))
		{
		      $data['error_warning'] = $this->error['warning'];
		} 
		else 
		{ 
		    $data['error_warning'] = ''; 
		}
		if (isset($this->error['mid'])) 
		{
		    $data['error_mid'] = $this->error['mid'];
		} 
		else 
		{ 
		    $data['error_mid'] = ''; 
		}
		if (isset($this->error['pass'])) 
		{
		    $data['error_pass'] = $this->error['pass'];
		} 
		else 
		{ 
		    $data['error_pass'] = ''; 
		}
		if (isset($this->error['key'])) 
		{
		    $data['error_key'] = $this->error['key'];
		} 
		else 
		{ 
		    $data['error_key'] = ''; 
		}

		$data['breadcrumbs'] = array();

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/paymentsense_hosted', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
				
		$data['action'] = $this->url->link('payment/paymentsense_hosted', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');
		
		if (isset($this->request->post['paymentsense_hosted_status'])) 
		{
			$data['paymentsense_hosted_status'] = $this->request->post['paymentsense_hosted_status'];
		} 
		else 
		{
			$data['paymentsense_hosted_status'] = $this->config->get('paymentsense_hosted_status');
		}
		
		if (isset($this->request->post['paymentsense_hosted_geo_zone_id'])) 
		{
			$data['paymentsense_hosted_geo_zone_id'] = $this->request->post['paymentsense_hosted_geo_zone_id'];
		} 
		else 
		{
			$data['paymentsense_hosted_geo_zone_id'] = $this->config->get('paymentsense_hosted_geo_zone_id'); 
		}

		if (isset($this->request->post['paymentsense_hosted_order_status_id'])) 
		{
			$data['paymentsense_hosted_order_status_id'] = $this->request->post['paymentsense_hosted_order_status_id'];
		} 
		else 
		{
			$data['paymentsense_hosted_order_status_id'] = $this->config->get('paymentsense_hosted_order_status_id'); 
		} 
		
		if (isset($this->request->post['paymentsense_hosted_failed_order_status_id'])) 
		{
			$data['paymentsense_hosted_failed_order_status_id'] = $this->request->post['paymentsense_hosted_failed_order_status_id'];
		} 
		else 
		{
			$data['paymentsense_hosted_failed_order_status_id'] = $this->config->get('paymentsense_hosted_failed_order_status_id'); 
		}

		$this->load->model('localisation/order_status');
		
		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['paymentsense_hosted_mid'])) 
		{
			$data['paymentsense_hosted_mid'] = $this->request->post['paymentsense_hosted_mid'];
		} 
		else 
		{
			$data['paymentsense_hosted_mid'] = $this->config->get('paymentsense_hosted_mid');
		}
		
		if (isset($this->request->post['paymentsense_hosted_pass'])) 
		{
			$data['paymentsense_hosted_pass'] = $this->request->post['paymentsense_hosted_pass'];
		} 
		else 
		{
			$data['paymentsense_hosted_pass'] = $this->config->get('paymentsense_hosted_pass');
		}
		
		if (isset($this->request->post['paymentsense_hosted_key'])) 
		{
			$data['paymentsense_hosted_key'] = $this->request->post['paymentsense_hosted_key'];
		} 
		else 
		{
			$data['paymentsense_hosted_key'] = $this->config->get('paymentsense_hosted_key');
		}
		
		if (isset($this->request->post['paymentsense_hosted_test'])) 
		{
			$data['paymentsense_hosted_test'] = $this->request->post['paymentsense_hosted_test'];
		} 
		else 
		{
			$data['paymentsense_hosted_test'] = $this->config->get('paymentsense_hosted_test');
		}
		
		if (isset($this->request->post['paymentsense_hosted_type'])) 
		{
			$data['paymentsense_hosted_type'] = $this->request->post['paymentsense_hosted_type'];
		} 
		else 
		{
			$data['paymentsense_hosted_type'] = $this->config->get('paymentsense_hosted_type');
		}
		
		if (isset($this->request->post['paymentsense_hosted_sort_order'])) 
		{
			$data['paymentsense_hosted_sort_order'] = $this->request->post['paymentsense_hosted_sort_order'];
		} 
		else 
		{
			$data['paymentsense_hosted_sort_order'] = $this->config->get('paymentsense_hosted_sort_order');
		}
		
		if (isset($this->request->post['paymentsense_hosted_cv2_mand'])) 
		{
			$data['paymentsense_hosted_cv2_mand'] = $this->request->post['paymentsense_hosted_cv2_mand'];
		} 
		else 
		{
			$data['paymentsense_hosted_cv2_mand'] = $this->config->get('paymentsense_hosted_cv2_mand');
		}
		
		if (isset($this->request->post['paymentsense_hosted_address1_mand'])) 
		{
			$data['paymentsense_hosted_address1_mand'] = $this->request->post['paymentsense_hosted_address1_mand'];
		} 
		else 
		{
			$data['paymentsense_hosted_address1_mand'] = $this->config->get('paymentsense_hosted_address1_mand');
		}
		
		if (isset($this->request->post['paymentsense_hosted_city_mand'])) 
		{
			$data['paymentsense_hosted_city_mand'] = $this->request->post['paymentsense_hosted_city_mand'];
		} 
		else 
		{
			$data['paymentsense_hosted_city_mand'] = $this->config->get('paymentsense_hosted_city_mand');
		}
		
		if (isset($this->request->post['paymentsense_hosted_postcode_mand'])) 
		{
			$data['paymentsense_hosted_postcode_mand'] = $this->request->post['paymentsense_hosted_postcode_mand'];
		} 
		else 
		{
			$data['paymentsense_hosted_postcode_mand'] = $this->config->get('paymentsense_hosted_postcode_mand');
		}
		
		if (isset($this->request->post['paymentsense_hosted_state_mand'])) 
		{
			$data['paymentsense_hosted_state_mand'] = $this->request->post['paymentsense_hosted_state_mand'];
		} 
		else 
		{
			$data['paymentsense_hosted_state_mand'] = $this->config->get('paymentsense_hosted_state_mand');
		}
				
		if (isset($this->request->post['paymentsense_hosted_country_mand'])) 
		{
			$data['paymentsense_hosted_country_mand'] = $this->request->post['paymentsense_hosted_country_mand'];
		} 
		else 
		{
			$data['paymentsense_hosted_country_mand'] = $this->config->get('paymentsense_hosted_country_mand');
		}
		
		$this->load->model('localisation/geo_zone');
										
		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
			
		$this->template = 'payment/paymentsense_hosted.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('payment/paymentsense_hosted.tpl', $data));
		//$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/paymentsense_hosted')) 
		{
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->request->post['paymentsense_hosted_mid']) 
		{
			$this->error['mid'] = $this->language->get('error_mid');
		}
		elseif (!preg_match( '/^([a-zA-Z0-9]{6})([-])([0-9]{7})$/', $this->request->post['paymentsense_hosted_mid']))
		{
		    $this->error['mid'] = $this->language->get('error_midmatch');
		}
		
		if (!$this->request->post['paymentsense_hosted_pass']) 
		{
			$this->error['pass'] = $this->language->get('error_pass');
		}
		elseif (!preg_match( '/^(?=(.*[\d]){3,})(?=.*[a-z])(?=.*[A-Z])[A-Za-z0-9]{10,}$/', $this->request->post['paymentsense_hosted_pass']))
		{
		    $this->error['pass'] = $this->language->get('error_passmatch');
		}
		
		if (!$this->request->post['paymentsense_hosted_key']) 
		{
			$this->error['key'] = $this->language->get('error_key');
		}
		
		if (!$this->error) 
		{
			return TRUE;
		} 
		else 
		{
			return FALSE;
		}	
	}
}
?>