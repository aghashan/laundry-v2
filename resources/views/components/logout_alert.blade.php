<script>
    async function confirmLogout() {
        const {value} = await Swal.fire({
            title: 'Logout Confirmation',
            text: "Are you sure you want to logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Logout',
            cancelButtonText: 'Cancel'
        });

        if (value) {
            try {
                const response = await fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    Swal.fire({
                        title: 'Logout Successful',
                        text: data.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '{{ route('login') }}';
                    });
                } else {
                    throw new Error('Logout failed');
                }
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Logout failed. Please try again later.',
                    icon: 'error'
                });
            }
        }
    }
</script>
