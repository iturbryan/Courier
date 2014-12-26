<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="call_to_action">
    <a href="<?php echo base_url(); ?>cargotypes/create"><button class="btn btn-info"><img src="<?php echo base_url(); ?>media/images/icons/parcel_type_add.png" />&nbsp;ADD PARCEL TYPE</button></a>
  </div>
   <div class="row header">
    <div class="col-md-2">#</div>
    <div class="col-md-3">NAME</div>
    <div class="col-md-6">DESCRIPTION</div>
    <div class="col-md-1">ACTIONS</div>
  </div>
  <?php foreach($cargo_types->result() as $cargo_type){?>
  <div class="row row_item">
    <div class="col-md-2"><?php echo $cargo_type->id; ?></div>
    <div class="col-md-3"><?php echo $cargo_type->name; ?></div>
    <div class="col-md-6"><?php echo $cargo_type->description; ?></div>
    <div class="col-md-1">
    <form class="hidden" action="<?php echo base_url(); ?>cargotypes/delete" name="delete_<?php echo $cargo_type->id; ?>" method="POST"><input type="hidden" name="id" value="<?php echo $cargo_type->id; ?>" /></form>
    <a href="<?php echo base_url(); ?>cargotypes/edit/<?php echo $cargo_type->id; ?>"><img src="<?php echo base_url(); ?>media/images/icons/edit.png" title="Edit Consignment" alt="Edit"/></a>
    <a href="javascript:void(0);" class="danger larger" onclick="if (confirm(&quot;Are you sure you want to delete <?php echo $cargo_type->name; ?>?&quot;)) { document.delete_<?php echo $cargo_type->id; ?>.submit(); } event.returnValue = false; return false;"><img src="<?php echo base_url(); ?>media/images/icons/delete.png" title="Delete Parcel Type" alt="Delete"/></a>
    </div>
  </div>
  <?php } ?>
</div>

