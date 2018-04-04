<template>
	<div class="articleitem">
        <a href="#" 
            data-toggle="modal" 
            :data-target="'#confirmDeleteModal-' + articleitem.id"
            class="deleteicon"
        > 
            <img src="/img/trash.svg" alt=""> 
        </a>
        <a href="#"
            class="upicon"
            @click.prevent="moveUp"
        >
            moveup
        </a>
        <a href="#"
            class="upicon"
            @click.prevent="moveDown"
        >
            movedown
        </a>


        <article-edit-paragraph
            v-if="isParagraph"
            :oldparagraph="articleitem.articleitemable"
        >
        </article-edit-paragraph>
        <article-edit-blockquote
            v-if="articleitem.articleitemable_type.includes('Blockquote')"
            :oldblockquote="articleitem.articleitemable"
        >
        </article-edit-blockquote>

        <!-- Modal -->
        <div class="modal fade" :id="'confirmDeleteModal-' + articleitem.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Weet je het zeker? </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Dit zal dit element verwijderen uit je artikel.
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"> Annuleer </button>

                        <button class="btn btn-primary" data-dismiss="modal" @click="deleteThis">Verwijder</button>

                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>

    export default {
        props: [
        	'articleitem'
        ],

        data() {
            return {
            }
        },

        mounted() {
        },

        computed: {
        	isParagraph() {
        		if(this.articleitem.articleitemable_type.includes('Paragraph')){
        			return true;
        		} 
        		return false;
        	}
        },

        methods: {
            deleteThis() {
                this.$emit('deleteItem', this.articleitem);
            },

            moveUp() {
                this.$emit('moveUp', this.articleitem);
            },

            moveDown() {
                this.$emit('moveDown', this.articleitem);
            }
        }
    }
</script>