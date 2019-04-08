<?php

namespace app\controllers;

use app\helpers\Helper;
use Yii;
use app\models\ResourceManagement;
use app\models\ResourcemanagementSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResourceManagementController implements the CRUD actions for ResourceManagement model.
 */
class ResourceManagementController extends BaseController
{
    /**
     * Lists all ResourceManagement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResourcemanagementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ResourceManagement model.
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
     * Creates a new ResourceManagement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ResourceManagement();
        $transaction = Yii::$app->getDb()->beginTransaction();
        if (Yii::$app->request->isPost) {
            try{
                if (!$model->load(Yii::$app->request->post()) || !$model->save()) {
                    throw new Exception(Yii::t('app', $model->getFirstErrorMessage()));
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            }catch (Exception $e) {
                $transaction->rollBack();
                Helper::Alert(Yii::t('app', $e->getMessage()));
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ResourceManagement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $transaction = Yii::$app->getDb()->beginTransaction();
        if (Yii::$app->request->isPost) {
            try{
                if (!$model->load(Yii::$app->request->post()) || !$model->save()) {
                    throw new Exception(Yii::t('app', $model->getFirstErrorMessage()));
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            }catch (Exception $e) {
                $transaction->rollBack();
                Helper::Alert(Yii::t('app', $e->getMessage()));
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ResourceManagement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        ResourceManagement::updateAll(['status' => 0], ['id' => $id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the ResourceManagement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ResourceManagement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ResourceManagement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
