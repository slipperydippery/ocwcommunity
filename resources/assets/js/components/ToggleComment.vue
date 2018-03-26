<template>
	<a href=" # " @click.prevent="toggleComment"> <img src="/img/edit.svg" alt=""> </a>
</template>

<script>
    import {store} from '../app.js';

    export default {
        props: [
        	'comment'
        ],

        data() {
            return {
            }
        },

        mounted() {
        },

        computed: {
        },

        methods: {
        	toggleComment() {
        		Event.$emit('togglecomment' + this.comment.id);
        	}
        }
    }
</script>