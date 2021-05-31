<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/**
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

/** @var \yii\db\ActiveRecord $model */
$model = new $generator->modelClass;
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";

?>

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use yii\jui\DatePicker;

/**
 * @var yii\web\View $this
 * @var <?= ltrim($generator->modelClass, '\\') ?> $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
    <?= "<?php " ?>
    $form = \yii\bootstrap\ActiveForm::begin(['layout' => 'horizontal']);
    <?php foreach ($safeAttributes as $attribute): ?>
        <?= $generator->generateActiveField($attribute) . "\n\n"; ?>
    <?php endforeach; ?>
    echo Html::submitButton($model->isNewRecord ?  '新建' :  '修改',
    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    \yii\bootstrap\ActiveForm::end(); ?>
</div>
