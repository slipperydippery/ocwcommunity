<template>
	<div class="blockquote">
        <div class="blockquote--clean" v-if=" ! blockquoteEditable " @click="editBlockquote">
            <blockquote class="blockquote">
            	<p class="mb-0"> {{ blockquote.quote }} </p>
            </blockquote>
        </div>
        <div class="blockquote--edit form-group" v-if=" blockquoteEditable ">
            <textarea 
                v-if="blockquoteEditable"
                class="form-control" 
                :class=" { 'is-invalid': errors.hasOwnProperty('quote') } "
                v-model="blockquote.quote" 
                oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                ref="input"
                placeholder="Schijf hier je citaat" 
            >
            </textarea>
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('quote')">
                <strong> Ik kan niet niets opslaan!  (Je mag me wel verwijderen - zie rechter marge) </strong>
            </span>
            <button class="btn btn-primary" @click="saveBlockquote">Sla wijzigingen op</button>
            <button class="btn btn-outline-secondary" @click="cancelEdit">Verwerp wijzigingen</button>
        </div>
	</div>
</template>

<script>
    export default {
        props: [
	        'baseblockquote'
        ],

        data() {
            return {
                'blockquoteEditable': false,
            	'blockquote': {quote: ''},
            	'errors': []
            }
        },

        mounted() {
        	this.copyBaseBlockquote();
            if(this.baseblockquote.editable){
                this.editBlockquote();
            }
        },

        computed: {
        },

        methods: {
        	copyBaseBlockquote() {
	        	this.blockquote = Object.assign({}, this.baseblockquote);
        	},

            editBlockquote() {
                this.blockquoteEditable = true;
                this.$nextTick(() => {
                    this.$refs.input.focus();
                    this.$refs.input.style.height = (this.$refs.input.scrollHeight + 3) + 'px';
                })
            },

            saveBlockquote() {
                axios.post('/api/blockquote/' + this.blockquote.id + '/update', {
                    quote: this.blockquote.quote
                })
                .then(response => {
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
                this.copyBaseBlockquote();
                this.blockquoteEditable = false;
            }
        }
    }
</script>