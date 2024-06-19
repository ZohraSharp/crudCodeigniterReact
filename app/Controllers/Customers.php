<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CustomerModel;

class Customers extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    use ResponseTrait;
    public function index()
    {
      
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        
        $customerModel = new CustomerModel();
        $data = $customerModel->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $CustomerModel = new CustomerModel();
        $data = $CustomerModel->find(['id'  => $id]);
        if (!$data) return $this->failNotFound('No Data Found');
        return $this->respond($data[0]);   
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'name' => 'required',
            'email'=>'required',
            'password'=>'required', // Corrected typo here
            'dob' => 'required'
        ]; 
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'dob' => $this->request->getVar('dob')
        ];
        if(!$this->validate($rules)){
            return $this->fail($this->validator->getErrors());
        }
        $customerModel = new CustomerModel();
        $customerModel->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data Inserted'
            ]
        ];
        return $this->respondCreated($response);
    }
    

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    
    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        helper(['form']);
        $rules = [
            'name' => 'required',
            'email'=>'required',
            'password'=>'required',
            'dob' => 'required'
        ]; 
        $data = [
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
        'password' => $this->request->getVar('password'),
        'dob' => $this->request->getVar('dob')];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());

        $customerModel = new CustomerModel();
        $find = $customerModel->find(['id' => $id]);
        if(!$find) return $this->failNotFound('No Data Found');
        $customerModel->update($id, $data);
        
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data updated'
            ]
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $customerModel = new customerModel();
        $find = $customerModel->find(['id' => $id]);
        if(!$find) return $this->failNotFound('No Data Found');
        $customerModel->delete($id);
        
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data deleted'
            ]
        ];
        return $this->respond($response);
    }
}
