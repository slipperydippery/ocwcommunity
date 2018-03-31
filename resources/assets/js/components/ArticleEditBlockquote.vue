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
                v-model="blockquote.quote" 
                oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                ref="input"
                placeholder="Schijf hier je citaat" 
            >
            </textarea>
            <button class="btn btn-primary" @click="saveBlockquote">Sla wijzigingen op</button>
            <button class="btn btn-outline-secondary" @click="cancelEdit">Verwerp wijzigingen</button>
        </div>
	</div>
</template>

<script>
    export default {
        props: [
	        'oldblockquote'
        ],

        data() {
            return {
                'blockquoteEditable': false,
            	'blockquote': {quote: ''}
            }
        },

        mounted() {
        	this.copyOldBlockquote();
        },

        computed: {
        },

        methods: {
        	copyOldBlockquote() {
	        	this.blockquote = this.oldblockquote;
        		// if(this.blockquote.quote == '---'){
        			// this.blockquote.quote = '';
        		// }
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
                    console.log(response)
                    this.blockquoteEditable = false;
                })
            },

            cancelEdit() {
                this.copyOldBlockquote();
                this.blockquoteEditable = false;
            }
        }
    }
</script>