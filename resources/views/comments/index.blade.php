<!DOCTYPE html>
<html>
    <head>
        <title>Comments</title>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <h1>Comments</h1>
        <div id="root">
            <ul>
                <li v-for="comment in comments">
                    @{{ comment.comment_text }}
                </li>
            </ul>

            <h2>New Comment</h2>
            Comment text: <input type="text" id="input" v-model="newCommentText">
            <button @click="createComment">Create</button>
        </div>

        <script>
            var app = new Vue({
                el: "#root",
                data: {
                    comments: [],
                    newCommentText: '',
                    post_id: {{$id}},
                    user_id: {{auth()->user()->id}}, 
                },

                methods:{
                    createComment:function(){
                        axios.post("{{route('api.comments.store')}}",{comment_text:this.newCommentText, user_id:this.user_id, post_id:this.post_id})
                        .then(response=>{
                            this.comments.push(response.data);
                            this.newCommentText='';
                        })
                        .catch(response=>{
                            console.log(response);
                        })
                    }},

                mounted(){
                    axios.get("{{route('api.comments.index', $id)}}")
                    .then(response=>{
                        this.comments = response.data;
                    })
                    .catch(response=>{
                        console.log(response);
                    })
                }
            });
        </script>
    </body>
</html>
