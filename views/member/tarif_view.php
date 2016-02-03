<?php 

?>
<style>
.form-group{
	width:100% !important;
}
</style>
<div class='container'>
    <div style='margin-top:30px;'>
	<div  >
	<form novalidate="novalidate" name="frm" id0="frm"   method="POST"  class="form-horizontal" role="form"> 
		<div class="frame-form-basic">
		<h2>Ganti Harga / Rate</h2>
		  <div class="panel-body">
            <table> 
<?php 
$data =array('widtdrawal'=>'widtdrawal', 'deposit'=>'deposit');
echo bsSelect("Tipe", "types", $data);?>			
<?=bsInput('Rate ','rate', $rate['mean'],'' );?>
<tr><td colspan=3> 
            <button type="submit" class="btn btn-default submitLogin" >
              Submit
            </button></td></tr>
			</table>
			<div> Deposit : <?=number_format($rate['deposit']);?></div>
			<div> Widtdrawal : <?=number_format($rate['widtdrawal']);?></div>
		</div></div>
	</form>
	</div>
<table id="tblTarif" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
				 <th>Created</th> 
				<th>Type</th>
                <th>Price (Rp)</th>
               
            </tr>
        </thead>
		<tfooter>
            <tr>
				 <th>Created</th>  
				<th>Type</th>
                <th>Price (Rp)</th>
               
            </tr>
        </tfooter>
</table>	

<script>
urlAPI="<?=base_url("member/data?type=tarif");?>";
urlDetail="<?=base_url("member/data");?>";
</script>	
</div></div>