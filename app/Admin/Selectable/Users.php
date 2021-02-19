<?php

namespace App\Admin\Selectable;

use App\Models\User;
use Encore\Admin\Table\Filter;
use Encore\Admin\Table\Selectable;

class Users extends Selectable
{
    public $model = User::class;

    public function make(): void
    {
        $this->column('id', __('admin.Id'));
        $this->column('name', __('admin.Name'));
        $this->column('email', __('admin.Email'));
        $this->column('created_at', __('admin.Created at'));

        $this->filter(function (Filter $filter) {
            $filter->like('name', __('admin.Name'));
        });
    }
}
