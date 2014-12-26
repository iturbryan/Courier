
<div class="row edit">

  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
<form action="<?php echo base_url(); ?>parcels/batch_edit" method="POST" />
  <div class="col-xs-12">
    <h3 class="centered">Batch Update Parcel/Cargo Status</h3>
  </div>
    <div class="col-md-5 right"><label>Batch No:&nbsp;</label></div>
    <div class="col-md-6 left">
    <select class="form-control input-sm" name="batch_no">
    <?php foreach($parcels->result() as $parcel) {?>
    <option><?php echo $parcel->batch_no; ?></option><?php } ?>
    </select>
    </div>
  <div class="col-md-5 right"><label>New Location:&nbsp;</label></div>
  <div class="col-md-6 left">
  <select class="form-control input-sm" name="destination">
	<?php
	foreach($destinations->result() as $destination){?>
	  <option value="<?php echo $destination->id; ?>"><?php echo $destination->name; ?></option>
	<?php } ?>
  </select>
  </div>
    <p class="separator">&nbsp;</p>
    <div class="col-md-5 right"><label>New Status:&nbsp;</label></div>
    <div class="col-md-6 left">
    <select class="form-control input-sm" name="parcel_status_id">
    <?php foreach($parcel_statuses->result() as $parcel_status) {?>
    <option value="<?php echo $parcel_status->id; ?>"><?php echo $parcel_status->name; ?></option><?php } ?>
    </select>
    </div>
    <p class="separator">&nbsp;</p>
    <div class="col-md-5 right"><label>Notes:&nbsp;</label></div>
    <div class="col-md-6 left"><textarea class="form-control input-sm" name="description"></textarea></div>
    <p class="separator">&nbsp;</p>
    <div class="col-md-5"></div>
    <div class="col-md-6 left"><input type="submit" class="btn btn-primary" value="UPDATE CONSIGNMENT(S)"/></div>
  </div>
</form>
</div>