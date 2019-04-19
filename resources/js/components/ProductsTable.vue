<template>
    <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="product in products" v-bind:key="product.id">
                            <td scope="row">{{ product.name }}</td>
                            <td>{{ product.brand }}</td>
                            <td>{{ product.description }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" :href="'produto/'+product.id+'/editar'" role="button">
                                        <i class="fa fa-edit    "></i>
                                    </a> 
                                    <button type="button" class="btn btn-danger" @click="deleteProduct(product.id)">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>                                    
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
</template>

<script>

export default {
    
    data(){
        return {
            products: [],
            productsAll: []
        }
    },    
    methods:{
        getProducts(){
            axios.get('api/product').then(response => {
                this.products = response.data.data
                this.productsAll = this.products
            }).catch(error => {
                stacklog(error)
                // stacklog('https://stackoverflow.com/search?q='+error.message.split(' ').join('+'))
            })
        },
        deleteProduct(id){
            axios.delete('api/product/'+id).then(response => {
                this.getProducts()
            }).catch(error =>{
                stacklog(error)
                alert('não foi possivel apagar o produto')
            })
        },
        /**
         * Filtra os dados recuperando as informaçoes de produto
         * novamente do servidor
         */
        getFilter(filters){
            var name = filters.name ? filters.name : 'emptyName' 
            var brand = filters.brand
            var url = 'api/product/filter/'+name+'&'+brand
                    
            axios.get(url).then(response => {
                this.products = response.data.data
            }).catch(error => {
                stacklog(error)
            })
        },
        /**
         * Filtra os produtos a partir dos produtos ja carregados no frontend
         */
        filter(filters){
            var list = this.productsAll
            if(filters.brand != "all"){
                list = list.filter(product => {
                    return product.brandId == filters.brand
                })
            }
            if(filters.name){
                list = list.filter(product => {
                    //REGEX S2
                    var regex = new RegExp(filters.name,'i')
                    return product.name.search(regex) != -1
                })
            }

            this.products = list
        },

    },
    mounted(){
        this.getProducts()
        Event.$on('filterChanged',filters=>{            
            this.filter(filters)
            // this.getFilter(filters)
        })
    }
}
</script>

