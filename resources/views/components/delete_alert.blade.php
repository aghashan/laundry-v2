<script>
    function deleteConfirmation(id, route, redirectTo) {
        Swal.fire({
            title: 'Are you sure you want to delete this?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(route.replace('REPLACE_ID', id), {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        Swal.fire(
                            'Deleted!',
                            data.success,
                            'success'
                        ).then(() => {
                            window.location.href = redirectTo;
                        });
                    })
                    .catch(error => {
                        Swal.fire(
                            'Error!',
                            'Something went wrong',
                            'error'
                        );
                        console.error('There was a problem with the fetch operation:', error);
                    });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Your action has been cancelled :)',
                    'info'
                );
            }
        });
    }
</script>
