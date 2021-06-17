<?php

namespace app\controllers;

use Yii;
use app\models\AvisosUsuarios;
use app\models\AvisosUsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * AvisosUsuariosController implements the CRUD actions for AvisosUsuarios model.
 */
class AvisosUsuariosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view', 'create', 'delete','update'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['view', 'create', 'delete','update'],
                        'roles' => ['admin', 'sysadmin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','view'],
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all AvisosUsuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AvisosUsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AvisosUsuarios model.
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
     * Creates a new AvisosUsuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AvisosUsuarios();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->fecha_aviso = time();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AvisosUsuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AvisosUsuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AvisosUsuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AvisosUsuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AvisosUsuarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAviso($clase_aviso, $texto, $destino_usuario_id, $origen_usuario_id, $tienda_id, $articulo_id, $comentario_id)
    {
        $model = new AvisosUsuarios();

        if ($clase_aviso == NULL)
        {
            $clase_aviso = 'A';
        }
        $model['fecha_aviso'] = new Expression('NOW()');
        $model['clase_aviso'] = $clase_aviso;
        $model['texto'] = $texto;
        $model['destino_usuario_id'] = $destino_usuario_id;
        $model['origen_usuario_id'] = $origen_usuario_id;
        $model['tienda_id'] = $tienda_id;
        $model['articulo_id'] = $articulo_id;
        $model['comentario_id'] = $comentario_id;

        $model->save();
    }

    public function actionLeido($id)
    {
        $model = $this->findModel($id);
        $model->fecha_lectura = new Expression('NOW()');
        
        if ($model->load(Yii::$app->request->post()))
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionAceptado($id)
    {
        $model = $this->findModel($id);
        $model->fecha_aceptado = new Expression('NOW()');
        
        if ($model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }
}
