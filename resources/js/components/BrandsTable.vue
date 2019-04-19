<template>
    <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="brand in brands" v-bind:key="brand.id">
                            <td scope="row">{{ brand.name }}</td>
                            
                            <td>{{ brand.description }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" :href="'produto/'+brand.id+'/editar'" role="button">
                                        <i class="fa fa-edit    "></i>
                                    </a> 
                                    <button type="button" class="btn btn-danger" @click="deleteBrand(brand.id)">
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
            brands: [],
            brandsAll: []
        }
    },    
    methods:{
        getBrands(){
            axios.get('api/brand').then(response => {
                this.brands = response.data.data
                this.brandsAll = this.brands
            }).catch(error => {
                stacklog(error)
                // stacklog('https://stackoverflow.com/search?q='+error.message.split(' ').join('+'))
            })
        },
        deleteBrand(id){
            axios.delete('api/brand/'+id).then(response => {
                this.getBrands()
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
            var url = 'api/brand/filter/'+name+'&'+brand
                    
            axios.get(url).then(response => {
                this.brands = response.data.data
            }).catch(error => {
                stacklog(error)
            })
        },
        /**
         * Filtra os produtos a partir dos produtos ja carregados no frontend
         */
        filter(filters){
            var list = this.brandsAll
            if(filters.name){
                list = list.filter(brand => {
                    //REGEX S2
                    var regex = new RegExp(filters.name,'i')
                    return brand.name.search(regex) != -1
                })
            }

            this.brands = list
        },


    },
    mounted(){
        this.getBrands()
        Event.$on('filterChanged',filters=>{            
            this.filter(filters)
        })
    }
}
</script>

