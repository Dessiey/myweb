<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\item;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreitemRequest;
use App\Http\Requests\UpdateitemRequest;
use App\Http\Resources\Admin\itemResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class itemsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new itemResource(item::all());
    }

    public function store(StoreitemRequest $request)
    {
        $item = item::create($request->all());

        return (new itemResource($item))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(item $item)
    {
        abort_if(Gate::denies('item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new itemResource($item);
    }

    public function update(UpdateitemRequest $request, item $item)
    {
        $item->update($request->all());

        return (new itemResource($item))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(item $item)
    {
        abort_if(Gate::denies('item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
