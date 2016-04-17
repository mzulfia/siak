<?php
/* @var $this DaftarKelasController */
/* @var $model DaftarKelas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'peserta-mk-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan <span class="required">*</span> harus diisi.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mhs'); ?>
		<?php echo $form->textField($model,'id_mhs'); ?>
		<?php echo $form->error($model,'id_mhs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_jadwal'); ?>
		<?php echo $form->textField($model,'id_jadwal'); ?>
		<?php echo $form->error($model,'id_jadwal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->