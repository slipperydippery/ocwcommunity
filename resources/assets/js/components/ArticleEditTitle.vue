<template>
    <div class="articleitem">
    	<div class="titlebox">
    		<div class="articleitem--clean form-group" v-if="! (currentlyEditing == 'title')" @click="editTitle">
    			<h1 class="display-4"> {{ article.title }} </h1>
                <p class="lead" v-for="thisparagraph in textBoi(article.short)">
                    {{ thisparagraph }}
                </p>
    		</div>
    		<div class="articleitem--edit" v-if="(currentlyEditing == 'title')">
                <textarea 
                    class="form-control titlefield"
                    :class=" { 'is-invalid': errors.hasOwnProperty('title') } "
                    v-model="article.title" 
                    oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                    ref="titleinput"
                >
                </textarea>
                <span class="invalid-feedback" v-if="errors.hasOwnProperty('title')">
                    <strong> De titel moet tussen de 3 en 255 tekens zijn.</strong>
                </span>
                <textarea 
                    class="form-control shortfield"
                    :class=" { 'is-invalid': errors.hasOwnProperty('short') } "
                    v-model="article.short" 
                    oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                    ref="input"
                    placeholder="Hier kan een lead tekst, maar dat hoeft niet."
                >
                </textarea>
                <span class="invalid-feedback" v-if="errors.hasOwnProperty('short')">
                    <strong> Ik kan niet niets opslaan!  (Je mag me wel verwijderen - zie rechter marge) </strong>
                </span>
    			<button class="btn btn-primary btn-small" @click="saveTitle"> sla op </button>
                <button class="btn btn-outline-secondary btn-small" @click="cancelEdit" v-if="article.title == oldarticle.title && article.short == oldarticle.short"> Annuleer </button>
    			<button class="btn btn-outline-secondary btn-small" @click="cancelEdit" v-else> Verwerp wijzigingen </button>
    		</div>
    	</div>
    </div>
</template>

<script>
    export default {
        props: [
	        'oldarticle',
            'currentlyEditing'
        ],

        data() {
            return {
            	'article': {title: '', short: ''},
                'errors': []
            }
        },

        mounted() {
            this.article = Object.assign({}, this.oldarticle);
        },

        watch: {
            currentlyEditing(newVal, oldVal) {
                if(newVal == this.oldarticle) {
                    this.activateEditTitle();
                }
            }
        },

        computed: {
        },

        methods: {
            textBoi(input) {
                if(input){
                    var paragraphs = [];
                    input.split("\n").forEach(function(text){
                        if(text.trim()){
                            paragraphs.push(text);
                        }
                    })
                    return paragraphs;
                }
            },

        	editTitle() {
        		this.$emit('setCurrentlyEditing', 'title');
                this.activateEditTitle();
            },

            activateEditTitle() {
                this.$nextTick(() => {
                    this.$refs.titleinput.style.height = (this.$refs.input.scrollHeight + 30) + 'px';
                    this.$refs.input.style.height = (this.$refs.input.scrollHeight + 4) + 'px';
                    this.$refs.titleinput.focus();
                })
            },

        	saveTitle() {
                axios.post('/api/article/' + this.article.id + '/update', {
                    title: this.article.title,
                    short: this.article.short,
                    body: this.article.body
                })
                .then(response => {
                    this.$emit('setCurrentlyEditing', {});
                })
                .catch( e => {
                    console.log(e.response.data);
                    if(e.response.data.exception){
                        this.errors = e.response.data.exception;
                    } else if (e.response.data.errors){
                        this.errors = e.response.data.errors; 
                    }
                });
        	},

        	cancelEdit() {
                this.article = Object.assign({}, this.oldarticle);
                this.$emit('setCurrentlyEditing', {});
        	}
        }
    }
</script>