<?php

namespace App\Http\Controllers\Admin;

use App\item;
use App\Todo;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyitemRequest;
use App\Http\Requests\StoreitemRequest;
use App\Http\Requests\UpdateitemRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class itemsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = item::query()->select(sprintf('%s.*', (new item)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'item_show';
                $editGate      = 'item_edit';
                $deleteGate    = 'item_delete';
                $crudRoutePart = 'items';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('itemname', function ($row) {
                return $row->itemname ? $row->itemname : "";
            });
            $table->editColumn('projectname', function ($row) {
                return $row->projectname ? $row->projectname : "";
            });
            $table->editColumn('usedby', function ($row) {
                return $row->usedby ? $row->usedby : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.items.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.items.create');
    }

    public function store(StoreitemRequest $request)

    {
        $request->request->add(['status' =>""]);

        $item = item::create($request->all());

        return redirect()->route('admin.items.index');
    }

    public function edit(item $item)
    {
        abort_if(Gate::denies('item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, item $item)
    {
        $item->update($request->all());

        return redirect()->route('admin.items.index');
    }

    public function show(item $item)
    {
        abort_if(Gate::denies('item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.items.show', compact('item'));
    }

    public function destroy(item $item)
    {
        abort_if(Gate::denies('item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item->delete();

        return back();
    }

    public function massDestroy(MassDestroyitemRequest $request)
    {
        item::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
