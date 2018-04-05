<template>
    <div class="articleitem">
    	<div class="titlebox">
    		<div class="articleitem--clean form-group" v-if="! titleEditable" @click="editTitle">
    			<h1> {{ article.title }} </h1>
                <p class="lead" v-for="thisparagraph in textBoi(article.short)">
                    {{ thisparagraph }}
                </p>
    		</div>
    		<div class="articleitem--edit" v-if="titleEditable">
    			<input type="text" class="form-control" :class=" { 'is-invalid': errors.hasOwnProperty('title') } " v-model="article.title" ref="titleinput">
                <span class="invalid-feedback" v-if="errors.hasOwnProperty('title')">
                    <strong> De titel moet tussen de 3 en 255 tekens zijn.</strong>
                </span>
                <textarea 
                    class="form-control"
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
    			<button 
    				class="btn btn-primary btn-small" 
    				@click="saveTitle"
    			>
    				sla op
    			</button>
    			<button
    				class="btn btn-outline-secondary btn-small" 
    				@click="cancelEdit"
    			>
    				Annuleer
    			</button>
    		</div>
    	</div>
    </div>
</template>

<script>
    export default {
        props: [
	        'oldarticle'
        ],

        data() {
            return {
            	'titleEditable' : false,
            	'article': {title: '', short: ''},
                'errors': []
            }
        },

        mounted() {
            this.article = Object.assign({}, this.oldarticle);
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
        		this.titleEditable = true;
        		this.$nextTick(() => this.$refs.titleinput.focus());
                this.$nextTick(() => this.$refs.input.style.height = (this.$refs.input.scrollHeight + 3) + 'px');

        	},

        	saveTitle() {
                axios.post('/api/article/' + this.article.id + '/update', {
                    title: this.article.title,
                    short: this.article.short,
                    body: this.article.body
                })
                .then(response => {
                    this.titleEditable = false;
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
        		this.titleEditable = false;
        	}
        }
    }
</script>