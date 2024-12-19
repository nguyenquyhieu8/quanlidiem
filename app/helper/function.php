<?php
use App\Models\Material;

function getCategories($categories, $old = '', $parentId = 0, $char = '')
{
    $id = request()->route()->category;
    echo $id;
    if ($categories) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId && $id != $category->id) {

                echo '<option value="' . $category->id . '"';
                if ($old == $category->id) {
                    echo 'selected';
                }
                echo '>' . $char . $category->name . '</option>';
                unset($categories[$key]);
                getCategories($categories, $old, $category->id, $char . '|-');
            }
        }
    }
}


function checkInput($dataArr, $moduleName, $role = "view")
{
    // dd($dataArr);
    if (!empty($dataArr[$moduleName])) {
        // foreach ($dataArr as $module => $roleValue) {
        //    if()
        // }
        $roleArr = $dataArr[$moduleName];
        if (!empty($roleArr) && in_array($role, $roleArr)) {
            return true;
        }
        return false;

    }
}

