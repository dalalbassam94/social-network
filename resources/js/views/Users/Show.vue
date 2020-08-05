<template>
    <div class="flex flex-col items-center" v-if="status.user === 'success' && user">
        <div class="relative mb-8">
            <div class="w-100 h-64 overflow-hidden z-10">
                <UploadableImage image-width="1200"
                                 image-height="500"
                                 location="cover"
                                 alt="user background image"
                                 classes="object-cover w-full"
                                 :user-image="user.data.attributes.cover_image"/>
            </div>

            <div class="absolute flex items-center bottom-0 left-0 -mb-8 ml-12 z-20">
                <div class="w-32">
                    <UploadableImage image-width="750"
                                     image-height="750"
                                     location="profile"
                                     alt="user profile image"
                                     classes="object-cover w-32 h-32 border-4 border-gray-200 rounded-full shadow-lg"
                                     :user-image="user.data.attributes.profile_image"/>
                </div>

                <p class="text-2xl text-gray-100 ml-4">{{ user.data.attributes.name }}</p>
            </div>

   
        </div>

        <div v-if="status.posts === 'loading'">Loading posts...</div>

        <div v-else-if="posts.length < 1">No posts found. Get started...</div>

        <Post v-else v-for="(post, postKey) in posts.data" :key="postKey" :post="post" />
    </div>
</template>

<script>
    import Post from '../../components/Post';
    import UploadableImage from "../../components/UploadableImage";
    import {mapGetters} from 'vuex';

    export default {
        name: "Show",

        components: {
            Post,
            UploadableImage,
        },

        mounted() {
            this.$store.dispatch('fetchUser', this.$route.params.userId);
            this.$store.dispatch('fetchUserPosts', this.$route.params.userId);
        },

        computed: {
            ...mapGetters({
                user: 'user',
                posts: 'posts',
                status: 'status',
             
            }),
        }
    }
</script>

<style scoped>

</style>
