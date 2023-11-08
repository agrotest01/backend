<?php
namespace Src\Product\Presentation\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Product\Application\UseCases\Queries\GetProductListQuery;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function getList() : JsonResponse
    {
        try {
            return response()->json(
                (new GetProductListQuery())->handle()
            );
        } catch (\DomainException $domainException){
            return response()->json(
                $domainException->getMessage(),
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }
    }

}
