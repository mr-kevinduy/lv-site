<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    protected $prefix = 'admin';
    protected $resource = null;

    /**
     * The view of controller.
     *
     * @param  string  $routePath
     * @param  array  $data
     * @return \Illuminate\View\View
     */
    public function view($routePath = '', $data = []): View
    {
        $viewPath = [];

        if (! empty($this->prefix)) {
            $viewPath[] = $this->prefix;
        }

        if (! empty($this->resource)) {
            $viewPath[] = $this->resource;
        }

        return view(implode('.', array_merge($viewPath, [$routePath])), $data);
    }
}
