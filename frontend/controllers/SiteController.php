<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 06-01-21
 * Time: 20:00
 */

namespace frontend\controllers;

use common\models\Lists;
use common\models\Regions;
use frontend\models\ListsSearch;
use Yii;
use yii\filters\AjaxFilter;
use yii\filters\ContentNegotiator;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{


    public function behaviors()
    {
        return [
            [
                'class' => AjaxFilter::class,
                'errorMessage' => Yii::t('main', 'Sahifa mavjud emas'),
                'only' => ['regions-list', 'regions-code']
            ],
            [
                'class' => ContentNegotiator::class,
                'formats' => ['application/json' => 'json'],
                'only' => ['regions-list']
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }


    /**
     * Main page
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * Api action for AJAX request
     * @return array
     */
    public function actionRegionsList()
    {
        $regs = Regions::find()
            ->alias('r')
            ->select([
                'id' => 'l.id',
                'l.region_id',
                'list_title' => 'l.title_' . Yii::$app->language,
                'l.preview_' . Yii::$app->language,
                'l.preview_image',
                'region_title' => 'r.title_' . Yii::$app->language,
                'r.code'
            ])
            ->innerJoin(['l' => Lists::tableName()], 'r.id = l.region_id')
            ->where([
                'l.category_id' => 12,
                'l.status' => 1
            ])
            ->andWhere('l.region_id > 0')
            ->asArray()
            ->all();
        $data = [];
        if ($regs) {
            foreach ($regs as $reg) {
                $data[$reg['code']]['image'] = Html::img('@web/uploads/' . $reg['preview_image']);
                $data[$reg['code']]['title'] = $reg['region_title'];
                $data[$reg['code']]['address'] = @$data[$reg['code']]['address'] ? $data[$reg['code']]['address'] . ', ' . $reg['list_title'] : $reg['list_title'];
                $data[$reg['code']]['code'] = $reg['code'];
            }
        }
        return $data;
    }


    /**
     * Api action for AJAX request
     * @param string $code
     * @return string
     */
    public function actionRegionsCode($code)
    {

        $lists = Lists::find()
            ->alias('l')
            ->select([
                'id' => 'l.id',
                'title' => 'l.title_' . Yii::$app->language,
                'preview' => 'l.preview_' . Yii::$app->language,
                'image' => 'l.preview_image'
            ])
            ->innerJoin(['r' => Regions::tableName()], 'r.id = l.region_id')
            ->where([
                'l.category_id' => 12,
                'r.code' => $code,
                'l.status' => 1
            ])
            ->orderBy(['l.order' => SORT_DESC])
            ->asArray()
            ->all();

        return $this->renderPartial('regions_code', [
            'lists' => $lists
        ]);
    }


    /**
     * @param int $id
     * @return string
     */
    public function actionList($id = 2)
    {
        $searchModel = new ListsSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['ListsSearch']['category_id'] = $id;
        $dataProvider = $searchModel->search($queryParams);
        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }


    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id = 2)
    {
        return $this->render('view', [
            'list' => $this->findModel($id)
        ]);
    }


    /**
     * @param int $id
     * @param int $category_id
     * @return array|Lists|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id, $category_id = null)
    {
        $list = Lists::find()
            ->where(['id' => $id])
            ->andFilterWhere(['category_id' => $category_id])
            ->active()
            ->one();
        if ($list === null)
            throw new NotFoundHttpException(Yii::t('main', 'Ma’lumot topilmadi'));
        return $list;
    }


    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionRegion($id)
    {
        return $this->render('region', [
            'region' => $this->findModel($id, 12)
        ]);
    }


    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionGallery($id)
    {
        return $this->render('gallery', [
            'gallery' => $this->findModel($id, 4)
        ]);
    }


    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPartner($id)
    {
        return $this->render('partner', [
            'partner' => $this->findModel($id, 11)
        ]);
    }

}
