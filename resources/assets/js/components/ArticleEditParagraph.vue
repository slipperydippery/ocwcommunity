<template>
	<div class="paragraph">
        <div class="articleitem--clean" v-if=" ! paragraphEditable " @click="editParagraph">
            <p v-for="thisparagraph in textBoi(workParagraph.body)">
                {{ thisparagraph }}
            </p>
        </div>
        <div class="articleitem--edit form-group" v-if=" paragraphEditable ">
            <textarea 
                v-if="paragraphEditable"
                class="form-control"
                :class=" { 'is-invalid': errors.hasOwnProperty('body') } "
                v-model="workParagraph.body" 
                oninput='this.style.height = "";this.style.height = (this.scrollHeight + 3) + "px"'
                ref="input"
            >
            </textarea>
            <span class="invalid-feedback" v-if="errors.hasOwnProperty('body')">
                <strong> Ik kan niet niets opslaan!  (Je mag me wel verwijderen - zie rechter marge) </strong>
            </span>
            <button class="btn btn-primary" @click="saveParagraph">Sla wijzigingen op</button>
            <button class="btn btn-outline-secondary btn-outline-noborder" @click="cancelEdit">Verwerp wijzigingen</button>
        </div>
	</div>

</template>

<script>

    export default {
        props: [
            'initParagraph'
        ],

        data() {
            return {
                'paragraphEditable': false,
                'baseParagraph': {body: ''},
                'workParagraph': {body: ''},
                'errors': []
            }
        },

        mounted() {
            this.baseParagraph = Object.assign({}, this.initParagraph);
            this.workParagraph = Object.assign({}, this.initParagraph);
            if(this.initParagraph.editable){
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
                axios.post('/api/paragraph/' + this.workParagraph.id + '/update', {
                    body: this.workParagraph.body,
                })
                .then(response => {
                    this.baseParagraph = Object.assign({}, this.workParagraph); 
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
                this.workParagraph = Object.assign({}, this.baseParagraph);
                this.paragraphEditable = false;
            }

        }
    }
</script>