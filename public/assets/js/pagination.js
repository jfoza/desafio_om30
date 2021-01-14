Vue.component('Pagination',{
    template:`  
    <div class="product_pagination" v-if="totalPages > 0">  
        <div class="middle_list">                                                                                               
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    
                    
                    <li class="page-item" v-if="firstPage">
                        <a class="page-link" @click="updatePage(0)" href="javascript:void(0)">1</a>
                    </li>
                    
                    <li class="page-item page-link text-dark px-3 fa fa-ellipsis-h"  v-if="firstPage"></li>
                    
                    <li class="page-item" :class="{'active': current_page == page}"v-for="page in pages">
                        <a class="page-link" @click="updatePage(page)" href="javascript:void(0)">{{ page + 1 }}</a>
                    </li>
                    
                    <li class="page-item page-link text-dark px-3 fa fa-ellipsis-h"  v-if="lastPage"></li>
                    
                    <li class="page-item" v-if="lastPage">
                        <a class="page-link" @click="updatePage(totalPages - 1)" href="javascript:void(0)">{{ totalPages }}</a>
                    </li>
                    
                                
                </ul>
            </nav>                                                                
        </div> 
    </div> `,

    props:['current_page', 'row_count_page','total_data','page_range'],
    computed:{
        prev(){
            return this.current_page - 1;
        },
        next(){
            return this.current_page + 1;
        },
        rangeStart(){
            var start = this.current_page - this.page_range;
            return  (start > 0) ? start : 0;
        },
        rangeEnd(){
            var end = this.current_page + this.page_range;
            return (end < this.totalPages) ? end : this.totalPages;
        },
        pages(){
            var pages = [];
            for(var i = this.rangeStart; i < this.rangeEnd; i++){
                pages.push(i);
            }
            return pages;
        },
        totalPages(){
            return Math.ceil(this.total_data / this.row_count_page);
        },
        firstPage(){
            return this.rangeStart !== 0;
        },
        lastPage(){
            return this.rangeEnd < this.totalPages
        },
        showPrevLink() {
            return this.current_page == 0 ? false : true;
        },
        showNextLink() {
            return this.current_page == (this.totalPages - 1) ? false : true;
        }
    },
    methods: {
        updatePage(pageNumber) {
            this.$emit('page-update', pageNumber);
        },
    }
});
