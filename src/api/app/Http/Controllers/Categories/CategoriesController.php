<?php
namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Services\DataAccess\CategoriesDataService;
use App\Http\Requests\CreateCategories;

class CategoriesController extends Controller
{

    private $categoriesDataService;

    public function __construct(
        CategoriesDataService $categoriesDataService
    ) {
        $this->categoriesDataService = $categoriesDataService;
    }

    public function getAllCategories()
    {
        return new JsonResponse([
            'message' => 'success',
            'data' => $this->categoriesDataService->getAllCategories()
        ]);
    }

    public function createCategory(CreateCategories $request)
    {
        $data = $request->all();
        $this->categoriesDataService->createNewCategory($data);
        return new JsonResponse([], 204);
    }
}
