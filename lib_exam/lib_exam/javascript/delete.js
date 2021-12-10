const onDelete = (e) => {
    if (!confirm('Are you sure you want to delete?')) {
        e.preventDefault();
    }
}