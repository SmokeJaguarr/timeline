<template>
  <div>
    <button class="btn btn-primary" @click="postToTimeline" v-text="buttonText">Publish</button>
  </div>
</template>

<script>
export default {
  props: ["postId", "published"],
  mounted() {
    console.log("Component mounted.");
  },

  data: function () {
    return {
      status: this.published,
    };
  },

  methods: {
    postToTimeline() {
      axios.post("/publish/" + this.postId).then((response) => {
        this.status = !this.status;
        console.log(response.data);
      });
    },
  },

  computed: {
    buttonText() {
      return this.status ? "Published" : "Publish";
    },
  },
};
</script>
