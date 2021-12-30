@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.vacant.actions.create'))

@section('body')

    <div class="container-xl">

        <vacant-form
            :action="'{{ url('admin/vacants') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="row">
                    <div class="col">
                        @include('admin.vacant.components.form-elements')
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-5 col-xxl-4">
                        @include('admin.vacant.components.form-elements-right')
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
            </form>
        </vacant-form>

        </div>

        </div>


@endsection
