<?php

require __DIR__ . '/../../vendor/autoload.php';

spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = [
                'shinkyumartialarts\\mailtrap\\mailtrap' => '/../../src/Mailtrap.php',
                'shinkyumartialarts\\mailtrap\\api\\api' => '/../../src/Api/Api.php',
                'shinkyumartialarts\\mailtrap\\entities\\attachment' => '/../../src/Entities/Attachment.php',
                'shinkyumartialarts\\mailtrap\\entities\\company' => '/../../src/Entities/Company.php',
                'shinkyumartialarts\\mailtrap\\entities\\corsdomain' => '/../../src/Entities/CorsDomain.php',
                'shinkyumartialarts\\mailtrap\\entities\\forwardrule' => '/../../src/Entities/ForwardRule.php',
                'shinkyumartialarts\\mailtrap\\entities\\inbox' => '/../../src/Entities/Inbox.php',
                'shinkyumartialarts\\mailtrap\\entities\\inboxuser' => '/../../src/Entities/InboxUser.php',
                'shinkyumartialarts\\mailtrap\\entities\\message' => '/../../src/Entities/Message.php',
                'shinkyumartialarts\\mailtrap\\entities\\sharedinbox' => '/../../src/Entities/SharedInbox.php',
                'shinkyumartialarts\\mailtrap\\entities\\shareduser' => '/../../src/Entities/SharedUser.php',
                'shinkyumartialarts\\mailtrap\\entities\\user' => '/../../src/Entities/User.php',
                'shinkyumartialarts\\mailtrap\\entities\\extensions\\hydrateentity' => '/../../src/Entities/Extensions/HydrateEntity.php',
                'shinkyumartialarts\\mailtrap\\exceptions\\invalidendpointexception' => '/../../src/Exceptions/InvalidEndpointException.php',
                'shinkyumartialarts\\mailtrap\\exceptions\\invalidhttpmethodexception' => '/../../src/Exceptions/InvalidHttpMethodException.php',
            ];
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
