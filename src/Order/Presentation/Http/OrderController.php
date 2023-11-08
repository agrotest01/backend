<?php
namespace Src\Order\Presentation\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Src\Order\Application\UseCases\Queries\FindFinalPriceQuery;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function findFinalPrice(Request $request) : JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|int',
                'tax_number' => 'required|string'
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            return response()->json(
                [
                    'price' => (new FindFinalPriceQuery($request->product_id, $request->tax_number))->handle()
                ]
            );
        } catch (ValidationException $validationException) {
            return response()->json($validationException->errors(), Response::HTTP_BAD_REQUEST);
        } catch (\DomainException $domainException) {
            return response()->json(
                $domainException->getMessage(),
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }
    }
}
