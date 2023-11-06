import './bootstrap'
import './mode'

Echo.private('messenger')
    .listen('MessageSent', (e) => {
        console.log(e);
        console.log(e.message);
    });
