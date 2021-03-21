<template>
    <div
        style="outline: none;"
        @dragover="preventEvent"
        @dragenter="preventEvent"
        @dragleave="preventEvent"
        @drop="preventEvent"
        class="image-uploader"
    >

        <div class="image-uploader__image-container-wrap"
             v-if="images.length"
        >
            <div class="image-uploader__image-container image-uploader__image-list">
                <div class="image-uploader__preview-image"
                     @click="openGallery(currentIndexImage)">
                    <div class="image-uploader__image-overlay"></div>
                    <div class="image-uploader__image-overlay-details">
                        <v-icon
                            size="48"
                            color="white"
                        >
                            mdi-magnify-plus-outline
                        </v-icon>
                    </div>
                    <div class="image-uploader__show-img-wrap">
                        <img class="image-uploader__show-img" :src="imagePreview">
                    </div>
                </div>
                <div
                    class="image-uploader__image-bottom"
                    :class="!showPrimary && 'justify-content-end'">
                    <div class="image-uploader__image-bottom-left">
                        <span class="image-uploader__image-primary" v-if="currentIndexImage === 0">
                            先頭画像
                        </span>
                        <popper trigger="click" :options="{placement: 'top'}">
                            <div class="popper image-uploader__popper-custom">
                                ・1番左の画像がメイン画像となります<br>
                                ・ファイル形式JPG、PNG<br>
                                ・ファイルサイズ最大5MB 10枚まで<br>
                                ・画像サイズ1200×628、1080×1080
                            </div>
                            <v-icon
                                slot="reference"
                                class="image-uploader__information-icon"
                                size="16"
                            >
                                mdi-information-outline
                            </v-icon>
                        </popper>
                    </div>
                    <div class="image-uploader__image-bottom-right">
                        <label class="image-uploader__image-edit display-flex cursor-pointer" :for="idEdit">
                            <v-icon
                                size="16"
                            >
                                mdi-pencil-outline
                            </v-icon>
                        </label>

                        <a class="image-uploader__image-delete display-flex cursor-pointer"
                           @click.prevent="deleteImage(currentIndexImage)">
                            <v-icon
                                size="16"
                            >
                                mdi-trash-can-outline
                            </v-icon>
                        </a>
                    </div>
                </div>
            </div>

            <div class="image-uploader__image-list-container" v-if="images.length && multiple">
                <draggable
                    :list="images"
                    class="image-uploader__draggable"
                >
                    <div
                        class="image-uploader__image-list-item"
                        :class="image.highlight && 'image-highlight'"
                        v-for="(image, index) in images" :key="image.path" @click="changeHighlight(index)"
                    >
                        <img class="image-uploader__image-list-img" :src="image.path">
                    </div>
                </draggable>
            </div>

            <vue-image-lightbox-carousel
                ref="lightbox"
                :show="showLightbox"
                @close="showLightbox = false"
                :images="images"
                @change="changeHighlight"
                :showCaption="false"
            >
            </vue-image-lightbox-carousel>

        </div>

        <div
            class="image-uploader__image-container"
        >
            <div class="image-uploader__drag-upload-cover" v-if="isDragover" @drop="onDrop">
                <v-icon
                    color="#76c3bf"
                    large
                >
                    mdi-camera-image
                </v-icon>
            </div>
            <div v-else
                 class="image-uploader__target"
                 @dragover.prevent="onDragover">
                <div class="image-uploader__target-part">
                    <v-icon
                        color="#76c3bf"
                        large
                    >
                        mdi-file-upload-outline
                    </v-icon>
                </div>
                <div class="image-uploader__target-part">
                    画像をここへドラッグ
                </div>
                <label :for="idUpload" class="image-uploader__target-label">
                </label>
            </div>
        </div>

        <div>
            <input class="image-uploader__input" :id="idUpload" @change="uploadFieldChange" name="images"
                   :multiple="multiple"
                   :accept="accept" type="file">
            <input class="image-uploader__input" :id="idEdit" @change="editFieldChange" name="image" :accept="accept"
                   type="file">
        </div>
    </div>
</template>

<script>
    import {forEach, findIndex, orderBy, cloneDeep} from 'lodash'
    import Popper from 'vue-popperjs'
    import 'vue-popperjs/dist/css/vue-popper.css'
    import VueImageLightboxCarousel from 'vue-image-lightbox-carousel'
    import Draggable from 'vuedraggable'

    export default {
        props: {
            accept: {
                type: String,
            },
            dataImages: {
                type: Array,
                default: () => {
                    return []
                }
            },
            multiple: {
                type: Boolean,
                default: true
            },
            showPrimary: {
                type: Boolean,
                default: true
            },
            maxImage: {
                type: Number,
                default: 5
            },
            idUpload: {
                type: String,
                default: 'image-upload'
            },
            idEdit: {
                type: String,
                default: 'image-edit'
            }
        },
        data() {
            return {
                currentIndexImage: 0,
                images: [],
                isDragover: false,
                showLightbox: false,
                arrLightBox: []
            }
        },
        components: {
            Popper,
            VueImageLightboxCarousel,
            Draggable,
        },
        computed: {
            imagePreview() {
                let index = findIndex(this.images, {highlight: 1})
                if (index > -1) {
                    return this.images[index].path
                } else {
                    return this.images.length ? this.images[0].path : ''
                }
            },
            imageDefault() {
                if (this.images[this.currentIndexImage]) {
                    return this.images[this.currentIndexImage].default
                }
            }
        },
        methods: {
            preventEvent(e) {
                e.preventDefault()
                e.stopPropagation()
            },
            onDrop(e) {
                this.isDragover = false
                e.stopPropagation()
                e.preventDefault()
                let files = e.dataTransfer.files
                if (!files.length) {
                    return false
                }
                if (!this.isValidNumberOfImages(files.length)) {
                    return false
                }
                forEach(files, (value, index) => {
                    this.createImage(value)
                    if (!this.multiple) {
                        return false
                    }
                })
                if (document.getElementById(this.idUpload)) {
                    document.getElementById(this.idUpload).value = []
                }
            },
            onDragover() {
                this.isDragover = true
            },
            createImage(file) {
                let reader = new FileReader()
                let formData = new FormData()
                formData.append('file', file)
                reader.onload = (e) => {
                    let dataURI = e.target.result
                    if (dataURI) {
                        if (!this.images.length) {
                            this.images.push({name: file.name, path: dataURI, highlight: 1, default: 1})
                            this.currentIndexImage = 0
                        } else {
                            this.images.push({name: file.name, path: dataURI, highlight: 0, default: 0})
                        }
                        this.$emit('upload-success', formData, this.images.length - 1, this.images)
                    }
                }
                reader.readAsDataURL(file)
            },
            editImage(file) {
                let reader = new FileReader()
                let formData = new FormData()
                formData.append('file', file)
                reader.onload = (e) => {
                    let dataURI = e.target.result
                    if (dataURI) {
                        if (this.images.length && this.images[this.currentIndexImage]) {
                            this.images[this.currentIndexImage].path = dataURI
                            this.images[this.currentIndexImage].name = file.name
                        }
                    }
                }
                reader.readAsDataURL(file)
                this.$emit('edit-image', formData, this.currentIndexImage, this.images)
            },
            uploadFieldChange(e) {
                let files = e.target.files || e.dataTransfer.files
                if (!files.length) {
                    return false
                }
                if (!this.isValidNumberOfImages(files.length)) {
                    return false
                }
                forEach(files, (value, index) => {
                    this.createImage(value)
                })
                if (document.getElementById(this.idUpload)) {
                    document.getElementById(this.idUpload).value = []
                }
            },
            editFieldChange(e) {
                let files = e.target.files || e.dataTransfer.files
                if (!files.length) {
                    return false
                }
                if (!this.isValidNumberOfImages(files.length)) {
                    return false
                }
                forEach(files, (value, index) => {
                    this.editImage(value)
                })
                if (document.getElementById(this.idEdit)) {
                    document.getElementById(this.idEdit).value = ''
                }
            },
            changeHighlight(currentIndex) {
                this.currentIndexImage = currentIndex
                let arr = this.images
                this.images = []
                arr.map((item, index) => {
                    if (currentIndex === index) {
                        item.highlight = 1
                    } else {
                        item.highlight = 0
                    }
                    return item
                })
                this.images = arr
            },
            markIsPrimary(currentIndex) {
                this.images.map((item, index) => {
                    if (currentIndex === index) {
                        item.highlight = 1
                        item.default = 1
                    } else {
                        item.highlight = 0
                        item.default = 0
                    }
                    return item
                })
                this.currentIndexImage = 0
                this.images = orderBy(this.images, 'default', 'desc')
                this.$emit('mark-is-primary', currentIndex, this.images)
            },
            deleteImage(currentIndex) {
                this.$emit('before-remove', currentIndex, () => {
                    if (this.images[currentIndex].default === 1) {
                        this.images[0].default = 1
                    }
                    this.images.splice(currentIndex, 1)
                    this.currentIndexImage = 0
                    if (this.images.length) {
                        this.images[0].highlight = 1
                    }
                }, this.images)
            },
            openGallery(index) {
                this.showLightbox = true
                this.$refs.lightbox.showImage(index)
            },
            onOpenedLightBox(value) {
                if (value) {
                    this.showLightbox = true
                } else {
                    this.showLightbox = false
                }
            },
            isValidNumberOfImages(amount) {
                if (amount > this.maxImage) {
                    this.$emit('limit-exceeded', amount)
                    return false
                } else {
                    return true
                }
            },
        },
        watch: {
            dataImages: {
                handler: function (newVal) {
                    this.images = newVal
                },
                deep: true
            }
        },
        mounted() {
            document.body.addEventListener('dragleave', (event) => {
                event.stopPropagation()
                event.preventDefault()
                this.isDragover = false
            })
        },
        created() {
            this.images = []
            this.images = cloneDeep(this.dataImages)
        }
    }
</script>

<style lang="sass" scoped>
    .image-uploader
        display: flex
        flex-wrap: nowrap

        &__draggable
            display: flex

        &__input
            display: none

        &__image-container-wrap
            margin-right: 20px

        &__image-container
            position: relative
            text-align: center
            width: 190px
            height: 180px
            border: 1px dashed #D6D6D6
            border-radius: 4px
            background-color: #fff
            display: flex
            justify-content: center

        &__drag-upload-cover
            top: 0
            left: 0
            right: 0
            bottom: 0
            background: #FCFEFF
            opacity: 0.9
            z-index: 1
            margin: 5px
            border: 2px dashed #268DDD
            font-weight: 400
            font-size: 20px
            position: absolute
            width: 100%
            text-align: center
            display: flex
            justify-content: center

        &__image-list-container
            display: flex
            flex-wrap: wrap
            max-width: 190px
            min-height: 50px
            margin-top: 10px

            .image-highlight
                border: 1px solid #2fa3e7

        &__image-list
            display: flex
            flex-wrap: wrap
            border: 1px solid #D6D6D6

        &__image-list-item
            position: relative
            cursor: pointer
            width: 32px
            height: 32px
            border-radius: 4px
            border: 1px solid #D6D6D6

            &:not(:last-child)
                margin-right: 5px
                margin-bottom: 5px

        &__image-list-img
            vertical-align: middle
            max-width: 28px
            max-height: 28px

        &__target
            color: #777
            height: 100%
            display: flex
            justify-content: center
            align-items: center
            align-content: center
            flex-wrap: wrap
            position: absolute

        &__target-part
            width: 100%

        &__target-label
            width: 100%
            height: 100%
            position: absolute
            cursor: pointer

        &__preview-image
            width: 100%
            height: 140px
            padding: 5px
            position: relative
            border-radius: 15px
            box-sizing: border-box
            cursor: pointer

            :hover
                opacity: 1

        &__image-overlay
            width: 100%
            height: 100%
            position: relative
            background: rgba(0, 0, 0, 0.7)
            z-index: 10
            border-radius: 5px
            opacity: 0
            transition: all .3s ease-in-out 0s

        &__image-overlay-details
            width: 100%
            position: absolute
            z-index: 11
            opacity: 0
            transform: translate(0, -50%)
            top: 50%
            opacity: 1

        &__image-bottom
            display: flex
            position: absolute
            width: 100%
            align-items: center
            justify-content: space-between
            bottom: 0
            left: 0
            height: 40px
            padding: 5px 10px
            box-sizing: border-box

        &__image-bottom-left
            display: flex
            position: absolute
            align-items: center

        &__image-bottom-right
            display: flex
            position: absolute
            align-items: center
            right: 10px

        &__image-primary
            display: flex
            align-items: center
            border-radius: 4px
            background-color: #76c3bf
            color: white
            padding: 3px 7px
            font-size: 11px
            margin-right: 5px

        &__information-icon
            display: flex
            cursor: pointer

        &__image-edit
            display: flex
            cursor: pointer

        &__image-delete
            display: flex
            cursor: pointer

        &__show-img-wrap
            left: 50%
            transform: translate(-50%, -50%)
            top: 50%
            position: absolute
            display: block

        &__show-img
            max-height: 100px
            max-width: 140px
            display: block
            vertical-align: middle

        &__popper-custom
            background: #000
            padding: 10px
            border: none
            box-shadow: none
            color: white
            text-align: left
            font-size: 12px
            width: 250px

</style>
<style lang="sass">
    .popper__arrow
        border-color: #000 transparent transparent transparent !important
</style>
