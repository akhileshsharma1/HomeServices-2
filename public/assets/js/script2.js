document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.sidebar-menu a');

    menuItems.forEach(item => {
        item.addEventListener('click', function(event) {
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
});