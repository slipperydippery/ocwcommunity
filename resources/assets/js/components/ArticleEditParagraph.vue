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
                :class=" { 'is-invalid': errors.hasOwnProperty('body') } "
                v-model="paragraph.body" 
                oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                ref="input"
            >
            </textarea>
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('body')">
                <strong> Ik kan niet niets opslaan!  (Je mag me wel verwijderen - zie rechter marge) </strong>
            </span>
            <button class="btn btn-primary" @click="saveParagraph">Sla wijzigingen op</button>
            <button class="btn btn-outline-secondary" @click="cancelEdit">Verwerp wijzigingen</button>
        </div>
	</div>

</template>

<script>

    export default {
        props: [
            'baseparagraph'
        ],

        data() {
            return {
                'paragraphEditable': false,
                'paragraph': {body: ''},
                'errors': []
            }
        },

        mounted() {
            this.paragraph = Object.assign({}, this.baseparagraph);
            if(this.baseparagraph.editable){
                this.editParagraph();
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
                    this.paragraphEditable = false;
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
                this.paragraph = this.baseparagraph;
                this.paragraphEditable = false;
            }

        }
    }
</script>