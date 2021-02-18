<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 19-Feb-21
 * Time: 01:20
 */

use yii\bootstrap\Collapse;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

/**
 * @var \backend\models\UpdateUser $user
 */

$this->title = 'Update user data'
?>

<div class="row">
    <div class="col-md-offset-4 col-md-4">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['autocomplete' => 'off']
        ]) ?>

        <?= $form->field($user, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($user, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($user, 'password')
            ->passwordInput(['autocomplete' => 'off'])
            ->label('Current password');
        ?>

        <?= Collapse::widget([
            'items' => [
                [
                    'label' => 'Change password',
                    'content' =>
                        $form->field($user, 'new_password')->passwordInput(['autocomplete' => 'off']) .
                        $form->field($user, 'repeat_new_password')->passwordInput(['autocomplete' => 'off']),
                    'contentOptions' => [
                        'class' => $user->new_password || $user->repeat_new_password ? 'in' : ''
                    ]
                ]
            ]
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
