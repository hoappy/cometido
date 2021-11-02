<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistema de Cometidos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    /*[
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],*/
                    //['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    //['label' => 'Yii2 PROVIDED', 'header' => true],
                    //['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    //['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    //['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    //link menu cometidos
                    ['label' => 'Cometidos', 'header' => true],
                    [
                        'label' => 'Cometidos',
                        'items' => [
                            ['label' => 'Mis Cometidos', 'iconStyle' => 'far', 'url' => ['cometido/index1']],
                            ['label' => 'Cometidos por Autorizar', 'iconStyle' => 'far', 'url' => ['cometido/index2']],
                            ['label' => 'Cometidos por Aprobar', 'iconStyle' => 'far', 'url' => ['cometido/index3']],
                            ['label' => 'Cometidos ya Aprobados', 'iconStyle' => 'far', 'url' => ['cometido/index4']],
                        ]
                    ],   
                    //link Menu Izquierdo para el mantenimiento de maestros
                    ['label' => 'Mantenimiento Maestro', 'header' => true],
                    [
                        'label' => 'Funcionarios',
                        'items' => [
                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['users/index']],
                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['users/create']],
                        ]
                    ],
                    [
                        'label' => 'Cometidos',
                        'items' => [
                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['cometido/index']],
                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['cometido/create']],
                        ],
                        [
                            'label' => 'Modificacion Cometido',
                            'items' => [
                                ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['modificacionCometido/index']],
                                ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['modificacionCometido/create']],
                            ]
                        ],
                    ],
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
                        'label' => 'Destino',
                        'items' => [
                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['destino/index']],
                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['destino/create']],
                        ]
                    ],
                    [
                        'label' => 'Viaje',
                        'items' => [
                            ['label' => 'Listas', 'iconStyle' => 'far', 'url' => ['viaje/index']],
                            ['label' => 'Agregar', 'iconStyle' => 'far', 'url' => ['viaje/create']],
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
                    
                    
                    //['label' => 'Level1'],
                    //['label' => 'LABELS', 'header' => true],
                    //['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    //['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    //['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>