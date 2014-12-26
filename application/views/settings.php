<form method="POST" action="" id="user_type">
<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-6 fieldset">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <h3>Edit Company Settings</h3>
    <div class="input-group col-xs-12">
      <label>Company Name:</label>
      <input type="text" class="form-control input-sm" name="company_name" value="<?php foreach($configs->result() as $config){ if($config->key == 'company_name'){ echo $config->value; break; } } ?>"/>
    </div>
    <div class="input-group col-xs-12">
      <label>Address:</label>
      <input type="text" class="form-control input-sm" name="address" value="<?php foreach($configs->result() as $config){ if($config->key == 'address'){ echo $config->value; break; } } ?>"/>
    </div>
    <div class="input-group col-xs-12">
      <label>Telephone:</label>
      <input type="text" class="form-control input-sm" name="telephone" value="<?php foreach($configs->result() as $config){ if($config->key == 'telephone'){ echo $config->value; break; } } ?>"/>
    </div>
    <div class="input-group col-xs-12">
      <label>Email:</label>
      <input type="email" class="form-control input-sm" name="email" value="<?php foreach($configs->result() as $config){ if($config->key == 'email'){ echo $config->value; break; } } ?>"/>
    </div>
    <div class="input-group col-xs-12">
      <label>Fax:</label>
      <input type="text" class="form-control input-sm" name="fax" value="<?php foreach($configs->result() as $config){ if($config->key == 'fax'){ echo $config->value; break; } } ?>"/>
    </div>
    <div class="form-button">
      <button type="submit" class="btn btn-primary">SAVE SETTINGS</button>
     </div>
</div>
<div class="col-md-1">
</div>
<div class="col-md-5">
<fieldset><legend><h3>SMS Configuration</h3></legend>
<p style="text-align:center;">Send SMS to sender/receiver on status update of:</p>
    <?php foreach($parcel_statuses->result() as $status){?>
    <div class="form-group">
    <div class="col-sm-4">
      <div class="checkbox">
        <label>
          <?php echo $status->name; ?>
        </label>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="checkbox">
        <label>
          <input type="checkbox"  name="sender_<?php echo $status->id; ?>" <?php if($status->sender == 1){?> checked="yes" <?php } ?>/> SMS Sender
        </label>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="checkbox">
        <label>
          <input type="checkbox"  name="receiver_<?php echo $status->id; ?>" <?php if($status->receiver == 1){?> checked="yes" <?php } ?>/> SMS Consignee
        </label>
      </div>
    </div>
  </div>
    <?php } ?>
</fieldset>
</div>
</div>
</form>