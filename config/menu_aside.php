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
                    'page' => 'ajouter/1/devis'
                ],
                [
                    'title' => 'Factures',
                    'page' => 'ajouter/1/factures'
                ],
                [
                    'title' => 'Paiements',
                    'page' => 'ajouter/1/paiements'
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
                    'page' => 'tableau/1/devis'
                ],
                [
                    'title' => 'Factures',
                    'page' => 'tableau/1/factures'
                ],
                [
                    'title' => 'Paiements',
                    'page' => 'tableau/1/paiements'
                ],
            ]
        ],

        // Edis Pays-Basque
        [
            'section' => 'EDIS Pays-Basque',
        ],
        [
            'title' => 'Ajouter',
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => 'ajouter/2/clients'
                ],
                [
                    'title' => 'Chantier',
                    'page' => 'ajouter/2/chantiers'
                ],
                [
                    'title' => 'Devis',
                    'page' => 'ajouter/2/devis'
                ],
                [
                    'title' => 'Factures',
                    'page' => 'ajouter/2/factures'
                ],
                [
                    'title' => 'Paiements',
                    'page' => 'ajouter/2/paiements'
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
                    'page' => 'tableau/2/clients'
                ],
                [
                    'title' => 'Chantier',
                    'page' => 'tableau/2/chantiers'
                ],
                [
                    'title' => 'Devis',
                    'page' => 'tableau/2/devis'
                ],
                [
                    'title' => 'Factures',
                    'page' => 'tableau/2/factures'
                ],
                [
                    'title' => 'Paiements',
                    'page' => 'tableau/2/paiements'
                ],
            ]
        ],


    ]

];
