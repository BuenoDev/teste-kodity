<template>
    <div class="container">
        <div class="row">
            <div class="form-group col-xs-6">
            <label for="">Nome</label>
            <input type="text" v-model="nameFilter" @keyup="applyFilter()"
                class="form-control" name="" id="" aria-describedby="helpId" placeholder="Nome">
            
            </div>            
                       
        </div>
       
    </div>
</template>

<script>
export default {
    data(){
        return { 

            interval: null,
            nameFilter: '',
            brandFilter: 'all'
        }
    },
    methods:{    
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

}
</script>
