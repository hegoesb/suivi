<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        [
            'title' => 'Copier/Deplacer Plan',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Bezier-curve.svg', // or can be 'flaticon-home' or any flaticon-*
            // 'page' => '/copierDeplacerPlan',
            'page' => '#',
            'new-tab' => false,
        ],
        // Edis Bordeaux
        [
            'section' => 'EDIS Bordeaux',
        ],
        [
            'title' => 'Ajouter',
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'ajouter/1/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'ajouter/1/chantiers'
                ],
                [
                    'title' => 'Devis',
                    // 'page' => 'ajouter/1/devis'
                    'page' => '#'
                ],
                [
                    'title' => 'Factures',
                    // 'page' => 'ajouter/1/factures'
                    'page' => '#'
                ],
                [
                    'title' => 'Réglements',
                    // 'page' => 'ajouter/1/reglements'
                    'page' => '#'
                ],
            ]
        ],
        [
            'title' => 'Tableaux',
            'icon' => 'media/svg/icons/Layout/Layout-left-panel-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'tableau/1/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'tableau/1/chantiers'
                ],
                [
                    'title' => 'Devis',
                    // 'page' => 'tableau/1/devis'
                    'page' => '#'
                ],
                [
                    'title' => 'Factures',
                    // 'page' => 'tableau/1/factures'
                    'page' => '#'
                ],
                [
                    'title' => 'Réglements',
                    // 'page' => 'tableau/1/reglements'
                    'page' => '#'
                ],
            ]
        ],
        [
            'title' => 'Documents',
            'icon' => 'media/svg/icons/Files/Folder-cloud.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Devis',
                    'page' => '#'
                    // 'page' => 'document/1/devis'
                ],
                [
                    'title' => 'Factures',
                    // 'page' => 'document/1/factures'
                    'page' => '#'
                ],
            ]
        ],
        // Edis Bordeaux
        [
            'section' => 'EDIS ENR PV',
        ],
        [
            'title' => 'Ajouter',
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'ajouter/3/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'ajouter/3/chantiers'
                ],
            ]
        ],
        [
            'title' => 'Tableaux',
            'icon' => 'media/svg/icons/Layout/Layout-left-panel-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'tableau/3/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'tableau/3/chantiers'
                ],
            ]
        ],

        // Edis Bordeaux
        [
            'section' => 'EDIS ENR CLIM',
        ],
        [
            'title' => 'Ajouter',
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'ajouter/4/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'ajouter/4/chantiers'
                ],
            ]
        ],
        [
            'title' => 'Tableaux',
            'icon' => 'media/svg/icons/Layout/Layout-left-panel-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'tableau/4/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'tableau/4/chantiers'
                ],
            ]
        ],

        // Edis Bordeaux
        [
            'section' => 'BFEG',
        ],
        [
            'title' => 'Ajouter',
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'ajouter/5/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'ajouter/5/chantiers'
                ],
            ]
        ],
        [
            'title' => 'Tableaux',
            'icon' => 'media/svg/icons/Layout/Layout-left-panel-2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'tableau/5/clients'
                ],
                [
                    'title' => 'Chantiers',
                    'page' => 'tableau/5/chantiers'
                ],
            ]
        ],

        // Edis Pays-Basque
        // [
        //     'section' => 'EDIS Pays-Basque',
        // ],
        // [
        //     'title' => 'Ajouter',
        //     'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Clients',
        //             'page' => 'ajouter/2/clients'
        //         ],
        //         [
        //             'title' => 'Chantier',
        //             'page' => 'ajouter/2/chantiers'
        //         ],
        //         [
        //             'title' => 'Devis',
        //             'page' => 'ajouter/2/devis'
        //         ],
        //         [
        //             'title' => 'Factures',
        //             'page' => 'ajouter/2/factures'
        //         ],
        //         [
        //             'title' => 'Réglements',
        //             'page' => 'ajouter/2/reglements'
        //         ],
        //     ]
        // ],
        // [
        //     'title' => 'Tableaux',
        //     'icon' => 'media/svg/icons/Layout/Layout-left-panel-2.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Clients',
        //             'page' => 'tableau/2/clients'
        //         ],
        //         [
        //             'title' => 'Chantier',
        //             'page' => 'tableau/2/chantiers'
        //         ],
        //         [
        //             'title' => 'Devis',
        //             'page' => 'tableau/2/devis'
        //         ],
        //         [
        //             'title' => 'Factures',
        //             'page' => 'tableau/2/factures'
        //         ],
        //         [
        //             'title' => 'Réglements',
        //             'page' => 'tableau/2/reglements'
        //         ],
        //     ]
        // ],
        // [
        //     'title' => 'Documents',
        //     'icon' => 'media/svg/icons/Files/Folder-cloud.svg',
        //     'bullet' => 'dot',
        //     'root' => true,
        //     'submenu' => [
        //         [
        //             'title' => 'Devis',
        //             'page' => 'document/2/devis'
        //         ],
        //         [
        //             'title' => 'Factures',
        //             'page' => 'document/2/factures'
        //         ],
        //     ]
        // ],

    ]

];
