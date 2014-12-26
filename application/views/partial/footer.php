<?php if(!empty($this->session->userdata('logged_in'))){
if(@$print == null){
?>
<div class="copyright">
&copy;Copyright <?php echo date("Y"); ?>. All Rights Reserved.
</div>
<?php 
}
}
?>
</div>
</div>
</body>
</html>