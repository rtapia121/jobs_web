@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.vacant.actions.edit', ['name' => $vacant->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <vacant-form
                :action="'{{ $vacant->resource_url }}'"
                :data="{{ $vacant->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.vacant.actions.edit', ['name' => $vacant->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.vacant.components.form-elements')
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