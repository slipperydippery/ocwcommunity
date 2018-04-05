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
		<button class="btn btn-primary" @click="addHeading"> Voeg een heading toe</button>
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
                    order: this.article.articleitems.length,
                })
                .then(response => {
                    response.data.articleitemable.editable = true;
                    this.articleitems.push(response.data);
                })
        	},

            addBlockquote() {
                this.sortArticleitems();
                axios.post('/api/article/' + this.article.id + '/blockquote/store', {
                    blockquote: '',
                    order: this.article.articleitems.length,
                })
                .then(response => {
                    response.data.articleitemable.editable = true;
                    this.articleitems.push(response.data);
                })
            },

            addHeading() {
                this.sortArticleitems();
                axios.post('/api/article/' + this.article.id + '/heading/store', {
                    heading: '',
                    order: this.article.articleitems.length,
                })
                .then(response => {
                    response.data.articleitemable.editable = true;
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

            moveUp(baseItem) {
                var baseIndex = this.articleitems.indexOf(baseItem);
                var baseOrder = baseItem.order
                if(baseIndex > 0){
                    this.articleitems[baseIndex].order = this.articleitems[baseIndex - 1].order;
                    this.articleitems[baseIndex - 1].order = baseOrder;
                    this.sortArticleitems();
                }
            },

            moveDown(baseItem) {
                var baseIndex = this.articleitems.indexOf(baseItem);
                var baseOrder = baseItem.order;
                if(baseIndex < (this.articleitems.length - 1)){
                    this.articleitems[baseIndex].order = this.articleitems[baseIndex + 1].order;
                    this.articleitems[baseIndex + 1 ].order = baseOrder;
                    this.sortArticleitems();
                }
            },

            updateArticleitem(articleitem) {
                axios.post('/api/articleitem/' + articleitem.id + '/update', {
                    articleitem: articleitem,
                })
            },

            sortArticleitems() {
                this.articleitems.sort(function(a, b){
                    return a.order - b.order;
                });
                this.articleitems.forEach(articleitem => {
                    articleitem.order = this.articleitems.indexOf(articleitem);
                    this.updateArticleitem(articleitem);
                })
            }

        }
    }
</script>