import AppForm from '../app-components/Form/AppForm';

Vue.component('vacant-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                description:  '' ,
                hiringOrganization:  '' ,
                jobLocation:  '' ,
                validThrough:  '' ,
                datePosted:  '' ,
                optionalFilds:  '' ,

            }
        }
    }

});
