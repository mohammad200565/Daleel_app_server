<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Http\Resources\RentResource;
use App\Models\Rent;

class RentController extends BaseApiController
{
    public function index()
    {
        $user = request()->user();
        $rents = request()->user()->rents()->latest()->paginate(15);
        return $this->successResponse("Rents fetched successfully", [
            'rents' => RentResource::collection($rents),
        ]);
    }
    public function store(StoreRentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = request()->user()->id;
        $rent = Rent::create($data);
        return $this->successResponse("Rent created successfully", [
            'rent' => new RentResource($rent),
        ]);
    }
    public function show(Rent $rent)
    {
        $this->authorize('view', $rent);
        return $this->successResponse("Rent fetched successfully", [
            'rent' => new RentResource($rent),
        ]);
    }
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        $this->authorize('update', $rent);
        $rent->update($request->validated());
        return $this->successResponse("Rent updated successfully", [
            'rent' => new RentResource($rent),
        ]);
    }
    public function destroy(Rent $rent)
    {
        $this->authorize('delete', $rent);
        $rent->delete();
        return $this->successResponse("Rent deleted successfully");
    }
}
