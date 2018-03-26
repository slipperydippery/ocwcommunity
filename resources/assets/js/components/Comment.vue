<template>
	<div class="col-10 comment-content">
		<p v-for="paragraph in textBoi(comment.body)" v-if="! edit">
			{{ paragraph }}
		</p>
		<div class="form-group">
			<textarea class="form-control" rows="5" v-if="edit" v-model="editcomment"></textarea>
		</div>
		<div v-if="edit">
			<button class="btn btn-primary form-control" @click="saveEdit"> Sla wijzigingen op </button> 
			<button class="btn btn-outline-secondary form-control" @click="cancelEdit"> Annuleer </button>
		</div>
	</div>
</template>

<script>

    export default {
        props: [
        	'comment'
        ],

        data() {
            return {
            	edit: false,
            	editcomment: '',
            }
        },

        mounted() {
        	Event.$on('togglecomment' + this.comment.id, () => this.editComment()); 
        	this.editcomment = this.comment.body;
        },

        computed: {
        },

        methods: {
        	textBoi(input) {
        		var paragraphs = [];
        		input.split("\n").forEach(function(text){
        			if(text.trim()){
        				paragraphs.push(text);
        			}
        		})
        		return paragraphs;
        	},

        	editComment() {
        		this.edit = true;
        	},

        	cancelEdit() {
        		this.editcomment = this.comment.body;
        		this.edit = false;
        	},

        	saveEdit() {
        		axios.post('/api/post/' + this.comment.commentable_id + '/comment/' + this.comment.id + '/update', {
        			comment: this.editcomment
        		})
        		.then( response => {
        			this.comment.body = this.editcomment;
        			this.edit = false;
        		})
        		.catch( e => this.errors.push( e ))
        	}
        }
    }
</script>