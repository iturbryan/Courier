<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
<?php
$parcel = $parcel->result();
?>
 <div class="col-md-6 fieldset">
  <h3>Sender/Shipper Details</h3>
    <div class="form-group col-xs-12">
      <div class="form-group col-xs-6 right">
	<label>Sender's Name:</label>
      </div>
      <div class="form-group col-xs-6 left">
	<label class="readonly"><?php echo $sender->name; ?></label>
      </div>
    </div>
    <div class="form-group col-xs-12">
      <div class="form-group col-xs-6 right">
	<label>Reference Number:</label>
      </div>
      <div class="form-group col-xs-6 left">
	<label class="readonly"><?php echo $sender->reference; ?></label>
      </div>
    </div>
    <div class="form-group col-xs-12">
      <div class="form-group col-xs-6 right">
	<label>Telephone Number:</label>
      </div>
      <div class="form-group col-xs-6 left">
	<label class="readonly"><?php echo $sender_address->telephone; ?></label>
      </div>
    </div>
  </div>
  <div class="col-md-6 fieldset">
  <h3>Receiver/Consignee Details</h3>
    <div class="form-group col-xs-12">
      <div class="form-group col-xs-6 right">
	<label>Receiver's Name:</label>
      </div>
      <div class="form-group col-xs-6 left">
	<label class="readonly"><?php echo $receiver->name; ?></label>
      </div>
    </div>
    <div class="form-group col-xs-12">
      <div class="form-group col-xs-6 right">
	<label>Reference Number:</label>
      </div>
      <div class="form-group col-xs-6 left">
	<label class="readonly"><?php echo $receiver->reference; ?></label>
      </div>
    </div>
    <div class="form-group col-xs-12">
      <div class="form-group col-xs-6 right">
	<label>Telephone Number:</label>
      </div>
      <div class="form-group col-xs-6 left">
	<label class="readonly"><?php echo $receiver_address->telephone; ?></label>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="col-md-5">
      <div class="col-xs-12">
	<h3 class="centered">Parcel/Cargo Details</h3>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Consignment Number:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php echo $parcel[0]->consignment_no; ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Cargo Type:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php foreach($parcel_types->result() as $parcel_type) { if($parcel[0]->transport_mode_id == $parcel_type->id) { echo $parcel_type->name; } } ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Weight:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php echo $parcel[0]->weight; ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Invoice Number:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php echo $parcel[0]->invoice_no; ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Payment Mode:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php foreach($payment_types->result() as $payment_type) { if($parcel[0]->transport_mode_id == $payment_type->id) { echo $payment_type->name; } } ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Total Amount:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php echo $parcel[0]->amount; ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Shipping Mode:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php foreach($shipping_modes->result() as $shipping_mode) { if($parcel[0]->transport_mode_id == $shipping_mode->id) { echo $shipping_mode->name; } } ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Batch No:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php $parcel[0]->batch_no; ?></label></div>
      </div>
      <div class="row">
	<div class="col-md-6 right"><label>Status:</label></div>
	<div class="col-md-6 left"><label class="readonly"><?php foreach($parcel_statuses->result() as $parcel_status) { if($parcel[0]->parcel_status_id == $parcel_status->id) { echo $parcel_status->name; } } ?></label></div>
      </div>
  </div>
  <div class="col-md-7">
      <div class="row">
	<div class="col-xs-12">
	  <h3 class="centered">Parcel/Cargo Log History</h3>
	</div>
      </div>
      <div class="row header">
	<div class="col-md-1">#</div>
	<div class="col-md-3">DATETIME</div>
	<div class="col-md-2">STATION</div>
	<div class="col-md-2">STATUS</div>
	<div class="col-md-3">COMMENT</div>
      </div>
      <?php
      $i = 1;
      foreach($logs->result() as $log){?>
      <div class="row row_item">
	<div class="col-md-1"><?php echo $i; ?></div>
	<div class="col-md-3"><?php echo date("d-m-Y H:i:s", strtotime($log->datetime)); ?></div>
	<div class="col-md-2"><?php foreach($destinations->result() as $destination){ if($destination->id == $log->destination_id) { echo $destination->name; break; } } ?></div>
	<div class="col-md-2"><?php foreach($parcel_statuses->result() as $parcel_status){ if($parcel_status->id == $log->status_id) { echo $parcel_status->name; break; } } ?></div>
	<div class="col-md-3"><?php echo $log->description; ?></div>
      </div>
      <?php $i ++;
      } ?>
  </div>
</div>
<div class="row edit">
<form action="<?php echo base_url(); ?>parcels/edit/<?php echo $parcel[0]->id; ?>" method="POST" />
  <input type="hidden" name="previous_status_id" value="<?php echo $parcel[0]->parcel_status_id; ?>" />
<input type="hidden" value="<?php echo $parcel[0]->id; ?>" name="parcel_id"/>
  <div class="col-xs-12">
    <h3 class="centered">Update Parcel/Cargo Status</h3>
  </div>
  <div class="col-md-6 right"><label>New Location:&nbsp;</label></div>
  <div class="col-md-6 left">
  <select class="form-control input-sm" name="destination">
	<?php
	foreach($destinations->result() as $destination){?>
	  <option value="<?php echo $destination->id; ?>" <?php if($parcel[0]->destination_id == $destination->id) {?> selected="yes" <?php } ?>><?php echo $destination->name; ?></option>
	<?php } ?>
  </select>
  </div>
    <p class="separator">&nbsp;</p>
    <div class="col-md-6 right"><label>New Status:&nbsp;</label></div>
    <div class="col-md-6 left">
    <select class="form-control input-sm" name="parcel_status_id">
    <?php foreach($parcel_statuses->result() as $parcel_status) {?>
    <option value="<?php echo $parcel_status->id; ?>" <?php if($parcel[0]->parcel_status_id == $parcel_status->id) { ?> selected="yes" <?php } ?>><?php echo $parcel_status->name; ?></option><?php } ?>
    </select>
    </div>
    <p class="separator">&nbsp;</p>
    <div class="col-md-6 right"><label>Notes:&nbsp;</label></div>
    <div class="col-md-6 left"><textarea class="form-control input-sm" name="description"></textarea></div>
    <div class="col-md-6"></div>
    <div class="col-md-6 left"><input type="submit" class="btn btn-primary" value="UPDATE CONSIGNMENT"/></div>
  </div>
</form>
</div>