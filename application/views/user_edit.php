<script type="text/javascript">
$(document).ready(function() {
    $('#user_type').bootstrapValidator({
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
            },
            username: {
                message: 'The  username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The  username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The  username must be more than 6 and less than 255 characters long'
                    }
                }
            },
            password: {
                message: 'The  password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The  password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 255,
                        message: 'The  password must be more than 6 and less than 255 characters long'
                    }
                }
            }
        }
      });
});
</script>
<?php

?>
<form method="POST" action="" id="user_type">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4 fieldset">
  <h3>Edit User</h3>
    <div class="form-group col-xs-12">
      <label>Name:</label>
      <input type="text" class="form-control input-sm" name="name" value="<?php echo $user->name; ?>"/>
    </div>
    <div class="form-group col-xs-12">
      <label>Office:</label>
      <select class="form-control input-sm" name="destination">
      <?php
      foreach($destinations->result() as $destination){?>
	<option value="<?php echo $destination->id; ?>" <?php if($destination->id == $user->destination_id) {?> selected="yes" <?php } ?>><?php echo $destination->name; ?></option>
      <?php } ?>
      </select>
    </div>
    <div class="form-group col-xs-12">
      <label>User Role:</label>
      <select class="form-control input-sm" name="user_role_id">
      <?php
      foreach($user_roles->result() as $user_role){?>
	<option value="<?php echo $user_role->id; ?>" <?php if($user_role->id == $user->user_role_id) {?> selected="yes" <?php } ?>><?php echo $user_role->name; ?></option>
      <?php } ?>
      </select>
    </div>
    <div class="form-button">
      <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
     </div>
</div>
  <div class="col-md-4">
  </div>
</form>
  </div>