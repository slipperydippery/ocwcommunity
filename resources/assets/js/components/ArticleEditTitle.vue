<template>
	<div class="titlebox">
		<div class="titlebox--clean" v-if="! titleEditable">
			<h1 v-if="" @click="editTitle"> {{ title }} </h1>
		</div>
		<div class="titlebox--edit" v-if="titleEditable">
			<h1><input type="text" v-model="title" ref="input"></h1>
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
</template>

<script>
    export default {
        props: [
	        'article'
        ],

        data() {
            return {
            	'titleEditable' : false,
            	'title': '',
            }
        },

        mounted() {
        	this.title = this.article.title;
        },

        computed: {
        },

        methods: {
        	editTitle() {
        		this.titleEditable = true;
        		this.$nextTick(() => this.$refs.input.focus());
        	},

        	saveTitle() {
        		this.titleEditable = false;
        		this.article.title = this.title;
        		this.$emit('articleUpdated');
        	},

        	cancelEdit() {
        		this.title = this.article.title;
        		this.titleEditable = false;
        	}
        }
    }
</script>