<?php


namespace App\Services\DataAccess;


use App\Models\Categories;

class CategoriesDataService
{
    public function getAllCategories() {
        return Categories::all();
    }

    public function createNewCategory($data) {
        return Categories::create($data);
    }
}
