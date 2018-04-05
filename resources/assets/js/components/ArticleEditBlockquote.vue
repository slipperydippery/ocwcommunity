<template>
	<div class="blockquote">
        <div class="articleitem--clean" v-if=" ! (currentlyEditing == initBlockquote) " @click="editBlockquote">
            <blockquote class="blockquote">
            	<p class="mb-0"> {{ workBlockquote.quote }} </p>
            </blockquote>
        </div>
        <div class="articleitem--edit form-group" v-if=" (currentlyEditing == initBlockquote) ">
            <textarea 
                v-if="(currentlyEditing == initBlockquote)"
                class="form-control" 
                :class=" { 'is-invalid': errors.hasOwnProperty('quote') } "
                v-model="workBlockquote.quote" 
                oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                ref="input"
                placeholder="Schijf hier je citaat" 
            >
            </textarea>
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('quote')">
                <strong> Ik kan niet niets opslaan!  (Je mag me wel verwijderen - zie rechter marge) </strong>
            </span>
            <button class="btn btn-primary" @click="saveBlockquote">Sla wijzigingen op</button>
            <button class="btn btn-outline-secondary btn-outline-noborder" @click="cancelEdit" v-if="initBlockquote.quote == workBlockquote.quote"> Annuleer </button>
            <button class="btn btn-outline-secondary btn-outline-noborder" @click="cancelEdit" v-else> Verwerp wijzigingen </button>
        </div>
	</div>
</template>

<script>
    export default {
        props: [
	        'initBlockquote',
            'currentlyEditing'
        ],

        data() {
            return {
                'baseBlockquote': {quote: ''},
            	'workBlockquote': {quote: ''},
            	'errors': []
            }
        },

        mounted() {
            this.baseBlockquote = Object.assign({}, this.initBlockquote);
        	this.workBlockquote = Object.assign({}, this.initBlockquote);
            if(this.initBlockquote.editable){
                this.editBlockquote();
            }
        },

        watch: {
            currentlyEditing(newVal, oldVal) {
                if(newVal == this.initBlockquote) {
                    this.activateEditBlockquote();
                }
            }
        },

        computed: {
        },

        methods: {
            editBlockquote() {
                this.$emit('setCurrentlyEditing', this.initBlockquote);
            },

            activateEditBlockquote() {
                this.$nextTick(() => {
                    this.$refs.input.focus();
                    this.$refs.input.style.height = (this.$refs.input.scrollHeight + 3) + 'px';
                });
            },

            saveBlockquote() {
                axios.post('/api/blockquote/' + this.workBlockquote.id + '/update', {
                    quote: this.workBlockquote.quote
                })
                .then(response => {
                    this.baseBlockquote = Object.assign({}, this.workBlockquote); 
                    this.$emit('setCurrentlyEditing', {});
                    this.blockquoteEditable = false;
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
                this.workBlockquote = Object.assign({}, this.baseBlockquote);
                this.$emit('setCurrentlyEditing', {});
            }
        }
    }
</script>