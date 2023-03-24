const deleteButtons = document.querySelectorAll('.delete-btn');
deleteButtons.forEach(button => {
    const id = button.dataset.postId;

    button.addEventListener('click', async () => {
        const confirmed = window.confirm('Are you sure you want to delete this post?');
        
        if (confirmed) {
            await fetch(`/posts/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            });

            // Reload the page to show the updated post list
            window.location.reload();
        }
    });
});

