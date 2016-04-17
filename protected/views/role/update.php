<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->id_role=>array('view','id'=>$model->id_role),
	'Update',
);

$this->menu=array(
	array('label'=>'List Role', 'url'=>array('index')),
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'View Role', 'url'=>array('view', 'id'=>$model->id_role)),
	array('label'=>'Manage Role', 'url'=>array('admin')),
);
?>

<h2><strong>Perbaharui Role</strong></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>