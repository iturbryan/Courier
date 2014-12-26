<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="call_to_action">
    <a href="<?php echo base_url(); ?>destinations/create"><button class="btn btn-info"><img src="<?php echo base_url(); ?>media/images/icons/building_add.png" />&nbsp;ADD OFFICE</button></a>
  </div>
   <div class="row header">
    <div class="col-md-1">#</div>
    <div class="col-md-2">COUNTRY</div>
    <div class="col-md-2">NAME</div>
    <div class="col-md-6">DESCRIPTION</div>
    <div class="col-md-1">ACTIONS</div>
  </div>
  <?php foreach($destinations->result() as $destination){?>
  <div class="row row_item">
    <div class="col-md-1"><?php echo $destination->id; ?></div>
    <div class="col-md-2"><?php foreach($countries->result() as $country){ if($country->id == $destination->country_id) { echo $country->name; break; } } ?></div>
    <div class="col-md-2"><?php echo $destination->name; ?></div>
    <div class="col-md-6"><?php echo $destination->description; ?></div>
    <div class="col-md-1">
    <form class="hidden" action="<?php echo base_url(); ?>destinations/delete" name="delete_<?php echo $destination->id; ?>" method="POST"><input type="hidden" name="id" value="<?php echo $destination->id; ?>" /></form>
      <a href="<?php echo base_url(); ?>destinations/edit/<?php echo $destination->id; ?>" class="larger" ><img src="<?php echo base_url(); ?>media/images/icons/edit.png" title="Edit Office" alt="Edit"/></a>
      <a href="javascript:void(0);" class="danger larger" onclick="if (confirm(&quot;Are you sure you want to delete <?php echo $destination->name; ?>?&quot;)) { document.delete_<?php echo $destination->id; ?>.submit(); } event.returnValue = false; return false;"><img src="<?php echo base_url(); ?>media/images/icons/delete.png" title="Delete Office" alt="Delete"/></a>
    </div>
  </div>
  <?php } ?>
</div>

