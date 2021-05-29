<?php
declare(strict_types=1);

class UsersController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function createAction()
    {
        $users = new Users();
        $users->nik = $this->request->getPost("txt_nik");
        $users->name = $this->request->getPost("txt_name");
        $users->sex = $this->request->getPost("txt_sex");
        $users->religion = $this->request->getPost("txt_religion");
        $users->phone = $this->request->getPost("txt_phone");
        $users->address = $this->request->getPost("txt_address");

        if (!$users->save()) {
            // echo "Failed to save";
            $messages = $users->getMessages();
            foreach ($messages as $message) {
                echo $message . PHP_EOL;
            }
        }
        else {
            echo "Saved successfully";
        }
    }

    public function viewDataAction()
    {
        $users = Users::find();
        $this->view->datas = $users;
    }

    public function apiDataAction()
    {
        $phql = 'SELECT * FROM users ORDER BY id';

        $users = Users::executeQuery($phql);

        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'id'   => $user->id,
                'name' => $user->nik,
            ];
        }

        echo json_encode($data);
    }

    public function editAction($id)
    {
        $users = Users::findFirstByid($id);
        $this->view->id = $users->id;
        $this->view->nik = $users->nik;
        $this->view->name = $users->name;
        $this->view->sex = $users->sex;
        $this->view->religion = $users->religion;
        $this->view->phone = $users->phone;
        $this->view->address = $users->address;
    }

    public function updateAction()
    {
        $id = $this->request->getPost("txt_id");
        $users = Users::findFirstByid($id);
        $users->nik = $this->request->getPost("txt_nik");
        $users->name = $this->request->getPost("txt_name");
        $users->sex = $this->request->getPost("txt_sex");
        $users->religion = $this->request->getPost("txt_religion");
        $users->phone = $this->request->getPost("txt_phone");
        $users->address = $this->request->getPost("txt_address");

        if (!$users->save()) {
        echo "Failed to update";
        }
        else
        {
            echo "Upadeted successfully";
        }
    }

    public function deleteAction($id)
    {
        $users = Users::findFirstByid($id);

        if (!$users->delete()) {
            echo "Failed to delete";
            }
            else
            {
                echo "Deleted successfully";
            }
    }

}

