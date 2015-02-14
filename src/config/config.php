<?php
use Rocketeer\Services\Connections\ConnectionsHandler;

return array(

    // The name of the application to deploy
    // This will create a folder of the same name in the root directory
    // configured above, so be careful about the characters used
    'application_name' => '{application_name}',

    // Plugins
    ////////////////////////////////////////////////////////////////////

    // The plugins to load
    'plugins'          => array(
        // 'Rocketeer\Plugins\Slack\RocketeerSlack',
    ),

    // Logging
    ////////////////////////////////////////////////////////////////////

    // The schema to use to name log files
    'logs'             => function (ConnectionsHandler $connections) {
        return sprintf('%s-%s.log', $connections->getCurrent(), date('Ymd'));
    },

    // Remote access
    //
    // You can either use a single connection or an array of connections
    ////////////////////////////////////////////////////////////////////

    // The default remote connection(s) to execute tasks on
    'default'          => array('{connection}'),

    // The various connections you defined
    // You can leave all of this empty or remove it entirely if you don't want
    // to track files with credentials : Rocketeer will prompt you for your credentials
    // and store them locally.
    // There are four ways to define a credential:
    // 'foobar'   - value is required, will never be prompted for it
    // ''         - value is required, will be prompted for it once, then saved
    // true       - value is required, will be prompted for it every time
    // false|null - value is not required, will never be prompted for it
    'connections'      => array(
        'production' => array(
            'host'      => '{host}',
            'username'  => '{username}',
            'password'  => '{password}',
            'key'       => '{key}',
            'keyphrase' => '{keyphrase}',
            'agent'     => '{agent}',
            'db_role'   => true,
        ),
    ),

    /*
     * In most multiserver scenarios, migrations must be run in an exclusive server.
     * In the event of not having a separate database server (in which case it can
     * be handled through connections), you can assign a 'db_role' => true to the
     * server's configuration and it will only run the migrations in that specific
     * server at the time of deployment.
     */
    'use_roles'        => false,

    // Contextual options
    //
    // In this section you can fine-tune the above configuration according
    // to the stage or connection currently in use.
    // Per example :
    // 'stages' => array(
    // 	'staging' => array(
    // 		'scm' => array('branch' => 'staging'),
    // 	),
    //  'production' => array(
    //    'scm' => array('branch' => 'master'),
    //  ),
    // ),
    ////////////////////////////////////////////////////////////////////

    'on'               => array(

        // Stages configurations
        'stages'      => array(),
        // Connections configuration
        'connections' => array(),

    ),

);
