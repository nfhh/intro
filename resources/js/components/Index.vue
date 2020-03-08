<template>
    <div class="vd">
        <sidebar :curProduct="listenProduct" :installTip="listenInstallTip"></sidebar>
        <article>
            <div class="one">
                <div class="left">
                    <div class="left" v-if="steps.length">
                        <a href="#" @click.prevent="goToStep(index - 1)">
                            <img src="/images/left.png" width="26" height="26">
                        </a>
                        <a href="#" @click.prevent="goToStep(index + 1)">
                            <img src="/images/right.png" width="26" height="26">
                        </a>
                    </div>
                </div>
                <div class="right">
                    <select v-model="selected_lan">
                        <option v-for="item of lans" :key="item.id" :value="item.value">{{ item.title }}</option>
                    </select>
                </div>
            </div>
            <div class="two">
                <template v-if="steps.length === 0">
                    <div class="top">
                        <div class="inside1">
                            <h1>{{ listenInstallTip }}</h1>
                        </div>
                        <div class="inside2">
                            <select v-model="selected_product_id">
                                <option :value="0">{{ listenChooseProductTip }}</option>
                                <option v-for="item of products" :key="item.id" :value="item.id">
                                    {{ item.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="bottom">
                        <button type="button" class="pointer" :disabled="!listenProduct" @click="handleClick">{{
                            listenStart }}
                        </button>
                    </div>
                </template>
                <template v-else>
                    <div v-html="cur_step"></div>
                </template>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                lang: {
                    cn: {
                        install_tip: "快速安装指南",
                        choose_product_tip: "请选择产品ID/型号",
                        start: "开始"
                    },
                    de: {
                        install_tip: "Kurzanleitung zur Installation",
                        choose_product_tip: "Bitte wählen Sie ein Produkt-ID/Modell Nr.",
                        start: "beginnen"
                    },
                    en: {
                        install_tip: "Quick Installation Guide",
                        choose_product_tip: "Please select a product ID/model no.",
                        start: "Start"
                    },
                    es: {
                        install_tip: "Guía de instalación rápida",
                        choose_product_tip: "Seleccione un ID de producto/N.º de modelo",
                        start: "empezar"
                    },
                    fr: {
                        install_tip: "Guide d'installation rapide",
                        choose_product_tip: "Sélectionnez un Produit ID/Numéro de modèle",
                        start: "commencer"
                    },
                    hu: {
                        install_tip: "Gyors telepítési útmutató",
                        choose_product_tip: "Select your model",
                        start: "Start"
                    },
                    it: {
                        install_tip: "Guida rapida all'installazione",
                        choose_product_tip: "Seleziona un ID prodotto/Nº modello",
                        start: "iniziare"
                    },
                    ja: {
                        install_tip: "クイックインストールガイド",
                        choose_product_tip: "製品ID/モデルNo.を選択してくださ",
                        start: "始めます"
                    },
                    ko: {
                        install_tip: "빠른 설치 가이드",
                        choose_product_tip: "제품 ID/모델 번호을 선택하십시오",
                        start: "지금 시작"
                    },
                    ru: {
                        install_tip: "Hızlı Kurulum Kılavuzu",
                        choose_product_tip: "Ürün Kodu/Model No seçiniz",
                        start: "Başlayın"
                    },
                    tw: {
                        install_tip: "快速安裝指南",
                        choose_product_tip: "請選擇產品ID/型號",
                        start: "開始"
                    }
                },
                lans: [
                    {id: 1, value: 'en', title: 'English/Global'},
                    {id: 2, value: 'de', title: 'Deutsch/Deutschland'},
                    {id: 3, value: 'fr', title: 'France/Français'},
                    {id: 4, value: 'it', title: 'Italiano/Italia'},
                    {id: 5, value: 'es', title: 'Español/España'},
                    {id: 6, value: 'hu', title: 'Magyar/Magyarország'},
                    {id: 7, value: 'ko', title: '한국어/한국'},
                    {id: 8, value: 'ja', title: '日本語/日本'},
                    {id: 9, value: 'cn', title: '简体中文/中国'},
                    {id: 10, value: 'tw', title: '繁體中文/中国'},
                    {id: 11, value: 'ru', title: 'Türkçe/Türkiye'},
                ],
                selected_lan: 'cn',
                products: [],
                selected_product_id: 0,
                disabled: true,
                index: 0,
                steps: [],
                cur_step: null
            }
        },
        mounted() {
            axios.get('/api/products').then(response => {
                this.products = response.data.data
            })
        },
        computed: {
            listenProduct() {
                return this.getNameById(this.products, this.selected_product_id)
            },
            listenChooseProductTip() {
                return this.lang[this.selected_lan]['choose_product_tip']
            },
            listenInstallTip() {
                return this.lang[this.selected_lan]['install_tip']
            },
            listenStart() {
                return this.lang[this.selected_lan]['start']
            }
        },
        methods: {
            getNameById(arr, id) {
                for (let value of arr) {
                    if (value.id === id) {
                        return value.name
                    }
                }
            },
            handleClick() {
                axios.get(`/api/steps/${this.selected_product_id}/${this.selected_lan}`).then(response => {
                    this.steps = response.data.data
                    this.cur_step = this.steps[this.index]
                })
            },
            goToStep(step) {
                if (step < 0 || step > this.steps.length - 1) {
                    return false
                }
                this.index = step;
                this.cur_step = this.steps[this.index]
            }
        }
    }
</script>
