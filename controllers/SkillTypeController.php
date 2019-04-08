<?php

namespace app\controllers;

use app\helpers\Helper;
use Yii;
use app\models\SkillType;
use app\models\SkillTypeSearch;
use yii\base\Exception;
use yii\web\NotFoundHttpException;

/**
 * SkillTypeController implements the CRUD actions for SkillType model.
 */
class SkillTypeController extends BaseController
{
    /**
     * Lists all SkillType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkillTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SkillType model.
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
     * Creates a new SkillType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SkillType();
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
     * Updates an existing SkillType model.
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
     * Deletes an existing SkillType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        SkillType::updateAll(['status' => 0], ['id' => $id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the SkillType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SkillType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SkillType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
