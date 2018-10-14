<template>
    <a v-if="!liked" class="btn btn-primary btn-go" @click="submit(postId)">いいね {{ likeCount }}</a>
    <a v-else        class="btn btn-primary btn-go" @click="unlike(postId)">いいね {{ likeCount }}</a>
</template>

<script>
export default {
  props: ['postId', 'defaultLikes', 'defaultLikeCount'],

  data() {
    return {
      url: [],
      liked: false,
      likeCount: 0

    };
  },

  created () {
    this.liked = this.defaultLikes
    this.likeCount = this.defaultLikeCount
  },

  methods: {
    submit(postId) {
      let url = `/post/${this.postId}/like`

      axios.post(url)
        .then(response => {
          this.liked = true
          this.likeCount = response.data.likeCount
        })
        .catch(error => {
          alert('likefail');
        });
    },
    unlike(postId) {
      let url = `/post/${this.postId}/unlike`

      axios.post(url)
        .then(response => {
          this.liked = false
          this.likeCount = response.data.likeCount
        })
        .catch(error => {
          alert('fail');
        });
    },
  }

};
</script>