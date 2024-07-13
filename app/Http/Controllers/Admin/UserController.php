<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends AdminController
{
    protected $resource = 'users';

    /**
     * Show list users.
     */
    public function index(Request $request): View
    {
        $items = User::paginate(10);

        return $this->view('index', compact('items'));
    }
}
