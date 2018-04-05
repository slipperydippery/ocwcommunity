<template>
	<div class="heading">
        <div class="articleitem--clean" v-if=" ! (currentlyEditing == initHeading) " @click="editHeading">
            <h4 class="heading">
            	{{ workHeading.heading }}
            </h4>
        </div>
        <div class="articleitem--edit form-group" v-if=" (currentlyEditing == initHeading) ">
            <textarea 
                v-if="(currentlyEditing == initHeading)"
                class="form-control" 
                :class=" { 'is-invalid': errors.hasOwnProperty('heading') } "
                v-model="workHeading.heading" 
                oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                ref="input"
                placeholder="Hier komt je heading" 
            >
            </textarea>
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('heading')">
                <strong> Ik kan niet niets opslaan!  (Je mag me wel verwijderen - zie rechter marge) </strong>
            </span>
            <button class="btn btn-primary" @click="saveHeading">Sla wijzigingen op</button>
            <button class="btn btn-outline-secondary btn-outline-noborder" @click="cancelEdit" v-if="initHeading.heading == workHeading.heading"> Annuleer </button>
            <button class="btn btn-outline-secondary btn-outline-noborder" @click="cancelEdit" v-else> Verwerp wijzigingen </button>
        </div>
	</div>
</template>

<script>
    export default {
        props: [
	        'initHeading',
            'currentlyEditing'
        ],

        data() {
            return {
                'baseHeading': {heading: ''},
            	'workHeading': {heading: ''},
            	'errors': []
            }
        },

        mounted() {
            this.baseHeading = Object.assign({}, this.initHeading);
        	this.workHeading = Object.assign({}, this.initHeading);
            if(this.initHeading.editable){
                this.editHeading();
            }
        },

        watch: {
            currentlyEditing(newVal, oldVal) {
                if(newVal == this.initHeading) {
                    this.activateEditHeading();
                }
            }
        },

        computed: {
        },

        methods: {
            editHeading() {
                this.$emit('setCurrentlyEditing', this.initHeading);
            },

            activateEditHeading() {
                this.$nextTick(() => {
                    this.$refs.input.focus();
                    this.$refs.input.style.height = (this.$refs.input.scrollHeight + 3) + 'px';
                });
            },

            saveHeading() {
                axios.post('/api/heading/' + this.workHeading.id + '/update', {
                    heading: this.workHeading.heading
                })
                .then(response => {
                    this.baseHeading = Object.assign({}, this.workHeading); 
                    this.$emit('setCurrentlyEditing', {});
                })
                .catch( e => {
                    if(e.response.data.exception){
                        this.errors = e.response.data.exception;
                    } else if (e.response.data.errors){
                        this.errors = e.response.data.errors; 
                    }
                })
            },

            cancelEdit() {
                this.workHeading = Object.assign({}, this.baseHeading);
                this.$emit('setCurrentlyEditing', {});
            }
        }
    }
</script>