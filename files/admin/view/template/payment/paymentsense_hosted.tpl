<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-paymentsense_hosted" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
   		<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    	<?php } ?>
      </ul>
    </div>
  </div>
   <div class="container-fluid">
  <?php if ($error_warning) { ?>
  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>><?php echo $error_warning; ?>
  	<button type="button" class="close" data-dismiss="alert">&times;</button>
  </div>
  <?php } ?>
  <div class="panel panel-default">
     <div class="panel-heading">
     	<h3 class="panel-title"><strong>Module Version:</strong> v2.1<br />
			          			<strong>Release Date:</strong> xxth Oct xxxx </h3>
    </div>
<div class="panel-body">

 <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-paymentsense_hosted" class="form-horizontal">
  
  <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_status" id="input-status" class="form-control">
                <?php if ($paymentsense_hosted_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          
  <div class="form-group required">
  	<label class="col-sm-2 control-label" for="input-merchant-id"><?php echo $entry_mid; ?></label>
    <div class="col-sm-10">
              <input type="text" name="paymentsense_hosted_mid" value="<?php echo $paymentsense_hosted_mid; ?>" placeholder="<?php echo $entry_mid; ?>" id="input-merchant-id" class="form-control" />
              <?php if ($error_mid) { ?>
              <div class="text-danger"><?php echo $error_mid; ?></div>
              <?php } ?>
     </div>
  </div>
  
   <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-entry_pass"><?php echo $entry_pass; ?></label>
            <div class="col-sm-10">
              <input type="text" name="paymentsense_hosted_pass" value="<?php echo $paymentsense_hosted_pass; ?>" placeholder="<?php echo $entry_pass; ?>" id="input-entry_pass" class="form-control" />
              <?php if ($error_pass) { ?>
              <div class="text-danger"><?php echo $error_pass; ?></div>
              <?php } ?>
            </div>
    </div>
    
    <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-entry_key"><?php echo $entry_key; ?></label>
            <div class="col-sm-10">
              <input type="text" name="paymentsense_hosted_key" value="<?php echo $paymentsense_hosted_key; ?>" placeholder="<?php echo $entry_key; ?>" id="input-entry_key" class="form-control" />
              <?php if ($error_key) { ?>
              <div class="text-danger"><?php echo $error_key; ?></div>
              <?php } ?>
        </div>
    </div>
    
 <div class="form-group">
            <label class="col-sm-2 control-label" for="input-entry_type"><?php echo $entry_type; ?></label>
        <div class="col-sm-10">
            <select name="paymentsense_hosted_type" id="input-order-type" class="form-control">           
            <option value="SALE"<?php if ($paymentsense_hosted_type == "SALE") { ?> selected="selected"<?php } ?>><?php echo $text_sale; ?></option>
            <option value="PREAUTH"<?php if ($paymentsense_hosted_type == "PREAUTH") { ?> selected="selected"<?php } ?>><?php echo $text_preauth; ?></option>            
          </select>  
        </div>
    </div>
    
    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-order-status"><?php echo $entry_order_status; ?></label>
            <div class="col-sm-10">
            <select name="paymentsense_hosted_order_status_id" id="input-order-status" class="form-control">
            <?php foreach ($order_statuses as $order_status) { ?>
            <?php if ($order_status['order_status_id'] == $paymentsense_hosted_order_status_id) { ?>
            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
            <?php } ?>
            <?php } ?>
          </select>
         </div>
    </div>
    
   <div class="form-group">
            <label class="col-sm-2 control-label" for="input-failed-order-status"><?php echo $entry_failed_order_status; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_failed_order_status_id" id="input-failed-order-status" class="form-control">
                <?php foreach ($order_statuses as $order_status) { ?>
            <?php if ($order_status['order_status_id'] == $paymentsense_hosted_failed_order_status_id) { ?>
            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
            <?php } ?>
            <?php } ?>
              </select>
         </div>
    </div>
    
     <div class="form-group">
            <label class="col-sm-2 control-label" for="input-geo-zone"><?php echo $entry_geo_zone; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_geo_zone_id" id="input-geo-zone" class="form-control">
                <option value="0"><?php echo $text_all_zones; ?></option>
            <?php foreach ($geo_zones as $geo_zone) { ?>
            <?php if ($geo_zone['geo_zone_id'] == $paymentsense_hosted_geo_zone_id) { ?>
            <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
            <?php } ?>
            <?php } ?>
              </select>
            </div>
          </div>
          
    <div> <label <strong>Mandatory Fields</strong> </label> </div>
     <div class="help">Select the fields you require a customer to complete on the hosted payment page.</div>        
    
    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-CV2"><?php echo $entry_CV2Mandatory; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_cv2_mand" id="input-CV2" class="form-control">
                <?php if ($paymentsense_hosted_cv2_mand == "TRUE") { ?>
            <option value="TRUE" selected="selected">True</option>
            <option value="FALSE">False</option>
            <?php } else { ?>
            <option value="TRUE">True</option>
            <option value="FALSE" selected="selected">False</option>
            <?php } ?>
              </select>
            </div>
          </div>
          
    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-Address1"><?php echo $entry_Address1Mandatory; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_address1_mand" id="input-Address1" class="form-control">
               <?php if ($paymentsense_hosted_address1_mand == "TRUE") { ?>
            <option value="TRUE" selected="selected">True</option>
            <option value="FALSE">False</option>
            <?php } else { ?>
            <option value="TRUE">True</option>
            <option value="FALSE" selected="selected">False</option>
            <?php } ?>
              </select>
            </div>
          </div>
          
    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-City"><?php echo $entry_CityMandatory; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_city_mand" id="input-City" class="form-control">
               <?php if ($paymentsense_hosted_city_mand == "TRUE") { ?>
            <option value="TRUE" selected="selected">True</option>
            <option value="FALSE">False</option>
            <?php } else { ?>
            <option value="TRUE">True</option>
            <option value="FALSE" selected="selected">False</option>
            <?php } ?>
              </select>
            </div>
          </div>
          
    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-PostCode"><?php echo $entry_PostCodeMandatory; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_postcode_mand" id="input-PostCode" class="form-control">
               <?php if ($paymentsense_hosted_postcode_mand == "TRUE") { ?>
            <option value="TRUE" selected="selected">True</option>
            <option value="FALSE">False</option>
            <?php } else { ?>
            <option value="TRUE">True</option>
            <option value="FALSE" selected="selected">False</option>
            <?php } ?>
              </select>
            </div>
          </div>
          
    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-State"><?php echo $entry_StateMandatory; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_state_mand" id="input-State" class="form-control">
               <?php if ($paymentsense_hosted_state_mand == "TRUE") { ?>
            <option value="TRUE" selected="selected">True</option>
            <option value="FALSE">False</option>
            <?php } else { ?>
            <option value="TRUE">True</option>
            <option value="FALSE" selected="selected">False</option>
            <?php } ?>
              </select>
            </div>
          </div>
          
      <div class="form-group">
            <label class="col-sm-2 control-label" for="input-Country"><?php echo $entry_CountryMandatory; ?></label>
            <div class="col-sm-10">
              <select name="paymentsense_hosted_country_mand" id="input-State" class="form-control">
              <?php if ($paymentsense_hosted_country_mand == "TRUE") { ?>
            <option value="TRUE" selected="selected">True</option>
            <option value="FALSE">False</option>
            <?php } else { ?>
            <option value="TRUE">True</option>
            <option value="FALSE" selected="selected">False</option>
            <?php } ?>
              </select>
            </div>
          </div>

</form>
</div>
</div>
</div>
</div>
<?php echo $footer; ?> 