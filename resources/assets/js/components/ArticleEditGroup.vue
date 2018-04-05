    <template>
	<div class="">
		<article-edit-title
            :oldarticle="article"
            @articleUpdated="updateArticle()"
        >
        </article-edit-title>
		<article-edit-item
			v-for="(articleitem, key, index) in articleitems"	
			:articleitem="articleitem"
			:key="articleitem.id"
            :isFirst="isFirst(articleitem)"
            :isLast="isLast(articleitem)"
            @deleteItem="deleteItem"
            @moveUp="moveUp"
            @moveDown="moveDown"
		>
            {{ index }}
		</article-edit-item>
        <button class="btn btn-primary" @click="addParagraph"> <i class="material-icons">add</i> <i class="material-icons">format_align_justify</i> </button>
        <button class="btn btn-primary" @click="addBlockquote"> <i class="material-icons">add</i> <i class="material-icons">format_quote</i> </button>
		<button class="btn btn-primary" @click="addHeading"> <i class="material-icons">add</i> <i class="material-icons">title</i></button>
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
            },

            isFirst(articleitem) {
                if(this.articleitems.indexOf(articleitem) == 0) {
                    return true;
                }
                return false;
            },

            isLast(articleitem) {
                if(this.articleitems.indexOf(articleitem) == (this.articleitems.length - 1)){
                    return true;
                }
                return false;
            },
        }
    }
</script>