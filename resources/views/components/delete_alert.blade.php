<script>
    function deleteConfirmation(redirectTo) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(function() {
                    window.location.href = redirectTo;
                }, 1000);
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your data has been deleted.',
                    icon: 'success',
                    showConfirmButton: false
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Your action has been cancelled',
                    'info'
                );
            }
        }).catch(error => {
            Swal.fire(
                'Error!',
                'Something went wrong',
                'error'
            );
            console.error('There was a problem with the delete operation:', error);
        });
    }
</script>
