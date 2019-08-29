$client = new Client();
        //$uri = 'http://localhost:8080/digizigs/api/v1/mail';
        $uri = 'http://www.digizigs.com/api/v1/mail';
    
        $params['headers'] = [
                            'Accept' => 'application/json',
                            //'Content-type' => 'application/json',
                            'Authorization' => 'Bearer 0qmZS2W2CaDM3it0EVmlv2ld8VTSYAWYYotCskocbYLTpnUvRIPzSgCP1XtOzrpri6uvnpZd9Vo6Qv1z'
                            //'Authorization' => 'Bearer 5ed3fbecb5ffb84347059955a339bc7b5db4fa1c81283193b2a547cb15e7fe4f'
                        ];
        $params['form_params'] =[
                                'type' => $request->filter,
                                'email' => 'info@digizigs.com'
                            ];
        $data = $client->post($uri, $params);
        return request()->json(200,json_decode($data->getBody(), true));