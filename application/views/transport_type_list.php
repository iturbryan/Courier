<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="call_to_action">
    <a href="<?php echo base_url(); ?>transporttypes/create"><button class="btn btn-info"><img src="<?php echo base_url(); ?>media/images/icons/shipping_modes_add.png" />&nbsp;ADD SHIPPING MODE</button></a>
  </div>
   <div class="row header">
    <div class="col-md-2">#</div>
    <div class="col-md-3">NAME</div>
    <div class="col-md-6">DESCRIPTION</div>
    <div class="col-md-1">ACTIONS</div>
  </div>
  <?php foreach($transport_types->result() as $transport_type){?>
  <div class="row row_item">
    <div class="col-md-2"><?php echo $transport_type->id; ?></div>
    <div class="col-md-3"><?php echo $transport_type->name; ?></div>
    <div class="col-md-6"><?php echo $transport_type->description; ?></div>
    <div class="col-md-1">
      <form class="hidden" action="<?php echo base_url(); ?>transporttypes/delete" name="delete_<?php echo $transport_type->id; ?>" method="POST"><input type="hidden" name="id" value="<?php echo $transport_type->id; ?>" /></form>
      <a href="<?php echo base_url(); ?>transporttypes/edit/<?php echo $transport_type->id; ?>" class="larger" ><img src="<?php echo base_url(); ?>media/images/icons/edit.png" title="Edit Shipping type" alt="Edit"/></a>
      <a href="javascript:void(0);" class="danger larger" onclick="if (confirm(&quot;Are you sure you want to delete <?php echo $transport_type->name; ?>?&quot;)) { document.delete_<?php echo $transport_type->id; ?>.submit(); } event.returnValue = false; return false;"><img src="<?php echo base_url(); ?>media/images/icons/delete.png" title="Delete User Account" alt="Delete"/></a>
    </div>
  </div>
  <?php } ?>
</div>

