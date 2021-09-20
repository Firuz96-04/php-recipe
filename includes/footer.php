

<script>
let addBtn = document.querySelector("#add")
let editBnt = document.querySelectorAll(".editBtn")
   addBtn.addEventListener('click', async ()=>{
       let recipe_name = prompt('Добавьте ваш рецепт','')
       if (recipe_name) {
           let fd = new FormData()
           fd.append('name',recipe_name)
           fd.append('ingredient','')
           fd.append('add_recipe','add_recipe')

           fetch('code.php',
               {
                   method:"POST",
                   body :fd})
               .then( (response) => {
                   console.log(response)
               })
       }
       else {
           console.log('null')
       }


    })



        for (let i=0; i<editBnt.length; i++) {
            editBnt[i].addEventListener('click', async () => {
              let attr = editBnt[i].getAttribute('data-kod')
                let edit_message = prompt('Добавьте ваш ингредиент')
                if (edit_message) {
                    let editDb = new FormData()
                    editDb.append('ingredient',edit_message)
                    editDb.append('key',attr)
                    editDb.append('update_recipe','update_recipe')

                    fetch('code.php', {
                        method:"POST",
                        body:editDb
                    })
                    .then((response) => {

                        console.log(response)
                    })
                }

            })
        }


</script>
</body>
</html>