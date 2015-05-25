<?php
return array(
//     'controllers' => array(
//         'invokables' => array(
//             'TsvFunctions\Controller\TsvFunctions' => 'TsvFunctions\Controller\TsvFunctionsController',
//         ),
//     ),
//     'router' => array(
//         'routes' => array(
//             'tsv-functions' => array(
//                 'type'    => 'Literal',
//                 'options' => array(
//                     // Change this to something specific to your module
//                     'route'    => '/tsvFunctions',
//                     'defaults' => array(
//                         // Change this value to reflect the namespace in which
//                         // the controllers for your module are found
//                         '__NAMESPACE__' => 'TsvFunctions\Controller',
//                         'controller'    => 'TsvFunctions',
//                         'action'        => 'index',
//                     ),
//                 ),
//                 'may_terminate' => true,
//                 'child_routes' => array(
//                     // This route is a sane default when developing a module;
//                     // as you solidify the routes for your module, however,
//                     // you may want to remove it and replace it with more
//                     // specific routes.
//                     'default' => array(
//                         'type'    => 'Segment',
//                         'options' => array(
//                             'route'    => '/[:controller[/:action]]',
//                             'constraints' => array(
//                                 'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                 'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
//                             ),
//                             'defaults' => array(
//                             ),
//                         ),
//                     ),
//                 ),
//             ),
//         ),
//     ),
    'view_manager' => array(
        'template_path_stack' => array(
            'TsvFunctions' => __DIR__ . '/../view',
        ),
   		'template_map' => array(
   			'layout/admin'	=> __DIR__ . '/../view/zfc-admin/layout/admin.phtml',
   			'zfc-admin/admin/index'	=> __DIR__ . '/../view/zfc-admin/admin/index.phtml',
        ),
    ),
	'view_helpers' => array(
			'invokables' => array(
					'substr2' 		=> 'TsvFunctions\View\Helper\Substr2',
					'money' 		=> 'TsvFunctions\View\Helper\Money',
					'error' 		=> 'TsvFunctions\View\Helper\Error',
					'getDateSelect'	=> 'TsvFunctions\View\Helper\getDateSelect',
			),
	),
		
);
