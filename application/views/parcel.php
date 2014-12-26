<div class="page_container">
<script type="text/javascript">
$(document).ready(function() {
    $('#parcel').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            sender_name: {
                message: 'The sender\'s name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The sender\'s name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The sender\'s name must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_] +$/,
                        message: 'The sender\'s name can only consist of alphabetical, number and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
    });
});
</script>
<form method="POST" action="" id="parcel">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
<div class="row">
  <div class="col-md-6 fieldset">
  <h3>Sender/Shipper Details</h3>
    <div class="form-group col-xs-12">
      <label>Sender's Name:</label>
      <input type="text" class="form-control input-sm" name="sender_name">
    </div>
    <div class="form-group col-xs-12">
      <label>Account Number:</label>
      <input type="text" class="form-control input-sm">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Sender's Reference No:</label>
      <input type="text" class="form-control input-sm">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Address Details:</label>
      <textarea class="form-control input-sm"></textarea>
    </div>
    
    <div class="form-group col-xs-12">
      <label>Contact Details:</label>
      <input type="text" class="form-control input-sm">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Telephone No:</label>
      <input type="text" class="form-control input-sm">
    </div>
  </div>
  <div class="col-md-6 fieldset">
  <h3>Receiver/Consignee Details</h3>
    <div class="form-group col-xs-12">
      <label>Receiver's Name:</label>
      <input type="text" class="form-control input-sm">
    </div>    
    
    <div class="form-group col-xs-12">
      <label>Reference No:</label>
      <input type="text" class="form-control input-sm">
    </div>
        	
    <div class="form-group col-xs-12">
      <label>Telephone No:</label>
      <input type="text" class="form-control input-sm">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Address Details:</label>
      <textarea class="form-control input-sm" ></textarea>
    </div>
    
    <div class="form-group col-xs-12">
      <label>City/Town:</label>
      <input type="text" class="form-control input-sm">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Country:</label>
	<select class="form-control input-sm">
	<?php
	foreach($countries->result() as $country){?>
	  <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
	<?php } ?>
	</select>
    </div>
  </div>
</div>
<div class="row">
<h3 class="centered">Parcel/Cargo Details</h3>
  <div class="col-md-4 fieldset">
      <div class="form-group col-xs-12">
	<label>Consignment No:</label>
	<input type="text" class="form-control input-sm">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Invoice Number:</label>
	<input type="text" class="form-control input-sm">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Shipping Mode:</label>
	<select class="form-control input-sm">
	<?php
	foreach($shipping_modes->result() as $shipping_mode){?>
	  <option value="<?php echo $shipping_mode->id; ?>"><?php echo $shipping_mode->name; ?></option>
	<?php } ?>
	</select>
      </div>
      
  </div>
  <div class="col-md-4 fieldset">
      <div class="form-group col-xs-12">
	<label>Cargo Type:</label>
	<select class="form-control input-sm">
	<?php
	foreach($cargo_types->result() as $cargo_type){?>
	  <option value="<?php echo $cargo_type->id; ?>"><?php echo $cargo_type->name; ?></option>
	<?php } ?>
	</select>
      </div>
      
      <div class="form-group col-xs-12">
	<label>Quantity:</label>
	<input type="text" class="form-control input-sm">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Departure Time:</label>
	<input type="text" class="form-control input-sm">
      </div>
      
  </div>
  <div class="col-md-4 fieldset">
      <div class="form-group col-xs-12">
	<label>Weight:</label>
	<input type="text" class="form-control input-sm">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Payment Type:</label>
	<select class="form-control input-sm">
	<?php
	foreach($payment_types->result() as $payment_type){?>
	  <option value="<?php echo $payment_type->id; ?>"><?php echo $payment_type->name; ?></option>
	<?php } ?>
	</select>
      </div>
      
      <div class="form-group col-xs-12">
	<label>Destination:</label>
	<select class="form-control input-sm">
	<?php
	foreach($destinations->result() as $destination){?>
	  <option value="<?php echo $destination->id; ?>"><?php echo $destination->name; ?></option>
	<?php } ?>
	</select>
      </div>
  </div> 
  <div class="col-md-12 fieldset">
	<div class="form-group col-xs-12">
	  <label>Comments:</label>
	  <textarea class="form-control input-sm"></textarea>
	</div>
      </div>
     <div class="form-button">
      <button type="submit" class="btn btn-primary">SAVE PARCEL DETAIL</button>
     </div>
</div>
</form>
</div>
