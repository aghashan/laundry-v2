<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addCategoryForm = document.getElementById('addAlert');

        addAlert.addEventListener('submit', function(event) {
            event.preventDefault();

            fetch(this.action, {
                    method: this.method,
                    body: new FormData(this)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to add ');
                    }
                    return response.json();
                })
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        addAlert.reset();
                    });
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to add . Please try again later.',
                    });
                    console.error('Error adding :', error);
                });
        });
    });
</script>
