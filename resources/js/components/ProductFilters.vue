<template>
    <div class="container">
        <div class="row">
            <div class="form-group col-xs-6">
            <label for="">Nome</label>
            <input type="text" v-model="nameFilter" @keyup="applyFilter()"
                class="form-control" name="" id="" aria-describedby="helpId" placeholder="Nome">
            
            </div>            
            <div class="form-group col-xs-4 offset-2">
            <label for="">Marca</label>
                <div class="form-group">                  
                  <select class="form-control" name="" id="" v-model="brandFilter" @change="applyFilter()">
                    <option value="all">Todas</option>
                    <option v-for="brand in brands" :value="brand.id" :key="brand.id">
                        {{ brand.name }}    
                    </option>                    
                  </select>
                </div>
            </div>            
        </div>
       
    </div>
</template>

<script>
export default {
    data(){
        return { 
            brands: [],
            interval: null,
            nameFilter: '',
            brandFilter: 'all'
        }
    },
    methods:{
        getBrands(){
            axios.get('api/brand').then(response => {
                this.brands = response.data.data
            }).catch(error => {
               console.log('https://stackoverflow.com/search?q='+error.message.split(' ').join("+")) 
            })
        },        
        applyFilter(){
            Event.$emit('filterChanged',{
                name: this.nameFilter,
                brand: this.brandFilter
            })
        },
        delayFilter(){
            clearTimeout(this.interval);
            this.interval = setTimeout(function(){
                this.applyFilter()
            },500)
        }
    },
    mounted(){
        this.getBrands()
    }
}
</script>
