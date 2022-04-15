<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Http\Resources\Admin\AboutResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('about_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AboutResource(About::with(['services'])->get());
    }

    public function store(StoreAboutRequest $request)
    {
        $about = About::create($request->all());
        $about->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            $about->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new AboutResource($about))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(About $about)
    {
        abort_if(Gate::denies('about_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AboutResource($about->load(['services']));
    }

    public function update(UpdateAboutRequest $request, About $about)
    {
        $about->update($request->all());
        $about->services()->sync($request->input('services', []));

        if ($request->input('photo', false)) {
            if (!$about->photo || $request->input('photo') !== $about->photo->file_name) {
                $about->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($about->photo) {
            $about->photo->delete();
        }

        return (new AboutResource($about))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(About $about)
    {
        abort_if(Gate::denies('about_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $about->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
