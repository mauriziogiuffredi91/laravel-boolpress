require("./bootstrap");

/**
 * Delete post confirm
 * costruito con js puro
*/

const delForm = document.querySelectorAll('.delete-post-form');

console.log(delForm);




delForm.forEach(from =>{
    from.addEventListener('submit', function(event){
        const resp = confirm('Are you sure?');

        console.log(resp);

        if (! resp) {
            event.preventDefault();
        }
    }); 
});