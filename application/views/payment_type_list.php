<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="call_to_action">
    <a href="<?php echo base_url(); ?>paymenttypes/create"><button class="btn btn-info"><img src="<?php echo base_url(); ?>media/images/icons/payment_types_add.png" />&nbsp;ADD PAYMENT TYPE</button></a>
  </div>
   <div class="row header">
    <div class="col-md-2">#</div>
    <div class="col-md-3">NAME</div>
    <div class="col-md-6">DESCRIPTION</div>
    <div class="col-md-1">ACTIONS</div>
  </div>
  <?php foreach($payment_types->result() as $payment_type){?>
  <div class="row row_item">
    <div class="col-md-2"><?php echo $payment_type->id; ?></div>
    <div class="col-md-3"><?php echo $payment_type->name; ?></div>
    <div class="col-md-6"><?php echo $payment_type->description; ?></div>
    <div class="col-md-1">
    <form class="hidden" action="<?php echo base_url(); ?>paymenttypes/delete" name="delete_<?php echo $payment_type->id; ?>" method="POST"><input type="hidden" name="id" value="<?php echo $payment_type->id; ?>" /></form>
      <a href="<?php echo base_url(); ?>paymenttypes/edit/<?php echo $payment_type->id; ?>" class="larger" ><img src="<?php echo base_url(); ?>media/images/icons/edit.png" title="Edit Payment Type" alt="Edit"/></a>
      <a href="javascript:void(0);" class="danger larger" onclick="if (confirm(&quot;Are you sure you want to delete <?php echo $payment_type->name; ?>?&quot;)) { document.delete_<?php echo $payment_type->id; ?>.submit(); } event.returnValue = false; return false;"><img src="<?php echo base_url(); ?>media/images/icons/delete.png" title="Delete Payment Type" alt="Delete"/></a>
    </div>
  </div>
  <?php } ?>
</div>

