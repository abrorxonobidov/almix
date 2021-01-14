<?php

use common\models\ListCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this yii\web\View
 * @var $model common\models\ListCategory
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="list-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_id')
        ->dropDownList(
            ArrayHelper::map(
                ListCategory::find()
                    ->select([
                        'id',
                        'title' => 'title_' . Yii::$app->language
                    ])
                    ->andFilterWhere(['!=', 'id', $model->id])
                    ->asArray()
                    ->all(),
                'id',
                'title'

            ),
            [
                'prompt' => '...'
            ])
    ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList($model::getStatusListKeyAndTitle()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
