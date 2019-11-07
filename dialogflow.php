<?php

class dialogFlow
{
    
	public function __construct()
    {
        
    }
    public function parseEvents()
    {
    	if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            error_log('Method not allowed');
            exit();
        }
        $entityBody = file_get_contents('php://input');

        if (strlen($entityBody) === 0) {
            http_response_code(400);
            error_log('Missing request body');
            exit();
        }


        $data = json_decode($entityBody, true);
        if (!isset($data['queryResult'])) {
            http_response_code(400);
            error_log('Invalid request body: missing events property');
            exit();
        }
        return $data;
    }

}

?>