<template>
    <div>
        <form @submit.prevent="postReview">
            <legend>Rate Product</legend>
            <div class="form-group">
              <label>Rate</label>
              <star-rating v-model="formData.rating"></star-rating>
            </div>
            <div class="form-group">
              <label>Comment</label>
              <input type="text" v-model="formData.content" placeholder="Give Us Review" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" name="submit">
            </div>
        </form>
    </div>
</template>

<script>
    export default {

    }
</script>
