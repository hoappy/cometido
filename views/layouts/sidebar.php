<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Cometidos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!--<img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
                <!-- Aqui insertar el nombre del usuario -->
                <?php

                use yii\helpers\Html;

                if (!Yii::$app->user->isGuest) { ?>

                    <span class="font-weight-bold text-info text-md-right"><?= Yii::$app->user->identity->nombre ?></span>

                <?php
                } else {
                    echo Html::a('<i class="fas fa-sign-out-alt">Iniciar Sesion</i>', ['/site/login'], ['data-method' => 'post', 'class' => 'nav-link']);
                }
                ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            // menu de Funcionarios
            if (!Yii::$app->user->isGuest) {
                if (Yii::$app->user->identity->role == 0) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Cometido', 'header' => true],
                            ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],
                        ]
                    ]);
                }
                // menu de Encargado Vehiculo
                if (Yii::$app->user->identity->role == 1) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Cometido', 'header' => true],
                            ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],
                            ['label' => 'Asignar', 'header' => true],
                            ['label' => 'Asignar Vehiculo', 'iconStyle' => 'far', 'url' => ['viaje/cometidos4']],
                        ]
                    ]);
                }
                // menu de Choferes
                if (Yii::$app->user->identity->role == 2) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Cometido', 'header' => true],
                            ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],
                            ['label' => 'Viajes', 'header' => true],
                            [
                                'label' => 'Viajes',
                                'items' => [
                                    //['label' => 'Todos mis Viajes', 'iconStyle' => 'far', 'url' => ['viaje/cometidos']],
                                    ['label' => 'Viajes por iniciar', 'iconStyle' => 'far', 'url' => ['viaje/cometidos1']],
                                    ['label' => 'Viajes iniciados', 'iconStyle' => 'far', 'url' => ['viaje/cometidos2']],
                                    ['label' => 'Viajes Terminados', 'iconStyle' => 'far', 'url' => ['viaje/cometidos3']],

                                ],
                            ],
                        ]
                    ]);
                }
                // menu de Jefe y Jefe Suplente
                if (Yii::$app->user->identity->role == 3 || Yii::$app->user->identity->role == 4) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Cometidos', 'header' => true],
                            [
                                'label' => 'Cometidos',
                                'items' => [
                                    ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],
                                    ['label' => 'Cometidos por Aprobar', 'iconStyle' => 'far', 'url' => ['cometido/index3']],
                                    ['label' => 'Cometidos ya Aprobados', 'iconStyle' => 'far', 'url' => ['cometido/index4']],
                                ],
                            ],
                            ['label' => 'Estadisticas', 'header' => true],
                            [
                                'label' => 'Estadisticas',
                                'items' => [
                                    //['label' => 'Todos mis Viajes', 'iconStyle' => 'far', 'url' => ['viaje/cometidos']],
                                    ['label' => 'Reporte Cometido', 'iconStyle' => 'far', 'url' => ['reporte/cometido']],
                                    ['label' => 'Reporte Viatico', 'iconStyle' => 'far', 'url' => ['reporte/viatico']],
                                    ['label' => 'Reporte Sector', 'iconStyle' => 'far', 'url' => ['reporte/sector']],
                                    ['label' => 'Reporte Viaje', 'iconStyle' => 'far', 'url' => ['reporte/viaje']],
                                    ['label' => 'Reporte Rechazo', 'iconStyle' => 'far', 'url' => ['reporte/rechazo']],

                                ],
                            ],
                        ]
                    ]);
                }
                // menu de Director y Director Suplente
                if (Yii::$app->user->identity->role == 5 || Yii::$app->user->identity->role == 6) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            [
                                'label' => 'Cometidos',
                                'items' => [
                                    ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],
                                    ['label' => 'Cometidos por Autorizar', 'iconStyle' => 'far', 'url' => ['cometido/index2']],
                                    ['label' => 'Cometidos ya Autorizados', 'iconStyle' => 'far', 'url' => ['cometido/index5']],
                                ],
                            ],
                            ['label' => 'Estadisticas', 'header' => true],
                            [
                                'label' => 'Estadisticas',
                                'items' => [
                                    //['label' => 'Todos mis Viajes', 'iconStyle' => 'far', 'url' => ['viaje/cometidos']],
                                    ['label' => 'Reporte Cometido', 'iconStyle' => 'far', 'url' => ['reporte/cometido']],
                                    ['label' => 'Reporte Viatico', 'iconStyle' => 'far', 'url' => ['reporte/viatico']],
                                    ['label' => 'Reporte Sector', 'iconStyle' => 'far', 'url' => ['reporte/sector']],
                                    ['label' => 'Reporte Viaje', 'iconStyle' => 'far', 'url' => ['reporte/viaje']],
                                    ['label' => 'Reporte Rechazo', 'iconStyle' => 'far', 'url' => ['reporte/rechazo']],

                                ],
                            ],
                        ]
                    ]);
                }
                // menu de Administrador
                if (Yii::$app->user->identity->role == 7) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Cometido', 'header' => true],
                            ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],
                            ['label' => 'Mantencion Maestros', 'header' => true],
                            [
                                'label' => 'Vehiculo',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['vehiculo/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['vehiculo/create']],
                                ]
                            ],
                            [
                                'label' => 'Departamento',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['departamento/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['departamento/create']],
                                ]
                            ],
                            [
                                'label' => 'Destinos',
                                'items' => [
                                    [
                                        'label' => 'Provincia',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['provincia/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['provincia/create']],
                                        ]
                                    ],
                                    [
                                        'label' => 'Region',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['region/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['region/create']],
                                        ]
                                    ],
                                    [
                                        'label' => 'Ciudad',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['ciudad/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['ciudad/create']],
                                        ]
                                    ],
                                    [
                                        'label' => 'Sector',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['sector/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['sector/create']],
                                        ]
                                    ],
                                ]
                            ],
                            [
                                'label' => 'Item Presupuestario',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['item-presupuestario/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['item-presupuestario/create']],
                                    [
                                        'label' => 'Monto',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['monto/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['monto/create']],
                                        ]
                                    ],
                                ],

                            ],

                            ['label' => 'Usuarios', 'header' => true],
                            [
                                'label' => 'Usuarios',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['users/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['site/register']],
                                ]
                            ],
                        ]
                    ]);
                }
                //menu super administrador
                if (Yii::$app->user->identity->role == 8) {
                    echo \hail812\adminlte\widgets\Menu::widget([
                        'items' => [
                            //menu funcionario
                            ['label' => 'Cometido', 'header' => true],
                            //['label' => 'Todos Los Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index']],
                            ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],

                            //menu asignador
                            ['label' => 'Asignar', 'header' => true],
                            ['label' => 'Asignar Vehiculo', 'iconStyle' => 'far', 'url' => ['viaje/cometidos4']],

                            //menu chofer
                            ['label' => 'Viajes (chofer)', 'header' => true],
                            [
                                'label' => 'Viajes',
                                'items' => [
                                    //['label' => 'Todos mis Viajes', 'iconStyle' => 'far', 'url' => ['viaje/cometidos']],
                                    ['label' => 'Viajes por iniciar', 'iconStyle' => 'far', 'url' => ['viaje/cometidos1']],
                                    ['label' => 'Viajes iniciados', 'iconStyle' => 'far', 'url' => ['viaje/cometidos2']],
                                    ['label' => 'Viajes Terminados', 'iconStyle' => 'far', 'url' => ['viaje/cometidos3']],

                                ],
                            ],
                            //menbu jefes
                            ['label' => 'Jefes', 'header' => true],
                            [
                                'label' => 'Cometidos',
                                'items' => [
                                    ['label' => 'Cometidos por Aprobar', 'iconStyle' => 'far', 'url' => ['cometido/index3']],
                                    ['label' => 'Cometidos ya Aprobados', 'iconStyle' => 'far', 'url' => ['cometido/index4']],
                                ],
                            ],
                            // menu directores
                            ['label' => 'Directores', 'header' => true],
                            [
                                'label' => 'Cometidos',
                                'items' => [
                                    ['label' => 'Cometidos por Autorizar', 'iconStyle' => 'far', 'url' => ['cometido/index2']],
                                    ['label' => 'Cometidos ya Autorizados', 'iconStyle' => 'far', 'url' => ['cometido/index5']],
                                ],
                            ],
                            ['label' => 'Administrador', 'header' => true],
                            [
                                'label' => 'Vehiculo',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['vehiculo/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['vehiculo/create']],
                                ]
                            ],
                            [
                                'label' => 'Departamento',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['departamento/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['departamento/create']],
                                ]
                            ],
                            [
                                'label' => 'Destinos',
                                'items' => [
                                    [
                                        'label' => 'Provincia',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['provincia/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['provincia/create']],
                                        ]
                                    ],
                                    [
                                        'label' => 'Region',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['region/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['region/create']],
                                        ]
                                    ],
                                    [
                                        'label' => 'Ciudad',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['ciudad/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['ciudad/create']],
                                        ]
                                    ],
                                    [
                                        'label' => 'Sector',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['sector/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['sector/create']],
                                        ]
                                    ],
                                ]
                            ],
                            [
                                'label' => 'Item Presupuestario',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['item-presupuestario/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['item-presupuestario/create']],
                                    [
                                        'label' => 'Monto',
                                        'items' => [
                                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['monto/index']],
                                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['monto/create']],
                                        ]
                                    ],
                                ],

                            ],

                            ['label' => 'Usuarios', 'header' => true],
                            [
                                'label' => 'Usuarios',
                                'items' => [
                                    ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['users/index']],
                                    ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['site/register']],
                                ]
                            ],
                            ['label' => 'Estadisticas', 'header' => true],
                            [
                                'label' => 'Estadisticas',
                                'items' => [
                                    //['label' => 'Todos mis Viajes', 'iconStyle' => 'far', 'url' => ['viaje/cometidos']],
                                    ['label' => 'Reporte Cometido', 'iconStyle' => 'far', 'url' => ['reporte/cometido']],
                                    ['label' => 'Reporte Viatico', 'iconStyle' => 'far', 'url' => ['reporte/viatico']],
                                    ['label' => 'Reporte Sector', 'iconStyle' => 'far', 'url' => ['reporte/sector']],
                                    ['label' => 'Reporte Viaje', 'iconStyle' => 'far', 'url' => ['reporte/viaje']],
                                    ['label' => 'Reporte Vehiculos Rechazados', 'iconStyle' => 'far', 'url' => ['reporte/rechazo']],

                                ],
                            ],
                        ]
                    ]);
                }
            }

            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>