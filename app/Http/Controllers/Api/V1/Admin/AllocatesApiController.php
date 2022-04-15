<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Publication;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Http\Resources\Admin\PublicationResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublicationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('publication_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PublicationResource(Publication::with(['services'])->get());
    }

    public function store(StorePublicationRequest $request)
    {
        $publication = Publication::create($request->all());
        $publication->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $publication->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new PublicationResource($publication))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Publication $publication)
    {
        abort_if(Gate::denies('publication_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PublicationResource($publication->load(['services']));
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $publication->update($request->all());
        $publication->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$publication->photo || $request->input('photo') !== $publication->photo->file_name) {
                $publication->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($publication->photo) {
            $publication->photo->delete();
        }

        return (new PublicationResource($publication))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Publication $publication)
    {
        abort_if(Gate::denies('publication_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publication->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
