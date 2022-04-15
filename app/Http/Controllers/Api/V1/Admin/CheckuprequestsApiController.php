<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Checkuprequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCheckuprequestRequest;
use App\Http\Requests\UpdateCheckuprequestRequest;
use App\Http\Resources\Admin\CheckuprequestResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckuprequestsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('checkuprequest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckuprequestResource(Checkuprequest::with(['services'])->get());
    }

    public function store(StoreCheckuprequestRequest $request)
    {
        $checkuprequest = Checkuprequest::create($request->all());
        $checkuprequest->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $checkuprequest->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new CheckuprequestResource($checkuprequest))
            ->response("suesse")
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Checkuprequest $checkuprequest)
    {
        abort_if(Gate::denies('checkuprequest_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckuprequestResource($checkuprequest->load(['services']));
    }

    public function update(UpdateCheckuprequestRequest $request, Checkuprequest $checkuprequest)
    {
        $checkuprequest->update($request->all());
        $checkuprequest->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$checkuprequest->photo || $request->input('photo') !== $checkuprequest->photo->file_name) {
                $checkuprequest->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($checkuprequest->photo) {
            $checkuprequest->photo->delete();
        }

        return (new CheckuprequestResource($checkuprequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Checkuprequest $checkuprequest)
    {
        abort_if(Gate::denies('checkuprequest_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkuprequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
