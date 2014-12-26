<script type="text/javascript">
$(document).ready(function() {
    $('#destination').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                message: 'The  name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The  name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The  name must be more than 6 and less than 255 characters long'
                    }
                }
            }
        }
      });
});
</script>
<?php

?>
<form method="POST" action="" id="destination">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4 fieldset">
  <h3>Edit Parcel Type</h3>
    <div class="form-group col-xs-12">
      <label>Name:</label>
      <input type="text" class="form-control input-sm" name="name" value="<?php echo $parcel_type->name; ?>">
    </div>
    <div class="form-group col-xs-12">
      <label>Description:</label>
      <textarea class="form-control input-sm" name="description"><?php echo $parcel_type->description; ?></textarea>
    </div>
    <div class="form-button">
      <button type="submit" class="btn btn-primary">SAVE PARCEL TYPE</button>
     </div>
</div>
  <div class="col-md-4">
  </div>
</form>
  </div>