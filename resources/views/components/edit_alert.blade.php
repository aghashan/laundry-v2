<script>
    function updateCategory(redirectTo) {
        const formData = new FormData(document.getElementById('editAlert'));
        formData.append('_token', '{{ csrf_token() }}');

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to update?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(document.getElementById('editAlert').action, {
                        method: document.getElementById('editAlert').method,
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to update ');
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
                            window.location.href = redirectTo;
                        });
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to update. Please try again later.',
                        });
                        console.error('Error updating:', error);
                    });
            }
        });
    }
</script>
