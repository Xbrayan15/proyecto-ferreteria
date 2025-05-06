import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


    
Alpine.data('welcome', () => ({
    section: 'register',
    route: {
    "conocenos": "conocenos",
    "register": "register",
    "login": "login",
    },
    setSection(section) {
        this.section = section;
        window.history.pushState({}, '', this.route[section]);52
    },
}))

Alpine.start();