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
            <button type="submit"  class="button" >Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "review-form",
        props:['product','url'],
        data(){
            return{
                formData:{}
            }
        },

        methods:{
            postReview(){
                this.formData.product_id = this.product.id;
                
                axios.post(this.url, this.formData)
                    .then(data=>{
                        location.reload();
                    })

                    .catch(error=>{
                        console.log(error);
                    })
            }
        },
    }
</script>
