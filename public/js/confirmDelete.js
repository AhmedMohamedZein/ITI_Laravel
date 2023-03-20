const deleteButton = document.getElementById('delete-btn');
const id = document.getElementById('id').getAttribute('data-message');


deleteButton.addEventListener('click', async ()=>{
    const confirm = window.confirm('Are you sure you want to delete this post ?');
    if (confirm) { //true 
        await fetch(`/posts/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
            });
    }
}); 