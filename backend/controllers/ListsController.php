<?php

namespace backend\controllers;

use common\helpers\DebugHelper;
use common\models\BaseActiveRecord;
use Yii;
use common\models\Lists;
use backend\models\ListsSearch;
use yii\web\NotFoundHttpException;

/**
 * ListsController implements the CRUD actions for Lists model.
 */
class ListsController extends BaseController
{

    /**
     * Lists all Lists models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lists model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lists model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $cat_id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($cat_id = null)
    {
        $model = new Lists();
        $model->order = 500;
        $model->category_id = $cat_id;
        if ($model->load(Yii::$app->request->post())) {
            $model->uploadImage('helpImage', 'preview_image', 'lists');
            $model->uploadImage('helpInnerImage', 'inner_image', 'lists');
            $model->uploadGallery('helpGallery', 'gallery', 'lists');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                DebugHelper::printSingleObject($model->errors, 1);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lists model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->uploadImage('helpImage', 'preview_image', 'lists');
            $model->uploadImage('helpInnerImage', 'inner_image', 'lists');
            $model->uploadGallery('helpGallery', 'gallery', 'lists');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                DebugHelper::printSingleObject($model->errors, 1);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lists model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException | \yii\db\StaleObjectException | mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lists model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lists the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lists::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('main', 'The requested page does not exist.'));
    }

    public function actionFileRemove()
    {
        $return = false;
        $file = Yii::getAlias('@frontend') . '/web/uploads/' . Yii::$app->request->post('key');
        $id = Yii::$app->request->post('id');
        $field = Yii::$app->request->post('field');
        $className = Yii::$app->request->post('className');
        $model = $className::findOne($id);
        /** @var $model \yii\db\ActiveRecord */
        $model->$field = '';
        $model->updateAttributes([$field]);

        if (isset($file) && file_exists($file)) {
            unlink($file);
            $return = true;
        }
        return $return;
    }


    /**
     * @return bool
     * @throws NotFoundHttpException
     */
    public function actionGalleryRemove()
    {
        $return = false;
        $path = Yii::$app->params['imageUploadPath']
            . Yii::$app->request->post('key')
            . '/';
        $file = $path . Yii::$app->request->post('imageName');
        if (isset($file) && file_exists($file)) {
            unlink($file);
            $return = true;
        }

        $images = glob($path . Yii::$app->params['allowedImageExtension'], GLOB_BRACE);

        if (count($images) == 0) {
            BaseActiveRecord::deleteDir($path);
            $model = Lists::findOne(Yii::$app->request->post('id'));
            $model->gallery = '';
            $model->save();
        }

        return $return;
    }

}
