<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\certificate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorecertificateRequest;
use App\Http\Requests\UpdatecertificateRequest;
use App\Http\Resources\Admin\certificateResource;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class certificatesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new certificateResource(certificate::with(['item', 'othercertificate', 'services'])->get());
    }
    public function index2()
    {
        abort_if(Gate::denies('certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new certificateResource(certificate::with(['item', 'othercertificate', 'services'])->get());
    }
    public function store(StorecertificateRequest $request)
    {
        $certificate = certificate::create($request->all());
        $certificate->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $certificate->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new certificateResource($certificate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(certificate $certificate)
    {
        abort_if(Gate::denies('certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new certificateResource($certificate->load(['item', 'othercertificate', 'services']));
    }

    public function update(UpdatecertificateRequest $request, certificate $certificate)
    {
        $certificate->update($request->all());
        $certificate->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$certificate->photo || $request->input('photo') !== $certificate->photo->file_name) {
                $certificate->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($certificate->photo) {
            $certificate->photo->delete();
        }

        return (new certificateResource($certificate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(certificate $certificate)
    {
        abort_if(Gate::denies('certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
