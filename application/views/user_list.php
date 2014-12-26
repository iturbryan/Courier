<div class="row">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="call_to_action">
    <a href="<?php echo base_url(); ?>users/create"><button class="btn btn-info"><img src="<?php echo base_url(); ?>media/images/icons/user_add.png" />&nbsp;ADD USER</button></a>
  </div>
   <div class="row header">
    <div class="col-md-2">#</div>
    <div class="col-md-3">NAME</div>
    <div class="col-md-3">USERNAME</div>
    <div class="col-md-3">OFFICE</div>
    <div class="col-md-1">ACTIONS</div>
  </div>
  <?php foreach($users->result() as $user){?>
  <div class="row row_item">
    <div class="col-md-2"><?php echo $user->id; ?></div>
    <div class="col-md-3"><?php echo $user->name; ?></div>
    <div class="col-md-3"><?php echo $user->username; ?></div>
    <div class="col-md-3"><?php foreach($destinations->result() as $destination) { if($destination->id == $user->destination_id){ echo $destination->name; break; } } ?></div>
    <div class="col-md-1"><a href="<?php echo base_url(); ?>users/edit/<?php echo $user->id; ?>"><img src="<?php echo base_url(); ?>media/images/icons/edit.png" title="Edit Consignment" alt="Edit"/></a></div>
  </div>
  <?php } ?>
</div>

