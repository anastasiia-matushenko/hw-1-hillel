<?php

namespace App\Controllers\V1;

use App\Controllers\BaseApiController;
use App\Enums\Http\Status;

class FoldersController extends BaseApiController
{
    public function index()
    {
        return $this->response(Status::OK, ['message' => "Folders list"]);
    }

    public function show(int $id)
    {
        return $this->response(Status::OK, ['method' => 'show',
            'params' => [$id]]);
    }
    public function store()
    {
        return $this->response(Status::OK, ['method' => 'store']);
    }
    public function update(int $id)
    {
        return $this->response(Status::OK, ['method' => 'update',
            'params' => [$id]]);
    }
    public function delete(int $id)
    {
        return $this->response(Status::OK, ['method' => 'delete',
            'params' => [$id]]);
    }

}