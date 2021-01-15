<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 15.01.2021
 * Time: 22:22
 */

use yii\bootstrap\Html;

/**
 * @var $lists array
 */

foreach ($lists as $list) { ?>

    <div class="media">
        <div class="media-left media-middle">
            <?= Html::a(Html::img('@web/uploads/' . $list['image'], ['class' => 'media-object']), ['lists/region', 'id' => $list['id']]) ?>
        </div>
        <div class="media-body media-middle">
            <h4 class="media-heading title">
                <?= $list['title'] ?>
            </h4>
            <div class="news_full_content">
                <p>
                    <?= $list['preview'] ?>
                </p>
            </div>
            <p class="text-right">
                <?= Html::a(Yii::t('main', 'Batafsil') . ' ...', ['lists/region', 'id' => $list['id']]) ?>
            </p>
        </div>
    </div>

<? } ?>