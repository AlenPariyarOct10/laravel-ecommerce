import './bootstrap';
import Swal from 'sweetalert2';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.Swal = Swal; // Make Swal globally accessible

window.addToCart = function(id, name) {
    Swal.fire({
        title: name + " Added to Cart!",
        text: "The item has been added to your cart.",
        icon: "success"
    });
};

Alpine.start();
