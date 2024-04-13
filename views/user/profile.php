<?php
/** @var $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?= $this->title ?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'login')->textInput() ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'surname')->textInput() ?>
<?= $form->field($model, 'patronymic')->textInput() ?>
<?= $form->field($model, 'age')->textInput() ?>
<?= $form->field($model, 'password')->textInput() ?>
<?= $form->field($model, 'passwordRepeat')->textInput() ?>
<?= Html::submitButton('Сохранить данные') ?>
<?php ActiveForm::end() ?>
