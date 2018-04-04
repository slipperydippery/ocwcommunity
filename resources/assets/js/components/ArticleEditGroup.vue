    <template>
	<div class="">
		<article-edit-title
            :oldarticle="article"
            @articleUpdated="updateArticle()"
        >
        </article-edit-title>
		<article-edit-item
			v-for="articleitem in articleitems"	
			:articleitem="articleitem"
			:key="articleitem.id"
            @deleteItem="deleteItem"
            @moveUp="moveUp"
            @moveDown="moveDown"
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
            this.sortArticleitems();
        },

        computed: {
        },

        methods: {
        	addParagraph() {
                this.sortArticleitems();
        		axios.post('/api/article/' + this.article.id + '/paragraph/store', {
                    paragraph: '',
                    order: ( this.article.articleitems.length ),
                })
                .then(response => {
                    this.articleitems.push(response.data);
                })
        	},

            addBlockquote() {
                this.sortArticleitems();
                axios.post('/api/article/' + this.article.id + '/blockquote/store', {
                    blockquote: '---',
                    order: (this.article.articleitems.length),
                })
                .then(response => {
                    this.articleitems.push(response.data);
                })
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
            },

            moveUp(articleitem) {
                //find articleitem in array
                var thisIndex = this.articleitems.indexOf(articleitem);
                var oldOrder = this.articleitems[thisIndex].order
                if(thisIndex > 0){
                    //switch items.order
                    this.articleitems[thisIndex].order = this.articleitems[thisIndex - 1].order;
                    this.articleitems[thisIndex - 1].order = oldOrder;
                    //send the data to the DB
                    this.updateArticleitem(this.articleitems[thisIndex]);
                    this.updateArticleitem(this.articleitems[thisIndex - 1]);
                    //sort the items
                    this.sortArticleitems();
                }
            },

            moveDown(articleitem) {
                var thisIndex = this.articleitems.indexOf(articleitem);
                var oldOrder = articleitem.order;
                if(thisIndex < (this.articleitems.length - 1)){
                    this.articleitems[thisIndex].order = this.articleitems[thisIndex + 1].order;
                    this.articleitems[thisIndex + 1 ].order = oldOrder;
                    this.updateArticleitem(this.articleitems[thisIndex]);
                    this.updateArticleitem(this.articleitems[thisIndex + 1]);
                    this.sortArticleitems();
                }
            },

            updateArticleitem(articleitem) {
                axios.post('/api/articleitem/' + articleitem.id + '/update', {
                    articleitem: articleitem,
                })
                .then(response => {

                })
            },

            sortArticleitems() {
                this.articleitems.sort(function(a, b){
                    return a.order - b.order;
                });
                this.articleitems.forEach(articleitem => {
                    console.log(this.articleitems.indexOf(articleitem));
                    articleitem.order = this.articleitems.indexOf(articleitem);
                })
            }

        }
    }
</script>