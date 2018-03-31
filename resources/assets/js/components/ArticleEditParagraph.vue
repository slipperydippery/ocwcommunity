<template>
	<div class="paragraph">
        <div class="paragraph--clean" v-if=" ! paragraphEditable " @click="editParagraph">
            <p v-for="thisparagraph in textBoi(paragraph.body)">
                {{ thisparagraph }}
            </p>
        </div>
        <div class="paragraph--edit form-group" v-if=" paragraphEditable ">
            <textarea 
                v-if="paragraphEditable"
                class="form-control" 
                v-model="paragraph.body" 
                oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                ref="input"
            >
            </textarea>
            <button class="btn btn-primary" @click="saveParagraph">Sla wijzigingen op</button>
            <button class="btn btn-outline-secondary" @click="cancelEdit">Verwerp wijzigingen</button>
        </div>
	</div>

</template>

<script>

    export default {
        props: [
            'oldparagraph'
        ],

        data() {
            return {
                'paragraphEditable': false,
                'paragraph': {body: ''}
            }
        },

        mounted() {
            this.paragraph = Object.assign({}, this.oldparagraph);
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

            editParagraph() {
                this.paragraphEditable = true;
                this.$nextTick(() => {
                    this.$refs.input.style.height = (this.$refs.input.scrollHeight + 3) + 'px';
                    this.$refs.input.focus();
                })
            },

            saveParagraph() {
                axios.post('/api/paragraph/' + this.paragraph.id + '/update', {
                    body: this.paragraph.body
                })
                .then(response => {
                    console.log(response)
                    this.paragraphEditable = false;
                })
            },

            cancelEdit() {
                this.paragraph = this.oldparagraph;
                this.paragraphEditable = false;
            }

        }
    }
</script>