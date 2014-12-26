<script type="text/javascript">
$(document).ready(function() {
    $('#pricelist').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            min_weight: {
                message: 'The  minimum weight is not valid',
                validators: {
                    notEmpty: {
                        message: 'The  minimum weight is required and cannot be empty'
                    }
                }
            }, 
            amount: {
                message: 'The  amount is not valid',
                validators: {
                    notEmpty: {
                        message: 'The  amount is required and cannot be empty'
                    }
                }
            }
        }
      });
});
</script>
<form method="POST" action="" id="pricelist">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4 fieldset">
  <h3>Add Pricelist Item</h3>
     <div class="form-group col-xs-12">
      <label>Parcel Type:</label>
      <select class="form-control input-sm" name="parcel_type_id">
	<?php
	foreach($parcel_types->result() as $parcel_type){
	?>
	  <option value="<?php echo $parcel_type->id; ?>"><?php echo $parcel_type->name; ?></option>
	<?php } ?>
	</select>
    </div>
    
     <div class="form-group col-xs-12">
      <label>From [Source]:</label>
      <select class="form-control input-sm" name="source_id">
	<?php
	foreach($destinations->result() as $destination){
	?>
	  <option value="<?php echo $destination->id; ?>"><?php echo $destination->name; ?></option>
	<?php } ?>
	</select>
    </div>
    
     <div class="form-group col-xs-12">
      <label>To [Destination]:</label>
      <select class="form-control input-sm" name="destination_id">
	<?php
	foreach($destinations->result() as $destination){
	?>
	  <option value="<?php echo $destination->id; ?>"><?php echo $destination->name; ?></option>
	<?php } ?>
	</select>
    </div>
    <div class="form-group col-xs-12">
      <label>Minimum Weight:</label>
      <input type="text" class="form-control input-sm" name="min_weight">
    </div>
    <div class="form-group col-xs-12">
      <label>Amount:</label>
      <input type="text" class="form-control input-sm" name="amount">
    </div>
    <div class="form-button">
      <button type="submit" class="btn btn-primary">SAVE PRICELIST ITEM</button>
     </div>
</div>
  <div class="col-md-4">
  </div>
</form>
  </div>