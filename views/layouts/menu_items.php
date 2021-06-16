<?php
//---------------------------------------------------------------------------
// DTR: Crear el menu de opciones usando un archivo externo los "items" que
// se desean dejar visibles.
// Este archivo se ejecuta en el ambito de "layout\main.php", con lo que se 
// puede usar cualquier cosa relacionada con la vista donde se genera.
//---------------------------------------------------------------------------

return [
  //----- Pagina de Inicio de la aplicación -----
  ['label' => 'Inicio', 'url' => ['/site/index']]

  //----- Lista de Controladores principales de la aplicacion. -----
  /*-----*/
  //Aparecen por orden alfabético... ¡¡es para probar!!
  //Cuando se quiera desactivar, se comenta y se pone el menú correcto.
  , ['label' => 'Controladores',// 'url' => ['#']
    'items' => [
        ['label' => 'Artículos', 'url' => ['/articulos']]
      , ['label' => 'Artículos-Etiquetas', 'url' => ['/articulos-etiquetas']]
      , ['label' => 'Artículos-Tiendas', 'url' => ['/articulos-tienda']] //ATENCION: plural!!
      , ['label' => 'Avisos-Usuarios', 'url' => ['/avisos-usuarios']]
      , ['label' => 'Categorías', 'url' => ['/categorias']]
      , ['label' => 'Clasificadores', 'url' => ['/clasificadores']]
      , ['label' => 'Comentarios', 'url' => ['/comentarios']]
      , ['label' => 'Copias-Seguridad', 'url' => ['/copias-seg']]
      , ['label' => 'Histórico-Precios', 'url' => ['/historico-precios']]
      , ['label' => 'Ofertas', 'url' => ['/Oferta']] //ATENCION: ese plural que falta!!
      , ['label' => 'Seguimientos-Usuarios', 'url' => ['/seguimientos-usuarios']]
      , ['label' => 'Regiones', 'url' => ['/regiones']]
      , ['label' => 'Tiendas', 'url' => ['/tiendas']]
      , ['label' => 'Tiendas-Etiquetas ', 'url' => ['/tiendas-etiquetas']]
      , ['label' => 'User', 'url' => ['/user']]//ATENCION: Porque dos controladores de usuario?
      , ['label' => 'Usuarios', 'url' => ['/usuarios']]
    ]]
  //----- Usuario Invitado o Conectado -----
  , Yii::$app->user->isGuest
    ? ['label' => 'Iniciar Sesión / Registrarse', 'url' => ['/user/login']]
    : ['label' => Yii::$app->user->identity->nick, 
        'items' => [
            ['label' => 'Cuenta', 'url' => ['user/get'], 'id' => Yii::$app->user->identity->id]
          , ['label' => 'logout', 'url' => ['/user/logout']]
          , Yii::$app->user->identity->rol == 'admin' 
            ? ['label' => 'Mantenimiento', 'url' => ['/usuarios']] 
            : ""
          , Yii::$app->user->identity->rol == 'admin'
            ? ['label' => 'Administración', 'url' => ['/site/menu_admin']] 
            : ""
        ],
      ]
];
