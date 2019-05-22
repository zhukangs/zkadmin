<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2019/5/21
 * Time: 18:43
 */

namespace App\Http\View\Composers;

use Illuminate\View\View;

class MenusComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $admin=auth('admin')->user();
        $menuList = $admin->getMenus();
        $view->with('menuList', $menuList);
    }
}