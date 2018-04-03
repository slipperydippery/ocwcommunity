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
        },

        computed: {
        },

        methods: {
        	addParagraph() {
        		axios.post('/api/article/' + this.article.id + '/paragraph/store', {
                    paragraph: '',
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
                var oldorder = articleitem.order;
                if(oldorder > 1){
                    Vue.set(this.articleitems, oldorder - 1, this.articleitems[oldorder - 2]);
                    Vue.set(this.articleitems, oldorder - 2, articleitem);
                    this.articleitems[oldorder - 2].order --;
                    this.articleitems[oldorder - 1].order ++;
                }
            },

            moveDown(articleitem) {
                var oldorder = articleitem.order;
                if(oldorder < this.articleitems.length){
                    Vue.set(this.articleitems, oldorder - 1, this.articleitems[oldorder]);
                    Vue.set(this.articleitems, oldorder, articleitem);
                    this.articleitems[oldorder].order ++;
                    this.articleitems[oldorder - 1].order --;
                }
            }

        }
    }
</script>