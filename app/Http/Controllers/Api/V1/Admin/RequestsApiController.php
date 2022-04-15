<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Http\Resources\Admin\RequestResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequestResource(Request::with(['services'])->get());
    }

    public function store(StoreRequestRequest $request)
    {
        $request = Request::create($request->all());
        $request->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $request->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new RequestResource($request))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Request $request)
    {
        abort_if(Gate::denies('request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequestResource($request->load(['services']));
    }

    public function update(UpdateRequestRequest $request, Request $request)
    {
        $request->update($request->all());
        $request->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$request->photo || $request->input('photo') !== $request->photo->file_name) {
                $request->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($request->photo) {
            $request->photo->delete();
        }

        return (new RequestResource($request))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
