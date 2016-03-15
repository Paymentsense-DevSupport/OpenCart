<?php 
class ModelPaymentPaymentSenseHosted extends Model 
{
  	public function getMethod($country_id = '', $zone_id = '', $postcode = '') 
  	{
		$this->load->language('payment/paymentsense_hosted');
		
				
			
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('paymentsense_hosted_geo_zone_id') . "' AND country_id = '" . (int)$country_id . "' AND (zone_id = '" . (int)$zone_id . "' OR zone_id = '0')");
	
			
			if (!$this->config->get('paymentsense_hosted_geo_zone_id')) 
			{
        		$status = TRUE;
      		} 
      		elseif ($query->num_rows) 
      		{
      		  	$status = TRUE;
      		} 
      		else 
      		{
     	  		$status = FALSE;
			}	
      	
				
		$method_data = array();
	
		if ($status) 
		{  
      		$method_data = array( 
        		'code'         => 'paymentsense_hosted',
        		'title'      => $this->language->get('text_title'),
      		    'terms'     => '',
				'sort_order' => $this->config->get('paymentsense_hosted_sort_order')
      		);
    	}
   
    	return $method_data;
  	}
}
?>