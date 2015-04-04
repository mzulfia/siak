<?php
/* @var $this PembayaranController */
/* @var $data Pembayaran */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bayar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_bayar), array('view', 'id'=>$data->id_bayar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mhs')); ?>:</b>
	<?php echo CHtml::encode($data->id_mhs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_awal')); ?>:</b>
	<?php echo CHtml::encode($data->periode_awal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_akhir')); ?>:</b>
	<?php echo CHtml::encode($data->periode_akhir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>