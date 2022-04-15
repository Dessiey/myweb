<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Tempodegreechain;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTempodegreechainRequest;
use App\Http\Requests\UpdateTempodegreechainRequest;
use App\Http\Resources\Admin\TempodegreechainResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TempodegreechainsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tempodegreechain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TempodegreechainResource(Tempodegreechain::with(['services'])->get());
    }

    public function store(StoreTempodegreechainRequest $request)
    {
        $tempodegreechain = Tempodegreechain::create($request->all());
        $tempodegreechain->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $tempodegreechain->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new TempodegreechainResource($tempodegreechain))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tempodegreechain $tempodegreechain)
    {
        abort_if(Gate::denies('tempodegreechain_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TempodegreechainResource($tempodegreechain->load(['services']));
    }

    public function update(UpdateTempodegreechainRequest $request, Tempodegreechain $tempodegreechain)
    {
        $tempodegreechain->update($request->all());
        $tempodegreechain->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$tempodegreechain->photo || $request->input('photo') !== $tempodegreechain->photo->file_name) {
                $tempodegreechain->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($tempodegreechain->photo) {
            $tempodegreechain->photo->delete();
        }

        return (new TempodegreechainResource($tempodegreechain))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tempodegreechain $tempodegreechain)
    {
        abort_if(Gate::denies('tempodegreechain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tempodegreechain->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
