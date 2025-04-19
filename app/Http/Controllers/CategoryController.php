<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends ResponseController
{

    /**
     * It will get all categories.
     */
    public function getCategories()
    {
        $categories = Category::all();

        return $this->sendSuccess(SUCCESS, [
            'categories' => $categories,
        ]);
    }



    /**
     * It will get all categories only for admin.
     */
    public function Categories(Request $request)
    {
        $user = $request->user();
        if ($user->user_type == 1) {
            $categories = Category::all();
            return $this->sendSuccess(SUCCESS, [
                'categories' => $categories,
            ]);
        } else {
            return $this->sendFailure(FAILED, "You have restricted access !");
        }
    }


    /**
     * It will update categories only for admin.
     */
    public function updateCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "slug" => "required",
        ]);

        if ($validator->fails()) {
            return $this->validationFailed(ALL_FIELDS_REQUIRED, $validator->errors());
        }

        $user = $request->user();
        if ($user->user_type == 1) {
            //update here
        } else {
            return $this->sendFailure(FAILED, "You have restricted access !");
        }

        
    }
}
