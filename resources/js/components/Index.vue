<template>
    <div class="vd">
        <sidebar :curProduct="listenProduct"></sidebar>
        <article>
            <div class="one">
                <div class="left">
                </div>
                <div class="right">
                    <select name="" id="">
                        <option value="">中文</option>
                        <option value="">英文</option>
                    </select>
                </div>
            </div>
            <div class="two">
                <div class="top">
                    <div class="inside1">
                        <h1>Quick Installation Guide</h1>
                    </div>
                    <div class="inside2">
                        <select v-model="selected_product">
                            <option :value="{id:0,name:'请选择产品型号'}">请选择产品型号</option>
                            <option v-for="item of products" :key="item.id" :value="{id:item.id,name:item.name}">
                                {{ item.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="bottom">
                    <button type="button">Start {{ selected_product }}</button>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get('/api/products').then(response => {
                this.products = response.data.data
            })
        },
        computed: {
            listenProduct() {
                return this.selected_product.name === '请选择产品型号' ? null : this.selected_product.name
            }
        },
        data() {
            return {
                selected_product: {id: 0, name: '请选择产品型号'},
                products: []
            }
        }
    }
</script>
