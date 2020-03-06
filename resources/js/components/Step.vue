<template>
    <div>
        <sidebar></sidebar>
        <article>
            <div class="one">
                <div class="left">
                    <a href=""><img src="/images/left.png" alt="" width="26" height="26"></a>
                    <a href=""><img src="/images/right.png" alt="" width="26" height="26"></a>
                </div>
                <div class="right">
                    <select name="" id="">
                        <option value="">中文</option>
                        <option value="">英文</option>
                    </select>
                </div>
            </div>
            <div class="two">
                <swiper :list="steps"></swiper>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get(`/api/steps/${this.$route.params.id}/${this.$route.params.lan}`).then(response => {
                this.steps = response.data
            })
        },
        data() {
            return {
                steps: []
            }
        }
    }
</script>
