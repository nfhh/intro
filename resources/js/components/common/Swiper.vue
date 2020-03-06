<template>
    <div class="wrapper">
        <swiper :options="swiperOption" v-if="showSwiper">
            <swiper-slide v-for="(item, index) of list" :key="index">
                <img class="swiper-img" :src="item"/>
            </swiper-slide>
            <div class="swiper-pagination" slot="pagination"></div>
        </swiper>
    </div>
</template>

<script>
    export default {
        props: {
            list: Array
        },
        data() {
            return {
                swiperOption: {
                    pagination: '.swiper-pagination',
                    loop: true
                }
            }
        },
        computed: {
            showSwiper() {
                return this.list.length
            }
        }
    }
</script>
