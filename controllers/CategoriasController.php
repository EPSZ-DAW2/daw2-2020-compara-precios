<?php

namespace app\controllers;

use Yii;
use app\models\Categorias;
use app\models\Articulos;
use app\models\UnificarForm;
use app\models\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\filters\AccessControl;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\ArticulosSearch;

/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
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
                'only' => ['index', 'view', 'create', 'recuperar', 'delete'],
                'rules' => [
                    /* DESCOMENTAR CUANDO ESTE EL CONTROL DE PERMISOS 
                    [
                        'allow' => true,
                        'actions' => ['view', 'create', 'delete'],
                        'roles' => ['admin', 'sysadmin'],
                    ],*/
                    [
                        'allow' => true,
                        //'actions' => ['index', 'public'],
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Categorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10,];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }
    

    /**
     * Lists all Categorias models.
     * @return mixed
     */
    public function actionPublic()
    {
        $searchModel = new CategoriasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // obtengo la nube de categorías

        $query = new Query;
        $rows = array(); //array para ir guardando id

        $query->select('id, nombre, icono')
        ->from('categorias')
        ->where(['=', 'categoria_id', '0']);
        $rows = $query->all();
        $n_hijos=count($rows);
        if(!empty($rows))
        {
            for( $i=0; $i<$n_hijos; $i++)
            {
                $rows[$i]['hijos'] = $this->getSubcategorias($rows[$i]['id']);
            }
        }       

        return $this->render('public', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categorias'=> $rows,
        ]);
    }


    /**
     * Displays a single Categorias model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $subcategorias = $this->getSubcategorias($id);
        $articulos = $this->getArticulos($subcategorias, $id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'subcategorias' => $subcategorias,
            'articulos' => $articulos
        ]);
    }
    //mostrar articulos de categorias
    public function actionViewarticulos($id)
    {
        $searchModel = new ArticulosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);        
        $subcategorias = $this->getSubcategorias($id);

        return $this->render('viewArticulos', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'subcategorias' => $subcategorias,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorias();
        $imagen = new UploadForm();      
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isPost) {
                $imagen->imageFile = UploadedFile::getInstance($imagen, 'imageFile');
                if ($imagen->upload()) {
                    $extension = substr($imagen->imageFile->name,-4);
                    rename("../web/uploads/".$imagen->imageFile->name."","../web/iconos/iconos_cat/".$model['nombre']."".$extension."");
                    $model['icono'] = $model['nombre']."".$extension;
                }
            }
            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }                       
        }

        return $this->render('create', [
            'model' => $model,
            'imagen' => $imagen,
        ]);
    }

    /**
     * Updates an existing Categorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imagen = new UploadForm();      
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isPost) {
                $imagen->imageFile = UploadedFile::getInstance($imagen, 'imageFile');
                if ($imagen->upload()) {
                    $extension = substr($imagen->imageFile->name,-4);
                    rename("../web/uploads/".$imagen->imageFile->name."","../web/iconos/iconos_cat/".$model['nombre']."".$extension."");
                    $model['icono'] = $model['nombre']."".$extension;
                }
            }
            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }                       
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('update', [
            'model' => $model,
            'imagen' => $imagen,
        ]);
    }

    /**
     * Deletes an existing Categorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $subcategorias = $this->getSubcategorias($id);
        $articulos = $this->getArticulos($subcategorias, $id);
        $modelo = $this->findModel($id);
        if(count($articulos)=== 0 && count($subcategorias)=== 0 ){
            unlink('../web/iconos/iconos_cat/'.$modelo['icono'].'');
            $this->findModel($id)->delete();            
            $error ='Borrado correctamente';
        }   
        else if(count($articulos)!= 0)
            $error ='No se puede borrar, hay articulos en la categoria o en las subcategorias';
        else if(count($subcategorias)!= 0)
            $error ='No se puede borrar, contiene subcategorias';
        
        return $this->redirect(['index', 'error' => $error]);
    }

    /**
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //Devuelve los articulos de una categor�a
    public function getSubcategorias($id)
    {
        $query = new Query;
        $rows = array(); //array para ir guardando id

        // compose the query
        $query->select('id, nombre')
            ->from('categorias')
            ->where(['=', 'categoria_id', $id]);
        // build and execute the query
        $rows = $query->all();
        $n_hijos=count($rows);
        if(!empty($rows))
        {
            for( $i=0; $i<$n_hijos; $i++)
            {
                $rows[$i]['hijos'] = $this->getSubcategorias($rows[$i]['id']);
            }
        }       
        return $rows;
    }

    //Devuelve los articulos de una categor�a y sus subcategorias
    public function getArticulos($categorias, $id)
    {
        $query = new Query;
        $rows = array(); //array para ir guardando id
        $n_hijos=count($categorias);
        $query->select('id, nombre')
            ->from('articulos')
            ->where(['=', 'categoria_id', $id]);
        // build and execute the query
        $rows = $query->all();
        if(!empty($categorias))
        {               
            for( $i=0; $i<$n_hijos; $i++)
            {
                $rows = array_merge($this->getArticulos($categorias[$i]['hijos'],$categorias[$i]['id']),$rows);
            }
        }   
        return $rows;
    }

    // funcion para unificar el contenido de dos categorias
    public function actionUnificar(){
        $model=new UnificarForm(); // clase creada para establecer la estructura del formulario y hacer más sencilla la implementacion

        if ($model->load(Yii::$app->request->post())) {
            $id_eliminar = $model->categoriaEliminar_id;
            $id_conservar = $model->categoriaMantener_id;
            if($id_eliminar != $id_conservar)
            {
                Categorias::updateAll(['categoria_id' => $id_conservar], 'categoria_id = '.$id_eliminar);
                Articulos::updateAll(['categoria_id' => $id_conservar], 'categoria_id = '.$id_eliminar);
                $this->findModel($id_eliminar)->delete();
            }

            return $this->redirect(['index']);
        }

        $listaCategorias = Categorias::find()->all();
        $nombre_categorias= [];//DTR: Cuando no hay ningún resultado falla sin iniciar la variable.
        for($i=0; $i<count($listaCategorias); $i++){
            $nombre_categorias[$listaCategorias[$i]['id']]=$listaCategorias[$i]['nombre'];
        }

        return $this->render('unificar', [
            'model' => $model,
            'nombre_categorias' => $nombre_categorias,
        ]);
    }
}
