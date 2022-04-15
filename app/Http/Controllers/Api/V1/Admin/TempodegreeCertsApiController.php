<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\TempodegreeCert;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTempodegreeCertRequest;
use App\Http\Requests\UpdateTempodegreeCertRequest;
use App\Http\Resources\Admin\TempodegreeCertResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TempodegreeCertsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tempodegreecert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TempodegreeCertResource(TempodegreeCert::with(['services'])->get());
    }

    public function store(StoreTempodegreeCertRequest $request)
    {
        $tempodegreecert = TempodegreeCert::create($request->all());
        $tempodegreecert->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $tempodegreecert->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new TempodegreeCertResource($tempodegreecert))
            ->response("suesse")
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TempodegreeCert $tempodegreecert)
    {
        abort_if(Gate::denies('tempodegreecert_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TempodegreeCertResource($tempodegreecert->load(['services']));
    }

    public function update(UpdateTempodegreeCertRequest $request, TempodegreeCert $tempodegreecert)
    {
        $tempodegreecert->update($request->all());
        $tempodegreecert->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$tempodegreecert->photo || $request->input('photo') !== $tempodegreecert->photo->file_name) {
                $tempodegreecert->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($tempodegreecert->photo) {
            $tempodegreecert->photo->delete();
        }

        return (new TempodegreeCertResource($tempodegreecert))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TempodegreeCert $tempodegreecert)
    {
        abort_if(Gate::denies('tempodegreecert_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tempodegreecert->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
