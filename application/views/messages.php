<div class="row">
<form action="" method="POST">
  <input type="hidden" id="error" value="<?php echo $this->session->flashdata('error'); ?>" />
  <input type="hidden" id="success" value="<?php echo $this->session->flashdata('success'); ?>" />
  <div class="col-xs-6 col-md-2"><h5>ON STATUS CHANGE TO</h5></div>
  <div class="col-xs-6 col-md-5"><h5>MESSAGE TO SEND TO SHIPPER</h5></div>
  <div class="col-xs-6 col-md-5"><h5>MESSAGE TO SEND TO CONSIGNEE</h5></div>
  </div>
  <script type="text/javascript">
    function add_to_text_area(field, item_id){
      $('#' + item_id).val($('#' + item_id).val() + '<%=' + field + '=%>');
    }
  </script>
  <?php foreach($messages->result() as $message){?>
  <div class="row">
  <div class="col-xs-6 col-md-2"><?php foreach($parcel_statuses->result() as $status){ if($status->id == $message->parcel_status_id) { echo $status->name; break;} } ?></div>
  <div class="col-xs-6 col-md-5">Insert <a href="javascript:void(0);" onclick="add_to_text_area('name', '<?php echo $message->id;?>_sender');">name</a>, <a href="javascript:void(0);"  onclick="add_to_text_area('reference_no', '<?php echo $message->id;?>_sender');">reference no.</a>, <a href="javascript:void(0);"  onclick="add_to_text_area('consignment_no', '<?php echo $message->id;?>_sender');">consignment no.</a>, <a href="javascript:void(0);" onclick="add_to_text_area('destination', '<?php echo $message->id;?>_sender');">destination</a> to message:<textarea class="form-control input-sm" name="<?php echo $message->id;?>_sender" id="<?php echo $message->id;?>_sender"><?php echo $message->to_sender; ?></textarea></div>
  <div class="col-xs-6 col-md-5">Insert <a href="javascript:void(0);" onclick="add_to_text_area('name', '<?php echo $message->id;?>_receiver');">name</a>, <a href="javascript:void(0);" onclick="add_to_text_area('reference_no', '<?php echo $message->id;?>_receiver');">reference no.</a>, <a href="javascript:void(0);" onclick="add_to_text_area('consignment_no', '<?php echo $message->id;?>_receiver');">consignment no.</a>, <a href="javascript:void(0);" onclick="add_to_text_area('source', '<?php echo $message->id;?>_receiver');">source</a> to message:<textarea class="form-control input-sm" name="<?php echo $message->id;?>_receiver" id="<?php echo $message->id;?>_receiver"><?php echo $message->to_receiver; ?></textarea></div>
  </div>
  
  <?php } ?>
  <div class="row right">
    <button class="btn btn-primary">Save Message Settings</button>
  </div>
  </form>s
</div>