<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Lists;
use kartik\file\FileInput;
use kartik\select2\Select2;
use common\models\ListCategorySearch;
use yii\bootstrap\Tabs;
use common\models\RegionsSearch;

/**
 * @var $this yii\web\View
 * @var $model common\models\Lists
 * @var $form yii\widgets\ActiveForm
 */
?>

<div class="lists-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'category_id')
                ->widget(Select2::class, [
                    'data' => ListCategorySearch::getForDropDown(),
                    'pluginOptions' => [
                        'allowClear' => true,
                        'placeholder' => $model->getAttributeLabel('category_id')
                    ],
                ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'region_id')
                ->widget(Select2::class, [
                    'data' => RegionsSearch::getForDropDown(),
                    'pluginOptions' => [
                        'allowClear' => true,
                        'placeholder' => $model->getAttributeLabel('region_id')
                    ],
                ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'order')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList($model::getStatusListKeyAndTitle()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'date')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'link')->textInput() ?>
        </div>
    </div>
    <br>
    <?
    $items = [];
    foreach (Yii::$app->params['languages'] as $lang_code => $language)
        $items[] = [
            'label' => $language,
            'content' => '<br>' .
                $form->field($model, "title_$lang_code")->textarea(['rows' => 2]) .
                $form->field($model, "preview_$lang_code")->textarea(['rows' => 3]) .
                $form->field($model, "description_$lang_code")
                    ->widget(\dosamigos\ckeditor\CKEditor::class, [
                        'options' => [
                            'id' => 'CK-' . $lang_code
                        ],
                        'preset' => 'custom',
                        'clientOptions' => [
                            'allowedContent' => true,
                            'height' => 400,
                            'language' => 'en',
                            'extraPlugins' => 'font,smiley,colorbutton,iframe,selectall,copyformatting,justify',
                            'removeButtons' => 'About,Anchor,Styles,Font',
                            "toolbarGroups" => [
                                ['name' => 'document', 'groups' => ['mode']],
                                ['name' => 'clipboard', 'groups' => ['undo', 'clipboard']],
                                ['name' => 'editing', 'groups' => ['find', 'selection', 'editing']],
                                ['name' => 'links', 'groups' => ['links']],
                                ['name' => 'insert', 'groups' => ['insert']],
                                ['name' => 'colors', 'groups' => ['colors']],
                                '/',
                                ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
                                ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'paragraph']],
                                ['name' => 'styles', 'groups' => ['styles']]
                            ],
                            'toolbar' => [
                                ['name' => 'document', 'items' => ['Source']],
                                ['name' => 'clipboard', 'items' => ['Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord']],
                                ['name' => 'editing', 'items' => ['SelectAll']],
                                ['name' => 'links', 'items' => ['Link', 'Unlink']],
                                ['name' => 'insert', 'items' => ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'Iframe']],
                                ['name' => 'colors', 'items' => ['TextColor', 'BGColor']],
                                ['name' => 'tools', 'items' => ['Maximize']],
                                '/',
                                ['name' => 'basicstyles', 'items' => ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat']],
                                ['name' => 'paragraph', 'items' => ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']],
                                ['name' => 'styles', 'items' => ['Format', 'FontSize']]
                            ],
                        ],
                    ]),
        ];

    echo Tabs::widget(['items' => $items])

    ?>

    <? $anonsConfig = $model->inputImageConfig('preview_image', Url::to(['lists/file-remove']), Lists::class); ?>
    <?= $form->field($model, 'helpImage')
        ->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'previewFileType' => 'image',
                'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
                'initialPreview' => $anonsConfig['path'],
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => $anonsConfig['config'],
                'showUpload' => false,
                'showRemove' => false,
                'browseClass' => 'btn btn-success',
                'browseLabel' => Html::icon('folder-open'). '&nbsp;Tanlang...',
                'browseIcon' => ''
            ]
        ]); ?>

    <? $anonsConfig = $model->inputImageConfig('inner_image', Url::to(['lists/file-remove']), Lists::class); ?>
    <?= $form->field($model, 'helpInnerImage')
        ->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'previewFileType' => 'image',
                'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg'],
                'initialPreview' => $anonsConfig['path'],
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => $anonsConfig['config'],
                'showUpload' => false,
                'showRemove' => false,
                'browseClass' => 'btn btn-success',
                'browseLabel' => Html::icon('folder-open'). '&nbsp;Tanlang...',
                'browseIcon' => ''
            ]
        ]); ?>

    <? $anonsConfig = $model->inputImageConfig('gallery', Url::to(['lists/file-remove']), Lists::class); ?>


    <? $galleyConfig = $model->inputGalleryConfig(); ?>
    <?= $form->field($model, 'helpGallery[]')
        ->widget(FileInput::class, [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true
            ],
            'pluginOptions' => [
                //'previewFileType' => 'image',
                'allowedFileExtensions' => ['jpg', 'gif', 'png', 'jpeg', 'mp4'],
                'initialPreview' => $galleyConfig['path'],
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => $galleyConfig['config'],
                'showUpload' => false,
                'showRemove' => false,
                'browseClass' => 'btn btn-success',
                'browseLabel' => Html::icon('folder-open'). '&nbsp;Tanlang...',
                'browseIcon' => '',
                'overwriteInitial' => false,
            ]
        ]);
    ?>

    <? $anonsConfig = $model->inputImageConfig('video', Url::to(['lists/file-remove']), Lists::class); ?>
    <?= $form->field($model, 'helpVideo')
        ->widget(FileInput::class, [
            'options' => ['accept' => 'video/*'],
            'pluginOptions' => [
                'showPreview' => false,
                //'previewFileType' => 'video',
                'allowedFileExtensions' => ['mp4', 'MP4'],
                //'initialPreview' => $anonsConfig['path'],
                //'initialPreviewAsData' => true,
                //'initialPreviewConfig' => $anonsConfig['config'],
                //'initialPreviewFileType'=> 'video',
                'showUpload' => false,
                'showRemove' => false,
                'browseClass' => 'btn btn-success',
                'browseLabel' => Html::icon('folder-open'). '&nbsp;Tanlang...',
                'browseIcon' => ''
            ]
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
