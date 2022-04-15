<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\OtherCertificate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOtherCertificateRequest;
use App\Http\Requests\UpdateOtherCertificateRequest;
use App\Http\Resources\Admin\OtherCertificateResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherCertificatesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('othercertificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherCertificateResource(OtherCertificate::with(['services'])->get());
    }

    public function store(StoreOtherCertificateRequest $request)
    {
        $othercertificate = OtherCertificate::create($request->all());
        $othercertificate->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $othercertificate->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new OtherCertificateResource($othercertificate))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OtherCertificate $othercertificate)
    {
        abort_if(Gate::denies('othercertificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherCertificateResource($othercertificate->load(['services']));
    }

    public function update(UpdateOtherCertificateRequest $request, OtherCertificate $othercertificate)
    {
        $othercertificate->update($request->all());
        $othercertificate->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$othercertificate->photo || $request->input('photo') !== $othercertificate->photo->file_name) {
                $othercertificate->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($othercertificate->photo) {
            $othercertificate->photo->delete();
        }

        return (new OtherCertificateResource($othercertificate))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OtherCertificate $othercertificate)
    {
        abort_if(Gate::denies('othercertificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $othercertificate->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
