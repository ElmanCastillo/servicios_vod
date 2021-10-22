import AppForm from '../app-components/Form/AppForm';

Vue.component('suscriptore-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                estado:  '' ,
                users_id:  '' ,
                
            }
        }
    }

});