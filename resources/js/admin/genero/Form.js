import AppForm from '../app-components/Form/AppForm';

Vue.component('genero-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                genero:  '' ,
                
            }
        }
    }

});