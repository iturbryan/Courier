<script type="text/javascript">
$(document).ready(function() {
    $('#user_change').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                message: 'The  password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The  password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 255,
                        message: 'The  password must be more than 6 and less than 255 characters long'
                    }
                }
            }, 
            new_password: {
                message: 'The  password is not valid',
                validators: {
                    notEmpty: {
                        message: 'A new password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 255,
                        message: 'The  password must be more than 6 and less than 255 characters long'
                    }
                }
            }, 
            confirm_password: {
                message: 'The  password is not valid',
                validators: {
                    notEmpty: {
                        message: 'Password confirmation is a must and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
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
<form method="POST" action="" id="user_change">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4 fieldset">
  <h3>Change Password</h3>
    <div class="form-group col-xs-12">
      <label>Old Password:</label>
      <input type="password" class="form-control input-sm" name="password" />
    </div>
    <div class="form-group col-xs-12">
      <label>New Password:</label>
      <input type="password" class="form-control input-sm" name="new_password" />
    </div>
    <div class="form-group col-xs-12">
      <label>Confirm New Password:</label>
      <input type="password" class="form-control input-sm" name="confirm_password" />
    </div>
    <div class="form-button">
      <button type="submit" class="btn btn-primary">CREATE USER</button>
     </div>
</div>
  <div class="col-md-4">
  </div>
</form>
</div>