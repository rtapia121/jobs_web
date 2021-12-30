<div class="card">
    <div class="card-header">
        <i class="fa fa-plus"></i> {{ trans('admin.vacant.actions.create') }}
    </div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
        <label for="title" class="col-form-label text-md-right"
            :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacant.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)"
                class="form-control"
                :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}"
                id="title" name="title" placeholder="{{ trans('admin.vacant.columns.title') }}">
            <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>
                @{{ errors . first('title') }}
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
        <label for="description" class="col-form-label text-md-right"
            :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacant.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <div>
                <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description"
                    :config="mediaWysiwygConfig"></wysiwyg>
            </div>
            <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>
                @{{ errors . first('description') }}</div>
        </div>
    </div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('hiringOrganization'), 'has-success': fields.hiringOrganization && fields.hiringOrganization.valid }">
        <label for="hiringOrganization" class="col-form-label text-md-right"
            :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacant.columns.hiringOrganization') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <div>
                <textarea class="form-control" v-model="form.hiringOrganization" v-validate="'required'"
                    id="hiringOrganization" name="hiringOrganization"></textarea>
            </div>
            <div v-if="errors.has('hiringOrganization')" class="form-control-feedback form-text" v-cloak>
                @{{ errors . first('hiringOrganization') }}</div>
        </div>
    </div>


</div>

