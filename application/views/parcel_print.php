
<?php
$parcel = $parcel->result();
?>
<style type="text/css">
td {
	font-size:80%;
}
h1, h2, h3 {
	text-align:center;
	color:#910606;
	line-height:10px;
}
h1 {
	font-size:30px;
	line-height:10px;
}
th {
	text-align: left;
}
</style>
<table  width="100%" style="font-family:URW Gothic L;">
<tr><td colspan="3" style="text-align:center;"><?php $i = 0; foreach($configs->result() as $config){
if($config->value != null){
?><?php if($i == 0) {?><h1><?php echo $config->value; ?></h1><?php } else {?><h3><?php echo $config->value; ?></h3><?php } ?>
			<?php } $i ++; }?>
</td></tr>
<tr><td width="40%" style="text-align:center;">

<h2>Sender/Shipper Details</h2>
<table width="100%" >
<tr>
<td  width="50%" align="right"><label>Sender's Name:</label></td><td width="50%"><?php echo $sender->name; ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Reference Number:</label></td><td width="50%"><?php echo $sender->reference; ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Telephone Number:</label></td><td width="50%"><?php echo $sender_address->telephone; ?></td>
</tr>
</table>
</td>
<td  width="20%" style="text-align:center;">
<img src="<?php echo base_url(); ?>parcels/barcode/<?php echo $parcel[0]->consignment_no; ?>" />
</td>
<td width="40%" style="text-align:center;">

<h2>Receiver/Consignee Details</h2>

<table width="100%" >
<tr>
<td  width="50%" align="right"><label>Receiver's Name:</label></td><td width="50%"><?php echo $receiver->name; ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Reference Number:</label></td><td width="50%"><?php echo $receiver->reference; ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Telephone Number:</label></td><td width="50%"><?php echo $receiver_address->telephone; ?></td>
</tr>
</table>
</td></tr>
<tr>
<td style="text-align:center;">
<h2 >Parcel/Consignment Details</h2>

<table width="100%" >
<tr>
<td  width="50%" align="right"><label>Consignment Number:</label></td><td width="50%"><?php echo $parcel[0]->consignment_no; ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Consignment Type:</label></td><td width="50%"><?php foreach($parcel_types->result() as $parcel_type) { if($parcel[0]->transport_mode_id == $parcel_type->id) { echo $parcel_type->name; break; } } ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Weight:</label></td><td width="50%"><?php echo $parcel[0]->weight; ?></td>
</tr>
</tr>
<tr>
<td  width="50%" align="right"><label>Invoice Number:</label></td><td width="50%"><?php echo $parcel[0]->invoice_no; ?></td>
</tr>
</tr>
<tr>
<td  width="50%" align="right"><label>Payment Mode:</label></td><td width="50%"><?php foreach($payment_types->result() as $payment_type) { if($parcel[0]->transport_mode_id == $payment_type->id) { echo $payment_type->name; } } ?></td>
</tr>
</tr>
<tr>
<td  width="50%" align="right"><label>Total Amount:</label></td><td width="50%"><?php echo $parcel[0]->amount; ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Shipping Mode:</label></td><td width="50%"><?php foreach($shipping_modes->result() as $shipping_mode) { if($parcel[0]->transport_mode_id == $shipping_mode->id) { echo $shipping_mode->name; break; } } ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Status:</label></td><td width="50%"><?php foreach($parcel_statuses->result() as $parcel_status) { if($parcel[0]->parcel_type_id == $parcel_status->id) { echo $parcel_status->name; break; } } ?></td>
</tr>
<tr>
<td  width="50%" align="right"><label>Notes:</label></td><td width="50%"><?php echo $parcel[0]->description; ?></td>
</tr>
</table>
</td>
<td style="text-align:center;" colspan="2">
<h2>Parcel/Consignment Log History</h2>
<table width="100%">
<tr><th>#</th><th>DATETIME</th><th>STATION</th><th>STATUS</th><th>NOTES</th></tr>
<?php $i = 1;
foreach($logs->result() as $log){?>
      <tr>
	<td><?php echo $i; ?></td>
	<td><?php echo date("d-m-Y H:i:s", strtotime($log->datetime)); ?></td>
	<td><?php foreach($destinations->result() as $destination){ if($destination->id == $log->destination_id) { echo $destination->name; break; } } ?></td>
	<td><?php foreach($parcel_statuses->result() as $parcel_status){ if($parcel_status->id == $log->status_id) { echo $parcel_status->name; break; } } ?></td>
	<td><?php echo $log->description; ?></td>
      </tr>
      <?php $i ++;
      } ?>
</table>
</td>
</tr>
</table>
