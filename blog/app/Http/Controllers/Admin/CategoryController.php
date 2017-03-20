<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:GET方式访问admin/category
     * 分类列表
     */
    public function index()
    {
        $categoryInfo = Category::all();
        return view('admin.category.index',compact('categoryInfo'));
    }

    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:POST方式访问admin/category
     * 单个分类详情
     */
    public function store()
    {

    }

    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:GET:admin/category/create
     * 创建分类
     */
    public function create()
    {

    }


    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:GET:admin/category/{category}
     */
    public function show()
    {

    }

    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:PUT/PATCH:admin/category/{category}
     */
    public function update()
    {

    }

    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:DELETE:admin/category/{category}
     */
    public function destroy()
    {

    }

    /**
     *author:JuPing<pjjuping@gmail.com>
     *createtime:${DATE} ${TIME}
     * @param void ${PARAM_NAME}
     *注释:GET:admin/category/{category}/edit
     */
    public function edit()
    {

    }
}
