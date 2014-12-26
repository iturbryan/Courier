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
                    }
                }
            },
             receiver_name: {
                message: 'The receiver\'s name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The receiver\'s name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The receiver\'s name must be more than 6 and less than 30 characters long'
                    }
                }
            },
             sender_telephone: {
                message: 'The sender\'s telephone is not valid',
                validators: {
                    notEmpty: {
                        message: 'The sender\'s telephone is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The sender\'s telephone must be more than 6 and less than 30 characters long'
                    }
                }
            },
             receiver_telephone: {
                message: 'The receiver\'s telephone is not valid',
                validators: {
                    notEmpty: {
                        message: 'The receiver\'s telephone is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The receiver\'s telephone must be more than 6 and less than 30 characters long'
                    }
                }
            },
             receiver_reference: {
                message: 'The receiver\'s reference is not valid',
                validators: {
                    notEmpty: {
                        message: 'The receiver\'s reference is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The receiver\'s reference must be more than 6 and less than 30 characters long'
                    }
                }
            },
             sender_reference: {
                message: 'The sender\'s reference is not valid',
                validators: {
                    notEmpty: {
                        message: 'The sender\'s reference is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The sender\'s reference must be more than 6 and less than 30 characters long'
                    }
                }
            },
             consignment_no: {
                message: 'The consignment number is not valid',
                validators: {
                    notEmpty: {
                        message: 'The consignment number is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The consignment number must be more than 6 and less than 30 characters long'
                    }
                }
            },
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
      <label class="must">Sender's Name:</label>
      <input type="text" class="form-control input-sm" name="sender_name">
    </div>
    
    <div class="form-group col-xs-12">
      <label class="must">Sender's Reference No:</label>
      <input type="text" class="form-control input-sm" name="sender_reference">
    </div>
    
    <div class="form-group col-xs-12">
      <label class="must">Telephone No:</label>
      <input type="text" class="form-control input-sm" name="sender_telephone">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Address Details:</label>
      <textarea class="form-control input-sm" name="sender_address"></textarea>
    </div>
    
    <div class="form-group col-xs-12">
      <label>Account Number:</label>
      <input type="text" class="form-control input-sm" name="account_no">
    </div>
    <div class="form-group col-xs-12">
      <label>Country:</label>
      <select class="form-control input-sm" name="sender_country">
	<?php
	foreach($countries->result() as $country){?>
	  <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
	<?php } ?>
	</select>
    </div>
    
  </div>
  <div class="col-md-6 fieldset">
  <h3>Receiver/Consignee Details</h3>
    <div class="form-group col-xs-12">
      <label class="must">Receiver's Name:</label>
      <input type="text" class="form-control input-sm" name="receiver_name">
    </div>    
    
    <div class="form-group col-xs-12">
      <label class="must">Reference No:</label>
      <input type="text" class="form-control input-sm" name="receiver_reference">
    </div>
        	
    <div class="form-group col-xs-12">
      <label class="must">Telephone No:</label>
      <input type="text" class="form-control input-sm" name="receiver_telephone">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Address Details:</label>
      <textarea class="form-control input-sm" name="receiver_address"></textarea>
    </div>
    
    <div class="form-group col-xs-12">
      <label>City/Town:</label>
      <input type="text" class="form-control input-sm" name="receiver_town">
    </div>
    
    <div class="form-group col-xs-12">
      <label>Country:</label>
	<select class="form-control input-sm" name="receiver_country">
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
	<input type="text" readonly="yes" class="form-control input-sm" name="consignment_no" value="<?php echo $rand; ?>">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Invoice Number:</label>
	<input type="text" class="form-control input-sm" name="invoice_no">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Shipping Mode:</label>
	<select class="form-control input-sm" name="transport_mode">
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
	<select class="form-control input-sm" name="parcel_type">
	<?php
	foreach($cargo_types->result() as $cargo_type){?>
	  <option value="<?php echo $cargo_type->id; ?>"><?php echo $cargo_type->name; ?></option>
	<?php } ?>
	</select>
      </div>
      
      <div class="form-group col-xs-12">
	<label>Quantity:</label>
	<input type="text" class="form-control input-sm" name="quantity">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Departure Date/Time:</label>
	<input type="text" class="form-control input-sm" name="departure_date" id="datetime">
      </div>
      
  </div>
  <div class="col-md-4 fieldset">
      <div class="form-group col-xs-12">
	<label>Weight:</label>
	<input type="text" class="form-control input-sm" name="weight">
      </div>
      
      <div class="form-group col-xs-12">
	<label>Payment Type:</label>
	<select class="form-control input-sm" name="payment_type">
	<?php
	foreach($payment_types->result() as $payment_type){?>
	  <option value="<?php echo $payment_type->id; ?>"><?php echo $payment_type->name; ?></option>
	<?php } ?>
	</select>
      </div>
      
      <div class="form-group col-xs-12">
	<label>Destination:</label>
	<select class="form-control input-sm" name="destination">
	<?php
	foreach($destinations->result() as $destination){?>
	  <option value="<?php echo $destination->id; ?>"><?php echo $destination->name; ?></option>
	<?php } ?>
	</select>
      </div>
  </div> 
  <div class="col-md-12 fieldset">
      
      <div class="form-group col-xs-4">
	<label>Batch No:</label>
	<input type="text" class="form-control input-sm" name="batch_no" value="<?php echo date("d-m-Y"); ?>">
      </div>
      <div class="form-group col-xs-4">
	<label>Amount:</label>
	<input type="text" class="form-control input-sm" name="amount">
      </div>
      <div class="form-group col-xs-4">
	  <label>Comments:</label>
	<input type="text" class="form-control input-sm" name="description">
      </div>
 
</div>

  <div class="col-md-12 fieldset">
	      <div class="form-button">
	  <label>&nbsp;</label>
		<button type="submit" class="btn btn-primary">SAVE CONSIGNMENT</button>
	      </div>
  </div>
</form>
  </div>
