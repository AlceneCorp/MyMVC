<?php

use App\Managers\LogsManager;
use App\Core\SessionsManager;

function addLogs($param_Level, $param_Category, $param_Message)
{
	$logManager = new LogsManager();

	// Log de succès après l'exécution
    $logManager->addLogs([
        'LEVEL' => $param_Level, 
        'CATEGORY' => $param_Category, 
        'MESSAGE' => $param_Message,
        'USERS_ID' => (SessionsManager::has('USERS') ? SessionsManager::get('USERS')->getID() : 0),
        'IP_ADDRESS' => $_SERVER['REMOTE_ADDR'],
        'METHOD' => $_SERVER['REQUEST_METHOD'],
        'URI' => BASE_URL . $_SERVER['REQUEST_URI']
    ]);
}