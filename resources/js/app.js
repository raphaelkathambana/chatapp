import './bootstrap'
import './mode'

Echo.private('messenger.1.2')
    .listen('MessageSent', (e) => {
        console.log(e);
        console.log(e.message);
    });
