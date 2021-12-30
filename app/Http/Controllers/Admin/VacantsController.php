<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vacant\BulkDestroyVacant;
use App\Http\Requests\Admin\Vacant\DestroyVacant;
use App\Http\Requests\Admin\Vacant\IndexVacant;
use App\Http\Requests\Admin\Vacant\StoreVacant;
use App\Http\Requests\Admin\Vacant\UpdateVacant;
use App\Models\Vacant;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VacantsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexVacant $request
     * @return array|Factory|View
     */
    public function index(IndexVacant $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Vacant::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'validThrough', 'datePosted'],

            // set columns to searchIn
            ['id', 'title', 'description', 'hiringOrganization', 'jobLocation', 'optionalFilds']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.vacant.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.vacant.create');

        return view('admin.vacant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVacant $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreVacant $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Vacant
        $vacant = Vacant::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/vacants'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect()->route('admin/vacants/index');
    }

    /**
     * Display the specified resource.
     *
     * @param Vacant $vacant
     * @throws AuthorizationException
     * @return void
     */
    public function show(Vacant $vacant)
    {
        $this->authorize('admin.vacant.show', $vacant);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vacant $vacant
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Vacant $vacant)
    {
        $this->authorize('admin.vacant.edit', $vacant);


        return view('admin.vacant.edit', [
            'vacant' => $vacant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVacant $request
     * @param Vacant $vacant
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVacant $request, Vacant $vacant)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Vacant
        $vacant->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/vacants'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/vacants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVacant $request
     * @param Vacant $vacant
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVacant $request, Vacant $vacant)
    {
        $vacant->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVacant $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVacant $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Vacant::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
