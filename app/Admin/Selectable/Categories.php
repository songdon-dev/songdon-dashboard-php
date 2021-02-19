<?php

namespace App\Admin\Selectable;

use App\Models\Category;
use Encore\Admin\Table\Filter;
use Encore\Admin\Table\Selectable;

class Categories extends Selectable
{

    public $model = Category::class;

    public function make(): void
    {
        $this->column('id', __('admin.Id'));
        $this->column('name', __('admin.Name'));
        $this->column('code', __('admin.Code'));
        $this->column('created_at', __('admin.Created at'));

        $this->filter(function (Filter $filter) {
            $filter->like('name', __('admin.Name'));
            $filter->like('code', __('admin.Code'));
        });
    }
}
