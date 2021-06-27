<template>
    <div class="contact-lists">
        <ul>
            <li v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{'selected': index==selected}">
                <div class="avatar">
                    <img :src="contact.profile_image" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{contact.name}}</p>
                    <p class="name">{{contact.email}}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props:{
        contacts : {
            type: Array,
            default:[]
        }
    },

    data() {
        return {
            selected: 0
        };
    },
        methods: {
            selectContact(index, contact){
                this.selected = index;

                this.$emit('selected', contact);
            }
        }
    }


</script>

<style lang="scss" scoped>
    .contact-lists{
        flex: 2;
        max-height: 600px;
        overflow: scroll;
        border-left: 1px solid #979797;
    }
    ul{
        list-style-type: none;
        scroll-padding-left: 0;
        
        li{
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #aaaaaa;
            height:80px;
            position:relative;
            cursor: pointer;

            &.selected{
                background: rgb(190, 190, 190);
            }

            .avatar{
                flex: 1;
                display: flex;
                align-items: center ;

                img{
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto ;
                }
            }
            .contact{
                flex: 3;
                font-size: 12px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center ;

                p{
                    margin: 0;

                    &.name{
                        font-weight: bold;
                    }
                }
            }
        }
    }
</style>