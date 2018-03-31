    <template>
	<div class="">
		<article-edit-title
            :article="article"
            @articleUpdated="updateArticle()"
        >
        </article-edit-title>
		<article-edit-item
			v-for="articleitem in articleitems"	
			:articleitem="articleitem"
			:key="articleitem.id"
            @deleteItem="deleteItem"
		>
		</article-edit-item>
        <button class="btn btn-primary" @click="addParagraph"> Voeg een paragraaf toe</button>
		<button class="btn btn-primary" @click="addBlockquote"> Voeg een citaat toe</button>
	</div>
</template>

<script>
    export default {
        props: [
	        'article'
        ],

        data() {
            return {
                'articleitems': []
            }
        },

        mounted() {
            this.articleitems = this.article.articleitems;
        },

        computed: {
        },

        methods: {
        	addParagraph() {
        		axios.post('/api/article/' + this.article.id + '/paragraph/store', {
                    paragraph: '---',
                    order: ( this.article.articleitems.length + 1 ),
                })
                .then(response => {
                    this.articleitems.push(response.data);
                })
        	},

            addBlockquote() {
                axios.post('/api/article/' + this.article.id + '/blockquote/store', {
                    blockquote: '---',
                    order: (this.article.articleitems.length + 1),
                })
                .then(response => {
                    this.articleitems.push(response.data);
                })
            },

            updateArticle() {
                console.log('updating article');
                axios.post('/api/article/' + this.article.id + '/update', {
                    title: this.article.title,
                    body: this.article.body
                })
                .then(response => {
                    console.log('article updated');
                })
                .catch(e => {

                });
            },

            getArticle() {
                axios.get('/api/article/' + this.article.id)
                    .then(response => {
                        console.log(response.data)
                    })
            },

            deleteItem(articleitem) {
                axios.get('/api/articleitem/' + articleitem.id + '/delete')
                    .then(response => {
                        this.articleitems.splice(this.articleitems.indexOf(articleitem), 1);
                    });
            }
        }
    }
</script>