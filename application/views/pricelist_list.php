<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="call_to_action">
    <a href="<?php echo base_url(); ?>pricelists/create"><button class="btn btn-info">ADD PRICING ITEM</button></a>
  </div>
   <div class="row header">
    <div class="col-md-1">#</div>
    <div class="col-md-2">PARCEL TYPE</div>
    <div class="col-md-2">FROM</div>
    <div class="col-md-2">TO</div>
    <div class="col-md-2">MIN. WEIGHT</div>
    <div class="col-md-1">AMOUNT</div>
    <div class="col-md-1">ACTIONS</div>
  </div>
  <?php foreach($pricelists->result() as $pricelist){?>
  <div class="row row_item">
    <div class="col-md-1"><?php echo $pricelist->id; ?></div>
    <div class="col-md-2"><?php foreach($parcel_types->result() as $parcel_type) { if($parcel_type->id == $pricelist->parcel_type_id) { echo $parcel_type->name; break; } } ?> </div>
    <div class="col-md-2"><?php foreach($destinations->result() as $destination) { if($destination->id == $pricelist->destination_id) { echo $destination->name; break; } } ?> </div>
    <div class="col-md-2"><?php foreach($destinations->result() as $destination) { if($destination->id == $pricelist->destination_id) { echo $destination->name; break; } } ?> </div>
    <div class="col-md-2"><?php echo $pricelist->min_weight; ?></div>
    <div class="col-md-1"><?php echo $pricelist->amount; ?></div>
    <div class="col-md-1">
      <form class="hidden" action="<?php echo base_url(); ?>pricelists/delete" name="delete_<?php echo $pricelist->id; ?>" method="POST"><input type="hidden" name="id" value="<?php echo $pricelist->id; ?>" /></form>
      <a href="<?php echo base_url(); ?>pricelists/edit/<?php echo $pricelist->id; ?>" class="larger" ><img src="<?php echo base_url(); ?>media/images/icons/edit.png" title="Edit Pricelist Item" alt="Edit"/></a>
      <a href="javascript:void(0);" class="danger larger" onclick="if (confirm(&quot;Are you sure you want to delete this pricelist item?&quot;)) { document.delete_<?php echo $pricelist->id; ?>.submit(); } event.returnValue = false; return false;"><img src="<?php echo base_url(); ?>media/images/icons/delete.png" title="Delete Pricelist Item" alt="Delete"/></a>
    </div>
  </div>
  <?php } ?>
</div>

