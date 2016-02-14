<?php
return array(
    array(
        'name'  => 'Order',
        'icon'  => 'fa fa-smile-o',
        'sub'   => array(
            array(
                        'name'  => 'Place Order',
                        'url'   => 'user/user_order/add',
                        'icon'  => 'fa fa-plus'
            ),
            array(
                'name'  => ' Your Orders',
                'url'   =>  'user/user_order/list',
                'icon'  => 'fa fa-eye'
            ),
            array(
                'name'  => 'Recurring Orders',
                'url'   =>  'user/user_order/reoccuring_order',
                'icon'  => 'fa fa-eye'
            )
        )
    ),

    array(
        'name'  => 'Prescription',
        'icon'  => 'fa fa-pencil-square-o',
        'sub'   => array(
            array(
                'name'  => 'Add',
                'url'   => 'user/prescription/add',
                'icon'  => 'fa fa-plus'
            ),
            array(
                'name'  => 'Overview',
                'url'   =>  'user/prescription/list',
                'icon'  => 'fa fa-eye'
            )
        )
    ),
);