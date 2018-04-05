    <template>
	<div class="">
		<article-edit-title
            :oldarticle="article"
            :currentlyEditing="currentlyEditing"
            @articleUpdated="updateArticle()"
            @setCurrentlyEditing="setCurrentlyEditing"
        >
        </article-edit-title>
        <article-edit-item
            v-for="(articleitem, key, index) in articleitems"   
            :articleitem="articleitem"
            :key="articleitem.id"
            :isFirst="isFirst(articleitem)"
            :isLast="isLast(articleitem)"
            :currentlyEditing="currentlyEditing"
            @deleteItem="deleteItem"
            @moveUp="moveUp"
            @moveDown="moveDown"
            @setCurrentlyEditing="setCurrentlyEditing"
		>
            {{ index }}
		</article-edit-item>
        <button class="btn btn-primary" :disabled="isCurrentlyEditing" @click="addParagraph"> <i class="material-icons">add</i> <i class="material-icons">format_align_justify</i> </button>
        <button class="btn btn-primary" :disabled="isCurrentlyEditing" @click="addBlockquote"> <i class="material-icons">add</i> <i class="material-icons">format_quote</i> </button>
		<button class="btn btn-primary" :disabled="isCurrentlyEditing" @click="addHeading"> <i class="material-icons">add</i> <i class="material-icons">title</i></button>

        <!-- Modal -->
        <div class="modal fade" id="preventEditCollapse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Hooooo! Kijk uit! </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Je bent nog iets aan het bewerken. Eerst even opslaan of verwerpen.
                    </div>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"> Gesnapt Cabron </button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>
    export default {
        props: [
	        'article'
        ],

        data() {
            return {
                'articleitems': [],
                'currentlyEditing': {}
            }
        },

        mounted() {
            this.articleitems = this.article.articleitems;
            this.sortArticleitems();
        },

        computed: {
            isCurrentlyEditing() {
                if(jQuery.isEmptyObject(this.currentlyEditing)) {
                    return false;
                }
                return true;
            }
        },

        methods: {
        	addParagraph() {
                this.sortArticleitems();
        		axios.post('/api/article/' + this.article.id + '/paragraph/store', {
                    paragraph: '',
                    order: this.article.articleitems.length,
                })
                .then(response => {
                    this.articleitems.push(response.data);
                    this.$nextTick(() => {
                        this.setCurrentlyEditing(response.data.articleitemable);
                    })
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

            setCurrentlyEditing(articleitem) {
                if(jQuery.isEmptyObject(this.currentlyEditing) || jQuery.isEmptyObject(articleitem)){
                    this.currentlyEditing = articleitem;
                } else {
                    $('#preventEditCollapse').modal('show');
                }
            }
        }
    }
</script>