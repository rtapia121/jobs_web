<div class="card">
    <div class="card-header">
        <i class="fa fa-plus"></i> Secction
    </div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('jobLocation'), 'has-success': fields.jobLocation && fields.jobLocation.valid }">
        <label for="jobLocation" class="col-form-label text-md-right"
            :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacant.columns.jobLocation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <div>
                <textarea class="form-control" v-model="form.jobLocation" v-validate="'required'" id="jobLocation"
                    name="jobLocation"></textarea>
            </div>
            <div v-if="errors.has('jobLocation')" class="form-control-feedback form-text" v-cloak>
                @{{ errors . first('jobLocation') }}</div>
        </div>
    </div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('validThrough'), 'has-success': fields.validThrough && fields.validThrough.valid }">
        <label for="validThrough" class="col-form-label text-md-right"
            :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacant.columns.validThrough') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
            <div class="input-group input-group--custom">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <datetime v-model="form.validThrough" :config="datePickerConfig"
                    v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                    :class="{'form-control-danger': errors.has('validThrough'), 'form-control-success': fields.validThrough && fields.validThrough.valid}"
                    id="validThrough" name="validThrough"
                    placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
            </div>
            <div v-if="errors.has('validThrough')" class="form-control-feedback form-text" v-cloak>
                @{{ errors . first('validThrough') }}</div>
        </div>
    </div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('datePosted'), 'has-success': fields.datePosted && fields.datePosted.valid }">
        <label for="datePosted" class="col-form-label text-md-right"
            :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacant.columns.datePosted') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
            <div class="input-group input-group--custom">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <datetime v-model="form.datePosted" :config="datePickerConfig"
                    v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr"
                    :class="{'form-control-danger': errors.has('datePosted'), 'form-control-success': fields.datePosted && fields.datePosted.valid}"
                    id="datePosted" name="datePosted"
                    placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
            </div>
            <div v-if="errors.has('datePosted')" class="form-control-feedback form-text" v-cloak>
                @{{ errors . first('datePosted') }}</div>
        </div>
    </div>

    <div class="form-group row align-items-center"
        :class="{'has-danger': errors.has('optionalFilds'), 'has-success': fields.optionalFilds && fields.optionalFilds.valid }">
        <label for="optionalFilds" class="col-form-label text-md-right"
            :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.vacant.columns.optionalFilds') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <div>
                <textarea class="form-control" v-model="form.optionalFilds" v-validate="'required'" id="optionalFilds"
                    name="optionalFilds"></textarea>
            </div>
            <div v-if="errors.has('optionalFilds')" class="form-control-feedback form-text" v-cloak>
                @{{ errors . first('optionalFilds') }}</div>
        </div>
    </div>
</div>
