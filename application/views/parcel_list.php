<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="call_to_action">
    <a href="<?php echo base_url(); ?>parcels/create"><button class="btn btn-info"><img src="<?php echo base_url(); ?>media/images/icons/parcel_add.png" />&nbsp;ADD CONSIGNMENT</button></a>
    <a href="<?php echo base_url(); ?>parcels/batch_edit"><button class="btn btn-default"><img src="<?php echo base_url(); ?>media/images/icons/wand.png" />&nbsp;BATCH UPDATE</button></a>
  <form class="form-inline" action="" method="POST" name="search_form">
  
    <div class="input-group">
      <input type="text" class="form-control input-sm" name="value" id="value" placeholder="Search By Consignment #" >
      <span class="input-group-addon" onclick="if(document.getElementById('value').value != '') document.search_form.submit();"><span class="glyphicon glyphicon-search"></span></span>
    </div>
  </form>
  </div>
   <div class="row header">
    <div class="col-md-1">CONS. #</div>
    <div class="col-md-2">ENTRY DATETIME</div>
    <div class="col-md-2">PARCEL TYPE</div>
    <div class="col-md-2">SOURCE</div>
    <div class="col-md-2">DESTINATION</div>
    <div class="col-md-2">STATUS</div>
    <div class="col-md-1">ACTIONS</div>
  </div>
  <?php foreach($parcels->result() as $parcel){?>
  <div class="row row_item">
    <div class="col-md-1"><?php echo $parcel->consignment_no; ?></div>
    <div class="col-md-2"><?php echo $parcel->create_date; ?></div>
    <div class="col-md-2"><?php foreach($parcel_types->result() as $parcel_type){ if($parcel_type->id == $parcel->parcel_type_id) { echo $parcel_type->name; break;} } ?></div>
    <div class="col-md-2"><?php foreach($destinations->result() as $destination){ if($destination->id == $parcel->origin_id) { echo $destination->name; break;} } ?></div>
    <div class="col-md-2"><?php foreach($destinations->result() as $destination){ if($destination->id == $parcel->destination_id) { echo $destination->name; break;} } ?></div>
    <div class="col-md-2"><?php foreach($parcel_statuses->result() as $status){ if($status->id == $parcel->parcel_status_id) { echo $status->name; break;} } ?></div>
    <div class="col-md-1">
      <a href="<?php echo base_url(); ?>parcels/edit/<?php echo $parcel->id; ?>"><img src="<?php echo base_url(); ?>media/images/icons/edit.png" title="Edit Consignment" alt="Edit"/></a>
      <a href="<?php echo base_url(); ?>parcels/pdf/<?php echo $parcel->id; ?>"><img src="<?php echo base_url(); ?>media/images/icons/printer.png" title="Print Consignment Detail" alt="Print"/></a>
      
      <a href="javascript:void(0);"><img src="<?php echo base_url(); ?>media/images/icons/delete.png" title="Delete Consignment" alt="Delete"/></a>
    </div>
  </div>
  <?php } ?>
  <div class="row">
    <?php echo $pages; ?>
  </div>
</div>

