<?php

use Phalcon\Http\Response;
use Phalcon\Http\Request;

class APIController extends \Phalcon\Mvc\Controller
{
    public function respon()
    {
        $statusRespon = [
            "code" => "500",
            "response" => "Internal Server Error",
            "message" => "Something wrong!!!"
        ];
        return $statusRespon;
    }

    public function getAction()
    {
        $this->view->disable();
        $users = Users::find();

        $response = new Response();
        $request = new Request();

        if ($request->isGet()) {
            $returnData = $users;
            $returnStatus = [
                "code" => 200,
                "response" => "OK",
                "message" => "Request data was successfully completed."
            ];

            $response->setJsonContent([
                "status" => $returnStatus,
                "result" => $returnData
            ]);
            
        } else {
            $returnStatus = [
                "code" => 500,
                "response" => "Internal Server Error",
                "message" => "Failed to get all user!"
            ];
            $response->setJsonContent([
                "status" => $returnStatus,
                "result" => "Failed!"
            ]);
        }

        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');      
        $response->sendHeaders();
        $response->send();
    }

    public function postAction()
    {
        $this->view->disable();
        $users = new Users();
        $response = new Response();
        $request = new Request();
        $nik = $request->getPost("nik");
        $usersCheck = Users::findFirstBynik($nik);
        $name = $request->getPost("name");
        $sex = $request->getPost("sex");
        $religion = $request->getPost("religion");
        $phone = $request->getPost("phone");
        $address = $request->getPost("address");

        if ($usersCheck == null && $nik != null && $name != null && $sex != null && $religion != null && $phone != null && $address != null) {
            $users->nik = $nik;
            $users->name = $name;
            $users->sex = $sex;
            $users->religion = $religion;
            $users->phone = $phone;
            $users->address = $address;

            if ($request->isPost()) {
                $returnData = $users;
                $returnStatus = [
                    "code" => 201,
                    "response" => "Created",
                    "message" => "User added successfully."
                ];
                $users->save();
                $response->setJsonContent([
                    "status" => $returnStatus,
                    "result" => $returnData
                    ]);
            }
            else {
                $response->setJsonContent(["status" => $this->respon()]);
            }
        }
        else {
            $returnStatus = [
                "code" => 500,
                "response" => "Internal Server Error",
                "message" => "Failed to added user!"
            ];
            $response->setJsonContent([
                "status" => $returnStatus,
                "result" => "All data must be filled or NIK does exist."
            ]);
        }

        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');      
        $response->sendHeaders();
        $response->send();
    }

    public function updateAction()
    {
        $this->view->disable();
        $response = new Response();
        $request = new Request();
        $id = $request->getPost("id");
        $users = Users::findFirstByid($id);
        $nik = $request->getPost("nik");
        $name = $request->getPost("name");
        $sex = $request->getPost("sex");
        $religion = $request->getPost("religion");
        $phone = $request->getPost("phone");
        $address = $request->getPost("address");

        if ($users != null && $nik != null && $name != null && $sex != null && $religion != null && $phone != null && $address != null) {
            $users->nik = $nik;
            $users->name = $name;
            $users->sex = $sex;
            $users->religion = $religion;
            $users->phone = $phone;
            $users->address = $address;

            if ($request->isPost()) {
                $returnData = $users;
                $returnStatus = [
                    "code" => 201,
                    "response" => "Created",
                    "message" => "User updated successfully."
                ];
                $users->save();
                $response->setJsonContent([
                    "status" => $returnStatus,
                    "result" => $returnData
                ]);
            }
            else {
                $response->setJsonContent(["status" => $this->respon()]);
            }
        }
        else {
            $returnStatus = [
                "code" => 500,
                "response" => "Internal Server Error",
                "message" => "Failed to update user! All data must be filled or NIK doesn't exist."
            ];
            $response->setJsonContent([
                "status" => $returnStatus,
                "result" => $users
            ]);
        }

        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');      
        $response->sendHeaders();
        $response->send();
    }

    public function deleteAction()
    {
        $this->view->disable();
        $id = $this->request->getPost("id");
        $response = new Response();
        $request = new Request();
        $users = Users::findFirstByid($id);

        if ($id != null && $users != null) {
            if ($request->isPost()) {
                $returnStatus = [
                    "code" => 200,
                    "response" => "OK",
                    "message" => "User deleted successfully."
                ];
                $users->delete();
                $response->setJsonContent([
                    "status" => $returnStatus,
                    "result" => "Success"
                ]);
            }
            else {
                $response->setJsonContent(["status" => $this->respon()]);
            }
        }
        else {
            $returnStatus = [
                "code" => 500,
                "response" => "Internal Server Error",
                "message" => "Failed to delete user!"
            ];
            $response->setJsonContent([
                "status" => $returnStatus,
                "result" => "ID must be filled or ID doesn't exist."
            ]);
        }

        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');      
        $response->sendHeaders();
        $response->send();
    }

    public function searchAction()
    {
        $this->view->disable();
        $users = new Users();
        $response = new Response();
        $request = new Request();
        $nik = $request->getPost("nik");
        $users = Users::findFirstBynik($nik);

        if ($users != null && $nik != null) {
            if ($request->isPost()) {
                $returnData = $users;
                $returnStatus = [
                    "code" => 200,
                    "response" => "OK",
                    "message" => "Search user was successfully."
                ];
                $response->setJsonContent([
                    "status" => $returnStatus,
                    "result" => $returnData
                    ]);
            }
            else {
                $response->setJsonContent(["status" => $this->respon()]);
            }
        }
        else {
            $returnStatus = [
                "code" => 500,
                "response" => "Internal Server Error",
                "message" => "Failed to search user!"
            ];
            $response->setJsonContent([
                "status" => $returnStatus,
                "result" => "NIK must be filled or NIK doesn't exist."
            ]);
        }

        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');      
        $response->sendHeaders();
        $response->send();
    }
}
